# PRÁCTICA DE LABORATORIO 4: INTEGRACIÓN POO + HERENCIA + VALIDACIONES + EXCEPCIONES (PHP 8+)

## Objetivo
Desarrollar un mini sistema en PHP utilizando Programación Orientada a Objetos que integre:

- Encapsulamiento
- Herencia
- Polimorfismo básico
- Validación de datos
- Manejo de excepciones con `try/catch`
- Generación de salida en HTML

El sistema simula distintos tipos de usuarios dentro de una aplicación.

## Requisitos
- PHP 8+
- Servidor local (XAMPP)
- Navegador web

## Ruta de ejecución en el navegador
http://localhost/desarrollo-web-avanzado-fimaz-uas/parcial-1-poo/practica-4/index.php

## Evidencia esperada
- Se muestra una tabla HTML con los usuarios creados (Admin, Alumno, Invitado).
- La tabla contiene las columnas:
  - Nombre
  - Correo
  - Rol
  - Matrícula
  - Empresa
- Cuando se intenta crear un usuario con correo inválido se captura la excepción y se muestra un mensaje controlado como:

Error controlado: El correo electrónico no tiene un formato válido.