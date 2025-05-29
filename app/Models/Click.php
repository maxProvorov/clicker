<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Click extends Model
{
    use HasFactory;

    protected $fillable = ['link_id', 'ip_address'];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
