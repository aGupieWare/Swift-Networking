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
	return array(
		'0' => array(
			'id' => 'PT12010',
			'name' => 'Plunger.',
			'image' => 'http://localhost:8888/assets/plunger.png',
			'description' => 'Super-pliable industrial-rubber cup with tiered ridges forms ultra-tight seal on any size drain. The heavy-duty steel handle allows for maximum pressure forced down drain to source of clog. Designed to work effectively at any angle for hard-to-reach, low-clearance applications.'),
		'1' => array(
			'id' => 'PT12020',
			'name' => 'Pipe Wrench.',
			'image' => 'http://localhost:8888/assets/pipe_wrench.png',
			'description' => 'The pipe wrench is an adjustable wrench used for turning soft iron pipes and fittings with a rounded surface. The design of the adjustable jaw allows it to lock in the frame, such that any forward pressure on the handle tends to pull the jaws tighter together. Teeth angled in the direction of turn dig into the soft pipe.'),
		'2' => array(
			'id' => 'PT12030',
			'name' => 'Hammer.',
			'image' => 'http://localhost:8888/assets/hammer.png',
			'description' => 'A hammer is a tool meant to deliver an impact to an object. The most common uses for hammers are to drive nails, fit parts, forge metal and break apart objects. Hammers are often designed for a specific purpose, and vary in their shape and structure. The term "hammer" is also used for some devices that are designed to deliver blows, e.g., the caplock mechanism of firearms.'),
		'3' => array(
			'id' => 'PT12040',
			'name' => 'Blow Torch.',
			'image' => 'http://localhost:8888/assets/blow_torch.png',
			'description' => 'Blow torches are available in a vast range of size and output power. The term blowtorch applies to the smaller and lower temperature range of these. Blowtorches are typically a single hand-held unit, with their draught supplied by a natural draught of air. Though the larger torches may have a heavy fuel reservoir placed on the ground, connected by a hose. This is common for butane- or propane-fuelled gas torches, but also applies to the older, large liquid paraffin (kerosene) torches such as the Wells light.'),
		'4' => array(
			'id' => 'PT13010',
			'name' => 'Utility Knife.',
			'image' => 'http://localhost:8888/assets/utility_knife.png',
			'description' => 'A utility knife is a knife used for general or utility purposes.[1] The utility knife was originally a fixed blade knife with a cutting edge suitable for general work such as cutting hides and cordage, scraping hides, butchering animals, cleaning fish, and other tasks. Craft knives are tools mostly used for crafts. Today, the term "utility knife" also includes small folding or retractable-blade knives suited for use in the modern workplace or in the construction industry.'),
		'5' => array(
			'id' => 'PT13020',
			'name' => 'Adjustable Wrench.',
			'image' => 'http://localhost:8888/assets/adjustable_wrench.png',
			'description' => 'An adjustable wrench (US) or adjustable spanner (UK) is a wrench with a "jaw" of adjustable width, allowing it to be used with different sizes of fastener head (nut, bolt, etc.) rather than just one fastener, as with a conventional fixed spanner. An adjustable spanner may also be called a Bahco (European usage, see below), crescent wrench (US, Canada and New Zealand incorrect usage - see Famous brands section), adjustable end wrench (US), wrench, shifter, shifting spanner (UK, Australia), shifting adjustable, fit-all or adjustable angle-head wrench.'),
		'6' => array(
			'id' => 'PT13030',
			'name' => 'Pliars.',
			'image' => 'http://localhost:8888/assets/pliars.png',
			'description' => 'Pliers are a hand tool used to hold objects firmly, possibly developed from tongs used to handle hot metal in Bronze Age Europe.[1] They are also useful for bending and compressing a wide range of materials. Generally, pliers consist of a pair of metal first-class levers joined at a fulcrum positioned closer to one end of the levers, creating short jaws on one side of the fulcrum, and longer handles on the other side.[1] This arrangement creates a mechanical advantage, allowing the force of the hand\'s grip to be amplified and focused on an object with precision. The jaws can also be used to manipulate objects too small or unwieldy to be manipulated with the fingers.'),
		'7' => array(
			'id' => 'PT13040',
			'name' => 'Needle-Nose Pliars.',
			'image' => 'http://localhost:8888/assets/needle_nose_pliars.png',
			'description' => 'Pliers are a hand tool used to hold objects firmly, possibly developed from tongs used to handle hot metal in Bronze Age Europe.[1] They are also useful for bending and compressing a wide range of materials. Generally, pliers consist of a pair of metal first-class levers joined at a fulcrum positioned closer to one end of the levers, creating short jaws on one side of the fulcrum, and longer handles on the other side.[1] This arrangement creates a mechanical advantage, allowing the force of the hand\'s grip to be amplified and focused on an object with precision. The jaws can also be used to manipulate objects too small or unwieldy to be manipulated with the fingers.'),
		'8' => array(
			'id' => 'PT14010',
			'name' => 'Box Wrench Set.',
			'image' => 'http://localhost:8888/assets/box_wrench_set.png',
			'description' => 'A set of chrome-vanadium metric wrenches, open at one end, box/ring at the other. This type is commonly known as a "combination" wrench. A wrench (also called a spanner) is a tool used to provide grip and mechanical advantage in applying torque to turn objects—usually rotary fasteners, such as nuts and bolts—or keep them from turning.'),
		'9' => array(
			'id' => 'PT14020',
			'name' => 'Allen Keys Set.',
			'image' => 'http://localhost:8888/assets/allen_keys_set.png',
			'description' => 'A set of Allen keys. A hex key or Allen key (also known by various other synonyms) is a tool of hexagonal cross-section used to drive bolts and screws that have a hexagonal socket in the head (internal-wrenching hexagon drive). The Allen name is a registered trademark, originated by the Allen Manufacturing Company of Hartford, Connecticut circa 1910, and currently owned by Apex Tool Group, LLC. Its genericized use is discouraged by this company. The standard generic name used in catalogs and published books and journals is "hex key".'),
		'10' => array(
			'id' => 'PT14030',
			'name' => 'Hacksaw.',
			'image' => 'http://localhost:8888/assets/hacksaw.png',
			'description' => 'A hacksaw is a fine-toothed saw, originally and principally for cutting metal. They can also cut various other materials, such as plastic and wood; for example, plumbers and electricians often cut plastic pipe and plastic conduit with them. There are hand saw versions and powered versions (power hacksaws). Most hacksaws are hand saws with a C-shaped frame that holds a blade under tension. Such hacksaws have a handle, usually a pistol grip, with pins for attaching a narrow disposable blade. The frames may also be adjustable to accommodate blades of different sizes.[1] A screw or other mechanism is used to put the thin blade under tension. Panel hacksaws forgo the frame and instead have a sheet metal body; they can cut into a sheet metal panel further than a frame would allow.'),
		'11' => array(
			'id' => 'PT14040',
			'name' => 'Tube Cutter.',
			'image' => 'http://localhost:8888/assets/tube_cutter.png',
			'description' => 'A pipecutter is a type of tool used by plumbers to cut pipe. Besides producing a clean cut, the tool is often a faster, cleaner, and more convenient way of cutting pipe than using a hacksaw, although this depends on the metal of the pipe. There are two types of pipe cutters. Plastic tubing cutters, which really look much like a pair of pruning shears, may be used for thinner pipes and tubes, such as sprinkler pipe. For use on thicker pipes, there is a pipecutter with a sharp wheel and adjustable jaw grips. These are used by rotating it around the pipe and repeatedly tightening it until it cuts all of the way through')	
    );
}

/**
 * Returns Plumbing Tools Inventory without description.
 * @return Array of entire inventory without description.
 **/
function plumbing_tools_inventory_without_description() {

	// pull our entire inventory of plumbing tools //
	$inventory = plumbing_tools_inventory();
	
	// container where we rebuild our inventory of plumbing tools with omitted description //
	$inventory_without_details = array();
	
	// iterate through our inventory and duplicate all item attributes except for thier description //
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
	
	// pull our entire inventory of copper pipes and fittings //
	$inventory = copper_pipes_and_fittings_inventory();
	
	// container for item matching the provided item_id //
	$inventory_item = array();
	
	// iterate through our inventory and find the requested item //
	foreach ($inventory as $key=>$value) {
		if (is_array($value) && strcasecmp($value['id'], $item_id) == 0) {
			foreach ($value as $subkey=>$subvalue) {
					$inventory_item[$subkey] = $subvalue;
			}
			break;
		}
	}
	return $inventory_item;
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
	// build payload
    $response['code'] = 1;
    $response['api_version'] = '1.0.0';
    $response['status'] = $api_response_code[ $response['code'] ]['HTTP Response'];
    
    // if an 'item_id' was provided then return details for that item //
    if ( $_GET['item_id'] ) {
    	$response['item_id'] = strtoupper($_GET['item_id']);
    	$response['data'] = plumbing_tool_item_details(strtoupper($_GET['item_id']));
    }
    // else return our entire inventory of plumbing tools //
    else {
    	$response['data'] = plumbing_tools_inventory_without_description();
    }
}
 
// ** Deliver Response ** //
 
// Return Response to browser //
deliver_response($_GET['format'], $response);
 
?>
