<?php
	class data_peralatan_model {
		private $db;

		public function __construct($database) {
			$this->db = $database;
		}

		public function countData() {
			$query = $this->db->prepare("SELECT * FROM `data_peralatan`");

			try {
				$query->execute();
				return $query->rowCount();
			} catch(PDOException $e){
				$e->getMessage();
			}
		}

		public function getDataLengkap() {
			$query = $this->db->prepare("SELECT * FROM `data_peralatan`");

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}

			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getDataById($id) {
			$query = $this->db->prepare("SELECT * FROM `data_peralatan` WHERE `id` = :id");
			$query->bindParam(':id', $id, PDO::PARAM_INT);

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}

			return $query->fetch(PDO::FETCH_ASSOC);
		}

		public function countDataByKB($kb) {
			$query = $this->db->prepare("SELECT * FROM `data_peralatan` WHERE `kode_bidang` = :kb");
			$query->bindParam(':kb', $kb, PDO::PARAM_STR);

			try {
				$query->execute();
				return $query->rowCount();
			} catch(PDOException $e){
				$e->getMessage();
			}
		}

		public function getDataByKB($kb) {
			$query = $this->db->prepare("SELECT * FROM `data_peralatan` WHERE `kode_bidang` = :kb");
			$query->bindParam(':kb', $kb, PDO::PARAM_STR);

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}

			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function insertData($kode_barang, $kode_bidang, $jenis_barang, $register, $merek, $ukuran, $bahan, $tanggal_beli, 
			$no_pabrik, $no_rangka, $no_mesin, $no_polisi, $no_bpkb, $asal_usul, $harga, $keterangan, $foto) {
			$query = $this->db->prepare("INSERT INTO `data_peralatan` SET	`kode_barang`	= :kode_barang,
																								`jenis_barang`	= :jenis_barang,
																								`kode_bidang`	= :kode_bidang,
																								`register`		= :register,
																								`merek`			= :merek,
																								`ukuran`			= :ukuran,
																								`bahan`			= :bahan,
																								`tanggal_beli`	= :tanggal_beli,
																								`no_pabrik`		= :no_pabrik,
																								`no_rangka`		= :no_rangka,
																								`no_mesin`		= :no_mesin,
																								`no_polisi`		= :no_polisi,
																								`no_bpkb`		= :no_bpkb,
																								`asal_usul`		= :asal_usul,
																								`harga`			= :harga,
																								`keterangan`	= :keterangan,
																								`foto`			= :foto
			");

			$query->bindParam(':kode_barang', $kode_barang, PDO::PARAM_STR);
			$query->bindParam(':kode_bidang', $kode_bidang, PDO::PARAM_STR);
			$query->bindParam(':jenis_barang', $jenis_barang, PDO::PARAM_STR);
			$query->bindParam(':register', $register, PDO::PARAM_STR);
			$query->bindParam(':merek', $merek, PDO::PARAM_STR);
			$query->bindParam(':ukuran', $ukuran, PDO::PARAM_STR);
			$query->bindParam(':bahan', $bahan, PDO::PARAM_STR);
			$query->bindParam(':tanggal_beli', $tanggal_beli, PDO::PARAM_STR);
			$query->bindParam(':no_pabrik', $no_pabrik, PDO::PARAM_STR);
			$query->bindParam(':no_rangka', $no_rangka, PDO::PARAM_STR);
			$query->bindParam(':no_mesin', $no_mesin, PDO::PARAM_STR);
			$query->bindParam(':no_polisi', $no_polisi, PDO::PARAM_STR);
			$query->bindParam(':no_bpkb', $no_bpkb, PDO::PARAM_STR);
			$query->bindParam(':asal_usul', $asal_usul, PDO::PARAM_STR);
			$query->bindParam(':harga', $harga, PDO::PARAM_STR);
			$query->bindParam(':keterangan', $keterangan, PDO::PARAM_STR);
			$query->bindParam(':foto', $foto, PDO::PARAM_STR);

			try {
				$query->execute();
				return true;
			} catch(PDOException $e) {
				return	die($e->getMessage());
			}
		}

		public function updateData($kode_barang, $kode_bidang, $jenis_barang, $register, $merek, $ukuran, $bahan, $tanggal_beli, 
			$no_pabrik, $no_rangka, $no_mesin, $no_polisi, $no_bpkb, $asal_usul, $harga, $keterangan, $foto, $id) {
			$query = $this->db->prepare("UPDATE `data_peralatan` SET	`kode_barang`	= :kode_barang,
																						`jenis_barang`	= :jenis_barang,
																						`kode_bidang`	= :kode_bidang,
																						`register`		= :register,
																						`merek`			= :merek,
																						`ukuran`			= :ukuran,
																						`bahan`			= :bahan,
																						`tanggal_beli`	= :tanggal_beli,
																						`no_pabrik`		= :no_pabrik,
																						`no_rangka`		= :no_rangka,
																						`no_mesin`		= :no_mesin,
																						`no_polisi`		= :no_polisi,
																						`no_bpkb`		= :no_bpkb,
																						`asal_usul`		= :asal_usul,
																						`harga`			= :harga,
																						`keterangan`	= :keterangan,
																						`foto`			= :foto
																				WHERE	`id`				= :id
			");

			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query->bindParam(':kode_barang', $kode_barang, PDO::PARAM_STR);
			$query->bindParam(':kode_bidang', $kode_bidang, PDO::PARAM_STR);
			$query->bindParam(':jenis_barang', $jenis_barang, PDO::PARAM_STR);
			$query->bindParam(':register', $register, PDO::PARAM_STR);
			$query->bindParam(':merek', $merek, PDO::PARAM_STR);
			$query->bindParam(':ukuran', $ukuran, PDO::PARAM_STR);
			$query->bindParam(':bahan', $bahan, PDO::PARAM_STR);
			$query->bindParam(':tanggal_beli', $tanggal_beli, PDO::PARAM_STR);
			$query->bindParam(':no_pabrik', $no_pabrik, PDO::PARAM_STR);
			$query->bindParam(':no_rangka', $no_rangka, PDO::PARAM_STR);
			$query->bindParam(':no_mesin', $no_mesin, PDO::PARAM_STR);
			$query->bindParam(':no_polisi', $no_polisi, PDO::PARAM_STR);
			$query->bindParam(':no_bpkb', $no_bpkb, PDO::PARAM_STR);
			$query->bindParam(':asal_usul', $asal_usul, PDO::PARAM_STR);
			$query->bindParam(':harga', $harga, PDO::PARAM_STR);
			$query->bindParam(':keterangan', $keterangan, PDO::PARAM_STR);
			$query->bindParam(':foto', $foto, PDO::PARAM_STR);

			try {
				$query->execute();
				return true;
			} catch(PDOException $e) {
				return	die($e->getMessage());
			}
		}

		public function deleteData($id) {
			$sql = "DELETE FROM `data_peralatan` WHERE `id` = ?";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $id);

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}
	}
?>
