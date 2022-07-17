<?php
include "../connection.php";
    if (isset($_SESSION["Username"])) {
        if (isset($_POST['edit'])) 
        {
            $postID = $_GET['id'];
            $title = $_POST['Title'];
            $body = $_POST['body'];
            $img = "";

            $sql = "UPDATE `tbl_posts` SET `PostTitle` = ?, `PostBody` = ?, `PostImage` = ?, `PostAuthor` = 'bhxa' WHERE `tbl_posts`.`id` =$postID ;";
            $result = $connect->prepare($sql);
            $result->bindvalue(1,$title,PDO::PARAM_STR);
            $result->bindvalue(1,$body,PDO::PARAM_STR);
            $result->bindvalue(1,$img,PDO::PARAM_STR);
            
            $result->execute();
        }
    }else {
        header ("Location: ../index.php");
    }
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
    <h2 class="text-center text-primary">ویرایش مطلب</h2>
    <hr>
    <div class="container">
    <?php 
        $postID = $_GET['id'];
        $query = "SELECT * FROM `tbl_posts` WHERE id =$postID";
        $result = $connect->prepare($query);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);  
    ?>
        <form action="" >
            <lable>عنوان مطلب</lable>
            <input type="text" name="Title" value="<?php echo $row['PostTitle']; ?>" class="form-control"><br>
            <lable>محتوا مطلب</lable>
            <textarea name="body" id="" cols="30" rows="10" class="form-control"><?php echo $row['PostBody']; ?></textarea><br>
            <lable>تصویر مطلب</lable>
            <input type="file" name="img" class="btn btn-warning">
            <input type="submit" name="edit" value="ویرایش وانتشار" class="btn btn-info">
        </form>
    </div>


</body>
</html>
