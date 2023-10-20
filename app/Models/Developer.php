<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'experience_year',
        'profile_picture',
        'profile_description',
        'address',
        'phone_number'
    ];

    protected $appends = [
        'full_img_src',
        'average_vote',
        'active_sponsorship'
    ];

    public function getFullImgSrcAttribute() {
        return asset('storage/' . $this->profile_picture);
    }

    public function getAverageVoteAttribute() {
        $voteArr = [];
        foreach ($this->votes as $vote) {
            $voteArr[] = $vote->value;
        }
        if (count($voteArr) != 0) {
            return array_sum($voteArr)/count($voteArr);
        } else {
            return 0;
        }
    }

    public function getActiveSponsorshipAttribute() {
        $activeSponsorship = false;
        if(count($this->sponsorships) > 0) {
            $expireDate = $this->sponsorships[count($this->sponsorships) - 1]->pivot->expire_date;
            $activeSponsorship = strtotime($expireDate) > time();
        }
        return $activeSponsorship;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
    
    public function sponsorships() {
        return $this->belongsToMany(Sponsorship::class)->withPivot('expire_date');
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
