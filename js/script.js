// ambil data json dan tampilkan menggunakan jquery
$.getJSON('data/pizza.json',
  function (pizza) {
    let menu = pizza.menu;
    $.each(menu, function (index, data) {
      $('#daftar-menu').append(getMenu(data));
    });
  }
);

// event saat menu kategori di klik
$('.nav-link').on('click', function () {
  // ubah posisi class active
  $('.nav-link').removeClass('active');
  $(this).addClass('active');

  // mengubah judul berdasarkan kategori
  let kategori = $(this).html();
  $('#title-menu').html(kategori);

  // tampilkan daftar menu sesusai kategori
  $.getJSON('data/pizza.json',
    function (pizza) {
      // reset daftar menu
      $('#daftar-menu').html('');

      let menu = pizza.menu;

      $.each(menu, function (index, data) {
        if (data.kategori === kategori.toLowerCase()) {
          $('#daftar-menu').append(getMenu(data));
          // console.log(data.nama);
        } else if (kategori === 'All Menu') {
          $('#daftar-menu').append(getMenu(data));
        }
      });
    }
  );
});

// buat komponen menu
const getMenu = (data) => {
  return `<div class="col-md-4">
            <div class="card mb-3">
              <div class="card-header">
                ${data.kategori}
              </div>
              <img src="img/menu/${data.gambar}" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">${data.nama}</h5>
                <p class="card-text">${data.deskripsi}</p>
                <h6>Rp. ${data.harga}</h6>
                <a href="#" class="btn btn-primary mt-3">Pesan Sekarang!</a>
              </div>
            </div>
          </div>`;
}