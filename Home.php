<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Econmica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <title>EcoEats</title>
</head>
<body >


 <?php

    if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1) {
        header("Location: login.php");
        exit;
    }

    ?>
        <div id="announcement"> <p>FREE SHIPPING on orders above $50</p></div>
    <div id="header"><span id="StoreName">EcoEats</span>

    <form action="productSearched.php" method="get">
    
       <div id="search">  <input type="text" placeholder="&#xF002;  Search for..."style="font-family:Arial, FontAwesome" class="search" name="search"></div></form>
  <div id="headerbtn">  <button class="AccountCartbtn" id="Accountbtn"><img  src ="images/user.png" class="buttonIcon" >  Account</button>
    <button class="AccountCartbtn" id="groceryCartbtn"><img  src ="images/grocery-cart.png" class="buttonIcon"  >  <span id='totalQty'>(0)</span></button></div></div>
    <hr>
    <nav>
    <div class="dropdown">
    <a class="dropbtn">Products Categories
    <i class="fa fa-caret-down"></i>
</a>
        <div class="dropdown-content">
            <?php
            require_once "connection.php";
            $sql="Select Category_Name,Category_id from productcategory";
            $result=$conn->query($sql);
            if($result->num_rows >0){
              
            echo  '<span>Categories</span>';
                while($row = $result->fetch_assoc()){
                    echo '<div>';
                    echo' <ul>';
            echo  '<li> <a href="productcategory.php?id=' . $row['Category_id'] . '"> ' .$row['Category_Name'].'</a> </li> ';
          
        echo'</ul>';
            echo'</div> ';
                };
            
             }
              
            ?>

    <!-- <div> <span>Baking Supplies</span>
            <ul>
     <li> <a href="productcategory.php">Flour</a> </li> 
   
</ul>
    </div> 
    <div> <span>Bread</span>
            <ul>
     <li> <a href="productcategory.php">Baked Goods</a> </li> 
     <li>  <a href="productcategory.php">Bun</a> </li> 
     <li>  <a href="productcategory.php">Bagel</a> </li> 
</ul>
    </div> 
    <div> <span>Dairy&Eggs</span>
            <ul>
     <li> <a href="productcategory.php">Milk</a> </li> 
     <li>  <a href="productcategory.php">Eggs</a> </li> 
     <li>  <a href="productcategory.php"> Cheese</a> </li> 
</ul>
    </div> 
    <div> <span>Prepared Food</span>
            <ul>
     <li> <a href="productcategory.php">Pizza</a> </li> 
     <li>  <a href="productcategory.php">Salad</a> </li> 
     <li>  <a href="productcategory.php">Chicken Salad</a> </li> 
</ul>
    </div>  -->
</div>
</div>
        <a href="recipies.php">Recipies</a>
      
        <a href="blog.php">Blog</a>
        <a href="aboutus.php">About Us</a>
    </nav>
<div class="container"> <span class="HomeHeader1">100% Organic </span><img src="images/HomeHeader1.webp"><button class="btn" id='shopbtn'>Shop Now</button></div>
 <section id="s1"><span class="secTilte"> Best Sellers</span>
 <?php
require_once 'connection.php';

$sql ="SELECT *,SUM(order_items.quantity) AS total_quantity
FROM products
JOIN order_items ON products.Product_id = order_items.product_id
GROUP BY products.Product_id
ORDER BY total_quantity DESC
LIMIT 3
";


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
</section>
<section id="s2"><span class="secTilte"> Shop Fresh Food</span>
<?php
require_once 'connection.php';

$sql ="SELECT * 
FROM `products`
JOIN `productcategory` ON products.CategoryID = productcategory.Category_id 
WHERE Category_Name = 'Prepared Foods';
";


$result = $conn->query($sql);
if($result->num_rows >0){
  
    echo '<div class="flexDisplay1">';
   while($row = $result->fetch_assoc()){
   
    echo'<div class="food-card">';
    echo '<img src="' . $row['ProductImage'] . '" >';
    echo '  <span ><center>$'.$row['price'].'</center></span>';
    echo'
         <span ><center>'.$row['Product_Name'].'</center></span>';
         echo '<h4>'.$row['Product_Description'].'</h4>';
         echo "<button class='buyNow' qty='1' id='{$row['Product_id']}' data-product='{$row['Product_Name']}' data-price='{$row['price']}' data-image='{$row['ProductImage']}' data-description='{$row['Product_Description']}'>Buy Now</button>";


         echo'</div>';
    
      
   };
   echo '</div>';

}?>


</section>
<section id="s3"><span class="secTilte"> Hot Deals</span>
<div class="flexDisplay">
  
 <div class="deals-card1">
         <img src="images/bread.webp">
         <span class="sec3title"><center>Finest Bread</center></span>
         <h4>Fresh everyday</h4>
        
         <button class="showmore">Show More</button>
     </div>
     <div class="deals-card2">
         <img src="images/superfood.webp">
         <span class="sec3title"><center>Superfoods</center></span>
         <h4>Just arrived!</h4>
        
         <button class="showmore">Show More</button>
     </div>
     <div class="deals-card3">
         <img src="images/pureorg.webp">
         <span class="sec3title"><center>Pure Organic</center></span>
         <h4>Collection</h4>
        
         <button class="showmore">Show More</button>
     </div>
   

   
    </div>
</section>
<section >
<div id="sec4">
    <img src='images/sec4img.webp'>
    <span>Recipies!<span>
    <button class='showall' id='showall'>Explore All</button>
</div>
</section>
<section id="sec5">
<div >
    <span>Sign Up To Our News Letter<span></div>
    <div >  <input type='email' placeholder='Enter your email'><button class='submit'>Submit</button>
</div>
</section>
<div class="cartTab">
    <h1>Shopping Cart</h1>
    <div class="ListCart">
        <div class="item">
            <div class="image">
                <img src="images/cookies.webp" alt="Cookie Image">
            </div>
            <div class="name">Name</div>
            <div class="totalprice">$6</div>
            <div class="quantity">
                <button class="minus">&lt;</button>
                <span class='qt'>1</span>
                <button class="plus">&gt;</button>
            </div>
        </div>
    </div>
    <div class="btncart">
        <button class="close">Close</button>
        <button class="checkOut" id='showcart'>View Cart</button>
    </div>
</div>



<div class='BuyCart'>
   <div class='imgFloat'> <img src=''></div>
   <div class='BuyCartPrice'><span></span><button id='exitBuyCart'>X</button></div>
   <div class= 'BuyCarttitle'><span></span></div>

   <div class='BuyCartParagrpah'><p ></p></div>
  <div class='flex'> <div class='specifyQt'><button class='pluss'>+</button></div>
   <div ><span class='qt1'>1</span></div>
   <div class='specifyQt'><button class='minuss'>-</button></div>
   <div class='addtocart'><button id='addtocart'>Add to cart</button></div></div>
   <?php 



  
?>
<div class='BuyItNow'><button>Buy it now</button></div>


</div>



<footer class="footer">
        <div class="footer-left">
        <h2>EcoEats</h2>
            <p>Fresh products from local<br> producers, delivered directly to<br> your front door, daily.</p>
        </div>
        <div class="footer-center">
    <h2>Popular Categories</h2>
    <ul>
        <li><a href="#">Dairy & Eggs</a></li>
        <li><a href="#">Fresh Meals & Pizzas</a></li>
        <li><a href="#">Fruits & Vegetables</a></li>
    </ul>
</div>
<div class="footer-right">
    <h2>Quick Links</h2>
    <ul>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="aboutus.php">About us</a></li>
        <li><a href="allproducts.php">Products</a></li>
    </ul>
</div>
<div id='copyright'><p >&copy; 2024 EcoEats by Rama Tobbo</p></div>
    </footer>




    <script >
        const isLoggedIn = <?php echo (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == 1) ? 'true' : 'false'; ?>;
document.addEventListener('DOMContentLoaded', () => {

    document.getElementById('Accountbtn').onclick = () => location.href = 'login.php';
    document.getElementById('showall').onclick = () => location.href = 'recipies.php';
    document.querySelectorAll('.showmore').forEach(element => {
        element.onclick = () => location.href = 'allproducts.php';
    });
    document.getElementById('shopbtn').onclick = () => location.href = 'allproducts.php';
    document.getElementById('showcart').onclick = () => location.href = 'cart.php';


    document.getElementById('groceryCartbtn').onclick = () => document.querySelector('.cartTab').classList.add('showCart');
    document.querySelector('.close').onclick = () => document.querySelector('.cartTab').classList.remove('showCart');


    const addToCartButton = document.querySelector('#addtocart');
    addToCartButton.addEventListener('click', function () {
        const productName = document.querySelector('.BuyCarttitle span').textContent;
        const productPrice = document.querySelector('.BuyCartPrice span').textContent.replace('$', '').trim();
        const productImage = document.querySelector('.imgFloat img').src;
        const productDescription = document.querySelector('.BuyCartParagrpah p').textContent;
        const productQuantity = parseInt(document.querySelector('.qt1').textContent, 10);

        addToCart(productName, productPrice, productImage, productDescription, productQuantity);
        alert('Item added to cart!');
    });

  
    document.querySelector('.BuyCart').addEventListener('click', (event) => {
        if (event.target.classList.contains('pluss')) {
            const quantitySpan = document.querySelector('.qt1');
            let quantity = parseInt(quantitySpan.textContent, 10);
            quantitySpan.textContent = ++quantity;
        }
        if (event.target.classList.contains('minuss')) {
            const quantitySpan = document.querySelector('.qt1');
            let quantity = parseInt(quantitySpan.textContent, 10);
            if (quantity > 1) {
                quantitySpan.textContent = --quantity;
            }
        }
    });





    const quantitySpan = document.querySelector('.BuyCart .qt1');

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

    // Close Buy Cart
    document.getElementById('exitBuyCart').onclick = () => {
        const buyCart = document.querySelector('.BuyCart');
        buyCart.style.display = 'none';
        document.body.style.overflow = '';
    };
});

    </script>
</body>
</html>
 