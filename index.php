<?php
include("connection.php");
session_start();

if (isset($_POST['login'])) {
    if (empty($_POST['txtusername']) || empty($_POST['txtpassword'])) {
        $message = "تمامی فیلدها باید وارد شود";
    }else{
        $query = "SELECT * FROM `tbl_users` WHERE (`Username`= :username And `Password`= :password) or (`Email`= :username and `Password`= :password)";
        $result = $connect->prepare($query);
        $result->execute(
            array(
                'username'=>$_POST["txtusername"],
                'password'=>$_POST["txtpassword"]
            )
        );
        $count = $result->rowcount();
        if ($count > 0) {
            $_SESSION["Username"] = $_POST["txtusername"];
            header ("Location: manage/index.php");
        }else{
            $message = "نام کاربری یا رمزعبور اشتباه است";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.rtl.css"> -->
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="top-side">
        <div class="container">
            <h6>امروز 1401/04/15می باشد</h6>
        </div>    
    </div>    

    <div class="main-nav">
        <img src="assets/images/1.png" >
    </div> 

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="asli">
            <a class="navbar-brand" href="#">برف</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">نمونه کار</a>
                </li>
                </ul>
            </div>
        </div>  
    </nav>
    <!--end navbar//////////////////////-->
    <div class="containers">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
            <img src="assets/images/1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
            <img src="assets/images/1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="assets/images/1.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>


        <!--end slider//////////////////////-->
        <div class="main-content">
            <div class="post-side">
                <div class="post">
                    <img class="img-post" src="assets/images/2.jpg">
                    <h1>مطلب اول</h1>
                    <hr>
                <footer>
                    <span class="text-primary">نویسنده:فریده ذاکر</span>
                    <a style="float: left;" href="" class="btn btn-danger">ادامه مطلب</a>
                </footer>
                </div>
            </div>
            <div class="sidebar">
                <?php
                    if (isset($_SESSION["Username"])) {
                ?>        
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">اطلاعات کاربر</h3>
                    </div>
                    <div class="card-body">
                        <lable>نام شما:</lable>
                        <span>
                            <?php 
                                $query = "SELECT * FROM `tbl_users` WHERE Username = '{$_SESSION['Username']}'";
                                $result = $connect->prepare();
                                $result->execute();
                                $user = $result->fetch(PDO::FETCH_ASSOC);
                                if ($user === false) {
                                    print "-";
                                } else {
                                    echo $user["User_Name"];
                                }
                            ?>
                        </span><br>
                        <span><a href="logout.php" class="btn btn-primary">خروج</a></span>
                    </div>    
                </div>
                <?php
                    }else{
                ?>        
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">ورود به سایت</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="text" name="txtusername" class="form-control" placeholder="نام کاربری"><br>
                            <input type="text" name="txtpassword" class="form-control" placeholder="رمز عبور"><br>
                            <input type="submit" name="login" value="ورود" class="btn btn-success"><br>
                        <?php
                            if (isset($message)) {
                                echo "<lable class='text-danger'>$message</lable>";
                            }
                        ?>
                        </form>
                    </div>     
                </div>          
                <?php
                    }
                ?>

            <!--end login//////////////////////-->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">جست وجو</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <input type="text" name="txtsearch" class="form-control"><br>
                            <input type="submit" name="search" value="جست وجو" class="btn btn-warning"><br>
                        </form>
                    </div>     
                </div> 
                <!--end search////////////////////////////////-->
            </div>
        </div>
    </div>
    <footer style="width: 100%; background: #555;display:flex;">
        ffffffffffff
    </footer>    

    <script src="assets/js/bootstrap.js"></script>
</body>
</html>

<html>
    <div>

</html>