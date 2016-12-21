<?php

namespace KaizenSales\Http\Controllers;

use Illuminate\Http\Request;
use KaizenSales;

class SearchController extends Controller {

    public function autocomplete(Request $request) {

        $word = $request->get('word');

        return '{"products": ' . KaizenSales\Product::where(
            'name', 'LIKE', '%'.$word.'%'
        )->get() . '}';

    }

    public function getAllProducts() {
        return KaizenSales\Product::all();
    }

}
