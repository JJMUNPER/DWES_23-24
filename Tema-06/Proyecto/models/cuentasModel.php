<?php


class cuentasModel extends Model
{

    public function get()
    {
        try {
            // plantilla
            $sql = " 
            SELECT 
                c.id,
                c.num_cuenta,
                c.id_cliente,
                c.fecha_alta,
                c.fecha_ul_mov,
                c.num_movtos,
                c.saldo,
                cl.nombre, 
                cl.apellidos
            FROM 
                cuentas as c INNER JOIN clientes as cl on c.id_cliente=cl.id order by c.id";

            $conexion = $this->db->connect();

            $result = $conexion->prepare($sql);
            //Establez como quiero q devuelva el resultado 

            $result->setFetchMode(PDO::FETCH_OBJ);

            // ejecuto
            $result->execute();

            return $result;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function create($cuenta)
    {
        try {
            // plantilla 
            $sql =
                " INSERT INTO cuentas (num_cuenta,id_cliente,fecha_alta,fecha_ul_mov,num_movtos,saldo) values( 
                    :num_cuenta,
                    :id_cliente,
                    :fecha_alta,
                    :fecha_ul_mov,
                    :num_movtos,
                    :saldo
                )";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);

            //Bindeamos parametros
            $pdoSt->bindParam(":num_cuenta", $cuenta->num_cuenta, PDO::PARAM_INT);
            $pdoSt->bindParam(":id_cliente", $cuenta->id_cliente, PDO::PARAM_INT);
            $pdoSt->bindParam(":fecha_alta", $cuenta->fecha_alta);
            $pdoSt->bindParam(":fecha_ul_mov", $cuenta->fecha_ul_mov);
            $pdoSt->bindParam(":num_movtos", $cuenta->num_movtos, PDO::PARAM_INT);
            $pdoSt->bindParam(":saldo", $cuenta->saldo, PDO::PARAM_INT);

            // ejecuto
            $pdoSt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


    public function getClientes()
    {
        try {
            // plantilla
            $sql = " 
            SELECT 
                id,
                apellidos,
                nombre,
                telefono,
                ciudad,
                dni,
                email
            FROM 
                clientes;";

            $conexion = $this->db->connect();

            $result = $conexion->prepare($sql);
            //Establez como quiero q devuelva el resultado 

            $result->setFetchMode(PDO::FETCH_OBJ);

            // ejecuto
            $result->execute();

            return $result;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


    public function delete($id)
    {
        try {
            // plantilla
            $sql = " 
                   DELETE FROM cuentas WHERE id=:id;";

            $conexion = $this->db->connect();


            $result = $conexion->prepare($sql);

            $result->bindParam(":id", $id, PDO::PARAM_INT);

            // ejecuto
            $result->execute();

            return $result;
        } catch (PDOException $error) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
    public function getCuenta($id)
    {
        try {
            // plantilla
            $sql = " 
            SELECT 
                c.id,
                c.num_cuenta,
                c.id_cliente,
                c.fecha_alta,
                c.fecha_ul_mov,
                c.num_movtos,
                c.saldo
            FROM 
                cuentas as c where id=:id;";

            $conexion = $this->db->connect();

            $result = $conexion->prepare($sql);
            //Establez como quiero q devuelva el resultado 
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_OBJ);

            // ejecuto
            $result->execute();

            return $result->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
    public function update($id, $cuenta)
    {
        try {
            // plantilla
            $sql = " UPDATE cuentas
                    SET
                    num_cuenta=:num_cuenta,
                    id_cliente=:id_cliente,
                    fecha_alta=:fecha_alta,
                    saldo=:saldo,
                    update_at = now()

                    WHERE
                        id=:id";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            //Bindeamos parametros

            $pdoSt->bindParam(":num_cuenta", $cuenta->num_cuenta, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(":id_cliente", $cuenta->id_cliente, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(":fecha_alta", $cuenta->fecha_alta, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(":saldo", $cuenta->saldo, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);

            // ejecuto
            $pdoSt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }




    public function order($criterio)
    {
        try {
            // plantilla
            $sql = " SELECT 
            c.id,
            c.num_cuenta,
            c.id_cliente,
            c.fecha_alta,
            c.fecha_ul_mov,
            c.num_movtos,
            c.saldo,
            cl.nombre, 
            cl.apellidos
        FROM 
            cuentas as c inner join clientes as cl on c.id_cliente=cl.id order by $criterio ";

            $conexion = $this->db->connect();

            $result = $conexion->prepare($sql);

            // $result->bindParam(":criterio", $criterio, PDO::PARAM_STR);

            //Establez como quiero q devuelva el resultado 
            $result->setFetchMode(PDO::FETCH_OBJ);

            // ejecuto
            $result->execute();

            return $result;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


    public function filter($expresion)
    {
        try {
            // plantilla
            $sql = "SELECT 
                        c.id,
                        c.num_cuenta,
                        c.id_cliente,
                        c.fecha_alta,
                        c.fecha_ul_mov,
                        c.num_movtos,
                        c.saldo,
                        cl.nombre, 
                        cl.apellidos
                    FROM 
                        cuentas as c inner join clientes as cl on c.id_cliente=cl.id
                    WHERE 

                        concat_ws(' ',
                        c.num_cuenta,
                        c.id_cliente,
                        c.fecha_alta,
                        c.fecha_ul_mov,
                        c.num_movtos,
                        c.saldo,
                        cl.nombre,
                        cl.apellidos)
                        like ? ";

            $expresion = "%" . $expresion . "%";

            $conexion = $this->db->connect();

            $result = $conexion->prepare($sql);

            $result->bindParam(1, $expresion, PDO::PARAM_STR);


            //Establez como quiero q devuelva el resultado 
            $result->setFetchMode(PDO::FETCH_OBJ);

            // ejecuto
            $result->execute();

            return $result;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
}
