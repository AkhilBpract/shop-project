<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
   
    public function user()
    {
        return $this->hasOne(Transaction::class);
    }
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
        
    }   
    public function setAddressAttribute($address)
    {
        $this->attributes['address'] = strtolower($address);
        
    } 
    public function getNameAttribute($name)
    {
        // dd(1);
        return ucfirst($name);
    }
    public function getAddressAttribute($address)
    {
        // dd(1);
        return ucfirst($address);
    }
   
   public function scopeCustomer($query)
   {
        return  $query->where('type','customer');
   }
    
   public function scopeVendor($query)
   {
        return  $query->where('type','vendor');
   }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'type',
        'active',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
