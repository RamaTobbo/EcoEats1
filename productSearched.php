
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
<div id='backtohome'> <a href='Home.php'>Back Home</a>/<span>Products</span></div>

<?php
require_once 'connection.php';


if (isset($_GET['search'])) {
 
    $searchTerm = $_GET['search'];

    $sql = "SELECT * FROM products WHERE Product_Name LIKE '%$searchTerm%' ORDER BY Product_Name";
} else {
  
    $sql = "SELECT * FROM products ORDER BY Product_Name";
}


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo '<div class="flexDisplay">'; 

    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-card">';
        echo '<img src="' . $row['ProductImage'] . '" alt="Product Image">';
        echo '<span><center>$' . $row['price'] . '</center></span>';
        echo '<span><center>' . $row['Product_Name'] . '</center></span>';
        echo '<h4>' . $row['Product_Description'] . '</h4>';
        echo "<button class='buyNow' qty='1' id='{$row['Product_id']}' data-product='{$row['Product_Name']}' data-price='{$row['price']}' data-image='{$row['ProductImage']}' data-description='{$row['Product_Description']}'>Buy Now</button>";
        echo '</div>';
    }
    echo '</div>'; 
} else {

    echo "<p>No products found for your search.</p>";
}


?>


         
       
         
        
<div class='BuyCart'>
   <div class='imgFloat'> <img src=''></div>
   <div class='BuyCartPrice'><span>$</span><button id='exitBuyCart'>X</button></div>
   <div class= 'BuyCarttitle'><span></span></div>

   <div class='BuyCartParagrpah'><p ></p></div>
  <div class='flex'> <div class='specifyQt'><button class='pluss'>+</button></div>
   <div ><span class='qt1' value=''>1</span></div>
   <div class='specifyQt'><button class='minuss'>-</button></div>
   <div class='addtocart'><button id='AddtoCart' >Add to cart</button></div></div>
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
    const isLoggedIn = <?php echo (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == 1) ? 'true' : 'false'; ?>;


document.querySelectorAll('.buyNow').forEach(button => {
    button.addEventListener('click', function () {
        const productName = this.getAttribute('data-product');
        const productPrice = this.getAttribute('data-price');
        const productImage = this.getAttribute('data-image');
        const productDescription = this.getAttribute('data-description');
        const productid = this.getAttribute('id');
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
            if (isLoggedIn) {
                    const checkoutUrl = `checkout.php?productName=${productName}&quantity=${quantitySpan.textContent}&id=${productid}`;
                    window.location.href = checkoutUrl;
                } else {
                    window.location.href = 'login.php';
                }
        });
    });
});
function sortProducts() {
    var sortValue = document.getElementById('sortproduct').value;
    var categoryId = <?php echo isset($_GET['id']) ? $_GET['id'] : 'null'; ?>;
    location.href = "productcategory.php?sortproduct=" + sortValue + "&id=" + categoryId;
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