<?php

namespace KaizenSales;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = ['date', 'total'];
}
