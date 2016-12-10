var CadInternetApp = angular.module('CadInternetApp', []);

CadInternetApp.controller('CadInternetCtrl', function(){
    var vm = this;

    // $http({
    //     method: 'GET',
    //     url: 'cadastros/pesquisa/status'
    // }).then(function successCallback(response) {
    //     vm.requisicoes = response;
    //     window.console.log('teste');

    // }, function errorCallback(response) {
    //     alert('Erro.');
    // });
    // window.console.log($http);

    vm.requisicoes = [
        {nome:"FERNANDO VALLADARES KEMP"},
        {nome:"SAJ SDLKFJ LSDKFJS"},
        {nome:"545DSF  SDFSD5 DF"},
        {nome:"SAJDFLJSL S FD"},
        {nome:"SAJDFL DKJF SDF S FD"}
    ];
});