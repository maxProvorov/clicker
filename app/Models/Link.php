<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['original_url', 'code'];

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
