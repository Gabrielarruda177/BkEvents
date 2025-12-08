//contagem regressiva

document.addEventListener("DOMContentLoaded", function () {
    const eventoData = new Date("2025-06-10T20:00:00"); 
    const contador = document.getElementById("contador");

    function atualizarContador() {
        const agora = new Date();
        const diferenca = eventoData - agora;

        if (diferenca <= 0) {
            contador.innerHTML = "🎉 O evento começou!";
            return;
        }

        const dias = Math.floor(diferenca / (1000 * 60 * 60 * 24));
        const horas = Math.floor((diferenca / (1000 * 60 * 60)) % 24);
        const minutos = Math.floor((diferenca / (1000 * 60)) % 60);
        const segundos = Math.floor((diferenca / 1000) % 60);

        contador.innerHTML = `⏳ Faltam ${dias}d ${horas}h ${minutos}m ${segundos}s para o evento!`;
    }

    setInterval(atualizarContador, 1000);
    atualizarContador();
});


//cod da música
document.addEventListener("DOMContentLoaded", () => {
    const audio = document.getElementById("bgm");
    const btn = document.getElementById("playPauseBtn");

    if (audio && btn) {
        btn.addEventListener("click", () => {
            if (audio.paused) {
                audio.play();
                btn.textContent = "🔇 Parar";
            } else {
                audio.pause();
                btn.textContent = "🔊 Música";
            }
        });
    }
});
