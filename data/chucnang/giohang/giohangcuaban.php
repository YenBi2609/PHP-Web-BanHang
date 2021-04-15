<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
    <a href="index.php?page_layout=giohang"><img src="img/home/cart.png" style="width:100px;"></a>
    <a href="index.php?page_layout=giohang"> <span><?php if(isset($_SESSION['giohang'])){echo count($_SESSION['giohang']);}else echo 0; ?></span> </a>
</div>