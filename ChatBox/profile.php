
<?php

    session_start();
    if(!isset($_SESSION['name'])){
        echo "name not set in test";
        header("Location: ./index.php");
        exit();
    }elseif (isset($_SESSION['name'])) {
        echo '<h1 style="text-align: center; color: #90a0b0;">';
       
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS & Javascript -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>
    <!-- Navigation Bar-->  
    <?php include './nav.php' ?> 


    <!--- profile ------>

<div class="container"> 
      <p> name: <?php echo $_SESSION['name'] ?>
    </p>
</div>


</body>
</html>