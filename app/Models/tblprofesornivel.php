<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tblprofesornivel
 * @package App\Models
 * @version April 22, 2022, 6:06 pm -05
 *
 * @property \App\Models\tblprofesordato $tblprofesordato
 * @property \App\Models\tblnivel $tblnivel
 * @property \App\Models\tblsexo $tblsexo
 * @property integer $id
 * @property integer $niv_id
 * @property integer $sex_id
 */
class tblprofesornivel extends Model
{
    use SoftDeletes;


    public $table = 'tblprofesornivels';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'niv_id',
        'sex_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'niv_id' => 'integer',
        'sex_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function profesordato()
    {
        return $this->belongsTo(\App\Models\tblprofesordato::class, 'id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function nivel()
    {
        return $this->belongsTo(\App\Models\tblnivel::class, 'niv_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function sexo()
    {
        return $this->belongsTo(\App\Models\tblsexo::class, 'sex_id', 'id');
    }
}
