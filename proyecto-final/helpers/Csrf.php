<?php
namespace Helpers;
class Csrf
{
    public static function generar(): string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function campo(): string
    {
        return '<input type="hidden" name="csrf_token" value="' . self::generar() . '">';
    }
}
?>