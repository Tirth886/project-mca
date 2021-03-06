<?php 
	require_once __DIR__.'/../urls.php';
	$connection = new Connection();

	$con   = $connection->cntodb(); /* Database Connection */
	
	$modal = new Modal(); 		    /* QUESRIES */

	$query     = $modal->_fetch_total_user();
	$rawData   = $con->query($query);
	$count    = @$rawData->fetch_object();	

	$_GET['limit']	= $count->count > 0 ? 2 : 0;
	$total_page		= ceil($count->count/$_GET['limit']);
	
	$query 	   = $modal->_fetch_user(array('limit'  => $count->count > 10 ? $_GET['limit'] : 10,'offset' => $count->count > 10 ? 0 : $_GET['offset'] == "" ? 0 : $_GET['offset'] < 0 ? $_GET['offset'] = 0 : $_GET['offset']));

	$rawData   = $con->query($query);
?>