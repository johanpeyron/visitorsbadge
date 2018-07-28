<?php
  require('config/db.php');

  // get ID
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  // Create query
  $query = 'SELECT * FROM posts WHERE id='.$id;

  // Get result
  $result = mysqli_query($conn, $query);

  // Fetch data
  $post = mysqli_fetch_assoc($result);
  //var_dump($post);

  // Free result
  mysqli_free_result($result);

  // Close connection
  mysqli_close($conn);

?>

  <!DOCTYPE html>
  <html>
    <head>
        <title>PHP Blog</title>
        <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
    </head>
    <body>
      <div class="container">
        <h1><?php echo $post['title']; ?></h1>
            <h3><?php echo $post['title']; ?></h3>
            <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
            <p><?php echo $post['body']; ?></p>
      </div>
    </body>
  </html>