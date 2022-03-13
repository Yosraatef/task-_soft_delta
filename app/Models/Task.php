<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'description','done'
    ];
    
    protected $casts = ['date' => 'datetime:j F, Y',];
    public $appends = ["user_name"];

    public function getUserNameAttribute()
    {
        return  $this->user->name;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

 
}
