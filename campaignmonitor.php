<?php

/**
 * A Laravel wrapper for the Campaign Monitor API
 *
 * @package		CampaignMonitor
 * @author		Durham Hale <durham@durhamhale.com>
 * @link 		http://github.com/durhamhale/laravel-campaignmonitor
 */
class CampaignMonitor {
	
	/**
	 * Creates a new instance for the specified Campaign Monitor API class
	 *
	 * @param	string		$class
	 * @param	string		$arguments
	 * @return 	CS_REST_$class Object
	 */
	public static function __callStatic($class, $arguments)
	{
		// Reset any string formatting
		$class = strtolower($class);
		
		// Include the class file
		require_once(Bundle::path('campaignmonitor').'vendor/csrest_'.$class.'.php');
		
		$options = array(
			Config::get('campaignmonitor.api_key')
		);
		
		if(isset($arguments[0]))
		{
			array_unshift($options, $arguments[0]);
		}
		
		// Load the class
		$class = 'CS_REST_'.ucfirst($class);
		
		$instance = new ReflectionClass($class);
		
		return $instance->newInstanceArgs($options);
	}
	
}