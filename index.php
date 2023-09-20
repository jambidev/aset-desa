<?php
	session_start();
	require "models/class.php";
	include "libs/path.php";
	include "libs/init.php";

	$url = isset($_GET['p']) ? $_GET['p'] : null;
	$url = rtrim($url, '/');
	$url = filter_var($url, FILTER_SANITIZE_URL);
	$url = explode('/', $url);

	#config dasar
	$model    = $url[0];
	$method   = !empty($url[1])?$url[1]:'';
	$parameter  = !empty($url[2])?$url[2]:null;

	if (!isset($_SESSION['login'])) {
		header("location:".ROOT."login");
	}

	$desa = $pengaturan->getDataById(1);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<link rel="shortcut icon" href="<?php echo ROOT; ?>favicon.png" />
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/fonts/OpenSans-Regular.ttf">
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/fonts/Oswald-Regular.ttf">
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/css/bootstrap.min.css">

		<!-- Plugin CSS -->
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/js/plugins/icheck/skins/minimal/blue.css">
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/js/plugins/select2/select2.css">
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/js/plugins/datepicker/datepicker.css">
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/js/plugins/fileupload/bootstrap-fileupload.css">
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/css/demos/ui-notifications.css">

		<!-- App CSS -->
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/css/target-admin.css">
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/css/custom.css">
		<link rel="stylesheet" href="<?php echo ROOT; ?>assets/css/laporan.css">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery -->
		<script src="<?php echo ROOT; ?>assets/js/libs/jquery-1.10.1.min.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/libs/bootstrap.min.js"></script>

		<!--[if lt IE 9]>
			<script src="./js/libs/excanvas.compiled.js"></script>
		<![endif]-->

		<!-- Plugin JS -->
		<script src="<?php echo ROOT; ?>assets/js/plugins/icheck/jquery.icheck.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/plugins/select2/select2.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/libs/raphael-2.1.2.min.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/plugins/morris/morris.min.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
		<script id="c-dp" src="<?php echo ROOT; ?>assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/plugins/timepicker/bootstrap-timepicker.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/plugins/simplecolorpicker/jquery.simplecolorpicker.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/plugins/autosize/jquery.autosize.min.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/plugins/textarea-counter/jquery.textarea-counter.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/plugins/fileupload/bootstrap-fileupload.js"></script>
		<!-- <script src="assets/js/plugins/howl/howl.js"></script> -->

		<!-- App JS -->
		<script id="c-ta" src="<?php echo ROOT; ?>assets/js/target-admin.js"></script>

		<!-- Plugin JS -->
		<script src="<?php echo ROOT; ?>assets/js/demos/dashboard.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/demos/ui-notifications.js"></script>
		<script id="c-fe" src="<?php echo ROOT; ?>assets/js/demos/form-extended.js"></script>
		<script src="<?php echo ROOT; ?>assets/js/statistik.js"></script>

		<!-- Script for AJAX -->
		<script src="<?php echo ROOT; ?>assets/js/edit-ajax.js"></script>
		<script id="c-jbs" src="<?php echo ROOT; ?>assets/js/jenis-barang-selector.js"></script>

	</head>
	<body>

<?php
	include "components/header.php";
	include "components/navbar.php";
?>

		<div class="container">
			<div class="content">
				<div class="content-container">

<?php
	switch ($model) {
		default:
			$model_name = "Halaman Error";
			include "views/404.php";
			break;

		case '':
			$model_name = "Beranda";
			include "views/home_view.php";
			break;

		case 'input':
			$model_name = "Input";
			include "views/input_view.php";
			break;

		case 'inventaris':
			$model_name = "Inventaris";
			include "views/inventaris_view.php";
			break;

		case 'penyusutan':
			$model_name = "Penyusutan";
			include "views/penyusutan_view.php";
			break;

		case 'ekstra':
			$model_name = "Aset Ekstra";
			include "views/ekstra_view.php";
			break;

		case 'neraca':
			$model_name = "Neraca";
			include "views/neraca_view.php";
			break;

		case 'rekap':
			$model_name = "Rekap";
			include "views/rekap_view.php";
			break;

		case 'kirim':
			$model_name = "Kirim";
			include "views/kirim_view.php";
			break;

		case 'profile':
			$model_name = "Profil Admin";
			include "views/profile_view.php";
			break;

		case 'pengaturan':
			$model_name = "Pengaturan Desa";
			include "views/pengaturan_view.php";
			break;

		case 'logout':
			include "login/logout.php";
			break;
	}
?>

				</div> <!-- /.content-container -->
			</div> <!-- /.content -->
		</div> <!-- /.container -->
		<title><?php echo $model_name; ?> - Aset Desa</title>

<?php
	if ($model == 'inventaris') {
		echo '

		<div id="edit-data" class="modal modal-styled fade">
			<div class="modal-dialog" style="width: 750px;">
				<div id="edit-ajax" class="modal-content">
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		';
	}

	include "components/footer.php";
?>

		<script type='text/javascript'> 
			function hapusData(tab, id) {
				var conBox = confirm("Anda yakin ingin menghapus data ini?");
				if (conBox){
					switch (tab) {
						case "tanah":
							document.getElementById("hapustanahId").value = id;
							document.getElementById("hapustanahSubmit").submit();
							break;

						case "peralatan":
							document.getElementById("hapusperalatanId").value = id;
							document.getElementById("hapusperalatanSubmit").submit();
							break;

						case "gedung":
							document.getElementById("hapusgedungId").value = id;
							document.getElementById("hapusgedungSubmit").submit();
							break;

						case "jalan":
							document.getElementById("hapusjalanId").value = id;
							document.getElementById("hapusjalanSubmit").submit();
							break;

						case "asetlain":
							document.getElementById("hapusasetlainId").value = id;
							document.getElementById("hapusasetlainSubmit").submit();
							break;

						case "konstruksi":
							document.getElementById("hapuskonstruksiId").value = id;
							document.getElementById("hapuskonstruksiSubmit").submit();
							break;
					}
				} else {
					return false;
				}
			};
		</script>

	</body>
</html>
