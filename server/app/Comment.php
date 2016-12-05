<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $fillable = ['ins_sub_id', 'user_id', 'content'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ins_sub() {
        return $this->belongsTo(InstructorSubject::class, 'ins_sub_id');
    }

    public function getCreatedAtAttribute($value) {
        return date('H:i:s d-m-Y', strtotime($value));
    }
}
