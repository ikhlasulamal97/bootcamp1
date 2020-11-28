<?php 
function printPattern($angka){
	$kosong=$angka-2;
	$tes1=floor($angka/2);
	$tes2=$angka-$tes1;
	$tes3=2;
	$tes4=$angka-$tes3;
	$hitung=0;
	$tengah=$tes1+1;
	$kata='DUMBWAYSID';
	$kata_array=str_split($kata);
	$center_tulisan=ceil(($angka - count($kata_array))/2);
	for ($i=1; $i <=$angka ; $i++) { 
		for ($j=1; $j <=$angka ; $j++) { 
			if ($i==1 || $i==$angka) {
				echo "*";
			}else{
				
				if ($j<=$tes1 || $j>$tes2) {
					echo "*";
				}else{

					if ($i>$tengah) {
						if ($j<=$tes3 || $j>$tes4 ) {
						echo "*";
						}else{
							echo "<span style='color:transparent'>".'*'."</span>";
						}
					}else{

						if ($i==$tengah && $kosong >=13) {
							// if (@$kata_array[$j-2]==null) {
							// 	echo "<span style='color:transparent'>".'*'."</span>";
							// }else{
							// 	echo "<span style='font-size:12px'>".@$kata_array[$j-2]."</span>";
							// }
							if ($j>$center_tulisan-1 && @$kata_array[$j-$center_tulisan] !=null ) {
									echo "<span style='font-size:12px'>".@$kata_array[$j-$center_tulisan]."</span>";
								
							}else{
							echo "<span style='color:transparent'>".'*'."</span>";
							}
							
						}else{
							 echo "<span style='color:transparent'>".'*'."</span>";
						}
						
						
					
						
					}
					
					
				}

				
			}
		}

		if ($i!=1 && $i!=$angka) {
			$tes1 -=1;
			$tes2 +=1;
		
			

		}
		if ($i>$tengah) {
			$tes3 +=1;
			$tes4 -=1;
		}
			
	$hitung=0;

		echo "<br>";
	}

}

echo printPattern(15);

 ?>