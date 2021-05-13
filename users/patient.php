<?php

	/**
	 * Patient Class
	 */
	class Patient
	{
		
		public $secretkey;
		public $patient_id;
		public $patient_fname;
		public $patient_mname;
		public $patient_lname;	
		public $patient_username;
		public $patient_password;
		public $patient_email;
		public $patient_phoneno;
		public $patient_address;
		public $patient_dateofbirth;
		public $patient_bloodgroup;
		public $patient_gender;
		public $patient_profile_image;
		public $grp_id;

		public function __construct($secretkey,$patient_id,$patient_fname,$patient_mname,$patient_lname,$patient_username,$patient_password,$patient_email,$patient_phoneno,$patient_address,$patient_dateofbirth,$patient_bloodgroup,$patient_gender,$patient_profile_image,$grp_id)
		{
			$this->secretkey=$secretkey;
			$this->patient_id=$patient_id;
			$this->patient_fname=$patient_fname;
			$this->patient_mname=$patient_mname;
			$this->patient_lname=$patient_lname;	
			$this->patient_username=$patient_username;
			$this->patient_password=$patient_password;
			$this->patient_email=$patient_email;
			$this->patient_phoneno=$patient_phoneno;
			$this->patient_address=$patient_address;
			$this->patient_dateofbirth=$patient_dateofbirth;
			$this->patient_bloodgroup=$patient_bloodgroup;
			$this->patient_gender=$patient_gender;
			$this->patient_profile_image=$patient_profile_image;
			$this->grp_id=$grp_id;
		}
	}

?>