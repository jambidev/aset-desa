<?php
	if(isset($method)):
		date_default_timezone_set('Asia/Makassar');
		$aksi_tanah = ROOT."controllers/data_tanah_control.php?model=tanah&method=";
		$aksi_peralatan = ROOT."controllers/data_peralatan_control.php?model=peralatan&method=";
		$aksi_gedung = ROOT."controllers/data_gedung_control.php?model=gedung&method=";
		$aksi_jalan = ROOT."controllers/data_jalan_control.php?model=jalan&method=";
		$aksi_asetlain = ROOT."controllers/data_asetlain_control.php?model=asetlain&method=";
		$aksi_konstruksi = ROOT."controllers/data_konstruksi_control.php?model=konstruksi&method=";

		$tanah_tab = (isset($_GET['tab']) AND $_GET['tab'] == "tanah")? 'active':'';
		$peralatan_tab = (isset($_GET['tab']) AND $_GET['tab'] == "peralatan")? 'active':'';
		$gedung_tab = (isset($_GET['tab']) AND $_GET['tab'] == "gedung")? 'active':'';
		$jalan_tab = (isset($_GET['tab']) AND $_GET['tab'] == "jalan")? 'active':'';
		$asetlain_tab = (isset($_GET['tab']) AND $_GET['tab'] == "asetlain")? 'active':'';
		$konstruksi_tab = (isset($_GET['tab']) AND $_GET['tab'] == "konstruksi")? 'active':'';

		if (!isset($_GET['tab'])) $tanah_tab = 'active';

		switch($method) {
			default:
				include "404.php";
				break;

			case '':
				echo '

					<div class="content-header">
						<h2 class="content-header-title">Laporan Inventaris</h2>
					</div> <!-- /.content-header -->
				';

				if (isset($_GET['act'])) {
					$libs->notifikasi($_GET['act']);
				}

				echo '

					<div class="row">
						<div class="col-md-12">
							<h4 class="heading">Tabel Rekapitulasi</h4>
							<ul id="myTab1" class="nav nav-tabs">
								<li class="'.$tanah_tab.'"><a href="#tanah" data-toggle="tab">Tanah</a></li>
								<li class="'.$peralatan_tab.'"><a href="#peralatan" data-toggle="tab">Peralatan dan Mesin</a></li>
								<li class="'.$gedung_tab.'"><a href="#gedung" data-toggle="tab">Gedung dan Bangunan</a></li>
								<li class="'.$jalan_tab.'"><a href="#jalan" data-toggle="tab">Jalan, Irigasi, dan Jaringan</a></li>
								<li class="'.$asetlain_tab.'"><a href="#asetlain" data-toggle="tab">Aset Tetap Lainnya</a></li>
								<li class="'.$konstruksi_tab.'"><a href="#konstruksi" data-toggle="tab">Konstruksi dalam Pengerjaan</a></li>
							</ul>

							<div id="myTab1Content" class="tab-content">
								<div class="tab-pane fade in '.$tanah_tab.'" id="tanah">
									<div class="tabellaporan"> <!--Tabel Laporan (tanah)-->
										<hr/>

										<form id="hapustanahSubmit" action="'.$aksi_tanah.'hapus" method="POST">
											<input type="hidden" id="hapustanahId" name="id" value="">
										</form>

										<table class="table table-bordered table-highlight">
											<thead>
												<tr>
													<th rowspan="3">No.</th>
													<th rowspan="3">Jenis/Nama Barang</th>
													<th colspan="2">Nomor</th>
													<th rowspan="3">Luas (m<sup>2</sup>)</th>
													<th rowspan="3" style="width: 100px;">Tahun Pengadaan</th>
													<th rowspan="3">Letak/Alamat</th>
													<th colspan="3">Status Tanah</th>
													<th rowspan="3">Penggunaan</th>
													<th rowspan="3">Asal-Usul</th>
													<th rowspan="3">Harga</th>
													<th rowspan="3">Keterangan</th>
													<th rowspan="3">Tindakan</th>
												</tr>
												<tr class="headingtable2">
													<th rowspan="2">Kode Barang</th>                       
													<th rowspan="2">Register</th>
													<th rowspan="2">Hak</th>
													<th colspan="2">Sertifikat</th>
												</tr>
												<tr class="headingtable2">
													<th style="width: 100px;">Tanggal</th>
													<th>Nomor</th>
												</tr>
												<tr class="headingtable3">
													<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td>
													<td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>&nbsp;</td>
												</tr>
											</thead>
											<tbody>
				';

				$i = 1;
				$total = 0;
				$data_tanah = $tanah->getDataLengkap();
				foreach ($data_tanah as $data_tanah) {
					echo '
												<tr>
													<td style="text-align: center;">'.$i.'</td>
													<td>'.$data_tanah['jenis_barang'].'</td>
													<td>'.$data_tanah['kode_barang'].'</td>
													<td>'.$data_tanah['register'].'</td>
													<td>'.$data_tanah['luas_tanah'].'</td>
													<td>'.$data_tanah['tanggal_beli'].'</td>
													<td>'.$data_tanah['alamat'].'</td>
													<td>'.$data_tanah['hak'].'</td>
													<td>'.$data_tanah['tanggal_sertifikat'].'</td>
													<td>'.$data_tanah['no_sertifikat'].'</td>
													<td>'.$data_tanah['penggunaan'].'</td>
													<td>'.$data_tanah['asal_usul'].'</td>
													<td>'.number_format($data_tanah['harga'], 0, ',', '.').',-</td>
													<td>'.$data_tanah['keterangan'].'</td>
													<td style="text-align: center;">
														<a data-toggle="modal" href="#edit-data" title="Edit" onclick="loadDoc(\'tanah\', \''.$data_tanah['id'].'\')"><i class="fa fa-edit"></i></a> | 
														<a href="#" title="Hapus" onclick="hapusData(\'tanah\', \''.$data_tanah['id'].'\')"><i class="fa fa-trash-o"></i></a>
													</td>
												</tr>
					';
					$i++;
					$total += $data_tanah['harga'];
				}

				echo '
												<tr class="jumlahtabel">
													<td colspan="12" style="text-align: center;">JUMLAH ASET TETAP (TANAH)</td>
													<td>'.number_format($total, 0, ',', '.').',-</td>
													<td></td><td></td>
												</tr>
											</tbody>
										</table>
									</div > <!--Tabel Laporan (Tanah)-->
								</div>

								<div class="tab-pane fade in '.$peralatan_tab.'" id="peralatan">
									<div class="tabellaporan "> <!--Tabel Laporan (Peralatan dan Mesin)-->
										<hr/>

										<form id="hapusperalatanSubmit" action="'.$aksi_peralatan.'hapus" method="POST">
											<input type="hidden" id="hapusperalatanId" name="id" value="">
										</form>

										<table class="table table-bordered table-highlight">
											<thead>
												<tr>
													<th rowspan="2">No.</th>
													<th rowspan="2">Kode Barang</th>
													<th rowspan="2">Jenis/Nama Barang</th>
													<th rowspan="2">No. Register</th>
													<th rowspan="2">Merek/Tipe</th>
													<th rowspan="2">Ukuran/CC</th>
													<th rowspan="2">Bahan</th>
													<th rowspan="2">Tahun Pembelian</th>
													<th colspan="5">Nomor</th>
													<th rowspan="2">Asal-Usul</th>
													<th rowspan="2">Harga</th>
													<th rowspan="2">Keterangan</th>
													<th rowspan="2">Jumlah Barang</th>
													<th rowspan="2">Tindakan</th>
												</tr>
												<tr class="headingtable2">
													<th>Pabrik</th>
													<th>Rangka</th>
													<th>Mesin</th>
													<th>Polisi</th>
													<th>BPKB</th>
												</tr>
												<tr class="headingtable3">
													<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
													<td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
											</thead>
											<tbody>
				';

				$i = 1;
				$total = 0;
				$data_peralatan = $peralatan->getDataLengkap();
				foreach ($data_peralatan as $data_peralatan) {
					echo '
												<tr>
													<td style="text-align: center;">'.$i.'</td>
													<td>'.$data_peralatan['kode_barang'].'</td>
													<td>'.$data_peralatan['jenis_barang'].'</td>
													<td>'.$data_peralatan['register'].'</td>
													<td>'.$data_peralatan['merek'].'</td>
													<td>'.$data_peralatan['ukuran'].'</td>
													<td>'.$data_peralatan['bahan'].'</td>
													<td>'.$data_peralatan['tanggal_beli'].'</td>
													<td>'.$data_peralatan['no_pabrik'].'</td>
													<td>'.$data_peralatan['no_rangka'].'</td>
													<td>'.$data_peralatan['no_mesin'].'</td>
													<td>'.$data_peralatan['no_polisi'].'</td>
													<td>'.$data_peralatan['no_bpkb'].'</td>
													<td>'.$data_peralatan['asal_usul'].'</td>
													<td>'.number_format($data_peralatan['harga'], 0, ',', '.').',-</td>
													<td>'.$data_peralatan['keterangan'].'</td>
													<td>&nbsp;</td>
													<td style="text-align: center;">
														<a data-toggle="modal" href="#edit-data" title="Edit" onclick="loadDoc(\'peralatan\', \''.$data_peralatan['id'].'\')"><i class="fa fa-edit"></i></a> | 
														<a href="#" title="Hapus" onclick="hapusData(\'peralatan\', \''.$data_peralatan['id'].'\')"><i class="fa fa-trash-o"></i></a>
													</td>
												</tr>
					';
					$i++;
					$total += $data_peralatan['harga'];
				}

				echo '

												<tr class="jumlahtabel">
													<td colspan="14" style="text-align: center;">JUMLAH TOTAL ASET TETAP (PERALATAN DAN MESIN)</td>
													<td>'.number_format($total, 0, ',', '.').',-</td>
													<td></td><td></td><td></td>
												</tr>
											</tbody>
										</table>
									</div> <!--Tabel Laporan (Peralatan dan Mesin)-->
								</div>

								<div class="tab-pane fade in '.$gedung_tab.'" id="gedung">
									<div class="tabellaporan "> <!--Tabel Laporan (Gedung dan Bangunan)-->
										<hr/>

										<form id="hapusgedungSubmit" action="'.$aksi_gedung.'hapus" method="POST">
											<input type="hidden" id="hapusgedungId" name="id" value="">
										</form>

										<table class="table table-bordered table-highlight">
											<thead>
												<tr>
													<th rowspan="2">No.</th>
													<th rowspan="2">Jenis/Nama Barang</th>
													<th colspan="2">Nomor</th>
													<th rowspan="2">Kondisi Bangunan</th>
													<th colspan="2">Konstruksi Bangunan</th>
													<th rowspan="2">Luas Lantai</th>
													<th rowspan="2">Alamat</th>
													<th colspan="2">Dokumen</th>
													<th rowspan="2">Luas (m<sup>2</sup>)</th>
													<th rowspan="2">Status Tanah</th>
													<th rowspan="2">No. Kode Tanah</th>
													<th rowspan="2">Asal-Usul</th>
													<th rowspan="2">Harga</th>
													<th rowspan="2">Keterangan</th>
													<th rowspan="2">Tindakan</th>
												</tr>
												<tr class="headingtable2">
													<th>Kode Barang</th>
													<th>Register</th>
													<th>Bertingkat/Tidak</th>
													<th>Beton/Tidak</th>
													<th style="width: 100px;">Tanggal</th>
													<th>Nomor</th>
												</tr>
												<tr class="headingtable3">
													<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
													<td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td>
													<td></td>
												</tr>
											</thead>
											<tbody>
				';

				$i = 1;
				$total = 0;
				$data_gedung = $gedung->getDataLengkap();
				foreach ($data_gedung as $data_gedung) {
					$kon = explode(", ", trim($data_gedung['konstruksi'], ", "));
					if (sizeof($kon) == 2) {
						$bertingkat = "Bertingkat";
						$beton = "Beton";
					} else if (sizeof($kon) == 1) {
						$bertingkat = $kon[0] == "Bertingkat"? "Bertingkat":"Tidak";
						$beton = $kon[0] == "Beton"? "Beton":"Tidak";
					} else {
						$bertingkat = "Tidak";
						$beton = "Tidak";
					}

					echo '
												<tr>
													<td style="text-align: center;">'.$i.'</td>
													<td>'.$data_gedung['jenis_barang'].'</td>
													<td>'.$data_gedung['kode_barang'].'</td>
													<td>'.$data_gedung['register'].'</td>
													<td>'.$data_gedung['kondisi'].'</td>
													<td>'.$bertingkat.'</td>
													<td>'.$beton.'</td>
													<td>'.$data_gedung['luas_lantai'].'</td>
													<td>'.$data_gedung['alamat'].'</td>
													<td>'.$data_gedung['tanggal_beli'].'</td>
													<td>'.$data_gedung['no_dokumen'].'</td>
													<td>'.$data_gedung['luas_lahan'].'</td>
													<td>'.$data_gedung['status_tanah'].'</td>
													<td>'.$data_gedung['no_sertifikat'].'</td>
													<td>'.$data_gedung['asal_usul'].'</td>
													<td>'.number_format($data_gedung['harga'], 0, ',', '.').',-</td>
													<td>'.$data_gedung['keterangan'].'</td>
													<td style="text-align: center;">
														<a data-toggle="modal" href="#edit-data" title="Edit" onclick="loadDoc(\'gedung\', \''.$data_gedung['id'].'\')"><i class="fa fa-edit"></i></a> | 
														<a href="#" title="Hapus" onclick="hapusData(\'gedung\', \''.$data_gedung['id'].'\')"><i class="fa fa-trash-o"></i></a>
													</td>
												</tr>
					';
					$i++;
					$total += $data_gedung['harga'];
				}

				echo '
												<tr class="jumlahtabel">
													<td colspan="15" style="text-align: center;">JUMLAH TOTAL ASET TETAP (Gedung dan Bangunan)</td>
													<td>'.number_format($total, 0, ',', '.').',-</td>
													<td></td><td></td>
												</tr>
											</tbody>
										</table>
									</div> <!--Tabel Laporan (Gedung dan Bangunan)-->
								</div>

								<div class="tab-pane fade in '.$jalan_tab.'" id="jalan">
									<div class="tabellaporan "> <!--Tabel Laporan (JALAN, IRIGASI DAN JARINGAN)-->
										<hr/>

										<form id="hapusjalanSubmit" action="'.$aksi_jalan.'hapus" method="POST">
											<input type="hidden" id="hapusjalanId" name="id" value="">
										</form>

										<table class="table table-bordered table-highlight">
											<thead>
												<tr>
													<th rowspan="2">No.</th>
													<th rowspan="2">Jenis/Nama Barang</th>
													<th colspan="2">Nomor</th>
													<th rowspan="2">Konstruksi</th>
													<th rowspan="2">Panjang</th>
													<th rowspan="2">Lebar</th>
													<th rowspan="2">Luas</th>
													<th rowspan="2">Lokasi</th>
													<th colspan="2">Dokumen</th>
													<th rowspan="2">Status Tanah</th>
													<th rowspan="2">No. Kode Tanah</th>
													<th rowspan="2">Asal-Usul</th>
													<th rowspan="2">Kondisi</th>
													<th rowspan="2">Harga</th>
													<th rowspan="2">Keterangan</th>
													<th rowspan="2">Tindakan</th>
												</tr>
												<tr class="headingtable2">
													<th>Kode Barang</th>
													<th>Register</th>
													<th style="width: 100px;">Tanggal</th>
													<th>Nomor</th>
												</tr>
												<tr class="headingtable3">
													<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
													<td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td>
													<td></td>
												</tr>
											</thead>
											<tbody>
				';

				$i = 1;
				$total = 0;
				$data_jalan = $jalan->getDataLengkap();
				foreach ($data_jalan as $data_jalan) {
					echo '
												<tr>
													<td style="text-align: center;">'.$i.'</td>
													<td>'.$data_jalan['jenis_barang'].'</td>
													<td>'.$data_jalan['kode_barang'].'</td>
													<td>'.$data_jalan['register'].'</td>
													<td>'.$data_jalan['konstruksi'].'</td>
													<td>'.$data_jalan['panjang'].'</td>
													<td>'.$data_jalan['lebar'].'</td>
													<td>'.$data_jalan['luas_tanah'].'</td>
													<td>'.$data_jalan['alamat'].'</td>
													<td>'.$data_jalan['tanggal_dokumen'].'</td>
													<td>'.$data_jalan['no_dokumen'].'</td>
													<td>'.$data_jalan['status_tanah'].'</td>
													<td>'.$data_jalan['no_tanah'].'</td>
													<td>'.$data_jalan['asal_usul'].'</td>
													<td>'.$data_jalan['kondisi'].'</td>
													<td>'.number_format($data_jalan['harga'], 0, ',', '.').',-</td>
													<td>'.$data_jalan['keterangan'].'</td>
													<td style="text-align: center;">
														<a data-toggle="modal" href="#edit-data" title="Edit" onclick="loadDoc(\'jalan\', \''.$data_jalan['id'].'\')"><i class="fa fa-edit"></i></a> | 
														<a href="#" title="Hapus" onclick="hapusData(\'jalan\', \''.$data_jalan['id'].'\')"><i class="fa fa-trash-o"></i></a>
													</td>
												</tr>
					';
					$i++;
					$total += $data_jalan['harga'];
				}

				echo '
												<tr class="jumlahtabel">
													<td colspan="15" style="text-align: center;">
														JUMLAH TOTAL ASET TETAP (Jalan, Irigasi, dan Jaringan)
													</td>
													<td>'.number_format($total, 0, ',', '.').',-</td>
													<td></td><td></td>
												</tr>
											</tbody>
										</table>
									</div> <!--Tabel Laporan (JALAN, IRIGASI DAN JARINGAN)-->
								</div>

								<div class="tab-pane fade in '.$asetlain_tab.'" id="asetlain">
									<div class="tabellaporan "> <!--Tabel Laporan (ASET TETAP LAINNYA)-->
										<hr/>

										<form id="hapusasetlainSubmit" action="'.$aksi_asetlain.'hapus" method="POST">
											<input type="hidden" id="hapusasetlainId" name="id" value="">
										</form>

										<table class="table table-bordered table-highlight ">
											<thead >
												<tr >
													<th rowspan="2">No.</th>
													<th rowspan="2">Jenis/Nama Barang</th>
													<th colspan="2">Nomor</th>
													<th colspan="2">Buku Perpustakaan</th>
													<th colspan="3">Barang Bercorak Kesenian/ Kebudayaan</th>
													<th colspan="2">Hewan/Ternak dan Tumbuhan</th>
													<th rowspan="2">Tahun Cetak/Pembelian</th>
													<th rowspan="2">Jumlah</th>
													<th rowspan="2">Asal-Usul</th>
													<th rowspan="2">Harga</th>
													<th rowspan="2">Keterangan</th>
													<th rowspan="2">Tindakan</th>
												</tr>
												<tr class="headingtable2">
													<th>Kode Barang</th>
													<th>Register</th>
													<th>Judul/Pencipta</th>
													<th>Spesifikasi</th>
													<th>Asal Daerah</th>
													<th>Pencipta</th>
													<th>Bahan</th>
													<th>Jenis</th>
													<th>ukuran</th>
												</tr>
												<tr class="headingtable3">
													<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td>
													<td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td>
													<td>16</td><td></td>
												</tr>
											</thead>
											<tbody>
				';

				$i = 1;
				$total = 0;
				$data_asetlain = $asetlain->getDataLengkap();
				foreach ($data_asetlain as $data_asetlain) {
					echo '
												<tr>
													<td style="text-align: center;">'.$i.'</td>
													<td>'.$data_asetlain['jenis_barang'].'</td>
													<td>'.$data_asetlain['kode_barang'].'</td>
													<td>'.$data_asetlain['register'].'</td>
													<td>'.$data_asetlain['judul_buku'].'</td>
													<td>'.$data_asetlain['spesifikasi_buku'].'</td>
													<td>'.$data_asetlain['asal_daerah'].'</td>
													<td>'.$data_asetlain['pencipta_kesenian'].'</td>
													<td>'.$data_asetlain['bahan_kesenian'].'</td>
													<td>'.$data_asetlain['jenis'].'</td>
													<td>'.$data_asetlain['ukuran'].'</td>
													<td>'.$data_asetlain['tanggal_cetak'].'</td>
													<td>'.$data_asetlain['jumlah'].'</td>
													<td>'.$data_asetlain['asal_usul'].'</td>
													<td>'.number_format($data_asetlain['harga'], 0, ',', '.').',-</td>
													<td>'.$data_asetlain['keterangan'].'</td>
													<td style="text-align: center;">
														<a data-toggle="modal" href="#edit-data" title="Edit" onclick="loadDoc(\'asetlain\', \''.$data_asetlain['id'].'\')"><i class="fa fa-edit"></i></a> | 
														<a href="#" title="Hapus" onclick="hapusData(\'asetlain\', \''.$data_asetlain['id'].'\')"><i class="fa fa-trash-o"></i></a>
													</td>
												</tr>
					';
					$i++;
					$total += $data_asetlain['harga'];
				}

				echo '
												<tr class="jumlahtabel">
													<td colspan="14" style="text-align: center;">JUMLAH TOTAL ASET TETAP (Lainnya)</td>
													<td>'.number_format($total, 0, ',', '.').',-</td>
													<td></td><td></td>
												</tr>
											</tbody>
										</table>
									</div> <!--Tabel Laporan (ASET TETAP LAINNYA)-->
								</div>

								<div class="tab-pane fade in '.$konstruksi_tab.'" id="konstruksi">
									<div class="tabellaporan "> <!--Tabel Laporan (KONSTRUKSI DALAM PENGERJAAN)-->
										<hr/>

										<form id="hapuskonstruksiSubmit" action="'.$aksi_konstruksi.'hapus" method="POST">
											<input type="hidden" id="hapuskonstruksiId" name="id" value="">
										</form>

										<table class="table table-bordered table-highlight">
											<thead>
												<tr>
													<th rowspan="2">No.</th>
													<th rowspan="2">Jenis/Nama Barang</th>
													<th rowspan="2">Bangunan</th>
													<th colspan="2">Konstruksi Bangunan</th>
													<th rowspan="2">Luas</th>
													<th rowspan="2">Lokasi</th>
													<th colspan="2">Dokumen</th>
													<th rowspan="2" style="width: 100px;">Tanggal Mulai</th>
													<th rowspan="2">Status Tanah</th>
													<th rowspan="2">No. Kode Tanah</th>
													<th rowspan="2">Asal-Usul</th>
													<th rowspan="2">Nilai Kontrak</th>
													<th rowspan="2">Keterangan</th>
													<th rowspan="2">Tindakan</th>
												</tr>

												<tr class="headingtable2">
													<th>Bertingkat/Tidak</th>
													<th>Beton/Tidak</th>
													<th style="width: 100px;">Tanggal</th>
													<th>Nomor</th>
												</tr>
												<tr class="headingtable3">
													<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td>
													<td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td></td>
												</tr>
											</thead>
											<tbody>
				';

				$i = 1;
				$total = 0;
				$data_konstruksi = $konstruksi->getDataLengkap();
				foreach ($data_konstruksi as $data_konstruksi) {
					$kon2 = explode(", ", trim($data_konstruksi['konstruksi'], ", "));
					if (sizeof($kon2) == 2) {
						$bertingkat = "Bertingkat";
						$beton = "Beton";
					} else if (sizeof($kon2) == 1) {
						$bertingkat = $kon2[0] == "Bertingkat"? "Bertingkat":"Tidak";
						$beton = $kon2[0] == "Beton"? "Beton":"Tidak";
					} else {
						$bertingkat = "Tidak";
						$beton = "Tidak";
					}

					echo '
												<tr>
													<td style="text-align: center;">'.$i.'</td>
													<td>'.$data_konstruksi['jenis_barang'].'</td>
													<td>'.$data_konstruksi['bangunan'].'</td>
													<td>'.$bertingkat.'</td>
													<td>'.$beton.'</td>
													<td>'.$data_konstruksi['luas_konstruksi'].'</td>
													<td>'.$data_konstruksi['alamat'].'</td>
													<td>'.$data_konstruksi['tanggal_dokumen'].'</td>
													<td>'.$data_konstruksi['no_dokumen'].'</td>
													<td>'.$data_konstruksi['tanggal_mulai'].'</td>
													<td>'.$data_konstruksi['status_tanah'].'</td>
													<td>'.$data_konstruksi['no_tanah'].'</td>
													<td>'.$data_konstruksi['asal_usul'].'</td>
													<td>'.number_format($data_konstruksi['harga'], 0, ',', '.').',-</td>
													<td>'.$data_konstruksi['keterangan'].'</td>
													<td style="text-align: center;">
														<a data-toggle="modal" href="#edit-data" title="Edit" onclick="loadDoc(\'konstruksi\', \''.$data_konstruksi['id'].'\')"><i class="fa fa-edit"></i></a> | 
														<a href="#" title="Hapus" onclick="hapusData(\'konstruksi\', \''.$data_konstruksi['id'].'\')"><i class="fa fa-trash-o"></i></a>
													</td>
												</tr>
					';
					$i++;
					$total += $data_konstruksi['harga'];
				}

				echo '
												<tr class="jumlahtabel">
													<td colspan="13" style="text-align: center;">JUMLAH KONSTRUKSI DALAM PENGERJAAN</td>
													<td>'.number_format($total, 0, ',', '.').',-</td>
													<td></td><td></td>
												</tr>
											</tbody>
										</table>
									</div> <!--Tabel Laporan (KONSTRUKSI DALAM PENGERJAAN)-->  
								</div>
							</div> <!--Tab Content-->
						</div> <!--col-->

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
						</div> <!--list-->
					</div>

				';
				break;
		}
?>

<?php endif; ?>
