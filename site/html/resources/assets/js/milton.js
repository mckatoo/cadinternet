$(document).ready(function() {
    fadein();
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
    fadeout();
});

function fadein()
{
    $('.bg-gradient').fadeIn("slow");
    $('.loading').fadeIn("slow");
}

function fadeout() {
    $('.bg-gradient').fadeOut("slow");
    $('.loading').fadeOut("slow");
}

$('#lista').load('cadastros/pesquisa/status/1');
$('#ok').on('click', function(){
    fadein();
    $('#lista').load('cadastros/pesquisa/status/3');
    fadeout();
});
$('#cadastrando').on('click', function(){
    fadein();
    $('#lista').load('cadastros/pesquisa/status/2');
    fadeout();
});
$('#pendente').on('click', function(){
    fadein();
    $('#lista').load('cadastros/pesquisa/status/1');
    fadeout();
});
$('#todos').on('click', function(){
    fadein();
    $('#lista').load('cadastros/pesquisa/status/');
    fadeout();
});
$('#tipoAluno').on('click', function(){
    fadein();
    $('.conteudo').load('cadastros/tipo/1');
    fadeout();
});
