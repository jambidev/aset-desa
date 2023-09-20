<?php
	session_start();
	if(isset($_GET['model'])): // for secure
		ob_start();
		date_default_timezone_set('Asia/Makassar');
		require "../libs/path.php";

		$model = $_GET['model'];
		$method = $_GET['method'];
		$model;

		if($model == 'rekap' AND $method == 'printpdf') {
			require_once("../assets/tools/dompdf/dompdf_config.inc.php");
			ob_start();
			$pdf_content = '

<!DOCTYPE html>
<html>
<head>
	<title>Rekap Data</title>
	<style type="text/css">
		@page { margin: 1.8cm; margin-right: 2.5cm; }
		table, th, td { border: 1px solid; border-collapse: collapse; font-size: 12px; }
		th { font-family: "Trebuchet MS", sans-serif; padding: 5px; }
		td { border-top: none; border-bottom: none; padding-top: 5px; padding-left: 5px; padding-right: 5px; }
		tfoot { border: 1px solid; padding-bottom: 5px; }
		.head { height: 25px; background-color: rgb(170, 170, 170); }
		.sub-heading { font-size: 10px; background-color: rgb(222, 222, 222); }
		.center { text-align: center; }
		.bold { font-weight: 700 }
		.curr { text-align: right; padding-right: 10px; }
		.items { padding-left: 20px; }
	</style>
</head>
<body>
	<table class="table">
		<thead class="bold">
			<tr>
				<th class="center head" style="width: 40px;">NO. URUT</th>
				<th class="center head" style="width: 60px;">GOLONGAN</th>
				<th class="center head" style="width: 50px;">KODE<br/>BIDANG<br/>BARANG</th>
				<th class="center head" style="width: 250px;">NAMA BIDANG BARANG</th>
				<th class="center head" style="width: 60px;">JUMLAH<br/>BARANG</th>
				<th class="center head" style="width: 60px;">SATUAN</th>
				<th class="center head" style="width: 120px;">JUMLAH HARGA</th>
				<th class="center head" style="width: 120px;">TOTAL</th>
			</tr>
			<tr>
				<th class="center sub-heading">1</th> <th class="center sub-heading">2</th> <th class="center sub-heading">3</th>
				<th class="center sub-heading">4</th> <th class="center sub-heading">5</th>
				<th class="center sub-heading">6</th> <th class="center sub-heading">7</th> <th class="center sub-heading">8</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="center bold">1</td> <td class="center bold">01</td> <td class="center">01</td>
				<td class="bold">TANAH</td>
				<td class="center bold">00</td> <td class="center bold">M2</td>
				<td class="curr bold">Rp000,-</td> <td class="curr bold">Rp000,-</td>
			</tr>
			<tr>
				<td class="center bold">2</td> <td class="center bold">02</td> <td></td>
				<td class="bold">PERALATAN DAN MESIN</td>
				<td class="center bold">00</td> <td></td>
				<td class="curr bold">Rp000,-</td> <td class="curr bold">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">02</td>
				<td class="items">a.&nbsp;&nbsp;&nbsp;Alat-Alat Besar</td>
				<td class="center">00</td> <td class="center">Buah</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">03</td>
				<td class="items">b.&nbsp;&nbsp;&nbsp;Alat-Alat Angkutan</td>
				<td class="center">00</td> <td class="center">Unit</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">04</td>
				<td class="items">c.&nbsp;&nbsp;&nbsp;Alat-Alat Bengkel dan Alat Ukur</td>
				<td class="center">00</td> <td class="center">Buah</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">05</td>
				<td class="items">d.&nbsp;&nbsp;&nbsp;Alat-Alat Pertanian/Peternakan</td>
				<td class="center">00</td> <td class="center">Buah</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">06</td>
				<td class="items">e.&nbsp;&nbsp;&nbsp;Alat-Alat Kantor dan Rumah Tangga</td>
				<td class="center">00</td> <td class="center">Buah</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">07</td>
				<td class="items">f.&nbsp;&nbsp;&nbsp;Alat-Alat Studio dan Komunikasi</td>
				<td class="center">00</td> <td class="center">Buah</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">08</td>
				<td class="items">g.&nbsp;&nbsp;&nbsp;Alat-Alat Kedokteran</td>
				<td class="center">00</td> <td class="center">Buah</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">09</td>
				<td class="items">h.&nbsp;&nbsp;&nbsp;Alat-Alat Laboratorium</td>
				<td class="center">00</td> <td class="center">Buah</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">10</td>
				<td class="items">i.&nbsp;&nbsp;&nbsp;Alat-Alat Keamanan</td>
				<td class="center">00</td> <td class="center">Buah</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td class="center bold">3</td> <td class="center bold">03</td> <td></td>
				<td class="bold">GEDUNG DAN BANGUNAN</td>
				<td class="center bold">00</td> <td></td>
				<td class="curr bold">Rp000,-</td> <td class="curr bold">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">11</td>
				<td class="items">a.&nbsp;&nbsp;&nbsp;Bangunan Gedung</td>
				<td class="center">00</td> <td class="center">M2</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">12</td>
				<td class="items">b.&nbsp;&nbsp;&nbsp;Bangunan Monumen</td>
				<td class="center">00</td> <td class="center">M2</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td class="center bold">4</td> <td class="center bold">04</td> <td></td>
				<td class="bold">JALAN, IRIGASI, DAN JARINGAN</td>
				<td class="center bold">00</td> <td></td>
				<td class="curr bold">Rp000,-</td> <td class="curr bold">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">13</td>
				<td class="items">a.&nbsp;&nbsp;&nbsp;Jalan dan Jembatan</td>
				<td class="center">00</td> <td class="center">M</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">14</td>
				<td class="items">b.&nbsp;&nbsp;&nbsp;Bangunan Air/Irigasi</td>
				<td class="center">00</td> <td class="center">M2</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">15</td>
				<td class="items">c.&nbsp;&nbsp;&nbsp;Instalasi</td>
				<td class="center">00</td> <td class="center">M</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">16</td>
				<td class="items">d.&nbsp;&nbsp;&nbsp;Jaringan</td>
				<td class="center">00</td> <td class="center">M</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td class="center bold">5</td> <td class="center bold">05</td> <td></td>
				<td class="bold">ASET TETAP LAINNYA</td>
				<td class="center bold">00</td> <td></td>
				<td class="curr bold">Rp000,-</td> <td class="curr bold">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">17</td>
				<td class="items">a.&nbsp;&nbsp;&nbsp;Buku Perpustakaan</td>
				<td class="center">00</td> <td class="center">Buah</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">18</td>
				<td class="items">b.&nbsp;&nbsp;&nbsp;Barang Bercorak Kesenian</td>
				<td class="center">00</td> <td class="center">Buah</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td></td> <td></td> <td class="center">19</td>
				<td class="items">c.&nbsp;&nbsp;&nbsp;Hewan Ternak dan Tanaman</td>
				<td class="center">00</td> <td class="center">Ekor</td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
			<tr>
				<td class="center bold">6</td> <td class="center bold">06</td> <td></td>
				<td class="bold">KONSTRUKSI DALAM PENGERJAAN</td>
				<td class="center bold">00</td> <td class="center bold">M2</td>
				<td class="curr bold">Rp000,-</td> <td class="curr bold">Rp000,-</td>
			</tr>
		</tbody>
		<tfoot class="bold">
			<tr>
				<td></td> <td></td> <td></td>
				<td>JUMLAH</td> <td class="center">00</td> <td></td>
				<td class="curr">Rp000,-</td> <td class="curr">Rp000,-</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>

			';

			$html = ob_get_clean();
			$dompdf = new DOMPDF();
			$dompdf->load_html($pdf_content);
			$dompdf->set_paper('A4', 'landscape');
			$dompdf->render();
			$dompdf->stream("Rekap.pdf");
		}

	endif;
?>
