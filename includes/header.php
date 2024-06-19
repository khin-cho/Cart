<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo.gif" type="image/x-icon">
    <title>Shopping Cart</title>
  </head>
  <body>

  <?php 
        // for the active page  --
        $page = $_SERVER['PHP_SELF'];
        // echo $page;
    ?>

    <!-- navgation -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-2">
  <div class="container-fluid">
    <a class="navbar-brand ms-5" href="index.php">
        <img src="images/logo.gif" id="logo" alt="logo" class="rounded">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if ($page =="/cart/index.php") echo "active";?>" aria-current="page" href="index.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($page =="/cart/cart.php") echo "active";?>" href="cart.php">Cart</a>
        </li>
       </ul>
    </div>
  </div>
</nav>
    

   