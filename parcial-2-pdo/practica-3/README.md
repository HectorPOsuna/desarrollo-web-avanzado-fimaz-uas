# Practica 3 Parcial 2

## Objetivo
En este caso implementamos el manejo de excepciones con try y catch para evitar que al ocurrir un error el sistema colapse totalmente, asi mandando mensajes de errores controlados, ademas se implemento las transacciones para operaciones con multiples tablas.

## Tecnologias utilizadas
- PHP 8+
- MySQL
- PDO

## Ejecucion
Creamos la carpeta de practicas-transaccciones en la carpeta htdocs y prendemos apache y mysql en el panel de administrador de XAMPP

## Funcionamiento
En este caso al registrar para dar de alta a un alumno en la tabla de alumnos este tiene que agregar la transaccion que se hizo en la tabla de logs pero en caso de que ocurra algun error este tiene que manejar la transaccion evitando que la primera insercion quede en una de las tablas y borre esos datos o de marcha atras en la transaccion