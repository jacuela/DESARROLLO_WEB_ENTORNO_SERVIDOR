# Comparativa: Cookies, Sesiones y localStorage en PHP

## 🍪 Cookies

Son pequeños datos guardados en el navegador y enviados al servidor con cada petición HTTP.

**Ejemplo PHP:**  
```php
setcookie("usuario", "Juan", time() + 3600, "/");
if (isset($_COOKIE["usuario"])) echo $_COOKIE["usuario"];
```

- Guardadas en el navegador.
- Pueden ser temporales o persistentes.
- Tamaño limitado (~4KB).
- Menor seguridad (visibles en el cliente).

---

## 💼 Sesiones

Las sesiones guardan la información en el servidor y solo envían un identificador al cliente (normalmente una cookie llamada `PHPSESSID`).

**Ejemplo PHP:**  
```php
session_start();
$_SESSION["usuario"] = "Juan";
echo $_SESSION["usuario"];
```

- Los datos se guardan en el servidor.
- Más seguras que las cookies.
- Se borran al cerrar la sesión o expirar.

---

## 💾 localStorage

Es un espacio del navegador accesible solo desde JavaScript. PHP no puede leer ni modificar su contenido directamente.

**Ejemplo JS en un archivo PHP:**  
```js
localStorage.setItem("usuario", "Juan");
document.write(localStorage.getItem("usuario"));
```

- No se envía al servidor.
- Persiste hasta que el usuario lo borre.
- Capacidad de unos 5–10 MB.

---

## 🧩 Resumen comparativo

| Característica        | Cookies | Sesiones | localStorage |
|------------------------|----------|-----------|---------------|
| 📍 Dónde se guardan    | Navegador | Servidor | Navegador |
| 🔄 Se envían al servidor | Sí | Solo ID | No |
| ⏳ Duración            | Configurable | Mientras dure la sesión | Persistente |
| 📏 Tamaño máximo        | ~4 KB | Depende del servidor | 5–10 MB |
| 🔐 Seguridad           | Media | Alta | Media |
| ⚡ Acceso desde PHP     | Sí | Sí | No |
| 🧠 Uso típico           | Recordar usuario | Login, carrito | Preferencias |
