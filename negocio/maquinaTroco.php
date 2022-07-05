<?php

class maquinaTroco
{

    private $id;
    private $moeda1;
    private $moeda50;
    private $moeda25;
    private $moeda10;
    private $moeda5;
    private $moeda01;


    public function __construct($moeda1, $moeda50, $moeda25, $moeda10, $moeda5, $moeda01)
    {
        $this->moeda1 = $moeda1;
        $this->moeda50 = $moeda50;
        $this->moeda25 = $moeda25;
        $this->moeda10 = $moeda10;
        $this->moeda5 = $moeda5;
        $this->moeda01 = $moeda01;
    }

    public function getUmReal()
    {
        return $this->moeda1;
    }

    public function setUmReal($moeda)
    {
        $this->moeda1 = $moeda;
    }

    public function getCinquenta()
    {
        return $this->moeda50;
    }

    public function setCinquenta($moeda)
    {
        $this->moeda50 = $moeda;
    }

    public function getVinteCinco()
    {
        return $this->moeda25;
    }

    public function setVinteCinco($moeda)
    {
        $this->moeda25 = $moeda;
    }

    public function getDez()
    {
        return $this->moeda10;
    }

    public function setDez($moeda)
    {
        $this->moeda10 = $moeda;
    }

    public function getCinco()
    {
        return $this->moeda5;
    }

    public function setCinco($moeda)
    {
        $this->moeda5 = $moeda;
    }

    public function getUm()
    {
        return $this->moeda01;
    }

    public function setUm($moeda)
    {
        $this->moeda01 = $moeda;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function sangrar($umReal, $cinquenta, $vinteCinco, $dez, $cinco, $um)
    {
        $this->moeda1 -= $umReal;
        $this->moeda50 -= $cinquenta;
        $this->moeda25 -= $vinteCinco;
        $this->moeda10 -= $dez;
        $this->moeda5 -= $cinco;
        $this->moeda01 -= $um;

        $maquinaTrocoDao = new maquinaTrocoDAO();
        $maquinaTrocoDao->alterar($this);
    }

    public function abastecer($umReal, $cinquenta, $vinteCinco, $dez, $cinco, $um)
    {
        $this->moeda1 += $umReal;
        $this->moeda50 += $cinquenta;
        $this->moeda25 += $vinteCinco;
        $this->moeda10 += $dez;
        $this->moeda5 += $cinco;
        $this->moeda01 += $um;

        $maquinaTrocoDao = new maquinaTrocoDAO();
        $maquinaTrocoDao->alterar($this);
    }

    public function trocar($totalPagarPOST, $pagoPOST)
    {
        $maquinaTrocoDao = new maquinaTrocoDAO();

        $moedas['umReal'] =  $this->moeda1;
        $moedas['cinquenta'] = $this->moeda50;
        $moedas['vinteCinco'] = $this->moeda25;
        $moedas['dez'] = $this->moeda10;
        $moedas['cinco'] = $this->moeda5;
        $moedas['um'] = $this->moeda1;

        $moedasUsadas['umReal'] =  0;
        $moedasUsadas['cinquenta'] = 0;
        $moedasUsadas['vinteCinco'] = 0;
        $moedasUsadas['dez'] = 0;
        $moedasUsadas['cinco'] = 0;
        $moedasUsadas['um'] = 0;

        $totalPagar = explode(",", $totalPagarPOST);
        $totalPagarReal = intval(str_replace('.', '', $totalPagar[0]));
        $totalPagarCentavos = intval($totalPagar[1]);

        $totalPago = explode(",", $pagoPOST);
        $totalPagoReal = intval(str_replace('.', '', $totalPago[0]));
        $totalPagoCentavos = intval($totalPago[1]);

        if ($totalPagarReal > $totalPagoReal || ($totalPagarReal == $totalPagoReal && $totalPagarCentavos > $totalPagoCentavos)) {
            header('location: ../apresentacao/trocoMaquinaTroco.php?maquinaId=' . $this->id);
            exit;
        }

        $trocoReais = $totalPagoReal - $totalPagarReal;
        $trocoCentavos = ($totalPagoCentavos - $totalPagarCentavos) + ($trocoReais * 100);

        while ($trocoCentavos >= 100) {

            $trocoCentavos -= 100;
            $moedasUsadas['umReal']++;
        }

        while ($trocoCentavos >= 50) {

            $trocoCentavos -= 50;
            $moedasUsadas['cinquenta']++;
        }

        while ($trocoCentavos >= 25) {

            $trocoCentavos -= 25;
            $moedasUsadas['vinteCinco']++;
        }

        while ($trocoCentavos >= 10) {

            $trocoCentavos -= 10;
            $moedasUsadas['dez']++;
        }

        while ($trocoCentavos >= 5) {

            $trocoCentavos -= 5;
            $moedasUsadas['cinco']++;
        }

        while ($trocoCentavos >= 1) {

            $trocoCentavos -= 1;
            $moedasUsadas['um']++;
        }

        $this->moeda1 = $moedas['umReal'] - $moedasUsadas['umReal'];
        $this->moeda50 = $moedas['cinquenta'] - $moedasUsadas['cinquenta'];
        $this->moeda25 = $moedas['vinteCinco'] - $moedasUsadas['vinteCinco'];
        $this->moeda10 = $moedas['dez'] - $moedasUsadas['dez'];
        $this->moeda5 = $moedas['cinco'] - $moedasUsadas['cinco'];
        $this->moeda01 = $moedas['um'] - $moedasUsadas['um'];

        $maquinaTrocoDao->alterar($this);
    }
}
