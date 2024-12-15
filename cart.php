
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
<div class="cartTab1">
    <h1>Shopping Cart</h1>
    <div class="ListCart1"></div>
    <div class="btncart1">
        <button class="checkOut1" id="checkout1">Check Out</button>
    </div>
</div>


<script>
    // document.addEventListener('DOMContentLoaded', () => {
    //     // Function to update the cart display
    //     function updateCartDisplay() {
    //         const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    //         const cartTab = document.querySelector('.ListCart1');

    //         // Clear the current cart display
    //         cartTab.innerHTML = '';

    //         // Populate the cart with items from sessionStorage
    //         cart.forEach((item, index) => {
    //             const itemHTML = `
    //                 <div class="item1">
    //                     <div class="image">
    //                         <img src="${item.image}" alt="${item.product}">
    //                     </div>
    //                     <div class="name">${item.product}</div>
    //                     <div class="totalprice">${item.price}</div>
    //                     <div class="quantity">
    //                         <button class="minus" data-index="${index}">&lt;</button>
    //                         <span class="qt">${item.quantity}</span>
    //                         <button class="plus" data-index="${index}">&gt;</button>
    //                     </div>
    //                 </div>
    //             `;
    //             cartTab.insertAdjacentHTML('beforeend', itemHTML);
    //         });
    //     }

    //     // Update cart display on page load
    //     updateCartDisplay();

    //     // Handle quantity increment/decrement for items in the cart
    //     document.querySelector('.ListCart1').addEventListener('click', (event) => {
    //         const index = event.target.dataset.index;
    //         if (index === undefined) return; // Make sure the event target has a data-index attribute

    //         const cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    //         if (event.target.classList.contains('minus')) {
    //             let currentQuantity = cart[index].quantity;
    //             if (currentQuantity > 1) {
    //                 cart[index].quantity -= 1;
    //             }
    //         }

    //         if (event.target.classList.contains('plus')) {
    //             cart[index].quantity += 1;
    //         }

    //         // Update sessionStorage with the modified cart
    //         sessionStorage.setItem('cart', JSON.stringify(cart));

    //         // Update the cart display after changing quantity
    //         updateCartDisplay();
    //     });
    // });
</script>
</body>
</html>
