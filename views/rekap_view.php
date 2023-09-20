<?php
	if(isset($method)):
		date_default_timezone_set('Asia/Makassar');
		$aksi = ROOT."controllers/rekap_control.php?model=rekap&method=";

		switch($method) {
			default:
				include "404.php";
				break;

			case '':

				// TANAH
				$jml_brg_0101 = $tanah->countData();
				$jml_hrg_0101 = "0";
				$data_0101 = $tanah->getDataLengkap();
				foreach ($data_0101 as $data_0101) { $jml_hrg_0101 += $data_0101['harga']; }

				// PERALATAN DAN MESIN
				$jml_brg_0200 = $peralatan->countData();
				$jml_hrg_0200 = "0";
				$data_0200 = $peralatan->getDataLengkap();
				foreach ($data_0200 as $data_0200) { $jml_hrg_0200 += $data_0200['harga']; }

				// alat besar
				$jml_brg_0202 = $peralatan->countDataByKB("02");
				$jml_hrg_0202 = "0";
				$data_0202 = $peralatan->getDataByKB("02");
				foreach ($data_0202 as $data_0202) { $jml_hrg_0202 += $data_0202['harga']; }

				// alat angkutan
				$jml_brg_0203 = $peralatan->countDataByKB("03");
				$jml_hrg_0203 = "0";
				$data_0203 = $peralatan->getDataByKB("03");
				foreach ($data_0203 as $data_0203) { $jml_hrg_0203 += $data_0203['harga']; }

				// alat bengkel dan alat ukur
				$jml_brg_0204 = $peralatan->countDataByKB("04");
				$jml_hrg_0204 = "0";
				$data_0204 = $peralatan->getDataByKB("04");
				foreach ($data_0204 as $data_0204) { $jml_hrg_0204 += $data_0204['harga']; }

				// alat pertanian/peternakan
				$jml_brg_0205 = $peralatan->countDataByKB("05");
				$jml_hrg_0205 = "0";
				$data_0205 = $peralatan->getDataByKB("05");
				foreach ($data_0205 as $data_0205) { $jml_hrg_0205 += $data_0205['harga']; }

				// alat kantor dan rumah tangga
				$jml_brg_0206 = $peralatan->countDataByKB("06");
				$jml_hrg_0206 = "0";
				$data_0206 = $peralatan->getDataByKB("06");
				foreach ($data_0206 as $data_0206) { $jml_hrg_0206 += $data_0206['harga']; }

				// alat studio dan komunikasi
				$jml_brg_0207 = $peralatan->countDataByKB("07");
				$jml_hrg_0207 = "0";
				$data_0207 = $peralatan->getDataByKB("07");
				foreach ($data_0207 as $data_0207) { $jml_hrg_0207 += $data_0207['harga']; }

				// alat kedokteran
				$jml_brg_0208 = $peralatan->countDataByKB("08");
				$jml_hrg_0208 = "0";
				$data_0208 = $peralatan->getDataByKB("08");
				foreach ($data_0208 as $data_0208) { $jml_hrg_0208 += $data_0208['harga']; }

				// alat laboratorium
				$jml_brg_0209 = $peralatan->countDataByKB("09");
				$jml_hrg_0209 = "0";
				$data_0209 = $peralatan->getDataByKB("09");
				foreach ($data_0209 as $data_0209) { $jml_hrg_0209 += $data_0209['harga']; }

				// alat keamanan
				$jml_brg_0210 = $peralatan->countDataByKB("10");
				$jml_hrg_0210 = "0";
				$data_0210 = $peralatan->getDataByKB("10");
				foreach ($data_0210 as $data_0210) { $jml_hrg_0210 += $data_0210['harga']; }

				// GEDUNG DAN BANGUNAN
				$jml_brg_0300 = $gedung->countData();
				$jml_hrg_0300 = "0";
				$data_0300 = $gedung->getDataLengkap();
				foreach ($data_0300 as $data_0300) { $jml_hrg_0300 += $data_0300['harga']; }

				// bangunan gedung
				$jml_brg_0311 = $gedung->countDataByKB("11");
				$jml_hrg_0311 = "0";
				$data_0311 = $gedung->getDataByKB("11");
				foreach ($data_0311 as $data_0311) { $jml_hrg_0311 += $data_0311['harga']; }

				// bangunan monumen
				$jml_brg_0312 = $gedung->countDataByKB("12");
				$jml_hrg_0312 = "0";
				$data_0312 = $gedung->getDataByKB("12");
				foreach ($data_0312 as $data_0312) { $jml_hrg_0312 += $data_0312['harga']; }

				// JALAN, IRIGASI, DAN JARINGAN
				$jml_brg_0400 = $jalan->countData();
				$jml_hrg_0400 = "0";
				$data_0400 = $jalan->getDataLengkap();
				foreach ($data_0400 as $data_0400) { $jml_hrg_0400 += $data_0400['harga']; }

				// jalan dan jembatan
				$jml_brg_0413 = $jalan->countDataByKB("13");
				$jml_hrg_0413 = "0";
				$data_0413 = $jalan->getDataByKB("13");
				foreach ($data_0413 as $data_0413) { $jml_hrg_0413 += $data_0413['harga']; }

				// bangunan air/irigasi
				$jml_brg_0414 = $jalan->countDataByKB("14");
				$jml_hrg_0414 = "0";
				$data_0414 = $jalan->getDataByKB("14");
				foreach ($data_0414 as $data_0414) { $jml_hrg_0414 += $data_0414['harga']; }

				// instalasi
				$jml_brg_0415 = $jalan->countDataByKB("15");
				$jml_hrg_0415 = "0";
				$data_0415 = $jalan->getDataByKB("15");
				foreach ($data_0415 as $data_0415) { $jml_hrg_0415 += $data_0415['harga']; }

				// jaringan
				$jml_brg_0416 = $jalan->countDataByKB("16");
				$jml_hrg_0416 = "0";
				$data_0416 = $jalan->getDataByKB("16");
				foreach ($data_0416 as $data_0416) { $jml_hrg_0416 += $data_0416['harga']; }

				// ASET TETAP LAINNYA
				$jml_brg_0500 = $asetlain->countData();
				$jml_hrg_0500 = "0";
				$data_0500 = $asetlain->getDataLengkap();
				foreach ($data_0500 as $data_0500) { $jml_hrg_0500 += $data_0500['harga']; }

				// buku perpustakaan
				$jml_brg_0517 = $asetlain->countDataByKB("17");
				$jml_hrg_0517 = "0";
				$data_0517 = $asetlain->getDataByKB("17");
				foreach ($data_0517 as $data_0517) { $jml_hrg_0517 += $data_0517['harga']; }

				// barang bercorak kesenian
				$jml_brg_0518 = $asetlain->countDataByKB("18");
				$jml_hrg_0518 = "0";
				$data_0518 = $asetlain->getDataByKB("18");
				foreach ($data_0518 as $data_0518) { $jml_hrg_0518 += $data_0518['harga']; }

				// hewan ternak dan tanaman
				$jml_brg_0519 = $asetlain->countDataByKB("19");
				$jml_hrg_0519 = "0";
				$data_0519 = $asetlain->getDataByKB("19");
				foreach ($data_0519 as $data_0519) { $jml_hrg_0519 += $data_0519['harga']; }

				// KONSTRUKSI DALAM PENGERJAAN
				$jml_brg_0600 = $konstruksi->countData();
				$jml_hrg_0600 = "0";
				$data_0600 = $konstruksi->getDataLengkap();
				foreach ($data_0600 as $data_0600) { $jml_hrg_0600 += $data_0600['harga']; }

				$jml_brg_total = $jml_brg_0101 + $jml_brg_0200 + $jml_brg_0300 + $jml_brg_0400 + $jml_brg_0500 + $jml_brg_0600;
				$jml_hrg_total = $jml_hrg_0101 + $jml_hrg_0200 + $jml_hrg_0300 + $jml_hrg_0400 + $jml_hrg_0500 + $jml_hrg_0600;

				echo '

					<div class="content-header">
						<h2 class="content-header-title">Rekap Data</h2>
					</div> <!-- /.content-header -->
				';

				if (isset($_GET['act'])) {
					$libs->notifikasi($_GET['act']);
				}

				echo '

					<div class="row">
						<div class="col-md-10">
							<h3>#INV-038273 <small class="pull-right">'.$libs->tgl_indo(date('Y-m-d')).'</small></h3>
							<br/><br/><br/>
							<h3>Rekap Data Laporan Desa</h3>
							<br/>

							<table>
								<thead class="bold">
									<tr>
										<th class="center head" style="width: 40px;">NO. URUT</th>
										<th class="center head" style="width: 60px;">GOLONGAN</th>
										<th class="center head" style="width: 50px;">KODE<br/>BIDANG<br/>BARANG</th>
										<th class="center head" style="width: 300px;">NAMA BIDANG BARANG</th>
										<th class="center head" style="width: 60px;">JUMLAH<br/>BARANG</th>
										<th class="center head" style="width: 60px;">SATUAN</th>
										<th class="center head" style="width: 150px;">JUMLAH HARGA</th>
										<th class="center head" style="width: 150px;">TOTAL</th>
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
										<td class="center bold">'.$jml_brg_0101.'</td> <td class="center bold">M2</td>
										<td class="curr bold">Rp'.number_format($jml_hrg_0101, 0, ',', '.').',-</td> <td class="curr bold">Rp000,-</td>
									</tr>
									<tr>
										<td class="center bold">2</td> <td class="center bold">02</td> <td></td>
										<td class="bold">PERALATAN DAN MESIN</td>
										<td class="center bold">'.$jml_brg_0200.'</td> <td></td>
										<td class="curr bold">Rp'.number_format($jml_hrg_0200, 0, ',', '.').',-</td> <td class="curr bold">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">02</td>
										<td class="items">a.&nbsp;&nbsp;&nbsp;Alat-Alat Besar</td>
										<td class="center">'.$jml_brg_0202.'</td> <td class="center">Buah</td>
										<td class="curr">Rp'.number_format($jml_hrg_0202, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">03</td>
										<td class="items">b.&nbsp;&nbsp;&nbsp;Alat-Alat Angkutan</td>
										<td class="center">'.$jml_brg_0203.'</td> <td class="center">Unit</td>
										<td class="curr">Rp'.number_format($jml_hrg_0203, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">04</td>
										<td class="items">c.&nbsp;&nbsp;&nbsp;Alat-Alat Bengkel dan Alat Ukur</td>
										<td class="center">'.$jml_brg_0204.'</td> <td class="center">Buah</td>
										<td class="curr">Rp'.number_format($jml_hrg_0204, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">05</td>
										<td class="items">d.&nbsp;&nbsp;&nbsp;Alat-Alat Pertanian/Peternakan</td>
										<td class="center">'.$jml_brg_0205.'</td> <td class="center">Buah</td>
										<td class="curr">Rp'.number_format($jml_hrg_0205, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">06</td>
										<td class="items">e.&nbsp;&nbsp;&nbsp;Alat-Alat Kantor dan Rumah Tangga</td>
										<td class="center">'.$jml_brg_0206.'</td> <td class="center">Buah</td>
										<td class="curr">Rp'.number_format($jml_hrg_0206, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">07</td>
										<td class="items">f.&nbsp;&nbsp;&nbsp;Alat-Alat Studio dan Komunikasi</td>
										<td class="center">'.$jml_brg_0207.'</td> <td class="center">Buah</td>
										<td class="curr">Rp'.number_format($jml_hrg_0207, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">08</td>
										<td class="items">g.&nbsp;&nbsp;&nbsp;Alat-Alat Kedokteran</td>
										<td class="center">'.$jml_brg_0208.'</td> <td class="center">Buah</td>
										<td class="curr">Rp'.number_format($jml_hrg_0208, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">09</td>
										<td class="items">h.&nbsp;&nbsp;&nbsp;Alat-Alat Laboratorium</td>
										<td class="center">'.$jml_brg_0209.'</td> <td class="center">Buah</td>
										<td class="curr">Rp'.number_format($jml_hrg_0209, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">10</td>
										<td class="items">i.&nbsp;&nbsp;&nbsp;Alat-Alat Keamanan</td>
										<td class="center">'.$jml_brg_0210.'</td> <td class="center">Buah</td>
										<td class="curr">Rp'.number_format($jml_hrg_0210, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td class="center bold">3</td> <td class="center bold">03</td> <td></td>
										<td class="bold">GEDUNG DAN BANGUNAN</td>
										<td class="center bold">'.$jml_brg_0300.'</td> <td></td>
										<td class="curr bold">Rp'.number_format($jml_hrg_0300, 0, ',', '.').',-</td> <td class="curr bold">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">11</td>
										<td class="items">a.&nbsp;&nbsp;&nbsp;Bangunan Gedung</td>
										<td class="center">'.$jml_brg_0311.'</td> <td class="center">M2</td>
										<td class="curr">Rp'.number_format($jml_hrg_0311, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">12</td>
										<td class="items">b.&nbsp;&nbsp;&nbsp;Bangunan Monumen</td>
										<td class="center">'.$jml_brg_0312.'</td> <td class="center">M2</td>
										<td class="curr">Rp'.number_format($jml_hrg_0312, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td class="center bold">4</td> <td class="center bold">04</td> <td></td>
										<td class="bold">JALAN, IRIGASI, DAN JARINGAN</td>
										<td class="center bold">'.$jml_brg_0400.'</td> <td></td>
										<td class="curr bold">Rp'.number_format($jml_hrg_0400, 0, ',', '.').',-</td> <td class="curr bold">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">13</td>
										<td class="items">a.&nbsp;&nbsp;&nbsp;Jalan dan Jembatan</td>
										<td class="center">'.$jml_brg_0413.'</td> <td class="center">M</td>
										<td class="curr">Rp'.number_format($jml_hrg_0413, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">14</td>
										<td class="items">b.&nbsp;&nbsp;&nbsp;Bangunan Air/Irigasi</td>
										<td class="center">'.$jml_brg_0414.'</td> <td class="center">M2</td>
										<td class="curr">Rp'.number_format($jml_hrg_0414, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">15</td>
										<td class="items">c.&nbsp;&nbsp;&nbsp;Instalasi</td>
										<td class="center">'.$jml_brg_0415.'</td> <td class="center">M</td>
										<td class="curr">Rp'.number_format($jml_hrg_0415, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">16</td>
										<td class="items">d.&nbsp;&nbsp;&nbsp;Jaringan</td>
										<td class="center">'.$jml_brg_0416.'</td> <td class="center">M</td>
										<td class="curr">Rp'.number_format($jml_hrg_0416, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td class="center bold">5</td> <td class="center bold">05</td> <td></td>
										<td class="bold">ASET TETAP LAINNYA</td>
										<td class="center bold">'.$jml_brg_0500.'</td> <td></td>
										<td class="curr bold">Rp'.number_format($jml_hrg_0500, 0, ',', '.').',-</td> <td class="curr bold">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">17</td>
										<td class="items">a.&nbsp;&nbsp;&nbsp;Buku Perpustakaan</td>
										<td class="center">'.$jml_brg_0517.'</td> <td class="center">Buah</td>
										<td class="curr">Rp'.number_format($jml_hrg_0517, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">18</td>
										<td class="items">b.&nbsp;&nbsp;&nbsp;Barang Bercorak Kesenian</td>
										<td class="center">'.$jml_brg_0518.'</td> <td class="center">Buah</td>
										<td class="curr">Rp'.number_format($jml_hrg_0518, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td></td> <td></td> <td class="center">19</td>
										<td class="items">c.&nbsp;&nbsp;&nbsp;Hewan Ternak dan Tanaman</td>
										<td class="center">'.$jml_brg_0519.'</td> <td class="center">Ekor</td>
										<td class="curr">Rp'.number_format($jml_hrg_0519, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
									<tr>
										<td class="center bold">6</td> <td class="center bold">06</td> <td></td>
										<td class="bold">KONSTRUKSI DALAM PENGERJAAN</td>
										<td class="center bold">'.$jml_brg_0600.'</td> <td class="center bold">M2</td>
										<td class="curr bold">Rp'.number_format($jml_hrg_0600, 0, ',', '.').',-</td> <td class="curr bold">Rp000,-</td>
									</tr>
								</tbody>
								<tfoot class="bold">
									<tr>
										<td></td> <td></td> <td></td>
										<td>JUMLAH</td> <td class="center">'.$jml_brg_total.'</td> <td></td>
										<td class="curr">Rp'.number_format($jml_hrg_total, 0, ',', '.').',-</td> <td class="curr">Rp000,-</td>
									</tr>
								</tfoot>
							</table>

							<br/><br/>
							<h4>Laporan Rekap Desa</h4>
							<hr/>
							<div class="list-group">
								<a href="javascript:;" class="list-group-item">
									<i class="fa fa-envelope"></i> 
									&nbsp;&nbsp;<strong>Kirim</strong> Rekapitulasi
								</a>
								<a href="javascript:;" class="list-group-item">
									<i class="fa fa-print"></i>
									&nbsp;&nbsp;<strong>Print</strong> Rekapitulasi
								</a>
								<a href="javascript:;" class="list-group-item">
									<i class="fa fa-copy"></i>
									&nbsp;&nbsp;<strong>Simpan</strong> Rekapitulasi
								</a>
								<a href="javascript:;" class="list-group-item">
									<i class="fa fa-times"></i>
									&nbsp;&nbsp;<strong>Hapus</strong> Rekapitulasi
								</a>
							</div>
							<br/>
						</div> <!-- /.col -->

						<div class="col-md-2 col-sidebar-right">
							<p><a href="javascript:;" class="btn btn-jumbo btn-primary btn-block">Print <br /></a></p>
							<p><a href="javascript:;" class="btn btn-lg btn-tertiary btn-block">Kirim </a></p>
						</div> <!-- /.col -->
					</div> <!-- /.row -->

				';
				break;
		}
?>

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

<script type="text/javascript">
	$(function() {
		var notif = document.getElementById("notif_kirim");
		if (notif) {
			email = "<?php echo isset($_GET['email'])? $_GET['email'] : ''; ?>";
			notif.innerHTML = "File Berhasil Dikirim ke E-mail: " + email;
		}
	});
</script>

<?php endif; ?>
