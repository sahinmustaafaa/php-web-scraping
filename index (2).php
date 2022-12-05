<?php
	for($i = 1; $i<=32; $i++){
		$url = 'https://www.bloomberght.com/borsa/hisseler/'.strval($i);

		$file = file_get_contents($url);
		$table = explode('<table>',$file)[1];
		$trs = explode('</tr>',$table);
		foreach($trs as $tr){
				if (strpos($tr, '/borsa/hisse/')  == true && strpos($tr,'javascript') == false ){
					print_r("##########################################################################\n\n");

					$tr = explode('<td>',$tr);
					[$hisse,$son,$dün,$yüzde,$yüksek,$düşük,$lot,$tl] = array(explode('"',$tr[1])[1]."\n",str_replace('</td>','',$tr[2]),str_replace('</td>','',$tr[3]),str_replace('</td>','',$tr[4]),str_replace('</td>','',$tr[5]),str_replace('</td>','',$tr[6]),str_replace('</td>','',$tr[7]),str_replace('</td>','',$tr[8]));
						
						print_r('Hisse: '.$hisse);
						print_r('Son: '.$son);
						print_r('Dün: '.$dün);
						print_r('Yüzde(%): '.$yüzde);
						print_r('Yüksek: '.$yüksek);
						print_r('Düşük: '.$düşük);
						print_r('Hacim lot: '.$lot);
						print_r('Hacim TL: '.$tl);
					

			};
		};
	};
?>
