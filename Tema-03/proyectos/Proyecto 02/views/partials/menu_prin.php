<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Logo y Nombre -->
    <a class="navbar-brand" href="index.php">Articulos</a>


    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="viewNuevo.php"> Nuevo <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ordenar</a>
            </li>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="ordenar.php?criterio=id">ID</a></li>
                <li><a class="dropdown-item" href="ordenar.php?criterio=descripcion">DESCRIPCION</a></li>
                <li><a class="dropdown-item" href="ordenar.php?criterio=modelo">MODELO</a></li>
                <li><a class="dropdown-item" href="ordenar.php?criterio=categoria">CATEGORIA</a></li>
                <li><a class="dropdown-item" href="ordenar.php?criterio=unidades">UNIDADES</a></li>
                <li><a class="dropdown-item" href="ordenar.php?criterio=precio">PRECIO</a></li>
            </ul>
            </li>
            
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="buscar.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
