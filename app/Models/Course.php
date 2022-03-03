<?php

namespace App\Models;

use App\Models\User;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Gate;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    protected $appends = ['update'];

    public function getUpdateAttribute()
    {
       return Gate::allows('update-course', $this);
    }

    protected static function booted()
    {
        static::creating(function($course){

            $course->user_id = auth()->id();

        });
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
