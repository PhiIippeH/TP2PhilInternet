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
            data: {name: company_name, description: phone},
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

    this.deleteShipper = function deleteShipper(id) {
        return $http({
            method: 'DELETE',
            url: urlToRestApi + '/' + id,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        })
    }

    this.updateShipper = function updateShipper(shipper_id, company_name, phone) {
        return $http({
            method: 'PATCH',
            url: urlToRestApi + '/' + shipper_id,
            data: {name: company_name, description: phone},
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
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


