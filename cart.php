<?php 
session_start();
    require_once "includes/header.php";
    
    if(isset($_GET["remove"])){
        session_unset();
    }else{ ?>
  <div class="container">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php  foreach ($_SESSION['cart'] as &$item) { ?>
     <tr>
        <td><?= $item['id'] ?></td>
        <td><?= $item['name'] ?></td>
        <td><?= $item['price'] ?></td>
        <td><?= $item['qty'] ?></td>
        <td><?= $item['price'] * $item['qty'] ?></td>
        <td>
            <a href="cart.php?action=remove&id=<?= $item['id'] ?>">Remove</a>
        </td>
     </tr>    
    <?php  
    if(isset($_GET['action'])){
      if($_GET['action'] == "remove"){
        foreach($_SESSION['cart'] as $key => $item){
          if($item['id'] == $_GET['id']){
            unset($_SESSION['cart'][$key]);
          }
        }
      }
    }
  
  }?>
    <tr>
        <td colspan="4" class="text-center">Total</td>
        <td><?php



// Function to calculate net amount
function calculateNetAmount() {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        return 0.0; // Cart is empty
    }
    
    $netAmount = 0.0;
    
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['price'] * $item['qty'];
        $netAmount += $subtotal;
    }
    
    return $netAmount;
}

     // Example usage
    $netAmount = calculateNetAmount();
    $formattedNetAmount = number_format($netAmount,1);

    echo $formattedNetAmount;
?>
       </td>
        <td><a href="cart.php?remove=true">clear cart</a></td>
    </tr>
  </tbody>
</table>
  </div>
       
    <?php } ?>
        
    

<?php  
require_once "includes/footer.php";
?>
