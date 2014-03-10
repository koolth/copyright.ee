<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine plugin data
 * @global array $plugin_info
 */
$plugin_info = array(
    'pi_name' => 'Copyright',
    'pi_version' => '1.0',
    'pi_author' => 'John Flackett',
    'pi_author_url' => 'http://koolth.com.au/',
    'pi_description'=> 'Display a simple copyright notice.',
    'pi_usage' => Copyright::usage()
);

class Copyright {
	
	/** Private attributes **/
	private $start_year;
	private $show_symbol = TRUE;
	private $symbol = "&copy; ";
	private $MIN_YEAR = "1000";
	private $allowed_parameters = array('start_year', 'show_symbol');

	/**
	* Constructor
	* @return void
	*/
	function __construct()
	{
		$this->EE =& get_instance();
		$this->fetch_all_parameters();
	}

	/**
	* Display the copyright notice
	* 
	* @return string
	*/
	public function display() {
		return $this->symbol . $this->create_year_range(); 
	}


	/*********************************************
	 ******** START: PRIVATE HELPER METHODS ******
	 *********************************************/
	
	private function fetch_all_parameters() {
		$this->start_year = $this->fetch_param("start_year", date('Y'));
		if(!$this->validate_year($this->start_year)) {
			$this->start_year = date('Y');
		}
		$this->show_symbol = $this->fetch_param_bool("show_symbol", TRUE);
		if(!$this->show_symbol) {
			$this->symbol = '';
		}
	}

	/*
	 * Validate if given string is a year
	 * @param string - the year to be checked
	 * @return string
	 **/	
	private function validate_year($year) {
		if(strlen($year)==4 && (int)$year > $this->MIN_YEAR) {
			return TRUE;
		}
		return FALSE;
	}

	/*
	 * Fetch the value of a parameter
	 * @param string - the name of the parameter
	 * @param var - default value if processing fails e.g., paramter does not exist or is invalid
	 * @return var
	 **/
	private function fetch_param($param, $default_value=FALSE)
  	{
    	if($param === '') {
    		return $default_value;
    	}
	    return (in_array($param, $this->allowed_parameters)) ? $this->EE->TMPL->fetch_param($param, $default_value) : $default_value;
	}

	/*
	 * Fetch the value of a boolean parameter
	 * @param string - the name of the parameter
	 * @param var - default value if processing fails e.g., paramter does not exist or is invalid
	 * @return bool
	 **/
	private function fetch_param_bool($param, $default_value=FALSE)
	{
		$value = $this->fetch_param($param, $default_value);
	    if($value === $default_value) {
	    	return $value; //valid value - no need for more processing 
	    }
	    switch($value)
	    {
	    	case 'true':
	      	case 'y': 
	      	case 'yes':
	      	case '1': 
	      		$value = TRUE; 
	      		break;
	      	case 'false':
	      	case 'n': 
	      	case 'no':
	      	case '0': 
	      		$value = FALSE; 
	      		break;
	      	default: 
	      		$value = $default_value; 
	      		break;
	    }
	    return $value;     
	}

	/*
	* Correctly format the date range of the copyright notice
	*
	* @param string - start year of copyright
	* @return string - fully formatted year or year range
	*/
	private function create_year_range() {
		if(strcmp($this->start_year, date("Y")) >= 0) {
			return date("Y");
		} else {
			return $this->start_year . " - " . date("Y"); 
		}
	}


	/**
	* Plugin Usage
	*
	* @return	string
	*/    
	function usage()
	{
		ob_start(); 
		?>
			
			Display default copyright notice e.g., © 2014
			
			{exp:copyright:display}

			--

			Toggle display of copyright symbol (©) 
			Default = 'true'
			Valid values: 'false', 'no', 'n', '0', 'true', 'yes', 'y', '1'
			
			{exp:copyright:display show_symbol='true'}

			--

			Set start year of copyright notice
			Default = [current year]
			Valid values: > 1000
			
			{exp:copyright:display start_year="2013"}

			The above would display: © 2013 - [current year]
			Note: If 'start_year' is equal to or greater than the current year, then 'start_year' is ignored.

			

		<?php
		$buffer = ob_get_contents();
		ob_end_clean(); 
		return $buffer;
	}
	
}
/* End of file pi.copyright.php */
/* Location: /system/expressionengine/third_party/copyright/pi.copyright.php */ 