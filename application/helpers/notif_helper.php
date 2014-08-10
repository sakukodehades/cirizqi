<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('notif'))
{
function notif($type = '',$text= '')
{
	
	$notif = '<div';

	$notif .= ' class="callout callout-'.$type.'"><h4>';
	

	$notif .=$text.'</h4></div>';

	return $notif;
}
}