
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Екзотичні друзі - Головна сторінка</title>

    <link rel="icon" type="image/png" href="./assets/favicon.png">

    <!-- Bootstap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <?php
//    require MYSQL connection
    require ("function.php");
    ?>
</head>

<body>
<!-- start #header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-roboto font-size-14 text-black-50 m-0">Онлайн-Магазин Екзотичних Тварин</p>
        <div class="font-roboto font-size-14">
            <a href="#" class="px-3 border-start border-end text-decoration-none text-dark">Login</a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand px-4" href="index.php">Екзотичні друзі</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="m-auto font-opensans navbar-nav">
                <li class="nav-item mx-4 active">
                    <a class="nav-link pa" href="index.php">Головна сторінка<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link" href="catalog.php">Каталог</a>
                </li>

            </ul>
            <form action="#" class="mx-4 my-2 font-size-14 font-roboto">
                <a href="cart.php" class="text-decoration-none py-2 rounded-pill bg-success">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')) ?></span>
                </a>
            </form>
        </div>
    </nav>
</header>
<!-- !start #header -->

<!-- start #main-site -->
<main id="main-site">