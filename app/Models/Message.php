<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'name',
        'title',
        'content',
        'email',
    ];

    // Relation
    
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
