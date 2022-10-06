
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include '../includes/scripts.php' ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="../../JavaScript/carritocompras.js"></script>
        <script src="../../JavaScript/comprasfinal.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
    </head>
    
    <body>
            <?php 
            include '../includes/header.php';
            if(empty($_SESSION['active']) || ($_SESSION['user'] !=3))
            {
                header('Location: ../todos/logout.php');
            }  
            require_once '../todos/conexion.php';
            ?>
        <div class="container">
            <form action="buscar_productos.php" method="GET" class="form_search">
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
				<input type="submit" value="Buscar" class="btn_search">
			</form>
            <section class="container products" id="productsSection">
                <?php 
                    $query = mysqli_query($conection, "SELECT codproducto, descripcion,foto,nombre,precio FROM producto WHERE habilitado = 1");
                    mysqli_close($conection);
                    $result = mysqli_num_rows($query);

                    if($result > 0)
                    {
                        while ($data = mysqli_fetch_array($query))
                        {
                ?>
                            <article class="product" data-id="<?php echo $data['codproducto'] ?>">
                                <img class="product__image" alt="<?php echo $data['descripcion'] ?>" src="../../img/uploads/<?php echo $data['foto'] ?> ">
                                <h3 class="product__title"><?php echo $data['nombre'] ?></h3>
                                <p class="product__price"><?php echo $data['precio'] ?></p>
                                <button class="btn btn--orange btn--block product__cart-button" data-product-id="<?php echo $data['codproducto'] ?>" type="button">
                                    <i class="fa-solid fa-basket-shopping" id="carrito" ></i>Añadir a la canasta</button>
                            </article>
                        <?php } ?>
                    <?php } ?>
            </section>
        </div>
        
        <div id="motalcompleto">
            <input type="checkbox" id="btn-modal">
            <div class="boton-modal">
                <label for="btn-modal">
                    Carrito
                </label>
            </div>

            <div class="container-modal">
                <div class="content-modal">
                    <h2>Tú carrito</h2>
                    <p>Agrega productos a la cesta!</p>
                    <div class="btn-cerrar">
                        <label for="btn-modal">Cerrar</label>
                    </div>
                </div>
            </div>
        </div>

    <!-- header 
        <div class="nav container">
            <a href="#" class="logo"></a>
            <svg id="cart-icon"
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                fill="currentColor"
                class="arriba"
                viewBox="0 0 16 16"
                >
                <path
                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"
                />
                </svg>
            <div class="cart">
                <h2 class="cart-title">Your Cart</h2>
                Content
                <div class="cart-content">
                        <div class="cart-box">
                            <img src="1.jpg" width="100px" height="100px" alt="" class="cart-img">
                            <div class="detail-box">
                                <div class="cart-product-title">Ear</div>
                                <div class="cart-price">$25</div>
                                <input type="number" value="1" class="cart-quantity">
                            </div>
                            Remove
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill cart-remove"  viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </div>
                </div>
                Total
                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price">$0</div>
                </div>
                Buy Button 
                <button type="button" class="btn-buy">Buy</button>
                Cart Close             
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-file-excel-fill" id="close-cart" viewBox="0 0 16 16">
                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5.884 4.68 8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 1 1 .768-.64z"/>
                </svg>

            </div>
        </div>

    Shop
    <section id="section1" class="shop container">
        <h2 class="section-title">Shop Products</h2>
        content
        <div class="shop-content">
                    Box 1
                    <div class="product-box">
                        <img src="1.jpg" alt="" class="product-img">
                        <h2 class="product-title">Ejemplo1</h2>
                        <span class="price">$251</span>
                        <i class="fa-solid fa-basket-shopping add-cart"  ></i></button>
                    </div>
                                        Box 2
                                        <div class="product-box">
                        <img src="1.jpg" alt="" class="product-img">
                        <h2 class="product-title">Ejemplo2</h2>
                        <span class="price">$252</span>
                        <i class="fa-solid fa-basket-shopping add-cart"  ></i></button>
                    </div>
                                        Box 3
                                        <div class="product-box">
                        <img src="1.jpg" alt="" class="product-img">
                        <h2 class="product-title">Ejemplo3</h2>
                        <span class="price">$253</span>
                        <i class="fa-solid fa-basket-shopping add-cart"  ></i></button>
                    </div>
                                        Box 4
                                        <div class="product-box">
                        <img src="1.jpg" alt="" class="product-img">
                        <h2 class="product-title">Ejemplo4</h2>
                        <span class="price">$254</span>
                        <i class="fa-solid fa-basket-shopping add-cart"  ></i></button>
                    </div>
                    
        </div>
    </section>-->

    <!--
        <div class="pt-5 text-center">
            <h1>Prueba</h1>
        </div>      
        <div class="contenedorpro pt-5">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                    <img src="1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Prueba</h5>
                                <p class="card-text">$500</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                    <img src="1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Prueba</h5>
                                <p class="card-text">$500</p>
                                <a href="#" class="btn btn-primary"><i class="icon ion-md-cart"></i></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        
            <div class="cart-products" id="products-id">
                <p class="close-btn" onclick="closeBtn()">X</p>
                <h3>Mi carrito</h3>
                <div class="card-items">
                    <!-- <div class="item">
                        <img src="./images/products/keyboard-1.jpg" alt="">
                        <div class="item-content">
                            <h5>name of product name of product name of product</h5>
                            <h5 class="cart-price">45.50$</h5>
                            <h6>Amount: 3</h6>
                        </div>
                        <span>X</span>
                    </div>
    
                    <div class="item">
                        <img src="./images/products/keyboard-1.jpg" alt="">
                        <div class="item-content">
                            <h5>name of product name of product name of product</h5>
                            <h5 class="cart-price">45.50$</h5>
                            <h6>Amount: 3</h6>
                        </div>
                        <span class="delete-product" data-id="">X</span>
                    </div> -->
                </div>
                <h2>Total: <strong class="price-total">0</strong> $</h2>
            </div>
        </div>
    </header>
    <section class="container">
        <div class="products">
            <div class="carts">
                <div>
                    <img src="1.jpg" alt="" >
                    <p><span>20</span>$</p>
                </div>
                <p class="title">Tempest Cataclysm Combo 3 En 1 Gaming Teclado</p>
                <a href="" data-id="1" class="btn-add-cart">add to cart</a>
            </div>
            <div class="carts">
                <div>
                    <img src="1.jpg" alt="">
                    <p><span>35</span>$</p>
                </div>
                <p class="title"> Newskill Suiko Ivory Teclado Mecánico Gaming Full RGB</p>
                <a href="" class="btn-add-cart" data-id="2">add to cart</a>
            </div>
            <div class="carts">
                <div>
                    <img src="1.jpg" alt="">
                    <p><span>15.50</span>$</p>
                </div>
                <p class="title"> Aukey KM-G16 Teclado Mecánico Gaming Retroiluminado</p>
                <a href="" data-id="3" class="btn-add-cart">add to cart</a>
            </div>
            <div class="carts">
                <div>
                    <img src="1.jpg" alt="">
                    <p><span>20.20</span>$</p>
                </div>
                <p class="title"> Razer Huntsman Elite Teclado Mecánico Gaming RGB</p>
                <a href="" data-id="4" class="btn-add-cart">add to cart</a>
            </div>
        </div>
    </section>

    <script>
        function showCart(x){
            document.getElementById("products-id").style.display = "block";
        }
        function closeBtn(){
            document.getElementById("products-id").style.display = "none";
        }

    </script>
    <script src="./custom.js" ></script>




    </body>
</html>