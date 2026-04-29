const buttons = document.querySelectorAll(".btn-opcao");
const respostaInput = document.getElementById("resposta");
const form = document.getElementById("formQuiz");

buttons.forEach(btn => {
    btn.addEventListener("click", () => {
        // animação
        btn.classList.add("clicado");

        // pega valor
        respostaInput.value = btn.dataset.value;

        // envia após pequeno delay
        setTimeout(() => {
            form.submit();
        }, 300);
    });
});


// TIMER
let tempo = 10;
const timerEl = document.getElementById("timer");

const intervalo = setInterval(() => {
    tempo--;
    timerEl.textContent = tempo;

    if (tempo <= 0) {
        clearInterval(intervalo);

        // envia sem resposta (vale 0)
        document.getElementById("resposta").value = -1;
        document.getElementById("formQuiz").submit();
    }
}, 1000);