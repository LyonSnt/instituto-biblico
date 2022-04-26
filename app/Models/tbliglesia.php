<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tbliglesia
 * @package App\Models
 * @version April 21, 2022, 1:50 am UTC
 *
 * @property string $igl_nombre
 * @property string $igl_direccion
 * @property string $igl_telefono
 * @property string $igl_correo
 */
class tbliglesia extends Model
{
    use SoftDeletes;


    public $table = 'tbliglesias';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'igl_nombre',
        'igl_direccion',
        'igl_telefono',
        'igl_correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'igl_nombre' => 'string',
        'igl_direccion' => 'string',
        'igl_telefono' => 'string',
        'igl_correo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
