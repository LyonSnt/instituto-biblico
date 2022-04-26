<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tblnivel
 * @package App\Models
 * @version April 21, 2022, 1:47 am UTC
 *
 * @property string $niv_descripcion
 */
class tblnivel extends Model
{
    use SoftDeletes;


    public $table = 'tblnivels';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'niv_descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'niv_descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
