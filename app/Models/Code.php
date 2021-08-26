<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Code extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function jurnal(){
        return $this->hasMany(Journal::class);
    }

    public function group(){
        return $this->belongsTo(GroupCode::class);
    }
}
