<?php 
include 'koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>nota pembelian</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>
<section class="konten">
	<div class="container">

		<!-- nota disini copas dari folder admin/detail-->
		<h2>Detail Pembelian</h2>
<?php

 $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'"); 
 $detail = $ambil->fetch_assoc();
?>

<p>
	Tanggal Pembelian : <?php echo $detail['tanggal_pembelian'] ?><br>
	Total : <?php echo $detail['total_pembelian'] ?>
</p>
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No.pembelian: <?php echo $detail['id_pembelian'] ?></strong><br>
		Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
		Total: Rp. <?php echo number_format($detail['total_pembelian']) ?>
	</div>
	<div class="col-md-4">
		<h3>Customer</h3>
		<strong> Nama :<?php echo $detail['nama_pelanggan'] ?></strong><br>
		<p>
			<?php echo $detail['telepon_pelanggan'] ?><br>
			<?php echo $detail['email_pelanggan'] ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_kota'] ?></strong>
		Ongkir: Rp. <?php echo number_format($detail['tarif']);?><br>
		Alamat: <?php echo $detail['alamat_pengiriman'] ?>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Jumlah</th>
			<th>Subberat</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td> 
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['berat']; ?>gr</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat']; ?>gr</td>
			<td>Rp.<?php echo number_format($pecah['subharga']); ?></td>
		</tr>
		<?php  $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
		<div class="row">
			<div class="col-md-7">
				<div class="alert alert-info">
					<p>Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke</p>
					<strong>Bank BCA 200-300-100 AN.Dimas Putra</strong>
				
				</div>
			</div>
			
		</div>
	</div>
</section>
</body>
</html>