<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['car_model_id', 'kilometers', 'year_created'];
    /**
     * @var mixed
     */
    private $car_model_id;
    /**
     * @var mixed
     */
    private $model;
    /**
     * @var mixed
     */
    private $manufacturer;
}
