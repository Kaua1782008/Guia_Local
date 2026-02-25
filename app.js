window.addEventListener("DOMContentLoaded", () => {
  const btnMais = document.getElementById("btn-mais");
  const maisCategorias = document.getElementById("mais-categorias");

  if (btnMais && maisCategorias) {
    btnMais.addEventListener("click", (e) => {
      e.preventDefault();
      maisCategorias.classList.toggle("hidden");
      btnMais.textContent = maisCategorias.classList.contains("hidden") ? "..." : "−";
    });
  }

  const comercios = document.querySelectorAll(".comercio");
  const filtros = document.querySelectorAll("a[data-filtro]");
  const input = document.querySelector(".pesquisa input");

  let filtroAtual = "todos";
  function aplicarFiltros() {
    const termo = (input?.value || "").trim().toLowerCase();
    comercios.forEach((comercio) => {
      comercio.classList.remove("hidden");
      if (termo) {
        const nome = comercio.querySelector(".comercio-nome").textContent.toLowerCase();
        comercio.classList.toggle("hidden", !nome.includes(termo));
      }
    });
  }

  function mostrarTodos() {
    comercios.forEach((comercio) => comercio.classList.remove("hidden"));
  }

  function filtrarPor(classe) {
    comercios.forEach((comercio) => {
      comercio.classList.toggle("hidden", !comercio.classList.contains(classe));
    });
  }

  filtros.forEach((filtro) => {
    filtro.addEventListener("click", (e) => {
      e.preventDefault();
      const alvo = filtro.dataset.filtro;

      if (alvo === "todos") mostrarTodos();
      else filtrarPor(alvo);
    });
  });
});