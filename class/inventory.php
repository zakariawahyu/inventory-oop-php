<?php
    class Inventory {
        private $hostName = "localhost";
        private $username 	= "root";
        private $password 	= "";
        private $databaseName 	= "inventory_db";
        public $db;

        // koneksi ke database
        public function __construct()
        {
            // melakukan koneksi ke mysql
            $this->db = new mysqli($this->hostName, $this->username,$this->password,$this->databaseName);

            // pengecekan apakah sudah berhasil terkoneksi dengan benar
            if(mysqli_connect_error()) {
                trigger_error("Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error());
            }else{
                return $this->db;
            }
        }

        public function index(){
            // query select semua data dalam database
            $query = "SELECT * FROM inventory";
			$result = $this->db->query($query);

			if ($result->num_rows > 0) {
				$data = array();
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			}else{
				echo "Data Tidak Ditemukan";
			}
        }

        // function untuk menambahkan data ke dalam database
        public function add($post){
            // memanggil semua data yang dikirim
            $nama = $this->db->real_escape_string($_POST['nama_barang']);
			$kode = $this->db->real_escape_string($_POST['kode_barang']);
			$jumlah = $this->db->real_escape_string($_POST['jumlah_barang']);
			$tanggal = $this->db->real_escape_string($_POST['password']);
			
            // query insert ke database
			$query= "INSERT INTO inventory VALUES('', '$nama','$kode','$julmah','$tanggal')";
			$sql = $this->db->query($query);

			if ($sql==true) {
				header("Location:../index.php?msg1=add");
			} else{
				echo "Data Gagal Ditambahkan!";
			}
        }

        // function untuk menampilkan 1 data
        public function show($id){
            // query untuk menampilkan 1 data
            $query = "SELECT * FROM inventory WHERE id = '$id'";
			$result = $this->db->query($query);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			}else{
				echo "Data tidak ditemukan";
			}
        }

        // function untuk edit data
        public function update($post){
            // memanggil semua data yang dikirim
            $nama = $this->db->real_escape_string($_POST['nama_barang']);
            $kode = $this->db->real_escape_string($_POST['kode_barang']);
            $jumlah = $this->db->real_escape_string($_POST['jumlah_barang']);
            $tanggal = $this->db->real_escape_string($_POST['password']);
            $id = $this->db->real_escape_string($_POST['id']);

			if (!empty($id) && !empty($post)) {
				$query = "UPDATE inventory SET nama_barang = '$nama', kode_barang = '$kode', jumlah_barang = '$jumlah', tanggal = '$tanggal' WHERE id = '$id'";
				$sql = $this->db->query($query);

				if ($sql==true) {
					header("Location:../index.php?msg2=update");
				}else{
					echo "Data gagal di update !";
				}
			}
        }

        // funxtion untuk delete data 
        public function delete($id){
            // query delete data
            $query = "DELETE FROM inventory WHERE id = '$id'";
			$sql = $this->db->query($query);

			if ($sql==true) {
				header("Location:../index.php?msg3=delete");
			} else{
				echo "Data gagal di delete";
			}
        }
    }
?>