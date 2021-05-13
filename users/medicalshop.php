<?php

	/**
	 * MedicalShop Class
	 */
	class MedicalShop
	{
		
		public $medical_shop_id;
		public $medical_shop_name;	
		public $username;
		public $password;
		public $medical_shop_email;
		public $medical_shop_phoneno;
		public $medical_shop_address;
		public $medical_shop_time_schedule;
		public $medical_shop_profile_image;
		public $grp_id;

		public function __construct($medical_shop_id,$medical_shop_name,$username,$password,$medical_shop_email,$medical_shop_phoneno,$medical_shop_address,$medical_shop_time_schedule,$medical_shop_profile_image,$grp_id)
		{
		
			$this->medical_shop_id=$medical_shop_id;
			$this->medical_shop_name=$medical_shop_name;	
			$this->username=$username;
			$this->password=$password;
			$this->medical_shop_email=$medical_shop_email;	
			$this->medical_shop_phoneno=$medical_shop_phoneno;
			$this->medical_shop_address=$medical_shop_address;
			$this->medical_shop_time_schedule=$medical_shop_time_schedule;
			$this->medical_shop_profile_image=$medical_shop_profile_image;
			$this->grp_id=$grp_id;

		}
	}

?>