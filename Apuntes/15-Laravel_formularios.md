
# Laravel: Manejo de formularios con $request

Cuando enviamos un formulario a Laravel, el objeto $request nos permite acceder a todos los datos enviados.

⸻

## 1️⃣ $request->all()
- Devuelve todos los datos enviados como array asociativo.
- Incluye _token de CSRF.
```php
$datos = $request->all();
dd($datos);

Ejemplo de salida:

[
    "_token" => "HkK3fG8jsl2...",
    "titulo" => "1984",
    "autor" => "George Orwell",
    "anio" => 1949,
    "sinopsis" => "Novela distópica"
]
```


## 2️⃣ $request->input('campo') o $request->campo
- Devuelve un solo campo.

```php
$titulo = $request->input('titulo');
// o
$titulo = $request->titulo;

Salida:

"1984"
``` 

## 3️⃣ $request->only([...])
- Devuelve solo los campos que especifiques.
- Útil para guardar solo lo necesario en la base de datos.

```php
$datos = $request->only(['titulo','autor','anio','sinopsis']);

Ejemplo de salida:

[
    "titulo" => "1984",
    "autor" => "George Orwell",
    "anio" => 1949,
    "sinopsis" => "Novela distópica"
]
``` 

## 4️⃣ $request->except([...])
Devuelve todos los campos excepto los que especifiques.

```php
$datos = $request->except(['_token']);

Ejemplo de salida:

[
    "titulo" => "1984",
    "autor" => "George Orwell",
    "anio" => 1949,
    "sinopsis" => "Novela distópica"
]
``` 

## 💡 Resumen rápido (chuleta)

Método	Qué devuelve
- $request->all()	Todo lo enviado (incluye _token)
- $request->only([...])	Solo los campos que especifiques
- $request->except([...])	Todo menos los campos que excluyes
- $request->input('campo')	Un solo valor del formulario
- $request->campo	Igual que input('campo')
