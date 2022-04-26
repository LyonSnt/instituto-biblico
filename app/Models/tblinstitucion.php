<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tblinstitucion
 * @package App\Models
 * @version April 21, 2022, 2:10 am UTC
 *
 * @property string $ins_nombre
 * @property string $ins_direccion
 * @property string $ins_telefono
 * @property string $ins_correo
 */
class tblinstitucion extends Model
{
    use SoftDeletes;


    public $table = 'tblinstitucions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'ins_nombre',
        'ins_direccion',
        'ins_telefono',
        'ins_correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ins_nombre' => 'string',
        'ins_direccion' => 'string',
        'ins_telefono' => 'string',
        'ins_correo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
