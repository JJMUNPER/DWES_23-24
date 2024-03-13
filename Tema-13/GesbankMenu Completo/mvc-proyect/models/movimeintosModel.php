<?php

class movimientosModel extends Model{

    public function filter($expresion)
    {
        try {
            $sql = "                
            SELECT 
            movimientos.id,
            cuentas.num_cuenta as cuenta,
            movimientos.fecha_hora,
            movimientos.concepto,
            movimientos.tipo,
            movimientos.cantidad,
            movimientos.saldo
            FROM movimientos INNER JOIN cuentas ON movimientos.id_cuenta = cuentas.id 
            WHERE concat_ws(' ',             
                movimientos.id,
                cuentas.num_cuenta,
                movimientos.fecha_hora,
                movimientos.concepto,
                movimientos.tipo,
                movimientos.cantidad,
                movimientos.saldo) LIKE :expresion";

            $conexion = $this->db->connect();

            $expresion = "%" . $expresion . "%";
            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindValue(':expresion', $expresion, PDO::PARAM_STR);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function order(int $criterio)
    {
        try {
            $sql = "
                SELECT 
                movimientos.id,
                cuentas.num_cuenta as cuenta,
                movimientos.fecha_hora,
                movimientos.concepto,
                movimientos.tipo,
                movimientos.cantidad,
                movimientos.saldo
                FROM movimientos INNER JOIN cuentas ON movimientos.id_cuenta = cuentas.id ORDER BY :criterio
            ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':criterio', $criterio, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
}


?>