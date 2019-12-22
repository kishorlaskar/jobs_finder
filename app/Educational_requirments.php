<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educational_requirments extends Model
{
    protected $table = 'educational_requirments';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','job_id','education_requirment_name'
    ];
}
