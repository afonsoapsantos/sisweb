<?php 

	use \Hcode\Model\User;

	function formatDate($date){
		return date('d/m/Y', strtotime($date));
	}

	function formPrice($vlpriceservice){
		if (!$vlpriceservice > 0) $vlpriceservice = 0;
		return number_format($vlpriceservice, 2, ",", ".");
	}

 ?>