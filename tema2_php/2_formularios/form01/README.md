# FORMULARIO 1

## Primer formulario

Hacer un formulario que recoja:
- nombre
- edad

Probar con GET y POST

Los datos serán enviados primero a un archivo `recoge_datos.php` que no hará ningún control.

Hacer el mismo formulario (debajo) pero esta vez los daros se enviarán a un archivo `recoge_datos_controlado.php` que hará un control de errores: si has rellenado el campo y no es vacio, se *sanitizará* la entrada de datos, para no permitir la inyección de código.

Además, controlarás que se llega al backend después de haber pasado por el formulario.
