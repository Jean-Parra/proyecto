<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
    <?php 
        if($_SESSION['user'] == 1){
        ?>
        <li class="principal">

            <a href="#">Usuarios</a>
            <ul>
                <li><a href="lista_usuarios.php">Lista de Usuarios</a></li>
            </ul>
        </li>
        <li class="principal">
            <a href="#">Productos</a>
            <ul>
                <li><a href="lista_productos.php">Lista de Productos</a></li>
            </ul>
        </li>
    <?php } ?>
    <?php
        if($_SESSION['user'] == 2){
        ?>
        <li class="principal">

            <a href="#">Productos</a>
            <ul>
                <li><a href="añadir_productos.php">Añador prodictos</a></li>
            </ul>
        </li>
    <?php } ?>
    </ul>
</nav>
