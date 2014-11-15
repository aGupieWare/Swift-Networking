<?php
/*
    Plumbing Supply House API -- PHP Plumbing inc.
    This script provides a RESTful API interface for a web application
 
    Input:
        $_GET['format'] = [ json | html | xml ]
        $_GET['method'] = []
 
    Output: A formatted HTTP response
 
    Author: aGupieWare (This script is an adaptation of Mark Roland Demo API)
*/
 
// ** Initialize variables and functions ** //
 
/**
 * Deliver HTTP Response
 * @param string $format The desired HTTP response content type: [json, html, xml]
 * @param string $api_response The desired HTTP response data
 * @return void
 **/
function deliver_response($format, $api_response){
	echo 'Delivering Response. $api_response = ' . $api_response . ', ' . 'format = ' . $format . '<br>';
}

/**
 * Returns Copper Pipes and Fittings Inventory for the specified format.
 * @return Array of entire inventory.
 **/
function copper_pipes_and_fittings_inventory() {
	echo 'Copper Pipes and Fittings Inventory. <br>';
}

/**
 * Returns Plumbing Tools Inventory for the specified format.
 * @return Array of entire inventory.
 **/
function plumbing_tools_inventory() {
	echo 'Plumbing Tools Inventory. <br>';
}

/**
 * Returns Plumbing Tools Inventory without description.
 * @return Array of entire inventory without description.
 **/
function plumbing_tools_inventory_without_description() {
	echo 'Plumbing Tools Inventory without Descriptions. <br>';
	plumbing_tools_inventory();	
}

/**
 * Returns Plumbing Tools Inventory without description.
 * @return Array of entire inventory without description.
 **/
function copper_pipes_and_fittings_inventory_without_description() {
	echo 'Copper Pipes and Fittings Inventory without Descriptions. <br>';
	copper_pipes_and_fittings_inventory();	
}

/**
 * Returns Plumbing Tool details.
 * @param $item_id The details for the desired item with id.
 * @return Array of item details. An empty array is returned if no item with the provided id is found.
 **/
function plumbing_tool_item_details($item_id) {
	echo 'Plumbing Tools Item Details with Descriptions. <br>';
	plumbing_tools_inventory();
}

/**
 * Returns Copper pipe or fitting details.
 * @param $item_id The details for the desired item with id.
 * @return Array of item details. An empty array is returned if no item with the provided id is found.
 **/
function copper_pipe_or_fitting_item_details($item_id) {
	echo 'Copper Pipe or Fittings Item Details with Descriptions. <br>';
	copper_pipes_and_fittings_inventory();
}

/**
 * Function returns XML string for input associative array.
 * @param Array $array Input associative array
 * @param String $wrap Wrapping tag
 * @param Boolean $upper To set tags in uppercase
 *
 * Note: Function is an adaptation from -- http://www.redips.net/php/convert-array-to-xml/ 
 */
function arrayToXml($array, &$xml = '', $wrap='DATA', $upper=true) {
}

/**
 * Function returns HTML string for input associative array.
 * @param Array $array Input associative array
 * @param String $tag Wrapping tag
 *
 * Note: Function is an adaptation from -- http://www.redips.net/php/convert-array-to-xml/ 
 */
function arrayToHTML($array, &$html, $tag) {
}	
 
// Define API response codes and their related HTTP response //
$api_response_code = array(
    0 => array('HTTP Response' => 400, 'Message' => 'Unknown Error'),
    1 => array('HTTP Response' => 200, 'Message' => 'Success'),
    2 => array('HTTP Response' => 403, 'Message' => 'HTTPS Required'),
    3 => array('HTTP Response' => 401, 'Message' => 'Authentication Required'),
    4 => array('HTTP Response' => 401, 'Message' => 'Authentication Failed'),
    5 => array('HTTP Response' => 404, 'Message' => 'Invalid Request'),
    6 => array('HTTP Response' => 400, 'Message' => 'Invalid Response Format')
);
 
// Set default HTTP response of 'resource not found' //
$response['code'] = 0;
$response['status'] = 404;
$response['data'] = NULL;
 
// ** Process Request ** //
 
// Copper Pipes and Fittings API //
if( strcasecmp($_GET['method'],'copper_pipes_and_fittings') == 0){
	// build payload //
    $response['code'] = 1;
    $response['api_version'] = '1.0.0';
    $response['status'] = $api_response_code[ $response['code'] ]['HTTP Response'];
    
    // if an 'item_id' was provided then return details for that item //
    if ( $_GET['item_id'] ) {
    	$response['item_id'] = strtoupper($_GET['item_id']);
    	$response['data'] = copper_pipe_or_fitting_item_details(strtoupper($_GET['item_id']));
    }
    // else return our entire inventory of copper pipes and fittings //
    else {
    	$response['data'] = copper_pipes_and_fittings_inventory_without_description();
    }
}
// Plumbing Tools API //
else if( strcasecmp($_GET['method'],'plumbing_tools') == 0){
	echo 'Plumbing Tools API Call. <br>';
}
 
// ** Deliver Response ** //
 
// Return Response to browser //
deliver_response($_GET['format'], $response);
 
?>
