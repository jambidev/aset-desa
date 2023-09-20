<?php
	class data_asetlain_model {
		private $db;

		public function __construct($database) {
			$this->db = $database;
		}

		public function countData() {
			$query = $this->db->prepare("SELECT * FROM `data_asetlain`");

			try {
				$query->execute();
				return $query->rowCount();
			} catch(PDOException $e){
				$e->getMessage();
			}
		}

		public function getDataLengkap() {
			$query = $this->db->prepare("SELECT * FROM `data_asetlain`");

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}

			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getDataById($id) {
			$query = $this->db->prepare("SELECT * FROM `data_asetlain` WHERE `id` = :id");
			$query->bindParam(':id', $id, PDO::PARAM_INT);

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}

			return $query->fetch(PDO::FETCH_ASSOC);
		}

		public function countDataByKB($kb) {
			$query = $this->db->prepare("SELECT * FROM `data_asetlain` WHERE `kode_bidang` = :kb");
			$query->bindParam(':kb', $kb, PDO::PARAM_STR);

			try {
				$query->execute();
				return $query->rowCount();
			} catch(PDOException $e){
				$e->getMessage();
			}
		}

		public function getDataByKB($kb) {
			$query = $this->db->prepare("SELECT * FROM `data_asetlain` WHERE `kode_bidang` = :kb");
			$query->bindParam(':kb', $kb, PDO::PARAM_STR);

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}

			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function insertData($kode_barang, $kode_bidang, $jenis_barang, $register, $jalur, $judul_buku, $spesifikasi_buku, 
			$asal_daerah, $pencipta_kesenian, $bahan_kesenian, $jenis, $ukuran, $jumlah, $tanggal_cetak, $asal_usul, $harga, 
			$keterangan, $foto) {
			$query = $this->db->prepare("INSERT INTO `data_asetlain` SET	`kode_barang`			= :kode_barang,
																								`kode_bidang`			= :kode_bidang,
																								`jenis_barang`			= :jenis_barang,
																								`register`				= :register,
																								`jalur`					= :jalur,
																								`judul_buku`			= :judul_buku,
																								`spesifikasi_buku`	= :spesifikasi_buku,
																								`asal_daerah`			= :asal_daerah,
																								`pencipta_kesenian`	= :pencipta_kesenian,
																								`bahan_kesenian`		= :bahan_kesenian,
																								`jenis`					= :jenis,
																								`ukuran`					= :ukuran,
																								`jumlah`					= :jumlah,
																								`tanggal_cetak`		= :tanggal_cetak,
																								`asal_usul`				= :asal_usul,
																								`harga`					= :harga,
																								`keterangan`			= :keterangan,
																								`foto`					= :foto
			");

			$query->bindParam(':kode_barang', $kode_barang, PDO::PARAM_STR);
			$query->bindParam(':kode_bidang', $kode_bidang, PDO::PARAM_STR);
			$query->bindParam(':jenis_barang', $jenis_barang, PDO::PARAM_STR);
			$query->bindParam(':register', $register, PDO::PARAM_STR);
			$query->bindParam(':jalur', $jalur, PDO::PARAM_STR);
			$query->bindParam(':judul_buku', $judul_buku, PDO::PARAM_STR);
			$query->bindParam(':spesifikasi_buku', $spesifikasi_buku, PDO::PARAM_STR);
			$query->bindParam(':asal_daerah', $asal_daerah, PDO::PARAM_STR);
			$query->bindParam(':pencipta_kesenian', $pencipta_kesenian, PDO::PARAM_STR);
			$query->bindParam(':bahan_kesenian', $bahan_kesenian, PDO::PARAM_STR);
			$query->bindParam(':jenis', $jenis, PDO::PARAM_STR);
			$query->bindParam(':ukuran', $ukuran, PDO::PARAM_STR);
			$query->bindParam(':jumlah', $jumlah, PDO::PARAM_STR);
			$query->bindParam(':tanggal_cetak', $tanggal_cetak, PDO::PARAM_STR);
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

		public function updateData($kode_barang, $kode_bidang, $jenis_barang, $register, $jalur, $judul_buku, $spesifikasi_buku, 
			$asal_daerah, $pencipta_kesenian, $bahan_kesenian, $jenis, $ukuran, $jumlah, $tanggal_cetak, $asal_usul, $harga, 
			$keterangan, $foto, $id) {
			$query = $this->db->prepare("UPDATE `data_asetlain` SET	`kode_barang`			= :kode_barang,
																						`kode_bidang`			= :kode_bidang,
																						`jenis_barang`			= :jenis_barang,
																						`register`				= :register,
																						`jalur`					= :jalur,
																						`judul_buku`			= :judul_buku,
																						`spesifikasi_buku`	= :spesifikasi_buku,
																						`asal_daerah`			= :asal_daerah,
																						`pencipta_kesenian`	= :pencipta_kesenian,
																						`bahan_kesenian`		= :bahan_kesenian,
																						`jenis`					= :jenis,
																						`ukuran`					= :ukuran,
																						`jumlah`					= :jumlah,
																						`tanggal_cetak`		= :tanggal_cetak,
																						`asal_usul`				= :asal_usul,
																						`harga`					= :harga,
																						`keterangan`			= :keterangan,
																						`foto`					= :foto
																				WHERE `id`						= :id
			");

			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query->bindParam(':kode_barang', $kode_barang, PDO::PARAM_STR);
			$query->bindParam(':kode_bidang', $kode_bidang, PDO::PARAM_STR);
			$query->bindParam(':jenis_barang', $jenis_barang, PDO::PARAM_STR);
			$query->bindParam(':register', $register, PDO::PARAM_STR);
			$query->bindParam(':jalur', $jalur, PDO::PARAM_STR);
			$query->bindParam(':judul_buku', $judul_buku, PDO::PARAM_STR);
			$query->bindParam(':spesifikasi_buku', $spesifikasi_buku, PDO::PARAM_STR);
			$query->bindParam(':asal_daerah', $asal_daerah, PDO::PARAM_STR);
			$query->bindParam(':pencipta_kesenian', $pencipta_kesenian, PDO::PARAM_STR);
			$query->bindParam(':bahan_kesenian', $bahan_kesenian, PDO::PARAM_STR);
			$query->bindParam(':jenis', $jenis, PDO::PARAM_STR);
			$query->bindParam(':ukuran', $ukuran, PDO::PARAM_STR);
			$query->bindParam(':jumlah', $jumlah, PDO::PARAM_STR);
			$query->bindParam(':tanggal_cetak', $tanggal_cetak, PDO::PARAM_STR);
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
			$sql = "DELETE FROM `data_asetlain` WHERE `id` = ?";
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
