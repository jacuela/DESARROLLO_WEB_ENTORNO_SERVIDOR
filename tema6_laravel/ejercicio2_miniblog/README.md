# 📝 Proyecto Laravel: MiniBlog de Artículos

## 🎯 Objetivo
Desarrollar una aplicación web sencilla con **Laravel** que permita gestionar artículos de un blog.

La aplicación deberá permitir:
- Listar artículos
- Dar de alta un nuevo artículo
- Ver el detalle de un artículo concreto

---

## 🧱 Modelo de datos

### 📌 Modelo: `Articulo`

La aplicación contará con un modelo llamado **Articulo**, asociado a la tabla **articulos**.

### 🗄 Tabla `articulos`

| Campo        | Tipo            | Descripción                     |
|-------------|-----------------|---------------------------------|
| id          | BIGINT (PK)     | Identificador del artículo      |
| titulo      | VARCHAR(255)    | Título del artículo             |
| contenido   | TEXT            | Contenido del artículo          |
| created_at  | TIMESTAMP       | Fecha de creación               |
| updated_at  | TIMESTAMP       | Fecha de actualización          |

Laravel gestionará automáticamente los campos `created_at` y `updated_at`.

---

## 📦 Funcionalidades obligatorias

### 1️⃣ Listado de artículos
- Mostrar todos los artículos almacenados en la base de datos.
- De cada artículo se mostrará:
  - Título
  - Fecha de creación
- Cada artículo tendrá un enlace para ver su detalle.

---

### 2️⃣ Alta de un nuevo artículo
- Crear un formulario para insertar un nuevo artículo.
- El formulario tendrá los siguientes campos:
  - Título
  - Contenido
- Al enviar el formulario:
  - El artículo se guardará en la base de datos.
  - Se redirigirá al listado de artículos.

---

### 3️⃣ Detalle de un artículo
- Al pulsar sobre un artículo del listado se mostrará:
  - Título
  - Contenido completo
  - Fecha de creación

---

## 📂 Estructura básica de la aplicación

- Modelo: `App\Models\Articulo`
- Controlador: `ArticuloController`
- Vistas:
  - Listado de artículos
  - Formulario de creación
  - Vista detalle del artículo

---

## 📌 Requisitos
- Usar Laravel.
- Usar rutas web (`web.php`).
- Usar controladores.
- Usar vistas Blade.
- Conexión a base de datos MySQL.

---

## 🚫 No es necesario
- Sistema de usuarios
- Login
- Edición de artículos
- Borrado de artículos
- Diseño avanzado

---

## ✅ Objetivo final
Al finalizar el ejercicio, la aplicación deberá permitir:
- Ver un listado de artículos
- Crear nuevos artículos
- Consultar un artículo concreto