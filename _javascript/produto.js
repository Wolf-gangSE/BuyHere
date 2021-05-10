var visibilidade = false;

function ocultarExibir() { // Quando clicar no botão.

    if (visibilidade) {//Se a variável visibilidade for igual a true, então...
        document.getElementById("descricao").style.display = "none";//Ocultamos a div
        visibilidade = false;//alteramos o valor da variável para falso.
    } else {//ou se a variável estiver com o valor false..
        document.getElementById("descricao").style.display = "block";//Exibimos a div..
        visibilidade = true;//Alteramos o valor da variável para true.
    }
}
