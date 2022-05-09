<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Mes
 * @package App\Models
 * @version May 9, 2022, 12:28 pm -05
 *
 * @property string $mes_nombre
 */
class Mes extends Model
{
    use SoftDeletes;


    public $table = 'mes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'mes_nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mes_nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
