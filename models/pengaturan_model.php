<?php
	class pengaturan_model {
		private $db;

		public function __construct($database) {
			$this->db = $database;
		}

		public function getDataById($id) {
			$query = $this->db->prepare("SELECT * FROM `pengaturan` WHERE `id` = :id");
			$query->bindParam(':id', $id, PDO::PARAM_INT);

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}

			return $query->fetch(PDO::FETCH_ASSOC);
		}

		public function updateData($kode_lokasi, $nama_kepala, $nama_pengguna, $nama_pengurus, $email, $logo, $id) {
			$query = $this->db->prepare("UPDATE `pengaturan` SET			`kode_lokasi`		= :kode_lokasi,
																							`nama_kepala`		= :nama_kepala,
																							`nama_pengguna`	= :nama_pengguna,
																							`nama_pengurus`	= :nama_pengurus,
																							`email`				= :email,
																							`logo`				= :logo
																				WHERE		`id`					= :id
			");

			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query->bindParam(':kode_lokasi', $kode_lokasi, PDO::PARAM_STR);
			$query->bindParam(':nama_kepala', $nama_kepala, PDO::PARAM_STR);
			$query->bindParam(':nama_pengguna', $nama_pengguna, PDO::PARAM_STR);
			$query->bindParam(':nama_pengurus', $nama_pengurus, PDO::PARAM_STR);
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':logo', $logo, PDO::PARAM_STR);

			try {
				$query->execute();
				return true;
			} catch(PDOException $e) {
				return	die($e->getMessage());
			}
		}
	}
?>
