<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Todo;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['id','name'];

    public function todos() 
    {
        return $this->hasMany(Todo::Class);
    }
}

