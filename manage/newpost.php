<div class="card card-primary" style="width: 500px; margin: 20px;">
    <div class="card-header">
        <h3 class="card-title">ایجاد مطلب </h3>
    </div>
    <div class="card-body" style="padding:10px;">
        <form action="donewpost.php" method="POST">
            <lable>عنوان مطلب:</lable>
            <input type="text" class="form-control" name="txtTitle"><br>
            <lable>محتوا مطلب:</lable>
            <textarea name="txtbody" cols="30" row="20" class="form-control" ></textarea><br>
            <lable>تصویر مطلب:</lable>
            <input type="file" name="postImage">
            <input type="submit" class="btn btn-success" name="MakePost" value="انتشار">
        </form>
    </div>    
</div>