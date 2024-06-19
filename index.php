<?php 
    session_start();
    require_once "includes/header.php";
    require_once "db/dbconn.php";
    $conn = getConnection();
    $result = getAll($conn);
    
    //if submit [add to cart ] button  is click

    if(isset($_POST['submit'])){
       $id = $_GET['id'];
       $name = $_POST['name'];
       $price = $_POST['price'];
       $qty = $_POST['qty'];

       $product = [
        "id" => $id,
        "name" => $name,
        "price" => $price,
        "qty" => $qty,
    ];

    if (isset($_SESSION['cart'])) {
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $id) {
                // Update the quantity with the new value
                $item['qty'] = $qty;
                $found = true;
                break;
            }
        }
        // If the product was not found in the cart, add it as a new item
        if (!$found) {
            $_SESSION['cart'][] = $product;
        }
    } else {
        $_SESSION['cart'][] = $product;
    }
 }

?>
    <div class="container">
        <div class="row">
    
        <?php while ($row = $result -> fetch_assoc()) {?>
            <div class="col-md-4 mt-2">
                <div class="card text-center">
                    <img src="<?= $row['src'] ?>" class="card-img-top mx-auto mt-2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name'] ?></h5>
                        <p class="card-text">$<?= $row['price'] ?></p>
                        <form action="index.php?id=<?= $row['id'] ?>" method="post" class="w-50 mx-auto">
                            <input type="hidden" name="name" value="<?= $row['name'] ?>">
                            <input type="hidden" name="price" value="<?= $row['price'] ?>">
                            <div class="input-group mb-3">
                                <label  class="input-group-text" id="basic-addon1">quantity</label>
                                <input type="number" name="qty" class="form-control" min="1" value="1">
                            </div>
                            <input type="submit" name="submit" value="Add to Cart" class="btn btn-outline-primary"/>
                        </form>
                    </div>
                </div>
            </div>
        <?php  } ?>
        </div>
    </div>
<?php  

require_once "includes/footer.php";

?>