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
                <li><a href="añadir_productos.php">Añadir productos</a></li>
            </ul>
        </li>
        <li class="principal">
            <a href="#">Reportes</a>
            <ul>
                <li><a href="lista_compradores.php">Reportar compradores</a></li>
            </ul>
        </li>
        <li class="principal">
            <a href="#">notificaciones</a>
            <ul>
                <li><a href="vista_de_reportes_vendedores.php">Reportes</a></li>
            </ul>
        </li>
    <?php } ?>
    <?php
        if($_SESSION['user'] == 3){
        ?>
        <li class="principal">

            <a href="#">Catálogo</a>
            <ul>
                <li><a href="Esqueleto.php">Todos</a></li>
            </ul>
        </li>
        <li class="principal">

            <a href="#">Recomendaciones</a>
            <ul>
                <li><a href="recomendaciones.php">Comida</a></li>
            </ul>

        </li>
        <li class="principal">
            <a href="#">Reportes</a>
            <ul>
                <li><a href="lista_vendedores.php">Reportar vendedores</a></li>
            </ul>
        </li>

        <li class="principal">
            <a href="#">Comentarios</a>
            <ul>
                <li><a href="comentarioscompradores.php">Comentario Productos</a></li>
            </ul>
        </li>
        <li class="principal">
            <a href="#">notificaciones</a>
            <ul>
                <li><a href="vista_de_reportes_compradores.php">Reportes</a></li>
            </ul>
        </li>

    <?php } ?>
    </ul>
</nav>
