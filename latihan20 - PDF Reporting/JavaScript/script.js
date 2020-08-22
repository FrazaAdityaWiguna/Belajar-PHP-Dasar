// Sintaks agar dokument dibaca dahulu
$(document).ready(function() {
    $('#tombol-cari').hide();

    // event keyword ketika diketik

    // menggunakan load()
    $('#keyword').on('keyup', function() {

        // munculkan icon loading
        $('.loader').show();

        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // ajax menggunakan $.get()
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loader').hide();
        });
    });

});