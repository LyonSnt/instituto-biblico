<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tbltrimestre
 * @package App\Models
 * @version April 20, 2022, 8:52 pm UTC
 *
 * @property string $tri_descripcion
 */
class tbltrimestre extends Model
{
    use SoftDeletes;


    public $table = 'tbltrimestres';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tri_descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tri_descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
