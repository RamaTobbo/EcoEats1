<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recipies.css">
    <title>Document</title>
</head>
<body>
<div id='backtohome'>  <a href='Home.php'>Back Home</a>/<span>Blog</span></div>
    <h1>News</h1>
    <div class='content1'>
        <?php
        $articleid=$_GET['articleid'];
        require_once 'connection.php';
        $sql = "SELECT * FROM  article WHERE articleID=$articleid";
        $result = $conn->query($sql);
        if($result->num_rows >0){
          
        
   $row= $result->fetch_assoc();
    echo '<div class="article-content">'.$row['Content'].'</div>';
     
        
        }
        
      
?>
 
</div>
    
</body>
</html>