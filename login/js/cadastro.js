const form = document.getElementById("formCadastro");

const senha = document.getElementById("senha");

const confirmarSenha =
    document.getElementById("confirmarSenha");

const mensagem =
    document.getElementById("mensagemErro");


form.addEventListener("submit", (e) => {

    if (senha.value !== confirmarSenha.value) {

        e.preventDefault();

        mensagem.innerHTML =
            "As senhas não coincidem.";

        mensagem.style.color = "#ef4444";

    }

});