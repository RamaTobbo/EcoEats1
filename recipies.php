<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recipies.css">
    <title>Document</title>
</head>
<body>
<div id='backtohome'> <a href='Home.php'>Back Home</a>/<span>Recipies</span></div>
<div><h1>Recipies</h1></div>

<?php
require_once "connection.php";
$sql="Select * from recipies";
$result=$conn->query($sql);
if($result->num_rows >0){
  

    while($row = $result->fetch_assoc()){
        echo '<div id="recipies">';
        echo '<div class="title">';
        echo ' <img src="' . $row['RecipeImage'] . '" alt="Recipe Image">';
        echo '</div>';
        echo '<a href="recipiesDetails.php?id=' . $row['RecipiesID'] . '"> ' . $row['RecipeTitle'] . ' </a>';
        echo '<p class="description">' . $row['RecipeDescription'] . '</p>';
        echo '</div>';
        echo' </div>  ';
    };

 }
 
 
?>
 
       
       
      
    
</body>
</html>