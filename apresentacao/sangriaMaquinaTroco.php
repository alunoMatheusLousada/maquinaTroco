<?php
include "./partesFixas/header.php";
include "../conexao/conectar.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
    <title>Sangrar Máquina Troco</title>
</head>

<script>
    window.onload = function() {
        let umReal = document.getElementById("umReal").value = 0
        let cinquenta = document.getElementById("cinquenta").value = 0
        let vinteCinco = document.getElementById("vinteCinco").value = 0
        let dez = document.getElementById("dez").value = 0
        let cinco = document.getElementById("cinco").value = 0
        let um = document.getElementById("um").value = 0
    };
</script>

<body class=" bg-light">

    <div>

        <h1 class="display-4 m-4">Sangrar</h1>


        <form action="../negocio/controladorMaquinaTroco.php" method="POST" id="container-moedas">

            <?php
            if ($_GET['maquinaId']) {
                echo ("<input type=\"hidden\" id=\"campoHiddenMaquinaSangria\" name=\"campoHiddenMaquinaSangria\" value=\"" . $_GET['maquinaId'] . "\">");
            }
            ?>

            <div class="card border-success mb-3">
                <div class="card-header">
                    <span class="card-valor-moeda">R$ 1,00</span>
                    <div class="card-icone-moeda">1</div>
                </div>
                <div class="card-body text-success">
                    <label for="umReal">Quantidade: </label>
                    <input type="number" class="quantidade-sangrar" min="0" id="umReal" name="umReal">
                </div>
            </div>

            <div class="card border-success mb-3">
                <div class="card-header">
                    <span class="card-valor-moeda">R$ 0,50</span>
                    <div class="card-icone-moeda">50</div>
                </div>
                <div class="card-body text-success">
                    <label for="cinquenta">Quantidade: </label>
                    <input type="number" class="quantidade-sangrar" min="0" id="cinquenta" name="cinquenta">
                </div>
            </div>

            <div class="card border-success mb-3">
                <div class="card-header">
                    <span class="card-valor-moeda">R$ 0,25</span>
                    <div class="card-icone-moeda">25</div>
                </div>
                <div class="card-body text-success">
                    <label for="vinteCinco">Quantidade: </label>
                    <input type="number" class="quantidade-sangrar" min="0" id="vinteCinco" name="vinteCinco">
                </div>
            </div>

            <div class="card border-success mb-3">
                <div class="card-header">
                    <span class="card-valor-moeda">R$ 0,10</span>
                    <div class="card-icone-moeda">10</div>
                </div>
                <div class="card-body text-success">
                    <label for="dez">Quantidade: </label>
                    <input type="number" class="quantidade-sangrar" min="0" id="dez" name="dez">
                </div>
            </div>

            <div class="card border-success mb-3">
                <div class="card-header">
                    <span class="card-valor-moeda">R$ 0,05</span>
                    <div class="card-icone-moeda">5</div>
                </div>
                <div class="card-body text-success">
                    <label for="cinco">Quantidade: </label>
                    <input type="number" class="quantidade-sangrar" min="0" id="cinco" name="cinco">
                </div>
            </div>

            <div class="card border-success mb-3">
                <div class="card-header">
                    <span class="card-valor-moeda">R$ 0,01</span>
                    <div class="card-icone-moeda">1</div>
                </div>
                <div class="card-body text-success">
                    <label for="um">Quantidade: </label>
                    <input type="number" class="quantidade-sangrar" min="0" id="um" name="um">
                </div>
            </div>

            <?php
            if ($_GET['maquinaId']) {
                echo ("<input type=\"submit\" value=\"Sangrar\" id=\"botao-sangrar\">");
            }
            ?>
        </form>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>