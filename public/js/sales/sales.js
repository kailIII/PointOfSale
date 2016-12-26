
var app = angular.module('salesApp', []);

app.controller('SalesController', function ($scope, $http) {

    $scope.orders = [];
    $scope.registeredProducts = [];
    $scope.product = {};

    $scope.counter = 0;
    $scope.total = 0;

    $('.ui.search').search({
        apiSettings: {
            url: '/search/products/{query}',
            /*
            beforeSend: function(settings) {
                settings.urlData = {
                    value: $('#product').val()
                };

                return settings;
            }
            */
        },
        fields: {
            results : 'products',
            title   : 'name',
            url     : 'html_url'
        },
        minCharacters : 1,
        onSelect: function(product, response) {
            $scope.product = product;
            $scope.product.quantify = parseInt($('#quantify').val());
            $scope.registeredProducts.push(product.name);
        }
    });
    
    $scope.addProduct = function() {

        if (!isNaN($scope.product.price)) {

            if ($scope.registeredProducts.indexOf($scope.product.name) > -1) {

                var order = {
                    id: ($scope.counter + 1),
                    idProduct: $scope.product.id,
                    name : $scope.product.name,
                    price : $scope.product.price,
                    quantify : $scope.product.quantify,
                    subtotal: $scope.product.price * $scope.product.quantify
                };

                $scope.orders.push(order);
                $scope.totalize();

                $scope.counter = $scope.orders.length;

                $scope.product = {};

            } else {
                alert("Por favor introduzca un producto válido - Second");
            }

        } else {
            alert("Por favor introduzca un producto válido - First");
        }

    };

    $scope.totalize = function() {

        $scope.total = 0;

        $scope.orders.forEach(function(order) {
            $scope.total += order.subtotal;
        });

    };


});