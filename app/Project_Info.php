<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Info extends Model
{
    protected $table = 'project_info';
    public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','jobseeker_id','project_name','project_discription','project_link'
    ];
}
