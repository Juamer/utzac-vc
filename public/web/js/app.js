var app = angular.module('utzac_vc', []);
app.controller('api', function ($scope, $http) {
    var url = "http://localhost/utzac-vc/public/api/users";
    //Simple GET request example:
    $http({
        method: 'GET',
        url: url
    }).then(function success(response) {
        $scope.users = response.data.data;
        console.log($scope.users);


    }, function error(response) {
        alert("No se pudo cargar los datos");
    });

    //para eliminar
    $scope.borrar = function (id) {
        $http.delete(url + "/" + id).then(function (response) {

            // This function handles success
            alert("dato borrado");
        }, function error(response) {

            // this function handles error
            alert("no se pudo eliminar");
        });
    }

    // Mostrar sesion
    $scope.sesion = true;
    $scope.isLogged = function () {
        if ($scope.sesion == true) {
            return "ng-show";
        } else {
            return "ng-hide";
        }
    }

});