<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_Description extends Model
{
    protected $table = 'job_description';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','job_id','job_description_details'
    ];
}
