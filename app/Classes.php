<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public $timestamps = false;
    protected $fillable = ['teacher_user_id', 'student_user_id'];

    public function teacher()
    {
        return $this->belongsTo(\App\User::class, 'teacher_user_id');
    }


}
