<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailVerification;

class Supporter extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'email',
        'source',
        'optin',
        'locale',
        'data',
        'status',
        'public',
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

    /**
     * Send a notification to the user to verify their email address
     */
    public function sendEmailVerificationNotification()
    {
        try {
            Mail::to($this->email)->send(new SendEmailVerification($this));
        } catch (\Exception $e) {
            dd($e);
        } finally {
            return true;
        }
    }

    /**
     * Verify the email address of a supporter
     *
     * @param string $email
     * @param string $token
     * @return bool
     */
    public static function verify($email, $token)
    {
        $supporter = self::where("email", $email)->first();
        if (!$supporter) {
            return false;
        }
        if ($supporter && $supporter->email_verification_token == $token) {
            $supporter->email_verified_at = now();
            $supporter->save();
            return true;
        } else {
            return false;
        }
    }
}
