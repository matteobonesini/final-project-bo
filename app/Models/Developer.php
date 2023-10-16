<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'experience_year',
        'curriculum',
        'profile_picture',
        'profile_description',
        'address',
        'phone_number'
    ];

    protected $appends = [
        'full_img_src'
    ];

    public function getFullImgSrcAttribute() {
        return asset('storage/' . $this->profile_picture);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
    
    public function sponsorships() {
        return $this->belongsToMany(Sponsorship::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function votes() {
        return $this->belongsToMany(Vote::class);
    }

    public function work_fields() {
        return $this->belongsToMany(WorkField::class);
    }
}
