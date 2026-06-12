<?php
session_start();
include("conexion.php");

$productos = mysqli_query($conn, "SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Productos | MMM Accesorios y Tecnología</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#0f0f0f;
    color:white;
}

/* HEADER */

.header{
    background:#181818;
    border-bottom:2px solid #d4af37;
}

.top-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 50px;
}

.logo{
    color:#d4af37;
    font-size:28px;
    font-weight:bold;
}

.menu{
    display:flex;
    gap:20px;
}

.menu a{
    color:white;
    text-decoration:none;
    transition:.3s;
}

.menu a:hover{
    color:#d4af37;
}

.busqueda{
    text-align:center;
    padding:20px;
}

.busqueda input{
    width:400px;
    max-width:90%;
    padding:12px;
    border:none;
    border-radius:10px;
}

.busqueda button{
    padding:12px 20px;
    border:none;
    border-radius:10px;
    background:#d4af37;
    cursor:pointer;
    font-weight:bold;
}

.categorias{
    display:flex;
    justify-content:center;
    gap:15px;
    flex-wrap:wrap;
    padding:20px;
}

.categorias a{
    text-decoration:none;
    color:#d4af37;
    background:#222;
    border:1px solid #d4af37;
    padding:10px 20px;
    border-radius:10px;
    transition:.3s;
}

.categorias a:hover{
    background:#d4af37;
    color:black;
}

/* HERO */

.hero{
    text-align:center;
    padding:50px 20px;
}

.hero h1{
    color:#d4af37;
    font-size:45px;
    margin-bottom:10px;
}

.hero p{
    color:#ccc;
    font-size:18px;
}

/* PRODUCTOS */

.contenedor{
    width:90%;
    margin:auto;
    padding-bottom:50px;
}

.grid-productos{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:25px;
}

.card{
    background:#181818;
    border:1px solid #d4af37;
    border-radius:15px;
    overflow:hidden;
    transition:.3s;
}

.card:hover{
    transform:translateY(-5px);
    box-shadow:0 0 20px rgba(212,175,55,.4);
}

.card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.card-body{
    padding:20px;
}

.card-body h3{
    color:#d4af37;
    margin-bottom:10px;
}

.card-body p{
    color:#ccc;
    min-height:60px;
}

.precio{
    font-size:24px;
    font-weight:bold;
    margin:15px 0;
}

.stock{
    color:#aaa;
    margin-bottom:15px;
}

.btn-carrito{
    display:block;
    text-align:center;
    text-decoration:none;
    background:#d4af37;
    color:black;
    padding:12px;
    border-radius:10px;
    font-weight:bold;
}

.btn-carrito:hover{
    background:#f1c84a;
}

/* FOOTER */

footer{
    background:#181818;
    text-align:center;
    padding:20px;
    border-top:2px solid #d4af37;
}

</style>

</head>
<body>

<header class="header">

    <div class="top-header">

        <div class="logo">
            MMM Accesorios y Tecnología
        </div>

        <nav class="menu">

            <a href="index.php">Inicio</a>

            <a href="productos.php">Productos</a>

            <a href="carrito.php">Carrito</a>

            <a href="pedidos.php">Mis Pedidos</a>

            <a href="perfil.php">Mi Perfil</a>

        </nav>

    </div>

    <div class="busqueda">

        <form>

            <input
            type="text"
            placeholder="Buscar productos...">

            <button type="submit">
                Buscar
            </button>

        </form>

    </div>

    <div class="categorias">

        <a href="#">Laptops</a>
        <a href="#">Mouse</a>
        <a href="#">Teclados</a>
        <a href="#">Audífonos</a>
        <a href="#">Monitores</a>
        <a href="#">Accesorios</a>

    </div>

</header>

<section class="hero">

    <h1>Catálogo de Productos</h1>

    <p>
        Descubre los mejores accesorios y equipos tecnológicos.
    </p>

</section>

<div class="contenedor">

    <div class="grid-productos">

        <?php while($p = mysqli_fetch_assoc($productos)){ ?>

        <div class="card">

            <img src="<?php echo $p['imagen']; ?>" alt="Producto">

            <div class="card-body">

                <h3>
                    <?php echo $p['nombre']; ?>
                </h3>

                <p>
                    <?php echo $p['descripcion']; ?>
                </p>

                <div class="precio">
                    $<?php echo number_format($p['precio'],2); ?>
                </div>

                <div class="stock">
                    Stock disponible:
                    <?php echo $p['stock']; ?>
                </div>

                <a
                href="agregar_carrito.php?id=<?php echo $p['id']; ?>"
                class="btn-carrito">

                    🛒 Agregar al Carrito

                </a>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

<footer>

    <p>
        © 2026 MMM Accesorios y Tecnología
    </p>

</footer>

</body>
</html>