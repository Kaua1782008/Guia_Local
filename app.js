window.addEventListener("DOMContentLoaded", () => {

    
    const comercios = document.querySelectorAll(".comercio");
    const filtros = document.querySelectorAll(".categorias a[data-filtro]");

    function mostrarTodos() {
        comercios.forEach((comercio) => 
            comercio.classList.remove("hidden"));
    }
    
    function filtrarPor(classe){
        comercios.forEach((comercio) => {
            if (!comercio.classList.contains(classe)) {
                comercio.classList.add("hidden");
            } else {
                comercio.classList.remove("hidden");
            }
        });
    }

    filtros.forEach((filtro) => {
        filtro.addEventListener("click", (e) => {
            e.preventDefault();
            const alvo = filtro.dataset.filtro;
            
            if(alvo === "todos") {
                mostrarTodos();
            }else{
                    filtrarPor(alvo);
                 }
        });
    });

});