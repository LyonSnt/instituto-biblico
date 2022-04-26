<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tblcargo
 * @package App\Models
 * @version April 21, 2022, 1:02 am UTC
 *
 * @property string $car_descripcion
 */
class tblcargo extends Model
{
    use SoftDeletes;


    public $table = 'tblcargos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'car_descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'car_descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
