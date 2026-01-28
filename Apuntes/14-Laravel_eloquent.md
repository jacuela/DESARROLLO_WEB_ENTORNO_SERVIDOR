# Laravel: Métodos importantes de Eloquent

## 1️⃣ Métodos para obtener registros

| Método | Descripción | Ejemplo |
|--------|------------|---------|
| `all()` | Devuelve todos los registros | `Libro::all();` |
| `find($id)` | Busca un registro por ID | `Libro::find(1);` |
| `findOrFail($id)` | Busca por ID y lanza error si no existe | `Libro::findOrFail(1);` |
| `where()` | Filtra registros con condiciones | `Libro::where('autor', 'Gabriel García Márquez')->get();` |
| `first()` | Devuelve el primer registro de una consulta | `Libro::where('anio', 1967)->first();` |
| `firstOrFail()` | Igual que `first()`, pero lanza excepción si no existe | `Libro::where('anio', 1967)->firstOrFail();` |
| `latest()` | Ordena por fecha de creación descendente | `Libro::latest()->get();` |
| `oldest()` | Ordena por fecha ascendente | `Libro::oldest()->get();` |
| `pluck()` | Devuelve un solo campo de todos los registros | `Libro::pluck('titulo');` |

---

## 2️⃣ Métodos para crear/insertar registros

| Método | Descripción | Ejemplo |
|--------|------------|---------|
| `create()` | Crea un registro directamente (requiere `$fillable`) | `Libro::create(['titulo'=>'1984','autor'=>'Orwell','anio'=>1949,'sinopsis'=>'...']);` |
| `save()` | Crea o actualiza un registro desde un objeto | ```$libro = new Libro; $libro->titulo='1984'; $libro->save();``` |
| `insert()` | Inserta uno o varios registros (no rellena timestamps) | ```Libro::insert([['titulo'=>'1984','autor'=>'Orwell','anio'=>1949,'sinopsis'=>'...']]);``` |

---

## 3️⃣ Métodos para actualizar registros

| Método | Descripción | Ejemplo |
|--------|------------|---------|
| `update()` | Actualiza registros existentes | `Libro::where('id', 1)->update(['titulo'=>'Nuevo título']);` |
| `save()` | Si el objeto ya existe, `save()` actualiza | ```$libro = Libro::find(1); $libro->titulo='Nuevo'; $libro->save();``` |

---

## 4️⃣ Métodos para borrar registros

| Método | Descripción | Ejemplo |
|--------|------------|---------|
| `delete()` | Borra un registro o varios | ```$libro = Libro::find(1); $libro->delete();``` |
| `destroy()` | Borra por ID(s) directamente | `Libro::destroy(1);` o `Libro::destroy([1,2,3]);` |

---

## 5️⃣ Métodos de conteo y agregados

| Método | Descripción | Ejemplo |
|--------|------------|---------|
| `count()` | Cuenta registros | `Libro::count();` |
| `max('campo')` | Devuelve el valor máximo de un campo | `Libro::max('anio');` |
| `min('campo')` | Devuelve el valor mínimo | `Libro::min('anio');` |
| `avg('campo')` | Promedio | `Libro::avg('anio');` |
| `sum('campo')` | Suma de valores | `Libro::sum('anio');` |

---

💡 **Tips prácticos**:

- `get()` devuelve **una colección** de registros.  
- `first()` devuelve un **objeto individual** o `null`.  
- `findOrFail()` lanza un **error 404** automáticamente, muy útil para rutas `show` o `edit`.  