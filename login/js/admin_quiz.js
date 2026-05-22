let contador = 0;

const container =
    document.getElementById(
        'perguntasContainer'
    );

document
    .getElementById(
        'adicionarPergunta'
    )

    .addEventListener(
        'click',
        () => {

            contador++;

            const bloco = `

<div class="pergunta-box">

<h2>
Pergunta ${contador}
</h2>

<input
type="text"
name="pergunta[]"
placeholder="Digite a pergunta"
required>

<div class="opcoes">

${[1, 2, 3, 4].map(num => `

<div class="opcao">

<input
type="radio"
name="correta_${contador}"
value="${num}"
required>

<input
type="text"
name="opcao_${contador}[]"
placeholder="Alternativa ${num}">

<input
type="file"
name="img_${contador}[]">

</div>

`).join('')}

</div>

</div>

`;

            container
                .insertAdjacentHTML(
                    'beforeend',
                    bloco
                );

        });

document
    .getElementById(
        'adicionarPergunta'
    )
    .click();