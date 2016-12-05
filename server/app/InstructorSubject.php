<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorSubject extends Model
{
    protected $table = 'instructor_subject';

    public function instructor() {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function assessments() {
        return $this->hasMany(Assessment::class, 'ins_sub_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'ins_sub_id');
    }
}
