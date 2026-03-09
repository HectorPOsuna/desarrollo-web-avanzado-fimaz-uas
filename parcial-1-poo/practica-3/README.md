## Actividad 3.- SISTEMA DE USUARIOS CON VALIDACIONES Y EXCEPCIONES

### Descripcion
En este caso se desarrollo un sistema que te permite crear usuarios con nombre y correo en donde basado en el rol se les sea asignado a estos se les asignara una matricula manualmente para comprobar que son estudiantes o en dado caso de ser administradores no recibiran tal matricula.

### Flujo de Clases
En este caso la clase usuario tiene los parametros principales de nombre y correo, en base a eso esta clase hereda sus metodos de escritura y lectura (seters y geters) a la clase de Admin donde aqui se asigna el rol que se vaya a recibir unicamente y para la clase de Alumno que tiene el parametro de la matricula utiliza una herencia de la clase Admin donde se le asigna el rol de alumno que esta siendo heredado de los metodos.

### Manejo de errores
En este caso nosotro digitamos el siguiente correo: "rmustang@uas" por lo tanto es un correo invalido lo que nos lleva a que cuando ejecutamos el index el mensaje tiene que ser el siguiente: "El correo electrónico no tiene un formato válido." y por lo tanto no se digiten los datos que le damos.