<?php
session_start();
include ("../connection.php");

?>
<div class="card card-primary" style="width: 500px; margin: 20px;">
    <div class="card-header">
        <h3 class="card-title">ایجاد مطلب </h3>
    </div>
    <div class="card-body" style="padding:10px;">
        <form action="donewpost.php" method="POST" enctype="multipart/form-data">
            <?php
                if (isset($_SESSION["Username"])) {
                    $sql = "SELECT * FROM `tbl_users` WHERE (Username='{$_SESSION["Username"]}')";
                    $stmt = $connect->prepare($sql);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);   
                }else {
                    echo "Eroor";
                }
            ?>
            <input type="hidden" class="form-control" name="author" value="<?= $row["User_Name"] ?>"><br>
            <lable>عنوان مطلب:</lable>
            <input type="text" class="form-control" name="txtTitle"><br>
            <lable>محتوا مطلب:</lable>
            <textarea name="txtbody" cols="30" row="20" class="form-control" ></textarea><br>
            <lable>تصویر مطلب:</lable>
            <input type="file" name="file">
            <input type="submit" class="btn btn-success" name="MakePost" value="انتشار">
        </form>
    </div>    
</div>