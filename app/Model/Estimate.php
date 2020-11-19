<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    //
    protected $primaryKey = 'id';
    
    protected $table = 'estimate';

    protected $fillable = [
        'client_name', 'date', 'seller', 'description', 'value',
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];
}
