
angular.module('SaleService', [])
    .factory('Sale', function($http) {
        return {
            save: function (total) {
                return $http({
                    method: 'POST',
                    url: '/sales',
                    data: {
                        total: total
                    } // {}
                });
            }
        }
    });

var app = angular.module('salesApp', ['SaleService']);

app.controller('SalesController', function ($scope, Sale) {

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

    $scope.saveSale = function() {

        if ($scope.orders.length != 0) {

            console.log('Guardando la venta');

            Sale.save($scope.total).then(function(data) {

                console.log(data);

            });

        } else {

            alert('Aún no hay nada añadido');

        }

    };

    $scope.action = "Agregar";
    
    $scope.actionOrder = function() {

        if ($scope.action === "Agregar") {

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

        } else {

            if ($scope.action === "Editar") {

                $scope.product.subtotal = $scope.product.quantify * $scope.product.price;

                $scope.totalize();

                $scope.revert();

            }

        }

    };

    $scope.deleteOrder = function(index) {
        $scope.orders.splice(index, 1);
        $scope.totalize();
    };

    $scope.editing = false;

    $scope.auxProduct = {};

    $scope.editOrder = function(index) {

        $scope.product = $scope.orders[index];

        $scope.auxProduct = JSON.parse(JSON.stringify($scope.orders[index]));;

        $scope.action = "Editar";

        $scope.editing = true;

        $('#gridAction').removeClass('three column grid');
        $('#gridAction').addClass('four column grid');

    };

    $scope.changing = function() {

        //console.log($scope.product);
        //console.log($scope.auxProduct);

    }

    $scope.cancel = function() {

        $scope.product.quantify = $scope.auxProduct.quantify;

        $scope.revert();

    };

    $scope.revert = function() {

        $scope.editing = false;

        $scope.product = {};
        $scope.action = "Agregar";

        $('#gridAction').removeClass('four column grid');
        $('#gridAction').addClass('three column grid');

    };

    $scope.totalize = function() {

        $scope.total = 0;

        $scope.orders.forEach(function(order) {
            $scope.total += order.subtotal;
        });

    };

});