angular.module('CadInternetApp', []);

angular.module('CadInternetApp')
    .controller('CadInternetCtrl', ['$scope', function ($scope) {
        $scope.registros = [];
        $scope.preencheForm = function(){
        	console.log($scope.nome);
        };
    }]);