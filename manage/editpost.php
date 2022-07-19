<?php
session_start();
include "../connection.php";
    if (isset($_SESSION["Username"])) {
        if (isset($_POST['edit'])) 
        {
            if (isset($_FILES['img'])) {
                $name = $_FILES['file']['name'];
                $name = $_FILES['file']['tmp_name'];

                if (move_uploaded_file($tmp,"upload/$name")) {
                    echo "upload successfully";
                }else {
                    echo "Erroe :".$_FILES['file']['error'];
                }
            }
            $postID = $_GET['id'];
            $title = $_POST['Title'];
            $body = $_POST['body'];
            $img = "http://localhost/SnowWeblogPHP/upload/".$file_name;

            $sql = "UPDATE `tbl_posts` SET `PostTitle` = :title, `PostBody` = :body, `PostImage` = :img WHERE `tbl_posts`.`id` =:id ;";
            $result = $connect->prepare($sql);
            $result->bindvalue(':title',$title,PDO::PARAM_STR);
            $result->bindvalue(':body',$body,PDO::PARAM_STR);
            $result->bindvalue(':img',$img,PDO::PARAM_STR);
            $result->bindvalue(':id',$postID,PDO::PARAM_STR);

            if ($result->execute()) {
                $message = "<lable class='text-success'>مطلب باموفقیت ویرایش شد</lable>";
            }else {
                $message = "<lable class='text-success'>مطلب ویرایش نشد</lable>";
            }
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
        <form action="" method="POST" enctype="multipart/form-data">
            <?php
            if (isset($message)) {
                echo $message.'<br>';
            }
            ?>
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
