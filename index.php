<?php
  
  // get class iventory
  include 'class/inventory.php';

  $data = new Inventory();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $data->delete($deleteId);
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
  <h4>Inventory</h4>
</div><br><br> 

<div class="container">
  <?php
    if (isset($_GET['msg1']) == "add") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Data berhasil ditambahkan !
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Data berhasil di update !
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Data berhasil dihapus !
            </div>";
    }
  ?>
  <h2>Data Inventory
    <a href="page/tambah.php" class="btn btn-primary" style="float:right;">Tambah data</a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Kode Barang</th>
        <th>Jumlah Barang</th>
        <th>Tanggal</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $inventories = $data->index(); 
          foreach ($inventories as $inventory) {
        ?>
        <tr>
          <td><?php echo $inventory['id'] ?></td>
          <td><?php echo $inventory['nama_barang'] ?></td>
          <td><?php echo $inventory['kode_barang'] ?></td>
          <td><?php echo $inventory['jumlah_barang'] ?></td>
          <td><?php echo $inventory['tanggal'] ?></td>
          <td>
            <a href="page/edit.php?editId=<?php echo $inventory['id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="index.php?deleteId=<?php echo $inventory['id'] ?>" style="color:red" onclick="confirm('Apakah anda yakin menghapus data ?')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
