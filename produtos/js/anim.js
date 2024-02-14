document.addEventListener("DOMContentLoaded", function () {
  const categorias = [
    {
      href: "Celulares",
      img: "https://www.casasbahia-imagens.com.br/criacao/01-home/icones-depto/2024/02-fev/01/1.png",
      title: "Celulares",
    },
    {
      href: "Televisões",
      img: "https://www.casasbahia-imagens.com.br/criacao/01-home/icones-depto/2024/02-fev/01/2.png",
      title: "Televisões",
    },
    {
      href: "Eletronicos",
      img: "https://www.casasbahia-imagens.com.br/criacao/01-home/icones-depto/2024/02-fev/01/10.png",
      title: "Eletronicos",
    },
    {
      href: "Eletrodomesticos",
      img: "https://www.casasbahia-imagens.com.br/criacao/01-home/icones-depto/2024/02-fev/01/4.png",
      title: "Eletrodomesticos",
    },
    {
      href: "Móveis",
      img: "https://www.casasbahia-imagens.com.br/criacao/01-home/icones-depto/2024/02-fev/01/5.png",
      title: "Móveis",
    },
    {
      href: "Ferramentas",
      img: "https://www.casasbahia-imagens.com.br/criacao/01-home/icones-depto/2024/02-fev/01/17.png",
      title: "Ferramentas",
    },
  ];

  let indiceAtual = 0;

  function atualizarCategoria() {
    const container = document.getElementById("box-container");
    container.innerHTML = "";

    const categoria = categorias[indiceAtual];
    const elemento = `
      <a href="${categoria.href}" class="box">
        <img src="${categoria.img}" alt="${categoria.title}" />
        <h3>${categoria.title}</h3>
      </a>
    `;
    container.innerHTML = elemento;
  }

  atualizarCategoria();

  function proximaCategoria() {
    indiceAtual = (indiceAtual + 1) % categorias.length;
    atualizarCategoria();
  }

  setInterval(proximaCategoria, 2000);
});
