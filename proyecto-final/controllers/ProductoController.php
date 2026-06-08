<?php
namespace Controllers;

use Models\ProductoModel;
use Models\LogModel;
use Helpers\Csrf;

/**
 * Clase que gestiona la administracion de productos.
 *
 * @package Controllers
 * @author Hector Manuel Padilla Osuna
 * @version 1.0.0
 */
class ProductoController
{
    /**
     * Instancia del modelo de productos.
     *
     * @var ProductoModel
     */
    private ProductoModel $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }

    /**
     * Verifica si hay una sesion de administrador activa.
     *
     * Redirige al login si no existe una sesion valida.
     */
    private function verificarSesion(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['admin'])) {
            header('Location: login');
            exit;
        }
    }

    /**
     * Valida el token CSRF y redirige si es invalido.
     */
    private function redirigirSiNoCsrf(): void
    {
        if (!Csrf::validar($_POST['csrf_token'] ?? '')) {
            $_SESSION['error'] = 'Token de seguridad invalido.';
            header('Location: productos');
            exit;
        }
    }

    /**
     * Registra una accion en la bitacora del administrador.
     *
     * @param string      $accion   Nombre de la accion realizada
     * @param string|null $detalles Detalles adicionales de la accion
     */
    private function registrarLog(string $accion, ?string $detalles = null): void
    {
        $log = new LogModel();
        $log->registrar(
            $_SESSION['admin']['id'],
            $_SESSION['admin']['username'],
            $accion,
            $detalles
        );
    }

    /**
     * Procesa la subida de una imagen de producto.
     *
     * Valida el formato y tamano del archivo. Elimina la imagen anterior
     * si existe y se esta reemplazando.
     *
     * @param  array|null  $file         Archivo subido desde $_FILES['imagen']
     * @param  string|null $imagenActual Nombre de la imagen actual del producto
     * @return string                    Nombre del archivo guardado o cadena vacia
     */
    private function procesarImagen(?array $file, ?string $imagenActual = null): string
    {
        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            return $imagenActual ?? '';
        }

        $dirUploads = __DIR__ . '/../views/img/productos/';
        if (!is_dir($dirUploads)) {
            mkdir($dirUploads, 0775, true);
        }

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($extension, $permitidas)) {
            $_SESSION['error'] = 'Tipo de imagen no permitido. Use: jpg, jpeg, png, gif, webp.';
            return $imagenActual ?? '';
        }

        $maxSize = 2 * 1024 * 1024;
        if ($file['size'] > $maxSize) {
            $_SESSION['error'] = 'La imagen no debe superar los 2MB.';
            return $imagenActual ?? '';
        }

        if ($imagenActual && file_exists($dirUploads . $imagenActual)) {
            unlink($dirUploads . $imagenActual);
        }

        $nombreArchivo = uniqid('img_') . '.' . $extension;
        $rutaCompleta = $dirUploads . $nombreArchivo;

        if (move_uploaded_file($file['tmp_name'], $rutaCompleta)) {
            $this->redimensionarImagen($rutaCompleta, $extension);
            return $nombreArchivo;
        }

        $_SESSION['error'] = 'Error al subir la imagen.';
        return $imagenActual ?? '';
    }

    /**
     * Redimensiona la imagen a maximo 800px y la convierte en cuadrada.
     *
     * Si la imagen excede los 800px, la escala proporcionalmente.
     * Luego, si el resultado no es cuadrado, lo centra en un lienzo
     * cuadrado con fondo blanco (JPEG) o transparente (PNG/GIF/WEBP).
     * Esto evita que el CSS object-fit: cover recorte el producto
     * y solo recorte las barras de relleno.
     *
     * @param string $ruta      Ruta completa al archivo
     * @param string $extension Extension del archivo (jpg, jpeg, png, gif, webp)
     */
    private function redimensionarImagen(string $ruta, string $extension): void
    {
        if (!extension_loaded('gd')) {
            return;
        }

        $info = getimagesize($ruta);
        if (!$info) {
            return;
        }

        $w = $info[0];
        $h = $info[1];
        $max = 800;

        $escala = ($w > $max || $h > $max);
        $nw = $escala ? (int)($w * ($max / max($w, $h))) : $w;
        $nh = $escala ? (int)($h * ($max / max($w, $h))) : $h;

        $imagen = imagecreatetruecolor($nw, $nh);

        $conTransparencia = in_array($extension, ['png', 'gif', 'webp']);
        if ($conTransparencia) {
            imagealphablending($imagen, false);
            imagesavealpha($imagen, true);
        }

        $origen = match ($extension) {
            'png'  => imagecreatefrompng($ruta),
            'gif'  => imagecreatefromgif($ruta),
            'webp' => imagecreatefromwebp($ruta),
            default => imagecreatefromjpeg($ruta),
        };

        if (!$origen) {
            imagedestroy($imagen);
            return;
        }

        imagecopyresampled($imagen, $origen, 0, 0, 0, 0, $nw, $nh, $w, $h);
        imagedestroy($origen);

        if ($nw !== $nh) {
            $lado = max($nw, $nh);
            $cuadrado = imagecreatetruecolor($lado, $lado);

            if ($conTransparencia) {
                imagealphablending($cuadrado, false);
                imagesavealpha($cuadrado, true);
                $relleno = imagecolorallocatealpha($cuadrado, 0, 0, 0, 127);
            } else {
                $relleno = imagecolorallocate($cuadrado, 255, 255, 255);
            }
            imagefill($cuadrado, 0, 0, $relleno);

            $x = (int)(($lado - $nw) / 2);
            $y = (int)(($lado - $nh) / 2);
            imagecopy($cuadrado, $imagen, $x, $y, 0, 0, $nw, $nh);
            imagedestroy($imagen);
            $imagen = $cuadrado;
        }

        match ($extension) {
            'png'  => imagepng($imagen, $ruta, 8),
            'gif'  => imagegif($imagen, $ruta),
            'webp' => imagewebp($imagen, $ruta, 85),
            default => imagejpeg($imagen, $ruta, 85),
        };

        imagedestroy($imagen);
    }
