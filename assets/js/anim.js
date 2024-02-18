document.addEventListener("DOMContentLoaded", function () {
  let categorias = []; 

  function buscarCategorias() {
    fetch('/assets/js/buscarCategorias.php')
      .then(response => response.json())
      .then(data => {
        categorias = data;
        atualizarCategoria();
        setInterval(proximaCategoria, 2000); 
      })
      .catch(error => console.error('Erro ao buscar categorias:', error));
  }

  let indiceAtual = 0;

  function atualizarCategoria() {
    if (categorias.length === 0) return;

    const container = document.getElementById("box-container");
    container.innerHTML = "";

    const categoria = categorias[indiceAtual];
    const elemento = `
      <a href="/produtos/categoria/?categoria=${encodeURIComponent(categoria.title)}" class="box">
        <img src="${categoria.img}" alt="${categoria.title}" />
        <h3>${categoria.title}</h3>
      </a>
    `;
    container.innerHTML = elemento;
}

  function proximaCategoria() {
    indiceAtual = (indiceAtual + 1) % categorias.length; 
    atualizarCategoria();
  }

  buscarCategorias(); 
});
