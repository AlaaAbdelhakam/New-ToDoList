<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Post extends Model
{
    use HasFactory;
    
    
    protected $table = 'posts';
    protected $casts = [
        'is_done' => 'boolean',
    ];
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'body',
        'is_done'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUserName() {
        return User::where('id', $this->user_id)->first()->name;
       }
}