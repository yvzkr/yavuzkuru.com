$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
    })
})

$(document).ready(function(){
    $('.kategori_sil').click(function(event){
        var kategori_sil_url = $(this).attr('href');
        //confirm(kategori_sil_url);
        $.get(kategori_sil_url,function(response){
            console.log(response);
            var kategori_id = kategori_sil_url.split('/').pop();
            if( $('#kategori-index-' + kategori_id)){
                $('#kategori-index-' + kategori_id).hide();
            }

        });
        event.preventDefault();
    });






});//$(document).ready(function(){