<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'given_name',
        'family_name',
        'mobile_number',
        'email_address',
        'home_office',
        'floor',
        'flat',
        'tower',
        'street',
        'road',
        'building',
        'village',
        'district',
        'social',
        'first_preference',
        'second',
        'split_type_AC',
        'window_AC',
        'duct_AC',
        'cassette_AC',
        'behind_grills',
        'meters_above',
        'any_stairs',
        'any_water',
        'any_AC',
        'visitor_car',
        'exterior_cleaning',
        'hourly_rate',
        'hear_about',
        'discount_code',
        'repeat_customer',
        'other_notes',
        'cleaning_product',
        'email',
    ];
}
