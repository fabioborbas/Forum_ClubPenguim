<?php
	$conn = new MySqli("localhost", "root", "", "club");

	//mudar a data para formato pt-BR
	function ExibeData($data){
		return  date("d/m/Y", strtotime($data));
	}
?>