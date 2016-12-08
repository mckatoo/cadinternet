(function(){
    var CadInternet = angular.module('CadInternet',['infinite-scroll']);
    
    CadInternet.controller('RequisicoesController', function ($scope, Contents){
        $scope.contents = new Contents();
    });
    
    CadInternet.factory('Contents', [function($http){
        var Contents = function(){
            this.items = [];
            this.busy = false;
            this.page = 1;
        }

        Contents.prototype.nextPage = function(){
//                this.items = ['1','2','3'];
            var url = 'cadastros/json/status';
        };

        return Contents;
    }])
});



angular.module("CadInternet",[])
        .controller("RequisicoesController",['$scope',function($scope){
                $scope.msg = "Olá Mundo!!!";
}]);