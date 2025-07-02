    // Aguarda 10 segundos e esconde o alerta
    setTimeout(function () {
        const alerta = document.querySelector('.alert-email');
        if (alerta) {
            alerta.style.transition = "opacity 0.5s ease";
            alerta.style.opacity = 0;
            setTimeout(() => alerta.style.display = "none", 500); // Esconde de vez depois do fade
        }
    }, 5000); // 10 segundos = 10000 ms