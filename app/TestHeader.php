<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestHeader extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'published', 'course_id', 'start_publish_date', 'end_publish_date', 'time'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }

}
