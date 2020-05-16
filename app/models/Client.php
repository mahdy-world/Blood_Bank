<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * @method static where(string $string, $number_phone)
 */
class Client extends Authenticatable {
    use Notifiable;
	protected $table = 'clients';
	public $timestamps = true;
	protected $fillable = array('name', 'email', 'date_of_birth', 'blood_type_id', 'city_id', 'last_donation_data',
        'number_phone', 'password', 'pin_code', 'is_active');
//    protected $appends = ['is_favourite'];
	
	public function posts()
	{
		return $this->belongsToMany('App\Models\Post');
	}

	

	public function bloodtypes()
	{
		return $this->belongsToMany('App\models\BloodType');
	}

	public function city()
	{
		return $this->belongsTo('App\models\City');
	}

	public function governorates()
	{
		return $this->belongsToMany('App\models\Governorate');
	}

	public function notifications()
	{
		return $this->belongsToMany('App\models\Notification');
	}

	public function donationrequests()
	{
		return $this->hasMany('App\models\DonationRequest');
	}

	public function tokens()
	{
		return $this->hasMany('App\Token');
	}

    protected $hidden = [
        'password', 'api_token',
    ];

}