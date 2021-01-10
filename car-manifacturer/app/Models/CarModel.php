<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'manufacturer_id'];
    /**
     * @var mixed
     */
    private $manufacturer_id;
    /**
     * @var mixed
     */
    private $manufacturer;
}
