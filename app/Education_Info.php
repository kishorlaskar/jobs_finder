<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education_Info extends Model
{
     protected $table = 'education_info';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','jobseeker_id','education_title','education_major','education_institute_name','education_result','passing_year'
    ];
}
