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

		if($model == 'pengaturan' AND $method == 'edit') {
			if(isset($_POST['edit'])) {
				$kode_lokasi	= $_POST['kode_lokasi'];
				$nama_kepala	= $_POST['nama_kepala'];
				$nama_pengguna	= $_POST['nama_pengguna'];
				$nama_pengurus	= $_POST['nama_pengurus'];
				$email			= $_POST['email'];
				$logo				= $_POST['elogo'];
				$id				= $_POST['id'];

				if($_FILES['logo']['tmp_name'] != "") {
						$libs->deleteFile("../assets/img/",$logo);
						$logo = $libs->uploadFile('../assets/img/',$_FILES['logo']);
					}

				$pengaturan->updateData($kode_lokasi, $nama_kepala, $nama_pengguna, $nama_pengurus, $email, $logo, $id);
				header("location:".ROOT."pengaturan?act=upd");
			}
		}

	endif;
?>
