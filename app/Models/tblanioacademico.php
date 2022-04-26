<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tblanioacademico
 * @package App\Models
 * @version April 21, 2022, 1:56 am UTC
 *
 * @property string $ani_anio
 */
class tblanioacademico extends Model
{
    use SoftDeletes;


    public $table = 'tblanioacademicos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'ani_anio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ani_anio' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
