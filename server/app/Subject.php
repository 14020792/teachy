<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject';

    public $timestamps = false;

    public function instructors() {
        return $this->belongsToMany(Instructor::class, 'instructor_subject', 'subject_id', 'instructor_id')
            ->withPivot('id');
    }
}
