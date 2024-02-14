$(document).ready(function () {
  $("#deleteCategoryBtn").click(function (e) {
    e.preventDefault();
    var categoriaId = $("#categoriaParaDeletar").val();

    if (confirm("Tem certeza que deseja deletar esta categoria?")) {
      $.post(
        "back-scripts/deletarCategoria.php",
        { categoriaId: categoriaId },
        function (response) {
          alert(response);
        }
      );
    }
  });
});
