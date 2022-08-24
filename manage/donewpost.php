<?php
include ("../connection.php");
session_start();

if (isset($_SESSION["Username"])) {

    $file_name = $_FILES['file']['name'];
    $file_title = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_temp_loc = $_FILES['file']['tmp_name'];
    $file_store = "upload/".$file_name;
  
    if (move_uploaded_file($file_temp_loc,$file_store)) {

    }else {
        $message = "<h4 class='text-danger'>تصویر نمی تواند اپلود شود</h4>";
    }

    $date = date('Y/m/d');
    $sql = "INSERT INTO `tbl_posts` (`PostTitle`, `PostBody`, `PostImage`, `PostAuthor`, `PostDate`) VALUES (?, ?, ?, ?, ?);";
    $result = $connect->prepare($sql);
    $result->bindParam(1,$_POST['txtTitle'],PDO::PARAM_STR);
    $result->bindParam(2,$_POST['txtbody'],PDO::PARAM_STR);
    $result->bindParam(3,$file_name,PDO::PARAM_STR);
    $result->bindParam(4,$_POST['author'],PDO::PARAM_STR);
    $result->bindParam(5,$date,PDO::PARAM_STR);

    if($result->execute()) {
        header("Location: index.php");
    }else {
        echo "Erorr";
    }
}

?>