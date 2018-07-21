<?php
session_start();
//medapatkan id_produk url
$id_produk = $_GET['id'];

//jk sudah ada produk itu di keranjang, maka produk itu jumlahny di +1
if(isset($_SESSION['keranjang'][$id_produk]))
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
else
{
	$_SESSION['keranjang'][$id_produk]=1;
}

//echo"<pre>";
//print_r($_SESSION);

//larikan ke halaman keranjang
echo "<script>alert('produk telah masuk ke dalam keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>