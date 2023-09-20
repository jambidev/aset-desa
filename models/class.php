<?php 
	ob_start();
	require_once("connect/database.php");
	function autoload($class){
		$namafile = $class.'.php';
		include_once $namafile;
	}

	spl_autoload_register('autoload');

	try {
		$data_barang	= new data_barang_model($db);
		$tanah			= new data_tanah_model($db);
		$peralatan   	= new data_peralatan_model($db);
		$gedung			= new data_gedung_model($db);
		$jalan			= new data_jalan_model($db);
		$asetlain		= new data_asetlain_model($db);
		$konstruksi		= new data_konstruksi_model($db);
		$libs				= new libs_model($db);
		$user				= new user_model($db);
		$pengaturan		= new pengaturan_model($db);
	} catch(Exception $e) {
		echo "Menemukan kesalahan: ".$e->getMessage()."\n";
	}
?>
