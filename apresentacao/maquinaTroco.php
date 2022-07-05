<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "./partesFixas/header.php";
require_once "../negocio/maquinaTrocoDAO.php";
require_once "../negocio/maquinaTroco.php";

$maquinaDao = new maquinaTrocoDAO();
$maquinas = $maquinaDao->listaMaquinasTroco();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
    <title>Máquina de Troco</title>
</head>

<body class=" bg-light">

    <?php
    if ($maquinas)
        echo ("<p class=\"display-4 m-4\">Máquina de Troco</p>");
    ?>


    <section id="container-moedas">

        <?php

        if ($maquinas) {
            foreach ($maquinas as $maquina) {
                echo ("
                    <div class=\"card border-success mb-3\" style=\"max-width: 18rem;\">
                        <div class=\"card-header\">
                            <span class=\"card-valor-moeda\">R$ 1,00</span>
                            <div class=\"card-icone-moeda\">1</div>
                        </div>
                        <div class=\"card-body text-success\">
                        <p class=\"card-text\">Quantidade: " . $maquina->getUmReal() . "</p>
                        </div>
                    </div>
                ");

                echo ("
                    <div class=\"card border-success mb-3\" style=\"max-width: 18rem;\">
                        <div class=\"card-header\">
                            <span class=\"card-valor-moeda\">R$ 0,50</span>
                            <div class=\"card-icone-moeda\">50</div>
                        </div>
                        <div class=\"card-body text-success\">
                        <p class=\"card-text\">Quantidade: " . $maquina->getCinquenta() . "</p>
                        </div>
                    </div>
                ");

                echo ("
                    <div class=\"card border-success mb-3\" style=\"max-width: 18rem;\">
                        <div class=\"card-header\">
                            <span class=\"card-valor-moeda\">R$ 0,25</span>
                            <div class=\"card-icone-moeda\">25</div>
                        </div>
                        <div class=\"card-body text-success\">
                        <p class=\"card-text\">Quantidade: " . $maquina->getVinteCinco() . "</p>
                        </div>
                    </div>
                ");

                echo ("
                    <div class=\"card border-success mb-3\" style=\"max-width: 18rem;\">
                        <div class=\"card-header\">
                            <span class=\"card-valor-moeda\">R$ 0,10</span>
                            <div class=\"card-icone-moeda\">10</div>
                        </div>
                        <div class=\"card-body text-success\">
                        <p class=\"card-text\">Quantidade: " . $maquina->getDez() . "</p>
                        </div>
                    </div>
                ");

                echo ("
                    <div class=\"card border-success mb-3\" style=\"max-width: 18rem;\">
                        <div class=\"card-header\">
                            <span class=\"card-valor-moeda\">R$ 0,05</span>
                            <div class=\"card-icone-moeda\">5</div>
                        </div>
                        <div class=\"card-body text-success\">
                        <p class=\"card-text\">Quantidade: " . $maquina->getCinco() . "</p>
                        </div>
                    </div>
                ");

                echo ("
                    <div class=\"card border-success mb-3\" style=\"max-width: 18rem;\">
                        <div class=\"card-header card-header-troco\">
                            <span class=\"card-valor-moeda\">R$ 0,01</span>
                            <div class=\"card-icone-moeda\">1</div>
                        </div>
                        <div class=\"card-body text-success\">
                        <p class=\"card-text\">Quantidade: " . $maquina->getUm() . "</p>
                        </div>
                    </div>
                ");

                echo ("<div id=\"div-botoes-princiapis\">
                        <button class=\"btn botao-principal botao-abastecer\"><a id='link-abastecer' class='links' href=\"inserirMaquinaTroco.php?maquinaId=" . $maquina->getId() . "\">Abastecer</a></button>

                        <div class='botao-principal botao-trocar'><a class='links' id='link-trocar' href=\"trocoMaquinaTroco.php?maquinaId=" . $maquina->getId() . "\">Trocar</a></div>
                        

                        <button class=\"btn botao-principal botao-sangrar\"><a id='link-sangrar' class='links' href=\"sangriaMaquinaTroco.php?maquinaId=" . $maquina->getId() . "\">Sangrar</a></button>

                    </div>"
                );
            }
        } else {
            echo ('<a href="inserirMaquinaTroco.php?inserirMaquina=1">Adicionar Nova Máquina de Troco</a>');
        }

        ?>
    </section>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>