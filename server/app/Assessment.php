<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $table = 'assessment';

    protected $fillable = ['ins_sub_id', 'user_id', 'criterion_id', 'value'];

    public function criterion() {
        return $this->belongsTo(Criterion::class, 'criterion_id');
    }
}
