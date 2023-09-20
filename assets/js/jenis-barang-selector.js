function getKodeBarang(jenis, kode_barang) {
	switch (jenis) {
		case "tanah":
			document.getElementById("kodetanah").value = kode_barang;
			break;

		case "peralatan":
			document.getElementById("kodeperalatan").value = kode_barang;
			break;

		case "gedung":
			document.getElementById("kodegedung").value = kode_barang;
			break;

		case "jalan":
			document.getElementById("kodejalan").value = kode_barang;
			break;

		case "asetlain":
			document.getElementById("kodeasetlain").value = kode_barang;
			break;

		case "konstruksi":
			document.getElementById("kodekonstruksi").value = kode_barang;
			break;
	}
}

function setJalur(nomor) {
	document.getElementById("jalur").value = nomor;
}
