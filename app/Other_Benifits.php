<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other_Benifits extends Model
{
    protected $table = 'other_benifits';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','job_id','other_benifit_name'
    ];
}
