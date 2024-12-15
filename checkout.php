<?php
session_start();

if (isset($_POST['submit']) && isset($_POST["firstname"]) && !empty($_POST["firstname"]) && 
    isset($_POST["lastname"]) && !empty($_POST["lastname"]) && 
    isset($_POST["address"]) && !empty($_POST["address"]) && 
    isset($_POST["city"]) && !empty($_POST["city"]) && 
    isset($_POST["phone"]) && !empty($_POST["phone"])) {

    require_once "connection.php";

    header('Location: purchasedSuccessfully.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-start;
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        form {
        
            color: #333;
            border-radius: 10px;
            padding: 20px;
            margin-left: 50px;
            margin-right: 50px;
            max-width: 400px;
            width: 100%;
        }

        #sec2 {
            background: #b9bcc3;
            color: #333;
            border-radius: 10px;
            padding: 20px;
            margin-left: 50px;
            margin-right: 50px;
            margin-top: 50px;
            max-width: 990px;
            width: 100%;
            height: auto;
        }

        @media (max-width: 690px) {
            body {
                font-family: Arial, sans-serif;
                color: #fff;
                margin: 0;
                padding: 0;
                display: inline;
                min-height: 100vh;
            }

            form {
        
                color: #333;
                border-radius: 10px;
                padding: 20px;
                margin-left: 50px;
                margin-right: 50px;
                max-width: 280px !important;
            }

            #sec2 {
                background: #b9bcc3;
                color: #333;
                border-radius: 10px;
                padding: 20px;
                margin-left: 50px;
                margin-right: 50px;
                height: 740px;
                width: 280px !important;
            }
        }

        h2 {
            text-align: center;
            color: #1d1d1d;
            font-size: 24px;
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="address"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        .radio-group {
            margin-bottom: 20px;
        }

        .radio-group label {
            font-weight: normal;
            display: inline-block;
            margin-right: 10px;
        }

        input[type="submit"] {
            background: #1d1d1d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background: black;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .product-info img {
            width: 50px;
            border-radius: 5px;
            margin-right: 15px;
        }

        #sec2 .product-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        #sec2 .product-info span {
            font-size: 16px;
            margin-left: 10px;
        }

        #sec2 .summary {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 15px;
        }

        #sec2 .summary div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 16px;
        }

        #sec2 .total {
            font-weight: bold;
            font-size: 18px;
        }
        #backtohome{
    margin-left: 50px;
}
#backtohome span{
    text-decoration: none;
    color: #b9bcc3;
    font-size: 15px;
    font-family: 'Roboto';
}
#backtohome a{
    text-decoration: none;
    color: black;
    font-size: 15px;
}
a{
    text-decoration: none;
    color: black;
    font-size: 25px;
    font-family: 'Roboto';
}
    </style>
</head>
<body>
<div id='backtohome'>  <a href='Home.php'>Back Home</a><span>/Checkout</span></div>
    <form method="post">
        <div class="form-section">
            <h2>Contact</h2>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php

    echo isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>">
        </div>

        <div class="form-section">
            <h2>Delivery</h2>
            <label for="ship">Shipping Method</label>
            <div class="radio-group">
                <input type="radio" id="ship" name="ship" checked>
                <label for="ship">Ship</label>
            </div>
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" placeholder="First Name">

            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" placeholder="Last Name">

            <label for="address">Address</label>
            <input type="address" id="address" name="address" placeholder="Street Address">

            <label for="city">City</label>
            <input type="text" id="city" name="city" placeholder="City">

            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="Phone Number">
        </div>

        <div class="form-section">
            <h2>Payment</h2>
            <div class="radio-group">
                <input type="radio" id="cod" name="payment" checked>
                <label for="cod">Cash on Delivery</label>
            </div>
        </div>

        <input type="submit" name='submit' value="Complete Order">
    </form>

    <div id="sec2">
        <?php
        require_once "connection.php";
      

        $name = $_GET['productName'];
        $quantity = $_GET['quantity'];
        $id = $_GET['id'];
        $sql = "SELECT price, Product_Name, ProductImage, Product_Description,Quantity FROM products WHERE Product_id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total = ($row['price'] * $quantity) + 3;
            $totalprice = $row['price'] * $quantity;
            echo '<div class="product-info"><img src="' . $row['ProductImage'] . '" alt="Product Image"> <span>' . $row['Product_Description'] . '</span></div>';
            echo '<div><span>Total:</span> $' . $total . '</div>';
            echo' <div class="summary">';
            echo '<div><span>Subtotal:</span>'.$row['price'] * $quantity.'</div>';
           echo  '<div><span>Delivery:</span> $3 </div>';
           echo'  <div class="total"><span>Total:</span> $'.$total.'</div>';
        echo' </div>
     </div>';
     $query = "INSERT INTO `order`(`OrderID`, `OrderDate`, `TotalPrice`, `userID`) VALUES (null,NOW(),'$total','$_SESSION[user_id]')";

   $newqty=$row['Quantity']-$quantity;
     if (isset($_POST['submit']) && 
     isset($_POST["firstname"]) && !empty($_POST["firstname"]) && 
     isset($_POST["lastname"]) && !empty($_POST["lastname"]) && 
     isset($_POST["address"]) && !empty($_POST["address"]) && 
     isset($_POST["city"]) && !empty($_POST["city"]) && 
     isset($_POST["phone"]) && !empty($_POST["phone"])){
        $conn->query($query);
        $orderID = $conn->insert_id;
        $query3 ="UPDATE `products` SET `Quantity`='$newqty' WHERE `Product_id`='$id'";
        $conn->query($query3);
     $query1 ="INSERT INTO `order_items`(`orderItems_id`, `product_id`, `quantity`, `price`,`orderID`) VALUES (null,'$id','$quantity','$totalprice','$orderID')";
     $conn->query($query1);}
        }
       

       
        if (
            isset($_POST["firstname"]) && !empty($_POST["firstname"])
           
            && isset($_POST["lastname"]) && !empty($_POST["lastname"])
            && isset($_POST["address"]) && !empty($_POST["address"])
            && isset($_POST["city"]) && !empty($_POST["city"])
            && isset($_POST["phone"]) && !empty($_POST["phone"])
           
        ) {
            $firstname= $_POST["firstname"];
        
            $lastname = $_POST["lastname"];
            $address=$_POST["address"];
            $city=$_POST["city"];
            $phone=$_POST["phone"];
          
          
            if (isset($_POST['submit'])){

             
                
        
            
         
                $query2 ="INSERT INTO `orderaddress`(`OrderAddressid`, `FirstName`, `LastName`, `city`, `address`, `phone`, `UserID`, `orderID`) VALUES (null,'$firstname','$lastname',' $city','$address','$phone','$_SESSION[user_id]','$orderID')";

                $conn->query($query2);
               
                
              
             
                }
         
        
        }
        



        ?>
</body>
</html>
