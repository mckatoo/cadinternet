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



setTimeout(function(){
  $('.alert').fadeOut();
}, 3000);