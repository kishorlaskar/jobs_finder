<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_Sources extends Model
{
   protected $table = 'job_sources';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','job_id','job_source_name'
    ];
}
