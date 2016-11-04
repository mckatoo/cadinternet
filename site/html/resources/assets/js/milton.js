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

function fadein(tempo)
{
    tmp = 1000;
    $('.bg-gradient').fadeIn(tmp);
    $('.loading').fadeIn(tmp);
}

function fadeout(tempo) {
    tmp = 1000;
    $('.bg-gradient').fadeOut(tmp);
    $('.loading').fadeOut(tmp);
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

$('#Principal').on('click', function(){
    $('.itemenu').removeClass('active');
    $('#Principal').addClass('active');
});

$('#tipoAluno').on('click', function(){
    fadein();
    $('.conteudo').load('cadastros/tipo/1');
    $('.itemenu').removeClass('active');
    $('#tipoAluno').addClass('active');
    fadeout();
});

$('#tipoProfessor').on('click', function(){
    fadein();
    $('.conteudo').load('cadastros/tipo/2');
    $('.itemenu').removeClass('active');
    $('#tipoProfessor').addClass('active');
    fadeout();
});

$('#tipoFuncionario').on('click', function(){
    fadein();
    $('.conteudo').load('cadastros/tipo/3');
    $('.itemenu').removeClass('active');
    $('#tipoFuncionario').addClass('active');
    fadeout();
});
