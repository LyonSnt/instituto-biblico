<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tblaula
 * @package App\Models
 * @version April 21, 2022, 1:52 am UTC
 *
 * @property string $aul_nombre
 */
class tblaula extends Model
{
    use SoftDeletes;


    public $table = 'tblaulas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'aul_nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'aul_nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
