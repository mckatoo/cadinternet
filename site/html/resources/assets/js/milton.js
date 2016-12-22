$('#lista').load('cadastros/pesquisa/status/1');

$('#ok').on('click', function(){
    $('#lista').load('cadastros/pesquisa/status/3');
});

// INICIO MASCARAS
$('#nome').keyup(function() {
    this.value = this.value.replace(/[^\w\.][ ]|\d/g, '');
});
$('#MAC').mask("AA:AA:AA:AA:AA:AA");
$('#IP').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
        'Z': {
        pattern: /[0-9]/, optional: true
        }
    }
});
//FIM MASCARAS

function apagar(url,id){
    if (confirm('Deseja apagar este registro?')) {
        $.post(url,{_token: $("#token").val(),id: id});
        location.reload();
    };
};


function novo(url){
    $("#IP").removeAttr('required','required');
    $("#grupoIP").addClass('hidden');
    $("#formCadastros").attr('action',url);
    $("#formCadastros")[0].reset();
    $("#id").val("");
};


function ativar(id,nome,rarefunc,mac,tipo,campus,url,status){
    $.post(status,{_token: $("#token").val(),id: id,status: 2});
    $("#formCadastros").attr('action',url);
    $("#id").val(id);
    $("#nome").val(nome);
    $("#rarefunc").val(rarefunc);
    $("#MAC").val(mac);
    $("#grupoIP").removeClass('hidden');
    $("#tipo").val(tipo);
    $("#campus").val(campus);
    $("#IP").attr('required','required');
};


function editar(id,nome,rarefunc,ip,mac,tipo,campus,url,cadastrando){
    $.post(cadastrando,{_token: $("#token").val(),id: id,status: 3});
    $("#formCadastros").attr('action',url);
    $("#id").val(id);
    $("#nome").val(nome);
    $("#rarefunc").val(rarefunc);
    $("#IP").val(ip);
    $("#MAC").val(mac);
    $("#grupoIP").removeClass('hidden');
    $("#tipo").val(tipo);
    $("#campus").val(campus);
    $("#IP").val(ip);
};


function fechar(cadastrando){
	if (($("#id").val() != null) && ($("#id").val() != "")){
	    $.post(cadastrando,{_token: $("#token").val(), id: $("#id").val(), status: 1});
	};
    $("#formCadastros")[0].reset();
    $(".close").click();
};


setTimeout(function(){
  $('.alert').fadeOut();
}, 3000);