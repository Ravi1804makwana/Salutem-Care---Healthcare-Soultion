<?php

	/**
	 * Laboratory Class
	 */
	class Laboratory
	{
		
		public $laboratory_id;
		public $laboratory_name;	
		public $username;
		public $password;
		public $laboratory_email;
		public $laboratory_phoneno;
		public $laboratory_address;
		public $laboratory_time_schedule;
		public $laboratory_profile_image;
		public $grp_id;

		public function __construct($laboratory_id,$laboratory_name,$username,$password,$laboratory_email,$laboratory_phoneno,$laboratory_address,$laboratory_time_schedule,$laboratory_profile_image,$grp_id)
		{
		
			$this->laboratory_id=$laboratory_id;
			$this->laboratory_name=$laboratory_name;	
			$this->username=$username;
			$this->password=$password;
			$this->laboratory_email=$laboratory_email;
			$this->laboratory_phoneno=$laboratory_phoneno;
			$this->laboratory_address=$laboratory_address;
			$this->laboratory_time_schedule=$laboratory_time_schedule;
			$this->laboratory_profile_image=$laboratory_profile_image;
			$this->grp_id=$grp_id;
			
		}
	}

?>