<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function member()
    {
        return $this->hasMany(member::class);
    }
}
