<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
    	'subject_code', 'subject_title', 'subject_unit', 'subject_course', 'subject_sem'
    ];
}
