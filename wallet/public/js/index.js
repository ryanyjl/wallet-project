angular.module('app', [])
.controller('GetWallet', function($scope, $http) {
    $http.get('http://127.0.0.1:8000/api/wallet/%E2%80%8Bjohn%40wallet.io').
        then(function(response) {
            $scope.data = response.data;
        });
});