<?php
session_start();
include_once './ketnoi.php';

if($_SESSION['email']== "yenbi2609@gmail.com" && $_SESSION['pass'] == "yenbi2609"){
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bán điện thoại</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <script src="js/lumino.glyphs.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="quantri.php">Admin</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                        Xin chào, <?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="dangsuat.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                            Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>
            <li class="active"><a href="quantri.php"><svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> Trang chủ</a></li>
            <li><a href="quantri.php?page_layout=danhsachdm"><svg class="glyph stroked calendar">
                        <use xlink:href="#stroked-calendar"></use>
                    </svg> Danh mục</a></li>
            <li><a href="quantri.php?page_layout=danhsachsp"><svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-line-graph"></use>
                    </svg> Sản phẩm</a></li>
            <li role="presentation" class="divider"></li>
        </ul>

    </div>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <?php
      // master page
      if(isset($_GET["page_layout"])){
        switch ($_GET["page_layout"]) {
            case 'danhsachsp':include_once './danhsachsp.php';
               break;
            case 'themsp':include_once './themsp.php';
               break;
            case 'suasp':include_once './suasp.php';
               break;
            case 'danhsachdm':include_once './danhsachdm.php';
               break;
            case 'suadm':include_once './suadm.php';
               break;

        }
      }
      else include_once './gioithieu.php';
      ?>
    </div>
    <!--/.main-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
<?php
}else
header('location: index.php');
?>