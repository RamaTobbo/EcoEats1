<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recipies.css">
    <title>Document</title>
</head>
<body>
<div id='backtohome'>  <a href='Home.php'>Back Home</a>/<a href='recipies.php'>Recipies</a>/recipy name</div>


<?php
require_once "connection.php";
$id = $_GET['id']; 
$sql="Select RecipeImage,RecipeTitle from recipies where RecipiesID=$id";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
   echo'<div><h1>'.$row['RecipeTitle'].'</h1></div>';
    echo'<div id="topimg">';

echo '<img src="' . $row['RecipeImage'] . '" alt="Recipe Image">';
echo '</div>';

}

?>
<div class='content'>
<?php
require_once "connection.php";
$id = $_GET['id']; 
$sql="Select RecipeDescription from recipies where RecipiesID=$id";
$result = $conn->query($sql);

if($result->num_rows > 0){

    $row = $result->fetch_assoc();

    
    echo '<div id="toptitle">';
    echo '<p>' . $row['RecipeDescription'] . '</p>'; 
    echo '</div>';
}


?>
      <div> <span>Ingredients:</span></div>
   <?php
   require_once "connection.php";
   $id = $_GET['id']; 
   $sql="Select * from recipe_ingredients where RecipeID=$id";
   $result = $conn->query($sql);
   
   if($result->num_rows > 0){
   
     while ($row = $result->fetch_assoc()){
   
       echo'<div>';
       echo '<ul>';
       echo'<div>';   
       echo'<li>'.$row['quantity'].' '. $row['unit'].' '. $row['ingredients'].'</li>';
      echo '</div>';
      echo' </ul>';
      echo '</div>';}
   }
   ?>

   


<div> <span>Preparation:</span></div>
<?php
  require_once "connection.php";
  $id = $_GET['id']; 
  $sql="Select  instruction,stepNumber from steps where recipeId=$id";
  $result = $conn->query($sql);
  
  if($result->num_rows > 0){
  
    while ($row = $result->fetch_assoc()){
        echo '<div>';
echo '<ul>';
echo '<div>';
echo' <li> '.$row['stepNumber'].'. '.$row['instruction'].'</li>';
echo'</div>';
echo '</ul>';
echo '</div>';
  }
  }

?>




</div>
    
</body>
</html>