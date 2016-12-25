<?php

namespace KaizenSales\Http\Controllers;

use Illuminate\Http\Request;
use KaizenSales;

class SearchController extends Controller {

    public function autocomplete(Request $request, $word) {

        return '{"products": ' . KaizenSales\Product::where(
            'name', 'LIKE', '%'.$word.'%'
        )->get() . '}';

    }

}
