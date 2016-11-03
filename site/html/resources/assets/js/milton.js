$(document).ready(function() {
    $('.loading').fadeIn("slow");
    if ( $.fn.dataTable.isDataTable( '#dataTables' ) ) {
    table = $('#dataTables').DataTable();
    }
    else {
        table = $('#dataTables').DataTable({
            "language": {
    		    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
    		},
            responsive: true
        });
    }
    $('.bg-gradient').fadeOut("slow");
    $('.loading').fadeOut("slow");
});
$('#lista').load('cadastros/pesquisa/status/1');
$('#ok').on('click', function(){
    $('.bg-gradient').fadeIn("slow");
    $('.loading').fadeIn("slow");
    $('#lista').load('cadastros/pesquisa/status/3');
    $('.bg-gradient').fadeOut("slow");
    $('.loading').fadeOut("slow");
});
$('#cadastrando').on('click', function(){
    $('.bg-gradient').fadeIn("slow");
    $('.loading').fadeIn("slow");
    $('#lista').load('cadastros/pesquisa/status/2');
    $('.bg-gradient').fadeOut("slow");
    $('.loading').fadeOut("slow");
});
$('#pendente').on('click', function(){
    $('.bg-gradient').fadeIn("slow");
    $('.loading').fadeIn("slow");
    $('#lista').load('cadastros/pesquisa/status/1');
    $('.bg-gradient').fadeOut("slow");
    $('.loading').fadeOut("slow");
});
$('#todos').on('click', function(){
    $('.bg-gradient').fadeIn("slow");
    $('.loading').fadeIn("slow");
    $('#lista').load('cadastros/pesquisa/status/');
    $('.bg-gradient').fadeOut("slow");
    $('.loading').fadeOut("slow");
});
