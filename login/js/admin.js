const form =
    document.getElementById("adminForm");

const senha =
    document.getElementById("adminSenha");

const mensagem =
    document.getElementById("mensagemErro");

form.addEventListener("submit", (e) => {

    e.preventDefault();

    const senhaCorreta = "123456";

    if (senha.value === senhaCorreta) {

        window.location.href =
            "dashboard.php";

    } else {

        mensagem.innerHTML =
            "Senha incorreta";

        mensagem.style.color =
            "#ef4444";

    }

});