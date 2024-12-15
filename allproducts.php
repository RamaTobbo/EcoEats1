

<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div id='backtohome'>  <a href='Home.php'>Back Home</a>/<span>Products</span></div>
<div><h1>Products</h1></div>
<div id="dropdownSort">
    <label>Sort By:</label>
    <select name="sortproduct" id="sortproduct" onchange="sortProducts()">
        <option value="AllProducts" <?php echo (isset($_GET['sortproduct']) && $_GET['sortproduct'] == 'AllProducts') ? 'selected' : ''; ?>>All Products</option>
        <option value="bestselling" <?php echo (isset($_GET['sortproduct']) && $_GET['sortproduct'] == 'bestselling') ? 'selected' : ''; ?>>Best Selling</option>
        <option value="pricelowtohigh" <?php echo (isset($_GET['sortproduct']) && $_GET['sortproduct'] == 'pricelowtohigh') ? 'selected' : ''; ?>>Price Low to High</option>
        <option value="pricehightolow" <?php echo (isset($_GET['sortproduct']) && $_GET['sortproduct'] == 'pricehightolow') ? 'selected' : ''; ?>>Price High to Low</option>
        <option value="alphabet" <?php echo (isset($_GET['sortproduct']) && $_GET['sortproduct'] == 'alphabet') ? 'selected' : ''; ?>>Alphabetically, A-Z</option>
        <option value="reversealphabet" <?php echo (isset($_GET['sortproduct']) && $_GET['sortproduct'] == 'reversealphabet') ? 'selected' : ''; ?>>Alphabetically, Z-A</option>
    </select>
</div>
<?php
require_once 'connection.php';
$sql='SELECT * FROM  products';
if (isset($_GET['sortproduct'])) {
    $sortOption = $_GET['sortproduct'];

    switch ($sortOption) {
        case 'AllProducts':
            $sql = " SELECT * FROM  products";  
            break;
        case 'bestselling':
            $sql = "SELECT *,SUM(order_items.quantity) AS total_quantity
FROM products
JOIN order_items ON products.Product_id = order_items.product_id
GROUP BY products.Product_id
ORDER BY total_quantity DESC
LIMIT 3";  //i will change this later
            break;
        case 'pricelowtohigh':
            $sql = " SELECT * FROM  products ORDER BY price Asc";
            break;
        case 'pricehightolow':
            $sql = " SELECT * FROM  products ORDER BY price DESC";
            break;
        case 'alphabet':
            $sql = "SELECT * FROM  products ORDER BY Product_Name ASC";
            break;
        case 'reversealphabet':
            $sql = " SELECT * FROM  products ORDER BY Product_Name DESC";
            break;
    }
}

$result = $conn->query($sql);
if($result->num_rows >0){
  
    echo '<div class="flexDisplay">';
   while($row = $result->fetch_assoc()){
   
    echo'<div class="product-card">';
    echo '<img src="' . $row['ProductImage'] . '" >';
    echo '  <span ><center>$'.$row['price'].'</center></span>';
    echo'
         <span ><center>'.$row['Product_Name'].'</center></span>';
         echo '<h4>'.$row['Product_Description'].'</h4>';
         echo "<button class='buyNow' qty='1' id='{$row['Product_id']}' data-product='{$row['Product_Name']}' data-price='{$row['price']}' data-image='{$row['ProductImage']}' data-description='{$row['Product_Description']}'>Buy Now</button>";

         echo'</div>';
    
      
   };
   echo '</div>';

}
?>


         
       
         
        
<div class='BuyCart'>
   <div class='imgFloat'> <img src=''></div>
   <div class='BuyCartPrice'><span>$</span><button id='exitBuyCart'>X</button></div>
   <div class= 'BuyCarttitle'><span></span></div>

   <div class='BuyCartParagrpah'><p ></p></div>
  <div class='flex'> <div class='specifyQt'><button class='pluss'>+</button></div>
   <div ><span class='qt1'>1</span></div>
   <div class='specifyQt'><button class='minuss'>-</button></div>
   <div class='addtocart'><button id='AddtoCart'>Add to cart</button></div></div>
   <?php 


if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == 1) {
    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.BuyItNow').onclick = function() {
                location.href = 'checkout.php';
            };
        });
    </script>
    ";
} else {
    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.BuyItNow').onclick = function() {
                location.href = 'login.php';
            };
        });
    </script>
    ";
  
}
?>
   <div class='BuyItNow'><button >Buy it now</button></div>

</div>
  

 
    

  

<script >
    const quantitySpan = document.querySelector('.BuyCart .qt1');

document.querySelectorAll('.buyNow').forEach(button => {
    button.addEventListener('click', function () {
        const productName = this.getAttribute('data-product');
        const productPrice = this.getAttribute('data-price');
        const productImage = this.getAttribute('data-image');
        const productid = this.getAttribute('id');
        const productDescription = this.getAttribute('data-description');
        const productQuantity = document.querySelector('.BuyCart .qt1').textContent; 
        const buyCart = document.querySelector('.BuyCart');
        buyCart.querySelector('.qt1').textContent = productQuantity;  
        
        buyCart.querySelector('.imgFloat img').src = productImage;
        buyCart.querySelector('.BuyCartPrice span').textContent = `$${productPrice}`;
        buyCart.querySelector('.BuyCarttitle span').textContent = productName;
        buyCart.querySelector('.BuyCartParagrpah p').textContent = productDescription;

        buyCart.style.display = 'block';
        document.body.style.overflow = 'hidden'; 

    
        buyCart.querySelector('.BuyItNow').addEventListener('click', function () {
            const checkoutUrl = `checkout.php?productName=${productName}&quantity=${quantitySpan.textContent }&id=${productid}`;
            window.location.href = checkoutUrl;
        });
    });
});
function sortProducts() {
    var sortValue = document.getElementById('sortproduct').value;
   location.href = "allproducts.php?sortproduct=" + sortValue;
};

document.querySelector('.BuyCart .pluss').addEventListener('click', function () {
    let quantity = parseInt(quantitySpan.textContent);
    quantity += 1;
    quantitySpan.textContent = quantity;
});

document.querySelector('.BuyCart .minuss').addEventListener('click', function () {
    let quantity = parseInt(quantitySpan.textContent);
    if (quantity > 1) {
        quantity -= 1;
        quantitySpan.textContent = quantity;
    }
});
document.getElementById('exitBuyCart').onclick = function () {
    const buyCart = document.querySelector('.BuyCart');
    buyCart.style.display= 'none';
    document.body.style.overflow = ''; 
};
    </script>
 
</body>
</html>