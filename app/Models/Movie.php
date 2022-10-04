<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'year', 'episodes', 'categories','poster', 'description'];

    public function scopeFilter($query, array $filters){

        if($filters['category'] ?? false){
            $query->where('categories', 'like', '%' . request('category') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('categories', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        }

    }

    public function listed()
    {
        return $this->belongsToMany(User::class);
    }
}
