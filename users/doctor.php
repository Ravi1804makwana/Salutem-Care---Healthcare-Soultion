<?php

	/**
	 * Doctor Class
	 */
	class Doctor
	{
		
		public $doctor_id;
		public $doctor_name;	
		public $username;
		public $password;
		public $doctor_email;
		public $doctor_phoneno;
		public $doctor_address;
		public $doctor_information;
		public $doctor_profile_image;
		public $grp_id;
		public $opening_time;
		public $closing_time;
		public $treatment_time;
		public $break_start_time;
		public $break_end_time;
		public $specialization;
		public $education;
		
		public function __construct($doctor_id,$doctor_name,$username,$password,$doctor_email,$doctor_phoneno,$doctor_address,$doctor_information,$doctor_profile_image,$grp_id, $opening_time, $closing_time, $treatment_time, $break_start_time, $break_end_time, $specialization, $education)
		{
			$this->doctor_id=$doctor_id;
			$this->doctor_name=$doctor_name;	
			$this->username=$username;
			$this->password=$password;
			$this->doctor_email=$doctor_email;
			$this->doctor_phoneno=$doctor_phoneno;
			$this->doctor_address=$doctor_address;
			$this->doctor_information=$doctor_information;
			$this->doctor_profile_image=$doctor_profile_image;
			$this->grp_id=$grp_id;
			$this->opening_time=$opening_time;
			$this->closing_time=$closing_time;
			$this->treatment_time=$treatment_time;
			$this->break_start_time=$break_start_time;
			$this->break_end_time=$break_end_time;
			$this->specialization = $specialization;
			$this->education = $education;
		}
	}

?>