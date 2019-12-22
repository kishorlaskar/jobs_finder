<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'jobseeker_info';
    public $timestamps = false;
    public $primaryKey = 'jobseekeremail';
    public $incrementing = false;
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'jobseekeremail','firstname','lastname','jobseekerpassword','fathername','mothername','DOB','gender','religion','marital_status','nationality','present_address','permanent_address','mobile','optional_email','title','candidate_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'jobseekerpassword', 'remember_token',
    ];
    //protected $guarded = ['qqq'];

}
