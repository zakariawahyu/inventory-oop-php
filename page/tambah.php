<?php

  // Get Class Inventory
  include '../class/inventory.php';

  $data = new Inventory();

  if(isset($_POST['submit'])) {
    $data->add($_POST);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inventory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Inventory</h4></h4>
</div><br> 

<div class="container">
  <form action="tambah.php" method="POST">
    <div class="form-group">
      <label>Nama Barang :</label>
      <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan nama barang" required="">
    </div>
    <div class="form-group">
      <label>Kode Barang :</label>
      <input type="text" class="form-control" name="kode_barang" placeholder="Masukkan kode barang" required="">
    </div>
    <div class="form-group">
      <label>Jumlah Barang :</label>
      <input type="text" class="form-control" name="jumlah_barang" placeholder="Masukkan jumlah barang" required="">
    </div>
    <div class="form-group">
      <label>Tanggal :</label>
      <input type="date" class="form-control" name="tanggal" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
