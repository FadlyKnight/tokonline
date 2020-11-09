$('#alamat').change(function(){

    var al = $(this).children("option:selected").val();
    var id = $(this).attr('id');

    var bro = al
    var jum = $('#berat').val();
    if(bro == 0){
        $('#dval').val(0);
    }else{
        var hargaBarang = $('.barang').val();
        var totalBiaya = parseInt(hargaBarang) ;
        $('.hasil').val(totalBiaya);
        $('#dval').val(0);        
    }
});

$('.submit-button').on('click', function () {
    if ($('#alamat').val() == null || $('#alamat').val() == "") {
        tes = $('#alamat-wajib').removeClass('d-none').addClass('d-inline');   
    }
});

var hargaBarang = $('.barang').val();
var totalBiaya = parseInt(hargaBarang) ;
$('.hasil').val(totalBiaya);
$('.hasil-disabled').val(totalBiaya);
$('#dval').val(0);

$('#dbut').on('click' , function(){

    var kode = $('#dkod').val();
    var al = $('#alamat').children("option:selected").val();
    if(kode !=="" && al !== 0){
        var t1 = $('.hasil').val();
        var d1 = new Date();//tanggal sekarang
        $.ajax({   
            method: 'get',   
            url: '/ambilDiskon',
            dataType : 'json',
            data: { 'k_dis': kode},
            success: function (result){
                var d2 = new Date(result.expired);// tanggal expired
                if(d1.getTime() < d2.getTime() && result.status_diskon == "Belum"){
                    //jika kode belum expired
                    $('#dval').val(result.jumlah_diskon);
                    var akhir = parseInt(t1) - parseInt(result.jumlah_diskon);
                    $('.hasil').val(akhir);
                    $('.hasil-disabled').val(akhir);
                    $('#dbut').attr('disabled', true);

                }else{
                    //jika kode telah expired
                    $('#dval').val('kode expired');
                    var ha1 = $('.barang').val();
                    var ha3 = parseInt(ha1);
                    $('.hasil').val(ha3);
                    $('.hasil-disabled').val(ha3);
                    
                }
            },
            error: function(xhr, status, error) {
                // alert(error);
                $('#dval').val('kode salah');
                var ha1 = $('.barang').val();
                var ha3 = parseInt(ha1);
                $('.hasil').val(ha3);
                $('.hasil-disabled').val(ha3);

            }
        });
    }
    

});