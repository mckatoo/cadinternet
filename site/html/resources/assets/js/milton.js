$('#lista').load('cadastros/pesquisa/status/1');

$('#ok').on('click', function(){
    $('#lista').load('cadastros/pesquisa/status/3');
});

$('#btnApagar').on('click', function(){
	if (confirm('Deseja apagar este registro?')) {
		$('#formApagarRequisicao').submit();
	};
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

$("#btnNovo").on('click', function(){
    $("#formCadastros")[0].reset();
});

function preencheForm(id,nome,rarefunc,mac,tipo,campus,action){
    $("#id").val(id);
    $("#nome").val(nome);
    $("#rarefunc").val(rarefunc);
    $("#MAC").val(mac);
    $("#grupoIP").removeClass('hidden');
    $("#selectTipo").val(tipo);
    $("#selectCampus").val(campus);
    $("#IP").focus();
};

setTimeout(function(){
  $('.alert').fadeOut();
}, 3000);