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

		if($model == 'peralatan' AND $method == 'tambah') {
			if(isset($_POST['tambah'])) {
				// Inisiasi variable
				$foto				= '';

				$kode_barang			= $_POST['kode_barang'];

				if (empty($kode_barang)) {
					header("location:".ROOT."input?tab=peralatan&act=err");
				} else {
					$kode_bidang		= substr($kode_barang, 2, 2);
					$jb					= $data_barang->getNamaBarangByKB($kode_barang);
					$jenis_barang		= $jb['nama_barang'];
					$register			= $_POST['register'];
					$merek				= $_POST['merek'];
					$ukuran				= $_POST['ukuran'];
					$bahan				= $_POST['bahan'];
					$tanggal_beli 		= $_POST['tanggal_beli'];
					$no_pabrik 			= $_POST['no_pabrik'];
					$no_rangka 			= $_POST['no_rangka'];
					$no_mesin 			= $_POST['no_mesin'];
					$no_polisi 			= $_POST['no_polisi'];
					$no_bpkb 			= $_POST['no_bpkb'];
					$asal_usul 			= $_POST['asal_usul'];
					$harga 				= empty($_POST['harga'])? '0' : $_POST['harga'];
					$keterangan 		= $_POST['keterangan'];

					if($_FILES['foto']['tmp_name'] != "") {
						$foto = $libs->uploadFile('../upload/images/',$_FILES['foto']);
					}

					$peralatan->insertData($kode_barang, $kode_bidang, $jenis_barang, $register, $merek, $ukuran, $bahan, $tanggal_beli, 
						$no_pabrik, $no_rangka, $no_mesin, $no_polisi, $no_bpkb, $asal_usul, $harga, $keterangan, $foto);

					header("location:".ROOT."inventaris?tab=peralatan&act=add");
				}
			}
		}

		if($model == 'peralatan' AND $method == 'edit') {
			if(isset($_POST['edit'])) {
				$kode_barang		= $_POST['kode_barang'];
				$kode_bidang		= substr($kode_barang, 2, 2);
				$jb					= $data_barang->getNamaBarangByKB($kode_barang);
				$jenis_barang		= $jb['nama_barang'];
				$register			= $_POST['register'];
				$merek				= $_POST['merek'];
				$ukuran				= $_POST['ukuran'];
				$bahan				= $_POST['bahan'];
				$tanggal_beli 		= $_POST['tanggal_beli'];
				$no_pabrik 			= $_POST['no_pabrik'];
				$no_rangka 			= $_POST['no_rangka'];
				$no_mesin 			= $_POST['no_mesin'];
				$no_polisi 			= $_POST['no_polisi'];
				$no_bpkb 			= $_POST['no_bpkb'];
				$asal_usul 			= $_POST['asal_usul'];
				$harga 				= empty($_POST['harga'])? '0' : $_POST['harga'];
				$keterangan 		= $_POST['keterangan'];
				$foto 				= $_POST['efoto'];
				$id					= $_POST['id'];

				if($_FILES['foto']['tmp_name'] != "") {
					$libs->deleteFile("../upload/images/",$foto);
					$foto = $libs->uploadFile('../upload/images/',$_FILES['foto']);
				}

				$peralatan->updateData($kode_barang, $kode_bidang, $jenis_barang, $register, $merek, $ukuran, $bahan, $tanggal_beli, 
					$no_pabrik, $no_rangka, $no_mesin, $no_polisi, $no_bpkb, $asal_usul, $harga, $keterangan, $foto, $id);

				header("location:".ROOT."inventaris?tab=peralatan&act=upd");
			}
		}

		if($model == 'peralatan' AND $method == 'hapus') {
			$id = filter_var($_POST['id'],FILTER_VALIDATE_INT);
			$data = $peralatan->getDataById($id);
			$libs->deleteFile("../upload/images/",$data['foto']);

			$peralatan->deleteData($id);

			header("location:".ROOT."inventaris?tab=peralatan&act=del");
		}

	endif;
?>
