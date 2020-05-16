<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class BloodType extends Model {

	protected $table = 'blood_types';
	public $timestamps = true;
	protected $fillable = array('name');

	
	
	public function clients()
    {
		return $this->belongsToMany('App\models\Client');
		
	}

	public function donationrequests()
	{
		return $this->hasMany('App\models\DonationRequest');
	}

}