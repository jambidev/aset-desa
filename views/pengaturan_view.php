<?php
	if(isset($method)):
		date_default_timezone_set('Asia/Makassar');
		$aksi = ROOT."controllers/pengaturan_control.php?model=pengaturan&method=";

		switch ($method) {
			default:
				include "404.php";
				break;

			case '':
				$data = $pengaturan->getDataById(1);
				echo '

					<div class="content-header">
						<h2 class="content-header-title">Pengaturan</h2>
					</div> <!-- /.content-header -->
				';

				if (isset($_GET['act'])) {
					$libs->notifikasi($_GET['act']);
				}

				echo '

					<form enctype="multipart/form-data" action="'.$aksi.'edit" method="POST" class="form-horizontal">
						<div class="row">
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-4 col-sm-5">
										<div class="form-group text-center">
											<label class="col-md-12 ">Logo Desa</label>
											<input type="hidden" name="elogo" value="'.$data['logo'].'" />
											<div class="col-md-12">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 180px; height: 180px;"><img src="'.ROOT.'assets/img/'.$data['logo'].'" alt="Logo Desa" />
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;"></div>
													<div>
														<span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="logo" accept="image/*" /></span>
														<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
													</div>
												</div>
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<br/>
									</div> <!-- /.col -->
									<div class="col-md-8 col-sm-8">
										<h3 class="">Pengaturan Profil Desa</h3>
										<p>Pengaturan Profil Desa dapat Anda lakukan sendiri dengan memasukkan data yang sesuai dengan kondisi nyata di desa masing masing. Pastikan data yang Anda masukkan adalah benar dan dapat dipertanggungjawabkan.</p>
										<hr/>
										<br/>
										<div class="form-group">
											<label class="col-md-4">Kode Lokasi Desa</label>
											<div class="col-md-7">
												<input type="text" name="kode_lokasi" value="'.$data['kode_lokasi'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-4">Kepala Desa</label>
											<div class="col-md-7">
												<input type="text" name="nama_kepala" value="'.$data['nama_kepala'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-4">Pengguna Barang</label>
											<div class="col-md-7">
												<input type="text" name="nama_pengguna" value="'.$data['nama_pengguna'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-4">Pengurus Barang</label>
											<div class="col-md-7">
												<input type="text" name="nama_pengurus" value="'.$data['nama_pengurus'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<div class="form-group">
											<label class="col-md-4">E-mail Desa</label>
											<div class="col-md-7">
												<input type="text" name="email" value="'.$data['email'].'" class="form-control" />
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
										<br/>
										<div class="form-group">
											<div class="col-md-8 col-md-push-4">
												<input type="hidden" name="id" value="'.$data['id'].'" />
												<button type="submit" name="edit" class="btn btn-primary">Simpan</button>&nbsp;
											</div> <!-- /.col -->
										</div> <!-- /.form-group -->
									</div> <!-- /.col -->
								</div> <!-- /.row -->
							</div> <!-- /.col -->
						</div> <!-- /.row -->
					</form>

				';
				break;
		}
?>

<?php endif; ?>
