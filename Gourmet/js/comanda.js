console.log("✅ JS cargado correctamente");

const carrito = [];
const carritoDiv = document.getElementById("carrito");

document.querySelectorAll(".producto").forEach((prod) => {
  prod.addEventListener("click", () => {
    const id = prod.dataset.id;
    const nombre = prod.dataset.nombre;
    const precio = parseFloat(prod.dataset.precio);
    const cantidad = parseInt(prompt(`¿Cuántos ${nombre} deseas agregar?`));

    if (isNaN(cantidad) || cantidad <= 0) return;

    const existente = carrito.find((item) => item.id === id);
    if (existente) {
      existente.cantidad += cantidad;
    } else {
      carrito.push({ id, nombre, precio, cantidad });
    }

    mostrarCarrito();
  });
});

function mostrarCarrito() {
  carritoDiv.innerHTML = "";
  carrito.forEach((item) => {
    carritoDiv.innerHTML += `<p>${item.nombre} x${item.cantidad} - $${
      item.precio * item.cantidad
    }</p>`;
  });

  const total = carrito.reduce(
    (sum, item) => sum + item.precio * item.cantidad,
    0
  );
  carritoDiv.innerHTML += `<hr><strong>Total: $${total}</strong>`;
}
document.getElementById("enviarComanda").addEventListener("click", () => {
  if (carrito.length === 0) {
    alert("El carrito está vacío. Por favor, agrega productos antes de enviar la comanda.");
    return;
  }

  const carritoJSON = JSON.stringify(carrito);
  document.getElementById("carritoInput").value = carritoJSON; // ✅ aquí el ID corregido

  document.getElementById("formComanda").submit();
});