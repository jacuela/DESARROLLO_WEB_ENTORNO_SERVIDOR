# 🧰 Guía práctica de Composer en PHP

Composer es el **gestor de dependencias** estándar de PHP.  
Permite **instalar librerías externas**, **autocargar tus clases** automáticamente y **organizar el proyecto** de forma profesional.

---

## 🚀 1. Instalación de Composer

### 🔹 En Windows
1. Descarga el instalador desde [https://getcomposer.org/download/](https://getcomposer.org/download/).  
2. Ejecuta el instalador y deja que configure la variable de entorno (PATH).
3. Abre una terminal y comprueba la instalación:
   ```bash
   composer -V
   ```

### 🔹 En Linux / macOS
```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
sudo mv composer.phar /usr/local/bin/composer
composer -V
```

---

## 🧱 2. Inicializar un proyecto con Composer
```bash
composer init
```
Crea el archivo `composer.json` con la configuración básica del proyecto.

---

## 📦 3. Instalar dependencias

```bash
composer require monolog/monolog
```
Esto descarga la librería en `vendor/` y actualiza `composer.json` y `composer.lock`.

### Otros comandos útiles
```bash
composer update        # Actualiza dependencias
composer remove paquete/nombre  # Elimina una dependencia
```

---

## ⚙️ 4. Autoload (carga automática de clases)

Composer genera el archivo `/vendor/autoload.php`.  
Inclúyelo en tu aplicación (por ejemplo, en `public/index.php`):

```php
require __DIR__ . '/../vendor/autoload.php';
```

### 🧩 Autoload PSR-4 (para clases)

En `composer.json`:
```json
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}
```

Después de modificar el autoload:
```bash
composer dump-autoload
```

### 🪄 Autoload de funciones (helpers)

En `composer.json`:
```json
"autoload": {
    "psr-4": {
        "App\\": "src/"
    },
    "files": [
        "src/helpers.php"
    ]
}
```

Y luego:
```bash
composer dump-autoload
```

---

## 🧹 5. Comandos esenciales de Composer

| Comando | Descripción |
|----------|--------------|
| `composer install` | Instala dependencias desde `composer.lock`. |
| `composer update` | Actualiza dependencias a sus últimas versiones. |
| `composer dump-autoload` | Regenera las rutas del autoload. |
| `composer show` | Lista las dependencias instaladas. |
| `composer outdated` | Muestra dependencias que tienen actualizaciones. |
| `composer remove paquete/nombre` | Elimina una dependencia. |

---

## 🧠 6. Estructura recomendada del proyecto

```
mi_proyecto/
│
├── src/                # Código fuente (clases, helpers)
├── vendor/             # Librerías instaladas por Composer
├── config/             # Configuración JSON o .env
├── public/             # index.php, CSS, JS, imágenes
│
├── composer.json
└── composer.lock
```

---

## 💡 Resumen

- Composer organiza dependencias y autocarga tu código.
- Usa PSR-4 para clases y `"files"` para helpers.
- Incluye `vendor/autoload.php` en el punto de entrada.
- Ejecuta `composer dump-autoload` cuando cambies rutas o helpers.
