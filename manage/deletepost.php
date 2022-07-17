<?php
include ("../connection.php");

if (isset($_GET['id'])) {
    $sql = "DELETE FROM `tbl_posts` WHERE `tbl_posts`.`id` = ?;";
    $result = $connect->prepare($sql);
    $result->bindvalue(1,$_GET['id']);

    if ($result->execute()) {
        header("Location:index.php");
    }
}
?>