<?php
	if(isset($method)):
		date_default_timezone_set('Asia/Makassar');
		$aksi = ROOT."controllers/kirim_control.php?model=kirim&method=";

		switch($method) {
			default:
				include "404.php";
				break;

			case '':
				echo '

					<div class="content-header">
						<h2 class="content-header-title">Kirim Data</h2>
					</div> <!-- /.content-header -->
				';

				if (isset($_GET['act'])) {
					$libs->notifikasi($_GET['act']);
				}

				echo '

					<div class="row">
						<div class="col-sm-12">
							<div class="col-sm-2"></div>
							<div class="col-sm-10">

								<form enctype="multipart/form-data" action="'.$aksi.'kirim" method="POST" class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2">Alamat E-mail:</label>
									<div class="col-sm-6">
										<input type="email" name="alamat_email" placeholder="Alamat e-mail tujuan" class="form-control" />
									</div> <!-- /.col -->
								</div> <!-- /.form-group -->
								<br/>
								<div class="form-group">
									<label class="col-sm-2">Judul/Subyek:</label>
									<div class="col-sm-6">
										<input type="text" name="judul" placeholder="Judul/subyek e-mail" class="form-control" />
									</div> <!-- /.col -->
								</div> <!-- /.form-group -->
								<br/>
								<div class="form-group">
									<label class="col-sm-2">Upload File:</label>
									<div class="col-sm-6">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="input-group">
												<div class="form-control">
													<i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span>
												</div>
												<div class="input-group-btn">
													<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
													<span class="btn btn-default btn-file">
														<span class="fileupload-new">Select file</span>
														<span class="fileupload-exists">Change</span>
														<input type="file" name="upload_data" />
													</span>
												</div>
											</div>
										</div>
									</div> <!-- /.col -->
								</div> <!-- /.form-group -->
								<br/>
								<div class="form-group">
									<div class="col-md-6 col-md-push-2">
										<button type="submit" name="kirim" class="btn btn-primary howler" data-type="success">Kirim Data</button>&nbsp;
									</div> <!-- /.col -->
								</div> <!-- /.form-group -->
							</form>
						</div>
					</div>
				</div>

				';
				break;
		}
?>

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
