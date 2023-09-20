

$(function () {

	if (!$('#statistiktahun').length) { return false; }
	
	bar ();

	$(window).resize (target_admin.debounce (bar, 325));

});

function bar () {
	$('#statistiktahun').empty ();

	Morris.Bar({
		element: 'statistiktahun',
		data: [
			{ y: '2016', Tanah: 2, Alat: 20, Gedung: 2, Jalan: 2, Lain: 55, Konstruksi:1 },
			{ y: '2017', Tanah: 3, Alat: 30, Gedung: 1, Jalan: 2, Lain: 65, Konstruksi:2 },
			{ y: '2018', Tanah: 4, Alat: 40, Gedung: 1, Jalan: 2, Lain: 30, Konstruksi:3 },
			{ y: '2019', Tanah: 5, Alat: 55, Gedung: 1, Jalan: 2, Lain: 78, Konstruksi:14 },
			{ y: '2020', Tanah: 7, Alat: 37, Gedung: 1, Jalan: 2, Lain: 67, Konstruksi:5},
			{ y: '2021', Tanah: 2, Alat: 89, Gedung: 1, Jalan: 2, Lain: 56, Konstruksi:2 }
		],
		xkey: 'y',
		ykeys: ['Tanah', 'Alat', 'Gedung', 'Jalan', 'Lain', 'Konstruksi'],
		labels: ['Tanah', 'Alat', 'Gedung', 'Jalan', 'Aset Lain', 'Konstruksi'],
		barColors: target_admin.layoutColors
	});
}