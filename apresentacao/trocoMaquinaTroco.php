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
    <script type="text/javascript" src="./js/script.js"></script>

    <title>Trocar Máquina Troco</title>
</head>

<body class=" bg-light">

    <div>

        <h1 class="display-4 m-4">Trocar</h1>

        <form action="../negocio/controladorMaquinaTroco.php" method="POST" id="container-moedas">

            <?php
            if ($_GET['maquinaId']) {
                echo ("<input type=\"hidden\" id=\"campoHiddenMaquinaTroco\" name=\"campoHiddenMaquinaTroco\" value=\"" . $_GET['maquinaId'] . "\">");
            }
            ?>

            <div class="card mb-3">
                <div class="card-header" id="card-totalPagar" style="height: 65px; background-color: #ffd87eb3;">
                    <label for="totalPagar">Total: </label>
                    <input type="Text" size="12" onKeyUp="mascaraMoeda(this, event)" min="0" value="" class="quantidade-troco" id="totalPagar" name="totalPagar">
                </div>
                <div class="card-body text-success">
                    <label for="pago" id="label-pago" style="color: black;">Pago: </label>
                    <input type="Text" size="12" onKeyUp="mascaraMoeda(this, event)" min="0" value="" class="quantidade-troco" id="pago" name="pago">
                </div>
            </div>

            <?php
            if ($_GET['maquinaId']) {
                echo ("<input type=\"submit\" value=\"Trocar\" id=\"botao-trocar\" style='background-color: #ffd87eb3; left: 567px'>");
            }
            ?>
        </form>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</html>