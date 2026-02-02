const checkbox = document.getElementById("acepto");
const boton = document.getElementById("pagar");

checkbox.addEventListener("change", () => {
  boton.disabled = !checkbox.checked;
});

boton.addEventListener("click", () => {
  window.location.href = "https://mpago.la/2912vBo";
});