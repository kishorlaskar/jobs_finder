<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lannguage_Info extends Model
{
    protected $table = 'language_info';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','jobseeker_id','language','language_spoken_type','language_writting_type','language_reading_type'
    ];
}
