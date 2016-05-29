<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Source : http://avenir.ro/datetime-validation-in-codeigniter-or-how-to-create-your-own-validation-rules-with-callbacks-andor-extending-the-form-validation-library/
class MY_Form_validation extends CI_Form_validation
{
	function __construct()
	{
		parent::__construct();
	}

	public function datetime($str)
	{
		$date_time = explode(' ',$str);
		if(sizeof($date_time)==2)
		{
			$date = $date_time[0];
			$date_values = explode('-',$date);
			if((sizeof($date_values)!=3) || !checkdate( (int) $date_values[1], (int) $date_values[0], (int) $date_values[2]))
			{
				return FALSE;
			}
			$time = $date_time[1];
			$time_values = explode(':',$time);
			if((int) $time_values[0]>23 || (int) $time_values[1]>59 || (int) $time_values[2]>59)
			{
				return FALSE;
			}
			return TRUE;
		}
		return FALSE;
	}

	public function date($str)
	{
		$date = $str;
		$date_values = explode('-',$date);
		if((sizeof($date_values)!=3) || !checkdate( (int) $date_values[1], (int) $date_values[0], (int) $date_values[2]))
		{
			return FALSE;
		}
		return TRUE;
	}
}
