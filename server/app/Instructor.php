<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Instructor extends Model
{
    protected $table = 'instructor';
    public $fillable = ['code', 'avatar', 'name', 'email', 'info'];

    public function subjects() {
        return $this->belongsToMany(Subject::class, 'instructor_subject', 'instructor_id', 'subject_id')
            ->withPivot('id');
    }

    public function getAvatarAttribute($value) {
        $dir = public_path("/img/instructors/{$this->id}");

        if (is_dir($dir) && !$value) {
            foreach (scandir($dir) as $file) {
                $path = $dir . '/' . $file;
                if ($file != '.' && $file != '..') {
                    $ext = pathinfo($path)['extension'];
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                        Instructor::where('id', $this->id)
                            ->update(['avatar' => "img/instructors/{$this->id}/{$file}"]);
                        return url("img/instructors/{$this->id}/{$file}");
                    }
                }
            }
        }

        return url($value ? $value : "img/instructors/0/00.png");
    }

    public function getInfoAttribute($value) {
        $faker = \Faker\Factory::create();
        if (!$value) return $faker->sentence;
        return $value;
    }
}
