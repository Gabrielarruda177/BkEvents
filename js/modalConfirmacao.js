let formParaExcluir = null;

document.querySelectorAll(".form-excluir").forEach(form => {
  form.addEventListener("submit", function (e) {
    e.preventDefault();
    formParaExcluir = this;
    document.getElementById("modalConfirmacao").style.display = "flex";
  });
});

document.getElementById("btnConfirmar").addEventListener("click", function () {
  if (formParaExcluir) {
    formParaExcluir.submit();
  }
});

document.getElementById("btnCancelar").addEventListener("click", function () {
  document.getElementById("modalConfirmacao").style.display = "none";
  formParaExcluir = null;
});
