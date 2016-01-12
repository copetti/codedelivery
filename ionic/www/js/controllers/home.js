angular.module('starter.controllers', [])
    .controller('HomeCtrl', ['$scope', '$http', function ($scope, $http) {

        $scope.user = {
            username : ''
        };

        $http({
            method: 'GET',
            url: 'http://localhost:8000/api/user/authenticated',
        }).then(function (res) {
            $scope.user = {
                username: res.data.name
            };
        }, function (error) {
            console.log(error);
        });
    }]);