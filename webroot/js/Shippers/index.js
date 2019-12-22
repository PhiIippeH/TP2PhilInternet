var app = angular.module('app', []);

app.controller('ShipperCRUDCtrl', ['$scope', 'ShipperCRUDService', function ($scope, ShipperCRUDService) {

    $scope.updateShipper = function () {
        ShipperCRUDService.updateShipper($scope.shipper.shipper_id, $scope.shipper.company_name, $scope.shipper.phone)
            .then(function success(response) {

                    $scope.message = 'Shipper data updated!';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.errorMessage = 'Error updating shipper!';
                    $scope.message = '';
                });
        $scope.getAllShippers();
    }

    $scope.getShipper = function () {
        var id = $scope.shipper.shipper_id;
        ShipperCRUDService.getShipper($scope.shipper.shipper_id)
            .then(function success(response) {

                    $scope.shipper = response.data.data;
                    $scope.shipper.shipper_id = id;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.message = '';
                    if (response.status === 404) {
                        $scope.errorMessage = 'Shipper not found!';
                    } else {
                        $scope.errorMessage = "Error getting shipper!";
                    }
                });
        $scope.getAllShippers();
    }

    $scope.addShipper = function () {
        if ($scope.shipper != null && $scope.shipper.company_name) {
            ShipperCRUDService.addShipper($scope.shipper.company_name, $scope.shipper.phone)
                .then(function success(response) {

                        $scope.message = 'Shipper added!';
                        $scope.errorMessage = '';
                    },
                    function error(response) {
                        $scope.errorMessage = 'Error adding shipper!';
                        $scope.message = '';
                    });
        } else {
            $scope.errorMessage = 'Please enter a name!';
            $scope.message = '';
        }
        $scope.getAllShippers();
    }

    $scope.deleteShipper = function () {
        ShipperCRUDService.deleteShipper($scope.shipper.shipper_id)
            .then(function success(response) {
                    $scope.message = 'Shipper deleted!';
                    $scope.shipper = null;
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.errorMessage = 'Error deleting shipper!';
                    $scope.message = '';
                })
        $scope.getAllShippers();
    }

    $scope.getAllShippers = function () {
        ShipperCRUDService.getAllShippers()
            .then(function success(response) {
                    $scope.shippers = response.data.data;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.message = '';
                    $scope.errorMessage = 'Error getting shippers!';
                });

    }

}]);

app.controller('usersCtrl', function ($scope, $http) {

    // Login Process
    $scope.login = function() {
        //alert(grecaptcha.getResponse(widgetId1));
        if (grecaptcha.getResponse(widgetId1) == '') {
            $scope.captcha_status = 'Please verify captha.';
            return;
        }
        var req = {
            method: 'POST',
            url: 'api/users/token',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {username: $scope.username, password: $scope.password}
        }
        // fields in key-value pairs
        $http(req)
            .success(function(jsonData, status, headers, config) {
                // console.log(jsonData.data.token);
                // tell the user was logged
                Materialize.toast('User sucessfully logged in', 4000);
                localStorage.setItem('token', jsonData.data.token);
                localStorage.setItem('user_id', jsonData.data.id);
                // Switch button for Logout
                $('#login-btn').hide();
                $('#logout-btn').show();
            })
            .error(function(data, status, headers, config) {
                //console.log(data.response.result);
                // tell the user was not logged
                Materialize.toast(data.message, 4000);
            });
        // close modal
        $('#modal-login-form').modal('close');
    }

    $scope.logout = function() {
        localStorage.setItem('token', "no token");
        $('#logout-btn').hide();
        $('#login-btn').show();
        $scope.captcha_status = '';
        // show modal
        $('#modal-logout-form').modal('close');
    }

    $scope.changePassword = function() {
        var req = {
            method: 'PUT',
            url: 'api/users/' + localStorage.getItem("user_id"),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            },
            data: {'password': $scope.newPassword}
        }
        $http(req)
            .success(function(response) {
                // tell the user subcategory record was updated
                Materialize.toast('Password successfully changed', 4000);
                // close modal
                $('#modal-logout-form').modal('close');
            })
            .error(function(response) {
                // tell the user subcategory record was not updated
                //console.log(response);
                Materialize.toast('Could not update Password', 4000);

            });
    }

});





app.service('ShipperCRUDService', ['$http', function ($http) {

    this.getShipper = function getShipper(shipperId) {
        return $http({
            method: 'GET',
            url: urlToRestApi + '/' + shipperId,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

    this.addShipper = function addShipper(company_name, phone) {
        return $http({
            method: 'POST',
            url: urlToRestApi,
            data: {company_name: company_name, phone: phone},
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'

            }
        });
    }

    this.deleteShipper = function deleteShipper(id) {
        return $http({
            method: 'DELETE',
            url: urlToRestApi + '/' + id,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            }
        })
    }

    this.updateShipper = function updateShipper(shipper_id, company_name, phone) {
        return $http({
            method: 'PATCH',
            url: urlToRestApi + '/' + shipper_id,
            data: {company_name: company_name, phone: phone},
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            }
        })
    }

    this.getAllShippers = function getAllShippers() {
        return $http({
            method: 'GET',
            url: urlToRestApi,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

}]);


