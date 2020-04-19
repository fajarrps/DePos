const flashData = $('.flash-data').data('flashdata');

if (flashData == 'Restoran') 
{
	Swal({
		title: flashData + ' Baru',
		text: 'Berhasil Ditambahkan',
		type: 'success'
	});
}

// if (flashData == 'Barang' || flashData == 'Pelanggan' || flashData == 'Transaksi' || flashData == 'Jasa Antar' || flashData == 'Admin' || flashData == 'Tempat Jual') 
// {
// 	Swal({
// 		title: flashData + ' Baru',
// 		text: 'Berhasil Ditambahkan',
// 		type: 'success'
// 	});
// }

// else if (flashData == 'Update Barang' || flashData == 'Update Pelanggan' || flashData == 'Update Admin' || flashData == 'Update Transaksi') 
// {
// 	Swal({
// 		title: flashData + ' Berhasil',
// 		text: 'Data berhasil di edit',
// 		type: 'success'
// 	});
// }

// else if (flashData == 'Nonaktif Barang' || flashData == 'Nonaktif Pelanggan' || flashData == 'Nonaktif Admin' || flashData == 'Aktifkan Pelanggan' || flashData == 'Aktifkan Barang' || flashData == 'Aktifkan Admin' || flashData == 'Barang Retur') 
// {
// 	Swal({
// 		title: flashData,
// 		text: 'Berhasil',
// 		type: 'success'
// 	});
// }

// else if (flashData == 'Transaksi Berhasil') 
// {
// 	Swal({
// 		title: flashData,
// 		text: 'Barang telah terkirim',
// 		type: 'success'
// 	});
// }

// else if (flashData == 'Pesan Terkirim') 
// {
// 	Swal({
// 		title: flashData,
// 		text: 'Pesan telah terkirim',
// 		type: 'success'
// 	});
// }

// else if (flashData == 'Transaksi Berhasil Error') 
// {
// 	Swal({
// 		title: 'Transaksi Berhasil',
// 		text: 'tetapi tidak dapat mengirim resi melalui Email',
// 		type: 'warning'
// 	});
// }

// else if (flashData == 'Kirim Pesan Error') 
// {
// 	Swal({
// 		title: 'Pesan Error',
// 		text: 'Terdapat kesalahan saat mengirim Email',
// 		type: 'warning'
// 	});
// }

// else if (flashData == 'Invoice Dikirim') 
// {
// 	Swal({
// 		title: flashData,
// 		text: 'Invoice berhasil dikirim melalui Email',
// 		type: 'success'
// 	});
// }

// else if (flashData == 'Invoice Tidak Dikirim') 
// {
// 	Swal({
// 		title: flashData,
// 		text: 'Invoice tidak berhasil dikirim melalui Email',
// 		type: 'warning'
// 	});
// }

// else if (flashData == 'Ongkir Ditambahkan') 
// {
// 	Swal({
// 		title: flashData,
// 		text: 'Ongkir dan Jasa Kurir Berhasil Ditambahkan',
// 		type: 'success'
// 	});
// }

// else if (flashData == 'Pembayaran') 
// {
// 	Swal({
// 		title: flashData + ' Berhasil',
// 		text: 'Kembali ke Detail Transaksi',
// 		type: 'success'
// 	});
// }

// else if (flashData == 'Transaksi Batal') 
// {
// 	Swal({
// 		title: flashData,
// 		text: 'Transaksi berhasil dibatalkan',
// 		type: 'success'
// 	});
// }

// else if (flashData == 'Transaksi Aktif') 
// {
// 	Swal({
// 		title: flashData,
// 		text: 'Transaksi berhasil diaktifkan',
// 		type: 'success'
// 	});
// }

// else if(flashData)
// {
// 	Swal({
// 	  type: 'error',
// 	  title: 'Error',
// 	  text: flashData,
// 	});
// }

// $(document).ready(function(){
//   $(".tombol-nonaktif-bar").click(function(event){
//     event.preventDefault();
//     const href = $(this).attr('href');

//     Swal({
// 	  title: 'Apa Anda Yakin?',
// 	  text: "Ingin menonaktifkan barang ini?",
// 	  type: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes'
// 	}).then((result) => {
// 	  if (result.value) {
// 	    document.location.href = href;
// 	  }
// 	})
//   });
// });

// $(document).ready(function(){
//   $(".tombol-aktif-bar").click(function(event){
//     event.preventDefault();
//     const href = $(this).attr('href');

//     Swal({
// 	  title: 'Apa Anda Yakin?',
// 	  text: "Ingin mengaktifkan barang ini?",
// 	  type: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes'
// 	}).then((result) => {
// 	  if (result.value) {
// 	    document.location.href = href;
// 	  }
// 	})
//   });
// });

// $(document).ready(function(){
//   $(".tombol-nonaktif-pel").click(function(event){
//     event.preventDefault();
//     const href = $(this).attr('href');

//     Swal({
// 	  title: 'Apa Anda Yakin?',
// 	  text: "Ingin menonaktifkan pelanggan ini?",
// 	  type: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes'
// 	}).then((result) => {
// 	  if (result.value) {
// 	    document.location.href = href;
// 	  }
// 	})
//   });
// });

// $(document).ready(function(){
//   $(".tombol-aktif-pel").click(function(event){
//     event.preventDefault();
//     const href = $(this).attr('href');

//     Swal({
// 	  title: 'Apa Anda Yakin?',
// 	  text: "Ingin mengaktifkan pelanggan ini?",
// 	  type: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes'
// 	}).then((result) => {
// 	  if (result.value) {
// 	    document.location.href = href;
// 	  }
// 	})
//   });
// });

// $(document).ready(function(){
//   $(".tombol-nonaktif-trans").click(function(event){
//     event.preventDefault();
//     const href = $(this).attr('href');

//     Swal({
// 	  title: 'Apa Anda Yakin?',
// 	  text: "Ingin membatalkan transaksi ini?",
// 	  type: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes'
// 	}).then((result) => {
// 	  if (result.value) {
// 	    document.location.href = href;
// 	  }
// 	})
//   });
// });

// $(document).ready(function(){
//   $(".tombol-aktif-trans").click(function(event){
//     event.preventDefault();
//     const href = $(this).attr('href');

//     Swal({
// 	  title: 'Apa Anda Yakin?',
// 	  text: "Ingin mengaktifkan transaksi ini?",
// 	  type: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes'
// 	}).then((result) => {
// 	  if (result.value) {
// 	    document.location.href = href;
// 	  }
// 	})
//   });
// });

// $(document).ready(function(){
//   $(".tombol-batal-trans").click(function(event){
//     event.preventDefault();
//     const href = $(this).attr('href');

//     Swal({
// 	  title: 'Apa Anda Yakin?',
// 	  text: "Ingin membatalkan transaksi ini?",
// 	  type: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes'
// 	}).then((result) => {
// 	  if (result.value) {
// 	    document.location.href = href;
// 	  }
// 	})
//   });
// });

// $(document).ready(function(){
//   $(".tombol-bayar-trans").click(function(event){
//     event.preventDefault();
//     const href = $(this).attr('href');

//     Swal({
// 	  title: 'Apa Anda Yakin?',
// 	  text: "Ingin melanjutkan transaksi ini?",
// 	  type: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes'
// 	}).then((result) => {
// 	  if (result.value) {
// 	    document.location.href = href;
// 	  }
// 	})
//   });
// });


// /// ADMIN
// $(document).ready(function(){
//   $(".tombol-nonaktif-adm").click(function(event){
//     event.preventDefault();
//     const href = $(this).attr('href');

//     Swal({
// 	  title: 'Apa Anda Yakin?',
// 	  text: "Ingin menonaktifkan admin ini?",
// 	  type: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes'
// 	}).then((result) => {
// 	  if (result.value) {
// 	    document.location.href = href;
// 	  }
// 	})
//   });
// });

// $(document).ready(function(){
//   $(".tombol-aktif-adm").click(function(event){
//     event.preventDefault();
//     const href = $(this).attr('href');

//     Swal({
// 	  title: 'Apa Anda Yakin?',
// 	  text: "Ingin mengaktifkan admin ini?",
// 	  type: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes'
// 	}).then((result) => {
// 	  if (result.value) {
// 	    document.location.href = href;
// 	  }
// 	})
//   });
// });