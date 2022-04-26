<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tblestadocivil
 * @package App\Models
 * @version April 21, 2022, 1:05 am UTC
 *
 * @property string $esc_decripcion
 */
class tblestadocivil extends Model
{
    use SoftDeletes;


    public $table = 'tblestadocivils';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'esc_decripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'esc_decripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
