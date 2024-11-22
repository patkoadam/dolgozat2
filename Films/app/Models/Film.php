<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['cim', 'rendezo','mufaj','kiadas', 'genre_id'];

    protected $casts = [
        'kiadas' => 'integer',
    ];

    public function genres()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function loans()
    {
        return $this->hasMany(Rent::class);
    }
}
