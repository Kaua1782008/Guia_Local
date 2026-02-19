window.addEventListener("DOMContentLoaded", () => {

    
    let comercios = document.querySelectorAll(".comercio");

    comercios.forEach((comercio) => {
        comercio.addEventListener("click", () => {
            comercio.classList.add("hidden");
        });
    });

});