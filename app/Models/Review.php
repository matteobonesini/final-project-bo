<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'customer_name',
        'description',
    ];

    // Relations
    public function developer(){
        return $this->belongsTo(Developer::class);
    }
}
