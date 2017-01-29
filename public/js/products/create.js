$(document).ready(function() {

    $('.ui.form').form({
        fields: {
            name: {
                identifier  : 'name',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor, introduzca el nombre del producto'
                    }
                ]
            },
            price: {
                identifier  : 'price',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor, introduzca el precio del producto'
                    }
                ]
            },
            description: {
                identifier  : 'description',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor, introduzca la descripción del producto'
                    }
                ]
            }
        }
    });



});