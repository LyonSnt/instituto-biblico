<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tblsexo
 * @package App\Models
 * @version April 21, 2022, 1:46 am UTC
 *
 * @property string $sex_descripcion
 */
class tblsexo extends Model
{
    use SoftDeletes;


    public $table = 'tblsexos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'sex_descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sex_descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
