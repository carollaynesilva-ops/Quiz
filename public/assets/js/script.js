let tempo = 15;

const timerEl = document.getElementById("timer");
const buttons = document.querySelectorAll(".btn-opcao");
const respostaInput = document.getElementById("resposta");
const form = document.getElementById("formQuiz");

// garante que começa do zero sempre
if (timerEl) {
    timerEl.textContent = tempo;

    const intervalo = setInterval(() => {
        tempo--;
        timerEl.textContent = tempo;

        if (tempo <= 0) {
            clearInterval(intervalo);

            respostaInput.value = -1;
            form.submit();
        }
    }, 1000);
}

// clique nas opções
buttons.forEach(btn => {
    btn.addEventListener("click", () => {

        btn.classList.add("clicado");

        respostaInput.value = btn.dataset.value;

        setTimeout(() => {
            form.submit();
        }, 300);
    });
});

//TEMA CLARO OU ESCURO

document.addEventListener('DOMContentLoaded', () => {

    const themeBtn = document.getElementById('themeToggle');

    themeBtn.addEventListener('click', () => {

        document.body.classList.toggle('light-mode');

        // troca ícone
        if(document.body.classList.contains('light-mode')){

            themeBtn.innerHTML = '🌙';

        }else{

            themeBtn.innerHTML = '☀';

        }

    });

});