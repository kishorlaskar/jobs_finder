<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_Requirments extends Model
{
     protected $table = 'job_requirments';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','job_id','job_requirment_name'
    ];
}
