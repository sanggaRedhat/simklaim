<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderJournal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jurnal(){
        return $this->hasMany(Journal::class);
    }
}
