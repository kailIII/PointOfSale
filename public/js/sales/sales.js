$(document).ready(function() {

    $('.ui.search').search({
        apiSettings: {
            url: '/search/products/'
        },
        fields: {
            results : 'products',
            title   : 'name',
            url     : 'html_url'
        },
        minCharacters : 2,
        onSelect: function(result, response) {
            console.log($("#test").val());
            console.warn(result, 'result');
        },
    });

});

var kaizenApp = angular.module('salesApp', []);

kaizenApp.controller('SalesController', function ($scope, $http) {

    // $scope.items = [];
    //
    // $http.get('/get/products/').then(function(data) {
    //     $scope.items = data.data;
    //
    //     console.log($scope.items);
    // });

    $scope.counter = 1;

    $scope.orders = [];

    $scope.addProduct = function() {

        var productItem = {
            id : $scope.counter,
            name : $scope.product.name,
            price : $scope.product.price,
            quantify : $scope.product.quantify
        };

        $scope.orders.push(productItem);

        console.log($scope.orders);

        $scope.counter = $scope.orders.length;

    };

    $scope.getTotal = function() {

        var total = 0;

        $scope.orders.forEach(function(order) {
            total += order.price * order.quantify;
        });

        return total;
    };

});