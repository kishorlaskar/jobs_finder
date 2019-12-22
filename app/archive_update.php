<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class archive_update extends Model
{
    protected $table = 'job_info';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','client_user_name','company_email','job_designation_id','number_of_vacancies','avilability_day','candidate_min_age','job_type','salary_range','experience_of_years','published_on','deadline'
    ];
}
