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

		if($model == 'asetlain' AND $method == 'tambah') {
			if(isset($_POST['tambah'])) {
				// Inisiasi Value pada tiap input di Tab Jalur
				$judul_buku 			= '';
				$spesifikasi_buku 	= '';
				$asal_daerah 			= '';
				$pencipta_kesenian 	= '';
				$bahan_kesenian 		= '';
				$jenis 					= '';
				$ukuran 					= '';
				$foto 					= '';

				$kode_barang			= $_POST['kode_barang'];

				if (empty($kode_barang)) {
					header("location:".ROOT."input?tab=asetlain&act=err");
				} else {
					$kode_bidang		= substr($kode_barang, 2, 2);
					$jb					= $data_barang->getNamaBarangByKB($kode_barang);
					$jenis_barang		= $jb['nama_barang'];
					$register			= $_POST['register'];
					$jalur				= $_POST['jalur'];

					// Kondisional untuk Pemilihan Tab
					switch ($jalur) {
						case '1':
							$judul_buku				= $_POST['judul_buku'];
							$spesifikasi_buku		= $_POST['spesifikasi_buku'];
							break;
						
						case '2':
							$asal_daerah			= $_POST['asal_daerah'];
							$pencipta_kesenian	= $_POST['pencipta_kesenian'];
							$bahan_kesenian		= $_POST['bahan_kesenian'];
							break;

						case '3':
							$jenis 					= $_POST['jenis'];
							$ukuran 					= $_POST['ukuran'];
							break;
					}

					$jumlah 				= $_POST['jumlah'];
					$tanggal_cetak 	= $_POST['tanggal_cetak'];
					$asal_usul 			= $_POST['asal_usul'];
					$harga 				= empty($_POST['harga'])? '0' : $_POST['harga'];
					$keterangan 		= $_POST['keterangan'];

					// Upload Foto
					if($_FILES['foto']['tmp_name'] != "") {
						$foto = $libs->uploadFile('../upload/images/',$_FILES['foto']);
					}

					$asetlain->insertData($kode_barang, $kode_bidang, $jenis_barang, $register, $jalur, $judul_buku, $spesifikasi_buku, 
						$asal_daerah, $pencipta_kesenian, $bahan_kesenian, $jenis, $ukuran, $jumlah, $tanggal_cetak, $asal_usul, $harga, 
						$keterangan, $foto);

					header("location:".ROOT."inventaris?tab=asetlain&act=add");
				}
			}
		}

		if($model == 'asetlain' AND $method == 'edit') {
			if(isset($_POST['edit'])) {
				// Inisiasi Value pada tiap input di Tab Jalur
				$judul_buku 			= '';
				$spesifikasi_buku 	= '';
				$asal_daerah 			= '';
				$pencipta_kesenian 	= '';
				$bahan_kesenian 		= '';
				$jenis 					= '';
				$ukuran 					= '';

				$kode_barang		= $_POST['kode_barang'];
				$kode_bidang		= substr($kode_barang, 2, 2);
				$jb					= $data_barang->getNamaBarangByKB($kode_barang);
				$jenis_barang		= $jb['nama_barang'];
				$register			= $_POST['register'];
				$jalur				= $_POST['jalur'];

				// Kondisional untuk Pemilihan Tab
				switch ($jalur) {
					case '1':
						$judul_buku				= $_POST['judul_buku'];
						$spesifikasi_buku		= $_POST['spesifikasi_buku'];
						break;

					case '2':
						$asal_daerah			= $_POST['asal_daerah'];
						$pencipta_kesenian	= $_POST['pencipta_kesenian'];
						$bahan_kesenian		= $_POST['bahan_kesenian'];
						break;

					case '3':
						$jenis 					= $_POST['jenis'];
						$ukuran 					= $_POST['ukuran'];
						break;
				}

				$jumlah 				= $_POST['jumlah'];
				$tanggal_cetak 	= $_POST['tanggal_cetak'];
				$asal_usul 			= $_POST['asal_usul'];
				$harga 				= empty($_POST['harga'])? '0' : $_POST['harga'];
				$keterangan 		= $_POST['keterangan'];
				$foto 				= $_POST['efoto'];
				$id					= $_POST['id'];

				// Update Foto
				if($_FILES['foto']['tmp_name'] != "") {
					$libs->deleteFile("../upload/images/",$foto);
					$foto = $libs->uploadFile('../upload/images/',$_FILES['foto']);
				}

				$asetlain->updateData($kode_barang, $kode_bidang, $jenis_barang, $register, $jalur, $judul_buku, $spesifikasi_buku, 
					$asal_daerah, $pencipta_kesenian, $bahan_kesenian, $jenis, $ukuran, $jumlah, $tanggal_cetak, $asal_usul, $harga, 
					$keterangan, $foto, $id);

				header("location:".ROOT."inventaris?tab=asetlain&act=upd");
			}
		}

		if($model == 'asetlain' AND $method == 'hapus') {
			$id = filter_var($_POST['id'],FILTER_VALIDATE_INT);
			$data = $asetlain->getDataById($id);
			$libs->deleteFile("../upload/images/",$data['foto']);

			$asetlain->deleteData($id);

			header("location:".ROOT."inventaris?tab=asetlain&act=del");
		}

	endif;
?>
