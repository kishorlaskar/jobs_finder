<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill_Info extends Model
{
   protected $table = 'skill_info';
    public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','jobseeker_id','skill','skill_experiance','skill_proficency'
    ];
}
