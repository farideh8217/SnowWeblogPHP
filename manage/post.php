<?php
    include "../connection.php";
?>
<div class="card card-danger" style="width: 500px; margin: 20px;">
    <div class="card-header">
        <h3 class="card-title"> مطالب وبلاگ</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped">
        <tr>
            <th>آیدی مطلب</th>
            <th>عنوان مطلب</th>
            <th>حذف مطلب</th>
            <th>ویرایش مطلب</th>
        </tr>
        <?php
            $query = "SELECT * FROM `tbl_posts` ORDER BY id DESC";
            $result = $connect->prepare($query);
            $result->execute();
            foreach ($result as $rows) {
        ?>
        <tr>
            <td><?= $rows['id']; ?></td>
            <td><?= $rows['PostTitle']; ?></td>
            <td><a href="deletepost.php?id=<?= $rows['id']; ?>">حذف</a></td>
            <td><a href="editpost.php?id=<?= $rows['id']; ?>">ویرایش</a></td>
        </tr>    
        <?php
            }
        ?>
        </table>    
    </div>    
</div>