<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supporter extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'email',
        'optin',
        'data',
        'status',
        'email_verified_at',
        'email_verification_token',
    ];

    protected $casts = [
        'data' => 'array',
        'optin' => 'boolean'
    ];

    /**
     * Get all Supporters that are active and have verified their email address
     */
    public static function getActiveSupporters($query)
    {
        return $query->where('status', 'active')->whereNotNull('email_verified_at')->get();
    }
}
