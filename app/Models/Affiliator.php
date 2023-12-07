<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;

class Affiliator extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ipaymu_email', 'ipaymu_va', 'ipaymu_key', 'referral_code'];

    protected $appends = ['referral_link'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getReferralLinkAttribute()
    {
        $referral_code = Crypt::encrypt($this->referral_code);
        return $this->referral_link = route('register', ['ref' => $referral_code]);
    }
}
