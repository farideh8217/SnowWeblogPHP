<?php
    // if (isset($_SESSION["Username"])) {

    // }else {
    //     header ("Location: ../index.php");
    // }
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h2 class="text-center text-success">به مدیریت وبلاگ خوش آمدید</h2>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php include("post.php") ?>
            </div>    
            <div class="col-6">
                <?php include("newpost.php") ?>
            </div>
        <div>       
    </div>

<script src="../assets/js/bootstrap.js"></script>
</body>
</html>