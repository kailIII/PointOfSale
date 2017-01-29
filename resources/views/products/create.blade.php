@extends('layouts.all')

@section('title', 'Crear producto - Kaizen Sales')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/products/create.css') }}">
@stop

@section('javascript-before')
    <script src="{{ asset('js/products/create.js') }}"></script>
@stop

@section('javascript')
@stop

@section('content')

    <div class="ui middle aligned center aligned grid">

        <div class="column">
            <h2 class="ui blue image header">
                <div class="content">
                    Crear un producto
                </div>
            </h2>
            {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'class' => 'ui large form']) !!}

                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="italic icon"></i>
                            {!! Form::text('name', null,
                                array('required, unique', 'placeholder' => 'Nombre', 'maxlength' => '50'))!!}
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left labeled input">
                            <div class="ui label">$</div>
                            {!! Form::number('price', null,
                                array('required, unique', 'placeholder' => 'Precio', 'min' => '0.0'))!!}
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="align left icon"></i>
                            {!! Form::text('description', null,
                                array('required, unique', 'placeholder' => 'Descripción', 'maxlength' => '150'))!!}
                        </div>
                    </div>
                    <div class="ui fluid large blue submit button">Finalizar</div>
                </div>

                <div class="ui error message"></div>

            {!! Form::close() !!}

        </div>
    </div>

@stop

{{--<div class="input-field col s6">--}}
    {{--{!! Form::text('title', null, array('required, unique')) !!}--}}
{{--</div>--}}

{{--<div class="input-field col s6">--}}
    {{--{!! Form::text('url', null, array('required')) !!}--}}
{{--</div>--}}
{{--<div class="input-field col s6">--}}
    {{--{!! Form::submit('Agregar Vídeo', [ 'class' => 'waves-effect waves-light btn white-text espacioFormulario' ]) !!}--}}
{{--</div>--}}