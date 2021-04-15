<?php
$sql="select * from dmsanpham ";
$query = mysqli_query($conn,$sql);
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul id="nav" class="nav navbar-nav">
        <li><a href="index.php">Trang chủ</a></li>
        <?php
            while($row = mysqli_fetch_array($query)){
            ?>
            <li><a href="index.php?page_layout=danhsachsp&id_dm=<?php echo $row['id_dm'];?>"><?php echo $row['ten_dm'];?></a></li>
            <?php
            }
            ?>

        </ul>
    </div>
</nav>