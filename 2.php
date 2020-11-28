<?php 
	$huruf=['a','b','c','d','e'];
	function putarArray($putar){
	$awal=1;
	$akhir=6;
	$final='';
	$tampung=[];
		for ($i=1; $i <5 ; $i++) { 
			for ($j=$awal; $j <$akhir ; $j++) { 
				if ($j>=5) {
				 $index= $j-5;
				  $tampung[]=$putar[$index]; 
				}else{
				  $index= $j;
				    $tampung[]=$putar[$index];
				}
			}
			$gabung=implode(',', $tampung);
			$awal+=1;
			$akhir+=1;
			$final.="putaran{$i}:[{$gabung}]<br>";
			$tampung=[];
		}
			return $final;

	}
	echo putarArray($huruf);
 ?>