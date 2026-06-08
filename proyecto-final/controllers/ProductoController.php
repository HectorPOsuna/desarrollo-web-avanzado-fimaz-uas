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

