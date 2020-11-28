<?php 
	function tentukanolahraga($data){
		if ($data>750) {
			$olahraga='lari';
		}else if($data>500){
			$olahraga='badminton';
		}else if($data<=500){
			$olahraga='renang';
		}
		$waktu=round($data/10);
		$hasil='Jumlah Kalori :'.$data.'<br>';
		$hasil .='Jenis Olahraga :'.$olahraga.'<br>';
		$hasil .='Waktu Olahraga :'.$waktu;
		return $hasil;
	 }
	echo tentukanolahraga(547);
 ?>