<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'important',
        'category_id'
    ];

    public static $rules = [
        'title' => "required",
        'body' => "required",
        'user_id' => "required",
        'important' => "required",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
