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

$("#silme").click(function () {
    alert("Silmek istediğinize emin misiniz?");
});