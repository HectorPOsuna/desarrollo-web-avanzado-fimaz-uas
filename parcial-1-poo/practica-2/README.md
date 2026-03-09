## PRÁCTICA DE LABORATORIO 2: HERENCIA Y REUTILIZACIÓN DE CÓDIGO EN PHP

### Herencia
En este caso al tener la clase usuario con sus atributos o propiedades en privado este no permite que nadie ademas de la misma clase pueda hacer uso de esas propiedades pero ya que sus metodos de get o set son publicos permiten utilizarlo desde la clase heredadad que es en este caso Admin.

### Diferencias
En este caso primordialmente el Usuario tiene las propiedades principales como correo o nombre mientras que Admin solamente contiene la propiedad de rol (por defecto administrador) y al heredar de Usuarios este puede contener las propiedades similares a un Usuario comun pero con un rol administrativo sin redundancia de codigo que ya se tiene en clase Usuario.
