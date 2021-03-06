@extends('layouts.all')

@section('title', 'Ventas - Kaizen Sales')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sales/main.css') }}">
@stop

@section('javascript-before')
    <script src="{{ asset('js/sales/main.js') }}"></script>
@stop

@section('javascript')
@stop

@section('content')

    <div class="pusher" ng-app="salesApp" ng-controller="SalesController">

        <div class="ui vertical stripe segment">
            <h1 class="ui header container">Bienvenido {{$userName}}!</h1>
            <div class="ui middle aligned piled segment stackable grid container ">
                <div class="row">
                    <div class="eight wide column">
                        <div class="ui aligned stackable grid">
                            <div class="row">
                                <div class="seven wide column">
                                    <h3 class="ui header ">Número de venta:</h3>
                                </div>
                                <div class="five wide column">
                                    <h3 class="ui header ">09</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="eight wide right floated column" align="right">
                        <h2>Sábado, 31 de diciembre de 2016</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="aligned column">
                        <p>03:49 hrs - 10a Oriente Sur #185, Tuxtla Gtz, Chiapas</p>
                    </div>
                </div>
            </div>

            <div class="ui middle aligned piled segment stackable grid container">

                <div class="row">
                    <div class="wide column">
                        <h1>Cuenta:</h1>
                        <div class="ui three column grid aligned stackable" id="gridAction">
                            <form class="row" ng-submit="actionOrder()">
                                <div class="column">
                                    <div class="big ui search">
                                        <div class="ui fluid icon input">
                                            <input class="prompt" type="text" placeholder="Buscar producto..."
                                                   id="product" name="word" ng-model="product.name" ng-readonly="editing" required>
                                            <i class="search icon"></i>
                                        </div>
                                        <div class="results"></div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="big ui fluid right labeled input">
                                        <input type="number" min="1" placeholder="Cantidad..." id="quantify"
                                               ng-model="product.quantify"
                                               ng-change="changing()"
                                               required>
                                        <div class="ui basic label">
                                            Unidades
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                        <button type="submit" class="big ui fluid blue button">
                                        <i class="check square icon"></i>
                                        @{{action}}
                                    </button>
                                </div>
                                <div class="column" ng-show="action === 'Editar'">
                                    <button type="button" class="big ui fluid grey button" ng-click="cancel()">
                                        <i class="add circle icon"></i>
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="wide column">
                        <table class="ui inverted table celled structured">
                            <thead>
                                <tr>
                                    <th class="two wide center aligned">No</th>
                                    <th class="one wide center aligned">ID</th>
                                    <th class="center aligned">Nombre</th>
                                    <th class="two wide center aligned">Precio</th>
                                    <th class="two wide center aligned">Cantidad</th>
                                    <th class="two wide center aligned">Remover</th>
                                    <th class="two wide center aligned">Editar</th>
                                    <th class="two wide center aligned">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="order in orders track by $index">
                                    <td>@{{order.id}}</td>
                                    <td>@{{order.idProduct}}</td>
                                    <td>@{{order.name}}</td>
                                    <td>@{{order.price | number : 2}}</td>
                                    <td>@{{order.quantify | number : 2}}</td>
                                    <td class="center aligned">
                                        <button class="ui red tiny button" ng-click="deleteOrder($index)">
                                            <i class="minus icon"></i>
                                            Remover
                                        </button>
                                    </td>
                                    <td class="center aligned">
                                        <button class="ui blue tiny button" ng-click="editOrder($index)">
                                            <i class="edit icon"></i>
                                            Editar
                                        </button>
                                    </td>
                                    <td class="center aligned">@{{order.subtotal | number : 2}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>
                                    <ng-pluralize count="orders.length" when=
                                        "{'0': 'No hay ordenes.',
                                         'one': '1 orden.',
                                         'other': '@{{orders.length}} ordenes.'}">
                                    </ng-pluralize>
                                </th>
                                <th colspan="5" class="center aligned">
                                    <button ng-click="saveSale()" class="ui green big button" style="width: 90%">
                                        <i class="rocket icon"></i>
                                        Finalizar venta!
                                    </button>
                                </th>
                                <th class="right aligned"><h2>Total:</h2></th>
                                <th class="center aligned"><h2>@{{total | number : 2}}</h2></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui vertical stripe segment">
            <div class="ui text container">
                <h3 class="ui header">Breaking The Grid, Grabs Your Attention</h3>
                <p>Instead of focusing on content creation and hard work, we have learned how to master the art of doing nothing by providing massive amounts of whitespace and generic content that can seem massive, monolithic and worth your attention.</p>
                <a class="ui large button">Read More</a>
                <h4 class="ui horizontal header divider">
                    <a href="#">Case Studies</a>
                </h4>
                <h3 class="ui header">Did We Tell You About Our Bananas?</h3>
                <p>Yes I know you probably disregarded the earlier boasts as non-sequitur filler content, but its really true. It took years of gene splicing and combinatory DNA research, but our bananas can really dance.</p>
                <a class="ui large button">I'm Still Quite Interested</a>
            </div>
        </div>
    </div>

@stop