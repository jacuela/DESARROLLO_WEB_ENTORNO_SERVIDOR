# 🧠 Explicación de `img.dataset.butaca` en JavaScript

## 1️⃣ ¿Qué es `dataset`?

En HTML, puedes añadir **atributos personalizados** a los elementos usando el prefijo `data-`.  
Por ejemplo:

```html
<img src="butaca.png" data-butaca="A1">
```

El atributo `data-butaca="A1"` no cambia la apariencia del elemento, pero **sirve para guardar información** asociada a él.

En JavaScript, puedes acceder a estos atributos con la propiedad `dataset` del elemento:

```js
const img = document.querySelector("img");
console.log(img.dataset); // { butaca: "A1" }
```

---

## 2️⃣ Cómo acceder a un valor

Cada atributo `data-*` se convierte en una propiedad dentro de `dataset`.

| En HTML | En JavaScript |
|----------|---------------|
| `data-butaca="A1"` | `element.dataset.butaca` |
| `data-num-fila="B"` | `element.dataset.numFila` |
| `data-precio="10"` | `element.dataset.precio` |

Ejemplo:

```js
img.dataset.butaca  // devuelve "A1"
```

---

## 3️⃣ Ejemplo completo

```html
<img src="butaca.png" data-butaca="A1" data-fila="1" data-precio="10">

<script>
  const img = document.querySelector("img");

  console.log(img.dataset.butaca); // "A1"
  console.log(img.dataset.fila);   // "1"
  console.log(img.dataset.precio); // "10"
</script>
```

---

## 4️⃣ Uso en tu caso (enviar una butaca)

Si tienes varias imágenes de butacas:

```html
<img src="butaca.png" data-butaca="A1">
<img src="butaca.png" data-butaca="A2">
```

Y el siguiente código JavaScript:

```js
img.addEventListener("click", () => {
  console.log(img.dataset.butaca);
});
```

Cuando hagas clic, mostrará `"A1"` o `"A2"` según la imagen.

Esa misma información puede enviarse mediante un formulario oculto:

```js
document.getElementById("num_butaca").value = img.dataset.butaca;
document.getElementById("formButaca").submit();
```
