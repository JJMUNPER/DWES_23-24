<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php");  ?>
    <title>Nueva Cuenta - GESBANK</title>
</head>

<body>
    <!-- bootstrap -->
    <?php include "views/clientes/partials/header.php" ?>
    
    <!-- capa principal -->
    <div class="container">
        <!-- Menú fijo principal -->
        <?php require_once "template/partials/menuAut.php"; ?>
        <!-- Mostramos aquí un mensaje en caso de que exista un error -->
        <?php include "template/partials/error.php"; ?>
        <!-- formulario -->
        <form action="<?= URL ?>cuentas/create" method="POST">
            <!-- Cuenta -->
            <div class="mb-3">
                <label for="" class="form-label">Numero de cuenta</label>
                <input type="text" class="form-control <?= (isset($this->errores['num_cuenta']))? 'is-invalid': null ?>" name="num_cuenta" minlength="20" maxlength="20" value="<?=$this->cuenta->num_cuenta?>">
                <?php if (isset($this->errores['num_cuenta'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['num_cuenta'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- Cliente -->
            <div class="mb-3">
                <label for="" class="form-label">Cliente</label>
                <select class="form-select <?= (isset($this->errores['id_cliente']))? 'is-invalid': null ?>" name="id_cliente" id="">
                    <option selected disabled>Seleccione un cliente </option>
                    <?php foreach ($this->clientes as  $cliente) : ?>
                        <div class="form-check">
                            <option value="<?= $cliente->id ?>"
                            <?=($cliente->id == $this->cuenta->id_cliente)? 'selected':null?>>
                                <?= $cliente->cliente ?>
                            </option>
                        </div>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($this->errores['id_cliente'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['id_cliente'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- Fecha -->
            <div class="mb-3">
                <label for="" class="form-label">Fecha alta</label>
                <input type="datetime-local" class="form-control <?= (isset($this->errores['fecha_alta']))? 'is-invalid': null ?>" name="fecha_alta" value="<?=$this->cuenta->fecha_alta?>">
                <?php if (isset($this->errores['fecha_alta'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['fecha_alta'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- Saldo. Si existe algun error, se mantiene el valor introducido, si no el valor por defecto -->
            <div class="mb-3">
                <label for="" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" id="" value="<?=(isset($this->errores['saldo']) || isset($this->errores['num_cuenta']) || isset($this->errores['fecha_alta'])) ? $this->cuenta->saldo : '0.00'?>" step="0.01">
            </div>
            <!-- botones de acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>cuentas" role="button">Cancelar</a>
                <button type="button" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
    </div>

    <br><br><br>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>


    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>