<?php
	if (isset($_GET['tab'])):
		date_default_timezone_set('Asia/Makassar');
		include "../libs/path.php";
		require "../models/class.php";

		$tab = $_GET['tab'];
		$id = $_GET['id'];

		switch ($tab) {
			case 'tanah':
				$data = $tanah->getDataById($id);
				echo '

					<form enctype="multipart/form-data" action="'.ROOT.'controllers/data_tanah_control.php?model=tanah&method=edit" method="POST" class="form-horizontal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Edit Data: '.$data['jenis_barang'].'</h3>
						</div>
						<div class="modal-body">
										<div class="form-group">
											<label class="col-md-3">Jenis/Nama Barang</label>
											<div class="col-md-7">
												<select id="s2_basic" class="form-control" name="jenis_barang" onclick="getKodeBarang(\'tanah\', this.value)">
													<option value="'.$data['kode_barang'].'">'.$data['jenis_barang'].'</option>
													<option disabled>==============================================</option>
				';

				$first1 = true;
				$data_tanah = $data_barang->getKodeBarangByKB("01");
				foreach ($data_tanah as $data_tanah) {
					if ($data_tanah['kb_2'] != '00' AND $data_tanah['kb_3'] != '00' AND $data_tanah['kb_4'] != '00') {
						if ($data_tanah['kb_5'] == '000') {
							if ($first1) {
								echo '
													<optgroup label="'.$data_tanah['nama_barang'].'">
								';
								$first1 = false;
							} else {
								echo '
													</optgroup>
													<optgroup label="'.$data_tanah['nama_barang'].'">
								';
							}
						} else {
							echo '
														<option value="'.$data_tanah['kode_barang'].'">'.$data_tanah['nama_barang'].'</option>
							';
						}
					}
				}

				echo '
													</optgroup>
												</select>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Kode Barang</label>
											<div class="col-md-7">
												<input type="number" id="kodetanah" name="kode_barang" value="'.$data['kode_barang'].'" class="form-control" readonly/>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Register</label>
											<div class="col-md-7">
												<input type="number" name="register" value="'.$data['register'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Luas</label>
											<div class="col-md-7">
												<div class="input-group">
													<input type="text" name="luas_tanah" value="'.$data['luas_tanah'].'" class="form-control" />
													<span class="input-group-addon">m<sup>2</sup></span>
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Tanggal Beli </label>
											<div class="col-md-7">
												<div id="dp-ex-1" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
													<input class="form-control" type="text" name="tanggal_beli" value="'.$data['tanggal_beli'].'" />
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
												<span class="help-block">dd-mm-yyyy</span>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Letak/Alamat</label>
											<div class="col-md-7">
												<input type="text" name="alamat" value="'.$data['alamat'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Hak</label>
											<div class="col-md-7">
												<input type="text" name="hak" value="'.$data['hak'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">No. Sertifikat </label>
											<div class="col-md-7">
												<input type="text" name="no_sertifikat" value="'.$data['no_sertifikat'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Tanggal Sertifikat </label>
											<div class="col-md-7">
												<div id="dp-ex-2" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
													<input class="form-control" type="text" name="tanggal_sertifikat" value="'.$data['tanggal_sertifikat'].'" />
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div> <!--dp-->
											</div><!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Penggunaan</label>
											<div class="col-md-7">
												<input type="text" name="penggunaan" value="'.$data['penggunaan'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Asal Usul</label>
											<div class="col-md-7">
												<input type="text" name="asal_usul" value="'.$data['asal_usul'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Harga</label>
											<div class="col-md-7">
												<div class="input-group">
													<span class="input-group-addon">Rp</span>
													<input class="form-control" id="harga" name="harga" type="number" value="'.$data['harga'].'">
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Keterangan</label>
											<div class="col-md-7">
												<input type="text" name="keterangan" value="'.$data['keterangan'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
						</div>
						<div class="modal-footer">
							<input type="hidden" name="id" value="'.$data['id'].'" />
							<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
							<button type="submit" name="edit" class="btn btn-primary">Update Data</button>
						</div>
					</form>

				';
				break;

			case 'peralatan':
				$data = $peralatan->getDataById($id);
				echo '

					<form enctype="multipart/form-data" action="'.ROOT.'controllers/data_peralatan_control.php?model=peralatan&method=edit" method="POST" class="form-horizontal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Edit Data: '.$data['jenis_barang'].'</h3>
						</div>
						<div class="modal-body">
										<div class="form-group">
											<label class="col-md-3">Jenis/Nama Barang</label>
											<div class="col-md-7">
												<select id="s3_basic" class="form-control" name="jenis_barang" onclick="getKodeBarang(\'peralatan\', this.value)">
													<option value="'.$data['kode_barang'].'">'.$data['jenis_barang'].'</option>
													<option disabled>==============================================</option>
				';

				$first2 = true;
				$data_peralatan = $data_barang->getKodeBarangByKB("02");
				foreach ($data_peralatan as $data_peralatan) {
					if ($data_peralatan['kb_2'] != '00' AND $data_peralatan['kb_3'] != '00' AND $data_peralatan['kb_4'] != '00') {
						if ($data_peralatan['kb_5'] == '000') {
							if ($first2) {
								echo '
													<optgroup label="'.$data_peralatan['nama_barang'].'">
								';
								$first2 = false;
							} else {
								echo '
													</optgroup>
													<optgroup label="'.$data_peralatan['nama_barang'].'">
								';
							}
						} else {
							echo '
														<option value="'.$data_peralatan['kode_barang'].'">'.$data_peralatan['nama_barang'].'</option>
							';
						}
					}
				}

				echo '
													</optgroup>
												</select>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Kode Barang</label>
											<div class="col-md-7">
												<input type="number" id="kodeperalatan" name="kode_barang" value="'.$data['kode_barang'].'" class="form-control" readonly/>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Register</label>
											<div class="col-md-7">
												<input type="number" name="register" value="'.$data['register'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Merek/Tipe</label>
											<div class="col-md-7">
												<input type="text" name="merek" value="'.$data['merek'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Ukuran/CC</label>
											<div class="col-md-7">
												<input type="text" name="ukuran" value="'.$data['ukuran'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Bahan</label>
											<div class="col-md-7">
												<input type="text" name="bahan" value="'.$data['bahan'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Tanggal Beli </label>
											<div class="col-md-7">
												<div id="dp-ex-3" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
													<input class="form-control" type="text" name="tanggal_beli" value="'.$data['tanggal_beli'].'" />
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
												<span class="help-block">dd-mm-yyyy</span>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Nomor </label>
											<div style="col-md-7 col-sm-11">
												<div style="width:11.56%; float:left; padding-left:15px; padding-right:10px;">
													<input type="text" name="no_pabrik" value="'.$data['no_pabrik'].'" class="form-control" />
												</div> <!-- /.col -->
												<div style="width:11.56%; float:left; padding-right:10px;">
													<input type="text" name="no_rangka" value="'.$data['no_rangka'].'" class="form-control" />
												</div> <!-- /.col -->
												<div style="width:11.56%; float:left; padding-right:10px;">
													<input type="text" name="no_mesin" value="'.$data['no_mesin'].'" class="form-control" />
												</div> <!-- /.col -->
												<div style="width:11.56%; float:left; padding-right:10px;">
													<input type="text" name="no_polisi" value="'.$data['no_polisi'].'" class="form-control" />
												</div> <!-- /.col -->
												<div style="width:11.56%; float:left; padding-right:10px;">
													<input type="text" name="no_bpkb" value="'.$data['no_bpkb'].'" class="form-control" />
												</div> <!-- /.col -->
											</div>
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Asal Usul </label>
											<div class="col-md-7">
												<input type="text" name="asal_usul" value="'.$data['asal_usul'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Harga </label>
											<div class="col-md-7">
												<div class="input-group">
													<span class="input-group-addon">Rp</span>
													<input type="number" class="form-control" id="harga" name="harga" value="'.$data['harga'].'">
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Keterangan </label>
											<div class="col-md-7">
												<input type="text" name="keterangan" value="'.$data['keterangan'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->

										<input type="hidden" name="efoto" value="'.$data['foto'].'" />
										<div class="row">
											<label class="col-md-3">Gambar</label>
											<div class="col-sm-4">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
														<img src="'.ROOT.'upload/images/'.$data['foto'].'" alt="Placeholder" />
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
													<div>
														<span class="btn btn-default btn-file">
														<span class="fileupload-new">Select image</span>
														<span class="fileupload-exists">Change</span><input type="file" name="foto" accept="image/*" /></span>
														<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
													</div>
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.row -->  
						</div>
						<div class="modal-footer">
							<input type="hidden" name="id" value="'.$data['id'].'" />
							<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
							<button type="submit" name="edit" class="btn btn-primary">Update Data</button>
						</div>
					</form>

				';
				break;

			case 'gedung':
				$data = $gedung->getDataById($id);
				echo '

					<form enctype="multipart/form-data" action="'.ROOT.'controllers/data_gedung_control.php?model=gedung&method=edit" method="POST" class="form-horizontal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Edit Data: '.$data['jenis_barang'].'</h3>
						</div>
						<div class="modal-body">
										<div class="form-group">
											<label class="col-md-3">Jenis/Nama Barang</label>
											<div class="col-md-7">
												<select id="s4_basic" class="form-control" name="jenis_barang" onclick="getKodeBarang(\'gedung\', this.value)">
													<option value="'.$data['kode_barang'].'">'.$data['jenis_barang'].'</option>
													<option disabled>==============================================</option>
				';

				$first3 = true;
				$data_gedung = $data_barang->getKodeBarangByKB("03");
				foreach ($data_gedung as $data_gedung) {
					if ($data_gedung['kb_2'] != '00' AND $data_gedung['kb_3'] != '00' AND $data_gedung['kb_4'] != '00') {
						if ($data_gedung['kb_5'] == '000') {
							if ($first3) {
								echo '
													<optgroup label="'.$data_gedung['nama_barang'].'">
								';
								$first3 = false;
							} else {
								echo '
													</optgroup>
													<optgroup label="'.$data_gedung['nama_barang'].'">
								';
							}
						} else {
							echo '
														<option value="'.$data_gedung['kode_barang'].'">'.$data_gedung['nama_barang'].'</option>
							';
						}
					}
				}

				echo '
													</optgroup>
												</select>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Kode Barang</label>
											<div class="col-md-7">
												<input type="number" id="kodegedung" name="kode_barang" value="'.$data['kode_barang'].'" class="form-control" readonly />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Register</label>
											<div class="col-md-7">
												<input type="number" name="register" value="'.$data['register'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Kondisi Bangunan</label>
											<div class="col-md-7">
				';

				$kondisi_baru = $data['kondisi'] == "Baru"? "checked":"";
				$kondisi_kb = $data['kondisi'] == "KB"? "checked":"";
				$kondisi_renov = $data['kondisi'] == "Renovasi Baru"? "checked":"";

				echo '
												<label class="radio-inline">
													<input type="radio" name="kondisi" class="" value="Baru" '.$kondisi_baru.' /> Baru
												</label>
												<label class="radio-inline">
													<input type="radio" name="kondisi" class="" value="KB" '.$kondisi_kb.' /> KB
												</label>
												<label class="radio-inline">
													<input type="radio" name="kondisi" class="" value="Renovasi Baru" '.$kondisi_renov.' /> Renovasi Baru
												</label>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Konstruksi Bangunan</label>
											<div class="col-md-7">
				';

				$kon = explode(", ", trim($data['konstruksi'], ", "));
				if (sizeof($kon) == 2) {
					$bertingkat = "checked";
					$beton = "checked";
				} else if (sizeof($kon) == 1) {
					$bertingkat = $kon[0] == "Bertingkat"? "checked":"";
					$beton = $kon[0] == "Beton"? "checked":"";
				} else {
					$bertingkat = "";
					$beton = "";
				}

				echo '
												<label class="checkbox-inline">
													<input type="checkbox" id="inlineCheckbox1" class="" name="konstruksi[]" value="Bertingkat" '.$bertingkat.' /> Bertingkat
												</label>
												<label class="checkbox-inline">
													<input type="checkbox" id="inlineCheckbox1" class="" name="konstruksi[]" value="Beton" '.$beton.' /> Beton
												</label>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Luas Lantai</label>
											<div class="col-md-7">
												<div class="input-group">
													<input type="text" name="luas_lantai" value="'.$data['luas_lantai'].'" class="form-control" />
													<span class="input-group-addon">m<sup>2</sup></span>
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Letak/Alamat</label>
											<div class="col-md-7">
												<input type="text" name="alamat" value="'.$data['alamat'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<br/>
										<div class="form-group">
											<label class="col-md-12">Dokumen Gedung</label>
											<label class="col-md-3"> &nbsp;&nbsp;1. Tanggal</label>
											<div class="col-md-7">
												<div id="dp-ex-4" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
													<input class="form-control" type="text" name="tanggal_beli" value="'.$data['tanggal_beli'].'" />
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
												<span class="help-block">dd-mm-yyyy</span>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">&nbsp;&nbsp;2. Nomor</label>
											<div class="col-md-7">
												<input type="number" name="no_dokumen" value="'.$data['no_dokumen'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<br/>
										<div class="form-group">
											<label class="col-md-3">Luas Lahan</label>
											<div class="col-md-7">
												<div class="input-group">
													<input type="number" name="luas_lahan" value="'.$data['luas_lahan'].'" class="form-control" />
													<span class="input-group-addon">m<sup>2</sup></span>
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Status Tanah </label>
											<div class="col-md-7">
												<input type="text" name="status_tanah" value="'.$data['status_tanah'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Nomor Kode Tanah </label>
											<div class="col-md-7">
												<input type="text" name="no_sertifikat" value="'.$data['no_sertifikat'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Asal Usul </label>
											<div class="col-md-7">
												<input type="text" name="asal_usul" value="'.$data['asal_usul'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Harga</label>
											<div class="col-md-7">
												<div class="input-group">
													<span class="input-group-addon">Rp</span>
													<input type="number" class="form-control" id="harga" name="harga" value="'.$data['harga'].'" />
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Keterangan </label>
											<div class="col-md-7">
												<input type="text" name="keterangan" value="'.$data['keterangan'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
						</div>
						<div class="modal-footer">
							<input type="hidden" name="id" value="'.$data['id'].'" />
							<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
							<button type="submit" name="edit" class="btn btn-primary">Update Data</button>
						</div>
					</form>

				';
				break;

			case 'jalan':
				$data = $jalan->getDataById($id);
				echo '

					<form enctype="multipart/form-data" action="'.ROOT.'controllers/data_jalan_control.php?model=jalan&method=edit" method="POST" class="form-horizontal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Edit Data: '.$data['jenis_barang'].'</h3>
						</div>
						<div class="modal-body">
										<div class="form-group">
											<label class="col-md-3">Jenis/Nama Barang</label>
											<div class="col-md-7">
												<select id="s5_basic" class="form-control" name="jenis_barang" onclick="getKodeBarang(\'jalan\', this.value)">
													<option value="'.$data['kode_barang'].'">'.$data['jenis_barang'].'</option>
													<option disabled>==============================================</option>
				';

				$first4 = true;
				$data_jalan = $data_barang->getKodeBarangByKB("04");
				foreach ($data_jalan as $data_jalan) {
					if ($data_jalan['kb_2'] != '00' AND $data_jalan['kb_3'] != '00' AND $data_jalan['kb_4'] != '00') {
						if ($data_jalan['kb_5'] == '000') {
							if ($first4) {
								echo '
													<optgroup label="'.$data_jalan['nama_barang'].'">
								';
								$first4 = false;
							} else {
								echo '
													</optgroup>
													<optgroup label="'.$data_jalan['nama_barang'].'">
								';
							}
						} else {
							echo '
														<option value="'.$data_jalan['kode_barang'].'">'.$data_jalan['nama_barang'].'</option>
							';
						}
					}
				}

				echo '
													</optgroup>
												</select>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Kode Barang</label>
											<div class="col-md-7">
												<input type="number" id="kodejalan" name="kode_barang" value="'.$data['kode_barang'].'" class="form-control" readonly/>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Register</label>
											<div class="col-md-7">
												<input type="number" name="register" value="'.$data['register'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Konstruksi</label>
											<div class="col-md-7">
												<input type="text" name="konstruksi" value="'.$data['konstruksi'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Panjang</label>
											<div class="col-md-7">
												<div class="input-group">
													<input type="text" name="panjang" value="'.$data['panjang'].'" class="form-control" />
													<span class="input-group-addon">km</span>
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Lebar</label>
											<div class="col-md-7">
												<div class="input-group">
													<input type="text" name="lebar" value="'.$data['lebar'].'" class="form-control" />
													<span class="input-group-addon">m</span>
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Luas</label>
											<div class="col-md-7">
												<div class="input-group">
													<input type="text" name="luas_tanah" value="'.$data['luas_tanah'].'" class="form-control" />
													<span class="input-group-addon">m<sup>2</sup></span>
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Lokasi</label>
											<div class="col-md-7">
												<input type="text" name="alamat" value="'.$data['alamat'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-12">Dokumen </label>
											<label class="col-md-3"> &nbsp;Tanggal </label>
											<div class="col-md-7">
												<div id="dp-ex-5" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
													<input class="form-control" type="text" name="tanggal_dokumen" value="'.$data['tanggal_dokumen'].'" />
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
												<span class="help-block">dd-mm-yyyy</span>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">&nbsp;Nomor </label>
											<div class="col-md-7">
												<input type="text" name="no_dokumen" value="'.$data['no_dokumen'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<br/>
										<div class="form-group">
											<label class="col-md-3">Status Tanah</label>
											<div class="col-md-7">
												<input type="text" name="status_tanah" value="'.$data['status_tanah'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Nomor Kode Tanah  </label>
											<div class="col-md-7">
												<input type="text" name="no_tanah" value="'.$data['no_tanah'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Asal Usul </label>
											<div class="col-md-7">
												<input type="text" name="asal_usul" value="'.$data['asal_usul'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Kondisi Bangunan</label>
											<div class="col-md-7">
				';

				$kondisi_baru = $data['kondisi'] == "Baru"? "checked":"";
				$kondisi_kb = $data['kondisi'] == "KB"? "checked":"";
				$kondisi_renov = $data['kondisi'] == "Renovasi Baru"? "checked":"";

				echo '
												<label class="radio-inline">
													<input type="radio" name="kondisi" class="" value="Baru" '.$kondisi_baru.' /> Baru
												</label>
												<label class="radio-inline">
													<input type="radio" name="kondisi" class="" value="KB" '.$kondisi_kb.' /> KB
												</label>
												<label class="radio-inline">
													<input type="radio" name="kondisi" class="" value="Renovasi Baru" '.$kondisi_renov.' /> Renovasi Baru
												</label>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Harga </label>
											<div class="col-md-7">
												<div class="input-group">
													<span class="input-group-addon">Rp</span>
													<input class="form-control" id="harga" name="harga" value="'.$data['harga'].'" type="number" />
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Keterangan </label>
											<div class="col-md-7">
												<input type="text" name="keterangan" value="'.$data['keterangan'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
						</div>
						<div class="modal-footer">
							<input type="hidden" name="id" value="'.$data['id'].'" />
							<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
							<button type="submit" name="edit" class="btn btn-primary">Update Data</button>
						</div>
					</form>

				';
				break;

			case 'asetlain':
				$data = $asetlain->getDataById($id);
				echo '

					<form enctype="multipart/form-data" action="'.ROOT.'controllers/data_asetlain_control.php?model=asetlain&method=edit" method="POST" class="form-horizontal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Edit Data: '.$data['jenis_barang'].'</h3>
						</div>
						<div class="modal-body">
										<div class="form-group">
											<label class="col-md-3">Jenis/Nama Barang</label>
											<div class="col-md-7">
												<select id="s6_basic" class="form-control" name="jenis_barang" onclick="getKodeBarang(\'asetlain\', this.value)">
													<option value="'.$data['kode_barang'].'">'.$data['jenis_barang'].'</option>
													<option disabled>==============================================</option>
				';

				$first5 = true;
				$data_asetlain = $data_barang->getKodeBarangByKB("05");
				foreach ($data_asetlain as $data_asetlain) {
					if ($data_asetlain['kb_2'] != '00' AND $data_asetlain['kb_3'] != '00' AND $data_asetlain['kb_4'] != '00') {
						if ($data_asetlain['kb_5'] == '000') {
							if ($first5) {
								echo '
													<optgroup label="'.$data_asetlain['nama_barang'].'">
								';
								$first5 = false;
							} else {
								echo '
													</optgroup>
													<optgroup label="'.$data_asetlain['nama_barang'].'">
								';
							}
						} else {
							echo '
														<option value="'.$data_asetlain['kode_barang'].'">'.$data_asetlain['nama_barang'].'</option>
							';
						}
					}
				}

				echo '
													</optgroup>
												</select>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Kode Barang</label>
											<div class="col-md-7">
												<input type="number" id="kodeasetlain" name="kode_barang" value="'.$data['kode_barang'].'" class="form-control" readonly />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Register</label>
											<div class="col-md-7">
												<input type="number" name="register" value="'.$data['register'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<ul id="myTab2" class="nav nav-pills">
				';

				$jalur_perpus = $data['jalur'] == "1"? "active":"";
				$jalur_seni = $data['jalur'] == "2"? "active":"";
				$jalur_ternak = $data['jalur'] == "3"? "active":"";

				echo '
											<li class="'.$jalur_perpus.'"><a href="#Perpustakaan" data-toggle="tab" onclick="setJalur(\'1\')">Buku Perpustakaan</a></li>
											<li class="'.$jalur_seni.'"><a href="#kesenian" data-toggle="tab" onclick="setJalur(\'2\')">Barang Bercorak Kesenian/Kebudayaan</a></li>
											<li class="'.$jalur_ternak.'"><a href="#ternak" data-toggle="tab" onclick="setJalur(\'3\')">Hewan/Ternak dan Tumbuhan</a></li>
										</ul>
										<input type="hidden" id="jalur" name="jalur" value="'.$data['jalur'].'" />
										<div id="myTab2Content" class="tab-content">
											<div class="tab-pane fade in '.$jalur_perpus.'" id="Perpustakaan">
												<div class="form-group">
													<label class="col-md-12">Buku Perpustakaan</label>
													<label class="col-md-3"> &nbsp;1. Judul/Pencipta</label>
													<div class="col-md-7">
														<input type="text" name="judul_buku" value="'.$data['judul_buku'].'" class="form-control" />
													</div> <!-- /.col -->
												</div> <!-- /.form-group -->
												<div class="form-group">
													<label class="col-md-3">&nbsp;2. Spesifikasi </label>
													<div class="col-md-7">
														<input type="text" name="spesifikasi_buku" value="'.$data['spesifikasi_buku'].'" class="form-control" />
													</div> <!-- /.col -->
												</div> <!-- /.form-group -->
											</div>
											<div class="tab-pane fade in '.$jalur_seni.'" id="kesenian">
												<div class="form-group">
													<label class="col-md-12">Barang Bercorak Kesenian/Kebudayaan</label>
													<label class="col-md-3"> &nbsp;1. Asal Daerah</label>
													<div class="col-md-7">
														<input type="text" name="asal_daerah" value="'.$data['asal_daerah'].'" class="form-control" />
													</div> <!-- /.col -->
												</div> <!-- /.form-group -->
												<div class="form-group">
													<label class="col-md-3">&nbsp;2. Pencipta </label>
													<div class="col-md-7">
														<input type="text" name="pencipta_kesenian" value="'.$data['pencipta_kesenian'].'" class="form-control" />
													</div> <!-- /.col -->
												</div> <!-- /.form-group -->
												<div class="form-group">
													<label class="col-md-3">&nbsp;3. Bahan </label>
													<div class="col-md-7">
														<input type="text" name="bahan_kesenian" value="'.$data['bahan_kesenian'].'" class="form-control" />
													</div> <!-- /.col -->
												</div> <!-- /.form-group -->
											</div>
											<div class="tab-pane fade in '.$jalur_ternak.'" id="ternak">
												<div class="form-group">
													<label class="col-md-12">Hewan/Ternak dan Tumbuhan</label>
													<label class="col-md-3"> &nbsp;1. Jenis</label>
													<div class="col-md-7">
														<input type="text" name="jenis" value="'.$data['jenis'].'" class="form-control" />
													</div> <!-- /.col -->
												</div> <!-- /.form-group -->
												<div class="form-group">
													<label class="col-md-3">&nbsp;2. Ukuran </label>
													<div class="col-md-7">
														<input type="text" name="ukuran" value="'.$data['ukuran'].'" class="form-control" />
													</div> <!-- /.col -->
												</div> <!-- /.form-group -->
											</div>
										</div>
										<br/>
										<div class="form-group">
											<label class="col-md-3">Jumlah</label>
											<div class="col-md-7">
												<input type="number" name="jumlah" value="'.$data['jumlah'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Tahun Cetak/Pembelian </label>
											<div class="col-md-7">
												<div id="dp-ex-6" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
													<input class="form-control" type="text" name="tanggal_cetak" value="'.$data['tanggal_cetak'].'" />
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
												<span class="help-block">dd-mm-yyyy</span>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Asal Usul Cara Perolehan</label>
											<div class="col-md-7">
												<input type="text" name="asal_usul" value="'.$data['asal_usul'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Harga</label>
											<div class="col-md-7">
												<div class="input-group">
													<span class="input-group-addon">Rp</span>
													<input class="form-control" id="harga" name="harga" value="'.$data['harga'].'" type="number" />
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Keterangan </label>
											<div class="col-md-7">
												<input type="text" name="keterangan" value="'.$data['keterangan'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<input type="hidden" name="efoto" value="'.$data['foto'].'" />
										<div class="row">
											<label class="col-md-3">Gambar</label>
											<div class="col-sm-4">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
														<img src="'.ROOT.'upload/images/'.$data['foto'].'" alt="Placeholder" />
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
													<div>
														<span class="btn btn-default btn-file">
														<span class="fileupload-new">Select image</span>
														<span class="fileupload-exists">Change</span>
														<input type="file" name="foto" accept="image/*" /></span>
														<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
													</div>
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.row -->
						</div>
						<div class="modal-footer">
							<input type="hidden" name="id" value="'.$data['id'].'" />
							<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
							<button type="submit" name="edit" class="btn btn-primary">Update Data</button>
						</div>
					</form>

				';
				break;

			case 'konstruksi':
				$data = $konstruksi->getDataById($id);
				echo '

					<form enctype="multipart/form-data" action="'.ROOT.'controllers/data_konstruksi_control.php?model=konstruksi&method=edit" method="POST" class="form-horizontal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Edit Data: '.$data['jenis_barang'].'</h3>
						</div>
						<div class="modal-body">
										<div class="form-group">
											<label class="col-md-3">Jenis/Nama Barang</label>
											<div class="col-md-7">
												<select id="s7_basic" class="form-control" name="jenis_barang" onclick="getKodeBarang(\'konstruksi\', this.value)">
													<option value="06000000000" selected>Konstruksi dalam Pengerjaan</option>
				';

				$first6 = true;
				$data_konstruksi = $data_barang->getKodeBarangByKB("06");
				foreach ($data_konstruksi as $data_konstruksi) {
					if ($data_konstruksi['kb_2'] != '00' AND $data_konstruksi['kb_3'] != '00' AND $data_konstruksi['kb_4'] != '00') {
						if ($data_konstruksi['kb_5'] == '000') {
							if ($first6) {
								echo '
													<optgroup label="'.$data_konstruksi['nama_barang'].'">
								';
								$first6 = false;
							} else {
								echo '
													</optgroup>
													<optgroup label="'.$data_konstruksi['nama_barang'].'">
								';
							}
						} else {
							echo '
														<option value="'.$data_konstruksi['kode_barang'].'">'.$data_konstruksi['nama_barang'].'</option>
							';
						}
					}
				}

				echo '
													</optgroup>
												</select>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Bangunan </label>
											<div class="col-md-7">
				';

				$bangunan_p = $data['bangunan'] == "P"? "checked":"";
				$bangunan_sp = $data['bangunan'] == "SP"? "checked":"";
				$bangunan_d = $data['bangunan'] == "D"? "checked":"";

				echo '
												<label class="radio-inline">
													<input type="radio" name="bangunan" class="" value="P" '.$bangunan_p.' /> P
												</label>
												<label class="radio-inline">
													<input type="radio" name="bangunan" class="" value="SP" '.$bangunan_sp.' /> SP
												</label>
												<label class="radio-inline">
													<input type="radio" name="bangunan" class="" value="D" '.$bangunan_d.' /> D
												</label>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Konstruksi Bangunan</label>
											<div class="col-md-7">
				';

				$kon = explode(", ", trim($data['konstruksi'], ", "));
				if (sizeof($kon) == 2) {
					$bertingkat = "checked";
					$beton = "checked";
				} else if (sizeof($kon) == 1) {
					$bertingkat = $kon[0] == "Bertingkat"? "checked":"";
					$beton = $kon[0] == "Beton"? "checked":"";
				} else {
					$bertingkat = "";
					$beton = "";
				}

				echo '
												<label class="checkbox-inline">
													<input type="checkbox" id="inlineCheckbox1" class="" name="konstruksi[]" value="Bertingkat" '.$bertingkat.' /> Bertingkat
												</label>
												<label class="checkbox-inline">
													<input type="checkbox" id="inlineCheckbox1" class="" name="konstruksi[]" value="Beton" '.$beton.' /> Beton
												</label>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Luas</label>
											<div class="col-md-7">
												<div class="input-group">
													<input type="text" name="luas_konstruksi" value="'.$data['luas_konstruksi'].'" class="form-control" />
													<span class="input-group-addon">m<sup>2</sup></span>
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Letak/Alamat</label>
											<div class="col-md-7">
												<input type="text" name="alamat" value="'.$data['alamat'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-12">Dokumen Gedung</label>
											<label class="col-md-3"> &nbsp;&nbsp;1. Tanggal</label>
											<div class="col-md-7">
												<div id="dp-ex-7" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
													<input class="form-control" type="text" name="tanggal_dokumen" value="'.$data['tanggal_dokumen'].'" />
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
												<span class="help-block">dd-mm-yyyy</span>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">&nbsp;&nbsp;2. Nomor</label>
											<div class="col-md-7">
												<input type="number" name="no_dokumen" value="'.$data['no_dokumen'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<br/>
										<div class="form-group">
											<label class="col-md-3">Tanggal Mulai</label>
											<div class="col-md-7">
												<div id="dp-ex-8" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
													<input class="form-control" type="text" name="tanggal_mulai" value="'.$data['tanggal_mulai'].'" />
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
												<span class="help-block">dd-mm-yyyy</span>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Status Tanah </label>
											<div class="col-md-7">
												<input type="text" name="status_tanah" value="'.$data['status_tanah'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">No. Kode Tanah</label>
											<div class="col-md-7">
												<input type="text" name="no_tanah" value="'.$data['no_tanah'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Asal Usul Pembiayaan</label>
											<div class="col-md-7">
												<input type="text" name="asal_usul" value="'.$data['asal_usul'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Nilai Kontrak </label>
											<div class="col-md-7">
												<div class="input-group">
													<span class="input-group-addon">Rp</span>
													<input class="form-control" id="harga" name="harga" value="'.$data['harga'].'" type="number" />
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-3">Keterangan</label>
											<div class="col-md-7">
												<input type="text" name="keterangan" value="'.$data['keterangan'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
						</div>
						<div class="modal-footer">
							<input type="hidden" name="id" value="'.$data['id'].'" />
							<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
							<button type="submit" name="edit" class="btn btn-primary">Update Data</button>
						</div>
					</form>

				';
				break;
		}

	endif;
?>
