<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructor';

    public function subjects() {
        return $this->belongsToMany(Subject::class, 'instructor_subject', 'instructor_id', 'subject_id')
            ->withPivot('id');
    }

    public function getAvatarAttribute($value) {
        return url($value);
    }

    public function getInfoAttribute($value) {
        $faker = \Faker\Factory::create();
        if (!$value) return $faker->sentence;
        return $value;
    }
}
