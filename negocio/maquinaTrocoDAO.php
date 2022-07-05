<?php

require_once('../conexao/DAO.php');
require_once('maquinaTroco.php');

class maquinaTrocoDAO extends DAO
{

    public function inserir($maquinaTroco)
    {
        $con = $this->conectaBD();
        $sql = "INSERT INTO maquina_troco (um_real, cinquenta, vinte_cinco, dez, cinco, um) VALUES (?, ?, ?, ?, ?, ?)";
        $stm = $con->prepare($sql);
        $stm->bindValue(1, $maquinaTroco->getUmReal());
        $stm->bindValue(2, $maquinaTroco->getCinquenta());
        $stm->bindValue(3, $maquinaTroco->getVinteCinco());
        $stm->bindValue(4, $maquinaTroco->getDez());
        $stm->bindValue(5, $maquinaTroco->getCinco());
        $stm->bindValue(6, $maquinaTroco->getUm());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm = NULL;
        $con = NULL;
        return $res;
    }

    public function deletar($maquinaTroco)
    {
        $con = $this->conectaBD();
        $sql = "DELETE FROM maquina_troco WHERE id = ?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1, $maquinaTroco->getId());
        $res = $stm->execute();
        $stm->closeCursor();
        $stm = NULL;
        $con = NULL;
        return $res;
    }

    public function alterar($maquinaTroco)
    {
        $con = $this->conectaBD();
        $sql = "UPDATE maquina_troco SET um_real = ?, cinquenta = ?, vinte_cinco = ?, dez = ?, cinco = ?, um = ? WHERE id = ?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1, $maquinaTroco->getUmReal());
        $stm->bindValue(2, $maquinaTroco->getCinquenta());
        $stm->bindValue(3, $maquinaTroco->getVinteCinco());
        $stm->bindValue(4, $maquinaTroco->getDez());
        $stm->bindValue(5, $maquinaTroco->getCinco());
        $stm->bindValue(6, $maquinaTroco->getUm());
        $stm->bindValue(7, $maquinaTroco->getId());
        $stm->execute();

        $stm->closeCursor();
        $stm = NULL;
        $con = NULL;

        return true;
    }

    public function listaMaquinasTroco()
    {
        $con = $this->conectaBD();
        $sql = "SELECT * FROM maquina_troco";
        $stm = $con->prepare($sql);
        $tabela = $stm->execute();
        $maquinaTrocos = array();
        if ($tabela) {
            while ($linha = $stm->fetch(PDO::FETCH_ASSOC)) {
                $mt = new maquinaTroco($linha['um_real'], $linha['cinquenta'], $linha['vinte_cinco'], $linha['dez'], $linha['cinco'], $linha['um']);
                $mt->setId(intval($linha['id']));
                array_push($maquinaTrocos, $mt);
            }
        }
        $stm->closeCursor();
        $stm = NULL;
        $con = NULL;
        return $maquinaTrocos;
    }

    public function buscarMaquinaTroco($id)
    {
        $con = $this->conectaBD();
        $sql = "SELECT * FROM maquina_troco WHERE id = ?";
        $stm = $con->prepare($sql);
        $stm->bindValue(1, $id);
        $tabela = $stm->execute();
        if ($tabela) {
            $linha = $stm->fetch(PDO::FETCH_ASSOC);
            $mt = new maquinaTroco($linha['um_real'], $linha['cinquenta'], $linha['vinte_cinco'], $linha['dez'], $linha['cinco'], $linha['um']);
            $mt->setId(intval($linha['id']));
        }
        $stm->closeCursor();
        $stm = NULL;
        $con = NULL;
        return $mt;
    }
}
