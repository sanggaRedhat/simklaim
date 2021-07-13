<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function header(){
        return $this->belongsTo(HeaderJournal::class);
    }

    public function code(){
        return $this->belongsTo(Code::class);
    }
}
