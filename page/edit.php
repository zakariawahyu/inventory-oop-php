<?php
  
  // Get class inventory
  include '../class/inventory.php';

  $data = new Inventory();

  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $inventory = $data->show($editId);
  }

  if(isset($_POST['update'])) {
    $data->update($_POST);
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
</div><br> 

<div class="container">
  <form action="edit.php" method="POST">
    <div class="form-group">
      <label for="name">Nama Barang :</label>
      <input type="text" class="form-control" name="nama_barang" value="<?php echo $inventory['nama_barang']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="email">Kode Barang :</label>
      <input type="text" class="form-control" name="kode_barang" value="<?php echo $inventory['kode_barang']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="username">Jumlah Barang :</label>
      <input type="text" class="form-control" name="jumlah_barang" value="<?php echo $inventory['jumlah_barang']; ?>" required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $inventory['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
