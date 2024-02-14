$(document).ready(function () {
  // Busca de Produtos
  $(document).ready(function () {
    // Função para executar a busca
    function realizarBusca() {
      var searchTerm = $("#searchTerm").val();
      $.ajax({
        url: "back-scripts/buscarProdutos.php",
        type: "POST",
        data: { searchTerm: searchTerm },
        success: function (response) {
          $(".list-group").html(response);
          // Reaplique os manipuladores de eventos para os novos elementos, se necessário
        },
      });
    }

    // Disparar busca ao clicar no botão "Buscar"
    $("#searchBtn").click(function () {
      realizarBusca();
    });

    // Disparar busca ao pressionar "Enter" no campo de busca
    $("#searchTerm").keypress(function (e) {
      if (e.which == 13) {
        // Código ASCII para Enter é 13
        e.preventDefault(); // Impede o comportamento padrão do formulário
        realizarBusca();
      }
    });
  });

  // Atualização da Categoria
  $(".list-group").on("change", ".categoria-dropdown", function () {
    var produtoId = $(this).data("produto-id");
    var categoriaId = $(this).val();
    $.post(
      "back-scripts/atualizarCategoria.php",
      { produtoId: produtoId, categoriaId: categoriaId },
      function (response) {
        alert("Categoria atualizada com sucesso!");
      }
    );
  });

  // Atualização da Oferta
  $(".list-group").on("change", ".oferta-dropdown", function () {
    var produtoId = $(this).data("produto-id");
    var oferta = $(this).val();
    $.post(
      "back-scripts/atualizarOferta.php",
      { produtoId: produtoId, oferta: oferta },
      function (response) {
        alert("Oferta atualizada com sucesso!");
      }
    );
  });

  // Deletar Produto
  $(".list-group").on("click", ".delete-btn", function () {
    var produtoId = $(this).data("produto-id");
    var $itemToDelete = $(this).closest(".list-group-item");

    if (confirm("Tem certeza que deseja deletar este produto?")) {
      $.post(
        "back-scripts/deletarProduto.php",
        { produtoId: produtoId },
        function (response) {
          if (response.includes("sucesso")) {
            alert("Produto deletado com sucesso!");
            $itemToDelete.remove();
          } else {
            alert(response);
          }
        }
      );
    }
  });
});
