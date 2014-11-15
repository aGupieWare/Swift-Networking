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
	// Define HTTP responses //
    $http_response_code = array(
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found'
    );
 
    // Set HTTP Response //
    header('HTTP/1.1 '.$api_response['status'].' '.$http_response_code[ $api_response['status'] ]);
 
    // Process different content types //
    if( strcasecmp($format,'json') == 0 ){
 
        // Set HTTP Response Content Type //
        header('Content-Type: application/json; charset=utf-8');
 
        // Format data into a JSON response //
        $json_response = json_encode($api_response, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
 
        // Deliver formatted data //
        echo $json_response;
 
    }elseif( strcasecmp($format,'xml') == 0 ){
 		// XML Response //
 
    }else{
 		// HTML Response //
    }
 
    // End script process //
    exit;
}

/**
 * Returns Copper Pipes and Fittings Inventory for the specified format.
 * @return Array of entire inventory.
 **/
function copper_pipes_and_fittings_inventory() {
	return array(
		'0' => array(
			'id' => 'CP12010',
			'name' => '1 inch copper pipe.',
			'image' => 'http://localhost:8888/assets/1_inch_copper_pipe.png',
			'description' => '1 in. x 10 ft. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'1' => array(
			'id' => 'CP12020',
			'name' => '1 1/4 inch copper pipe.',
			'image' => 'http://localhost:8888/assets/1_1_4_inch_copper_pipe.png',
			'description' => '1 1/4 in. x 10 ft. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'2' => array(
			'id' => 'CP12030',
			'name' => '1 3/8 inch copper pipe.',
			'image' => 'http://localhost:8888/assets/1_3_8_inch_copper_pipe.png',
			'description' => '1 3/8 in. x 10 ft. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'3' => array(
			'id' => 'CP12040',
			'name' => '1 1/2 inch copper pipe.',
			'image' => 'http://localhost:8888/assets/1_1_2_inch_copper_pipe.png',
			'description' => '1 1/2 in. x 10 ft. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'4' => array(
			'id' => 'CP13010',
			'name' => '1 inch copper T-fitting.',
			'image' => 'http://localhost:8888/assets/1_inch_copper_T_fitting.png',
			'description' => '1 in. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'5' => array(
			'id' => 'CP13020',
			'name' => '1 1/4 inch copper T-fitting.',
			'image' => 'http://localhost:8888/assets/1_1_4_inch_copper_T_fitting.png',
			'description' => '1 1/4 in. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'6' => array(
			'id' => 'CP13030',
			'name' => '1 3/8 inch copper T-fitting.',
			'image' => 'http://localhost:8888/assets/1_3_8_inch_copper_T_fitting.png',
			'description' => '1 3/8 in. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'7' => array(
			'id' => 'CP13040',
			'name' => '1 1/2 inch copper T-fitting.',
			'image' => 'http://localhost:8888/assets/1_1_2_inch_copper_T_fitting.png',
			'description' => '1 1/2 in. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'8' => array(
			'id' => 'CP14010',
			'name' => '1 inch copper elbow fitting.',
			'image' => 'http://localhost:8888/assets/1_inch_copper_elbow_fitting.png',
			'description' => '1 in. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'9' => array(
			'id' => 'CP14020',
			'name' => '1 1/4 inch copper elbow fitting.',
			'image' => 'http://localhost:8888/assets/1_1_4_inch_copper_elbow_fitting.png',
			'description' => '1 1/4 in. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'10' => array(
			'id' => 'CP14030',
			'name' => '1 3/8 inch copper elbow fitting.',
			'image' => 'http://localhost:8888/assets/1_3_8_inch_copper_elbow_fitting.png',
			'description' => '1 3/8 in. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),
		'11' => array(
			'id' => 'CP14040',
			'name' => '1 1/2 inch copper elbow fitting.',
			'image' => 'http://localhost:8888/assets/1_1_2_inch_copper_elbow_fitting.png',
			'description' => '1 1/3 in. Copper Type M Hard Temper Straight Pipe for a multitude of plumbing and heating purposes. It is NSF and ANSI Standard 61 certified. Made of hard-temper ASTM - B88 copper. For general plumbing and heating purposes. Alloy C12200 (DHP) meets industry standards and is NSF and ANSI Standard 61 certified. Meets or exceeds industry standards to deliver a high quality flow product. Plumbing and mechanical codes govern what types of products may be used for applications. Local codes should always be consulted for minimum requirements'),	
    );
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

	// pull our entire inventory of copper pipes and fittings //
	$inventory = copper_pipes_and_fittings_inventory();
	
	// container where we duplicate our inventory of copper pipes and fittings with omitted description //
	$inventory_without_details = array();
	
	// iterate through our inventory and duplicate all item attributes except for their description //
	foreach ($inventory as $key=>$value) {
		if (is_array($value)) {
			$inventory_item = array();
			foreach ($value as $subkey=>$subvalue) {
				if ( strcasecmp($subkey,'description') != 0 )
					$inventory_item[$subkey] = $subvalue;
			}
			$inventory_without_details[$key] = $inventory_item;
		}
	}
	return $inventory_without_details;	
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
