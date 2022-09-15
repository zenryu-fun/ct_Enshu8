<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\User;


class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','user_id','tag_id'];

    public function tags() 
    {
        return $this->belongsTo(Tag::Class, 'tag_id', 'id')->withDefault();
    }

    public function users() 
    {
        return $this->belongsTo(Tag::Class, 'user_id', 'id')->withDefault();
    }
}
