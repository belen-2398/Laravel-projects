<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public static $rules = [
        'name' => "required",
        'user_id' => "required",
    ];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
