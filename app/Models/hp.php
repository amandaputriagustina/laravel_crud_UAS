<?php

namespace App\Models;

use Illuminate\Databae\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class hp extends Eloquent
{

    protected $connection = 'mongodb';
    protected $collection = 'hp';

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'merk', 'type', 'warna', 'harga'

    ];
}
