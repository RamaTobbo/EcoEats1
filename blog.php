


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
        require_once 'connection.php';
        $sql = "SELECT * FROM  article";
        $result = $conn->query($sql);
        if($result->num_rows >0){
          
        
           while($row = $result->fetch_assoc()){
            echo'<div>';
            echo'<img src="'.$row['image'].'">';
            echo'</div>';
            echo'<div>';
            echo'<a href="blogContent.php?articleid=' . $row['articleID'] . '">'.$row['Title'].'</a></div>';
            echo'<div><span>'.$row['publishDate'].'<span></div>';
           };
        
        }
        
      
?>
 
</div>
    
</body>
</html>