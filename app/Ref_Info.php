<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ref_Info extends Model
{
      protected $table = 'ref_info';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','jobseeker_id','ref_name','ref_designation','ref_relationship','ref_phone','ref_email'
    ];
}
