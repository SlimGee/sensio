<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'manufactured_at' => 'date',
        'purchased_at' => 'date',
        'minimum_expiry_date' => 'date',
        'expiry_date' => 'date',
    ];

    /**
     * The half life attribute
     */
    public function halfLife(): Attribute
    {
        return Attribute::make(get: function () {
            $half_life = ($this->manufactured_at ?? $this->purchased_at)->diffInDays($this->expiry_date ?? $this->minimum_expiry_date) / 2;

            return ($this->manufactured_at ?? $this->purchased_at)->addDays($half_life);
        });
    }
}
