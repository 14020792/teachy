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
        $value = strtotime($value);
        $period = time() - $value;

        if ($period < 60) return "vài giây trước";
        if ($period < 3600) return "khoảng " . intval($period / 60) . " phút trước";
        if ($period < 24 * 3600) return "khoảng " . intval($period / 3600) . " giờ trước";

        return date('H:i:s d-m-Y', $value);
    }
}
