


// Main HTTP Service
var app = angular.module('utzac_vc', []);

app.controller('api', function ($scope, $http) {
    var url = "http://localhost/utzac-vc/public/index.php/api/users";
    var url2 = "http://localhost/utzac-vc/public/index.php/api/solicituds";
    
    
    
    //Simple GET request example:
    $scope.cargarSolicitudes = function () {
        $http({
            method: 'GET',
            url:'http://localhost/utzac-vc/public/index.php/api/solicituds'
        }).then(function success(response) {
            $scope.solicituds = response.data.data;
            console.log($scope.solicituds);
        }, function error(response) {
            alert("No se pudo cargar los datos");
        });

    }

    $scope.CrearUsuario = function (datosNuevos) {
        if (datosNuevos.id == null) {
            //Call the services
            $http.post(url, JSON.stringify(datosNuevos)).then(function (response) {
                $("#usuarioModal").modal('hide');
                   // $scope.users.push(response.data.data);
                //console.log(response);
                $scope.msg = "Post Data Submitted Successfully!";
               
            }, function error(response) {
                console.log(response.data);
                alert(response.data.error)

            });
        } else {
            $http.put(url + "/" + user.id, JSON.stringify(user))
                .then(function (response) {
                    console.log("datos actualizado");
                }, function error(response) {
                    console.log("Error al Actualizar");
                    console.log(response.data);
                });
        };
    }

    $scope.CrearSolicitud = function (nuevosDatos, solicitud) {
        if (nuevosDatos.id == null) {
            //Call the services
            $http.post(url2, JSON.stringify(nuevosDatos)).then(function (response) {
                $("#solicitudModal").modal('hide');
                   // $scope.users.push(response.data.data);
                //console.log(response);
                $scope.msg = "Post Data Submitted Successfully!";
               
            }, function error(response) {
                console.log(response.data);
                alert(response.data.error)

            });
        } else {
            $http.put(url2 + "/" + nuevosDatos.id, JSON.stringify(nuevosDatos))
                .then(function (response) {
                    console.log("datos actualizado");
                    $("#solicitudModal").modal('hide');
                }, function error(response) {
                    console.log("Error al Actualizar");
                    console.log(response.data);
                });
        };
    }
    
    
    //para eliminar
    $scope.borrar = function (id, index) {
        console.log(url2 + "/" + id)
        $http.delete(url2 + "/" + id).then(function (response) {

            // This function handles success
            $scope.solicituds.splice(index, 1);
            alert("dato borrado");
        }, function error(response) {

            // this function handles error
            alert("no se pudo eliminar");
        });
    }

    $scope.editar = function (registro) {
        $scope.nuevosDatos = registro;
        $("#solicitudModal").modal('show');
    }

    

    
    

    $scope.login = function(login){
        console.log('login');
        var data = {
            usuario: log.usuario,
            password: users.password
        };
      $http.post(url+"/users", JSON.stringify(data))
      .then(function (response) {
          if(response.data.token){
              alert('Validado : ' + response.data.token );
              localStorage.setItem("token", response.data.token);
              $('#loginModal').modal('show');
              $scope.cargarUsuarios();
             // $scope.sesion = true;
          }else{
              alert(response.data );
          }
          console.log(response.data);
      }, function error(response) {
          //console.log(response.data.error);
          alert(response.data.error);
      });
}



    // datos nuevos
    $scope.nuevoDatos = {};
    $scope.solicitud = {};


    // Mostrar sesion
    //$scope.sesion = false;


    //$scope.isLogged = function () {
        //if ($scope.sesion == true) {
           // return "ng-show";
        //} else {
            //return "ng-hide";
        //}
    //}

});