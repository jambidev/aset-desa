<?php
	session_start();
	if(isset($_GET['model'])): // for secure
		ob_start();
		date_default_timezone_set('Asia/Makassar');
		require "../libs/path.php";
		require "../models/class.php";

		$model = $_GET['model'];
		$method = $_GET['method'];
		$model;

		if($model == 'jalan' AND $method == 'tambah') {
			if(isset($_POST['tambah'])) {
				$kode_barang			= $_POST['kode_barang'];

				if (empty($kode_barang)) {
					header("location:".ROOT."input?tab=jalan&act=err");
				} else {
					$kode_bidang		= substr($kode_barang, 2, 2);
					$jb					= $data_barang->getNamaBarangByKB($kode_barang);
					$jenis_barang		= $jb['nama_barang'];
					$register			= $_POST['register'];
					$kondisi				= $_POST['kondisi'];
					$konstruksi			= $_POST['konstruksi'];
					$panjang 			= $_POST['panjang'];
					$lebar 				= $_POST['lebar'];
					$luas_tanah 		= $_POST['luas_tanah'];
					$alamat 				= $_POST['alamat'];
					$tanggal_dokumen 	= $_POST['tanggal_dokumen'];
					$no_dokumen 		= $_POST['no_dokumen'];
					$status_tanah 		= $_POST['status_tanah'];
					$no_tanah 			= $_POST['no_tanah'];
					$asal_usul 			= $_POST['asal_usul'];
					$harga 				= empty($_POST['harga'])? '0' : $_POST['harga'];
					$keterangan 		= $_POST['keterangan'];

					$jalan->insertData($kode_barang, $kode_bidang, $jenis_barang, $register, $kondisi, $konstruksi, $panjang, $lebar, 
						$luas_tanah, $alamat, $tanggal_dokumen, $no_dokumen, $status_tanah, $no_tanah, $asal_usul, $harga, $keterangan);

					header("location:".ROOT."inventaris?tab=jalan&act=add");
				}
			}
		}

		if($model == 'jalan' AND $method == 'edit') {
			if(isset($_POST['edit'])) {
				$kode_barang		= $_POST['kode_barang'];
				$kode_bidang		= substr($kode_barang, 2, 2);
				$jb					= $data_barang->getNamaBarangByKB($kode_barang);
				$jenis_barang		= $jb['nama_barang'];
				$register			= $_POST['register'];
				$kondisi				= $_POST['kondisi'];
				$konstruksi			= $_POST['konstruksi'];
				$panjang 			= $_POST['panjang'];
				$lebar 				= $_POST['lebar'];
				$luas_tanah 		= $_POST['luas_tanah'];
				$alamat 				= $_POST['alamat'];
				$tanggal_dokumen 	= $_POST['tanggal_dokumen'];
				$no_dokumen 		= $_POST['no_dokumen'];
				$status_tanah 		= $_POST['status_tanah'];
				$no_tanah 			= $_POST['no_tanah'];
				$asal_usul 			= $_POST['asal_usul'];
				$harga 				= empty($_POST['harga'])? '0' : $_POST['harga'];
				$keterangan 		= $_POST['keterangan'];
				$id					= $_POST['id'];

				$jalan->updateData($kode_barang, $kode_bidang, $jenis_barang, $register, $kondisi, $konstruksi, $panjang, $lebar, 
					$luas_tanah, $alamat, $tanggal_dokumen, $no_dokumen, $status_tanah, $no_tanah, $asal_usul, $harga, $keterangan, $id);

				header("location:".ROOT."inventaris?tab=jalan&act=upd");
			}
		}

		if($model == 'jalan' AND $method == 'hapus') {
			$id = filter_var($_POST['id'],FILTER_VALIDATE_INT);
			$jalan->deleteData($id);

			header("location:".ROOT."inventaris?tab=jalan&act=del");
		}

	endif;
?>
