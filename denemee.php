<?php
error_reporting(0);
//$db= new mysqli("localhost", "root", "", "veriler");
//if($db->connect_error){
	//die("veritabanına bağlanılamadı".$db->connect_errno);
//}
//veritabanı bağlantı kodları
for ($i = 1; $i <= 32; $i++) {
	$checkProxy = "http://api.scrape.do?token=10677daf41b843d9816701c82de63068e948af865c4&url=https://httpbin.org/ip?json";
    //httpbin.org ip nin değişip değişmediğini kontrol eder.
    $url = 'http://api.scrape.do?token=10677daf41b843d9816701c82de63068e948af865c4&url='.'https://www.bloomberght.com/borsa/hisseler/'.strval($i);
    //print_r($url);
    $proxyResponse = file_get_contents($checkProxy);
	print_r("proxyJson: ".$proxyResponse);
	
	$file = file_get_contents($url);

    //$file = file_get_contents($url);
    preg_match_all('@ <div class="box box-12">(.*?)</div>@si', $file, $icerik_al);
	
	$icerik = $icerik_al[0][0];
   
    //print_r($icerik);
//$db->query("insert into hisseveri hisseAdi='$hisse[1]', sonFiyat='$son[1]', dünküFiyat='$dün[1]', yüzdeDegisim='$yüzde[1]', günlükMax='$yüksek[1]', günlükMin='$düşük[1]', hacimLot='$lot[1]', hacimTL='$tl[1]'");
// veritabanına  verileri ekleme kodları
    
    $hisseler = explode("<tr>",$icerik);
    print_r($hisseler);
    foreach($hisseler as $hisse){
		if(str_contains($hisse,'Q') == false and str_contains($hisse,'Hisse') == false){
		$hisse = strip_tags($hisse);
		$elemanlar = explode("\n",$hisse);
		[$hisse,$son,$dün,$yüzde,$yüksek,$düşük,$lot,$tl] = array(trim($elemanlar[3]),trim($elemanlar[6]),trim($elemanlar[7]),trim($elemanlar[8]),trim($elemanlar[9]),trim($elemanlar[10]),trim($elemanlar[11]),trim($elemanlar[12]));
		print_r("hisse: ".$hisse."\n");	
		print_r("son: ".$son."\n");
		print_r("dün: ".$dün."\n");
		print_r("yüzde: ".$yüzde."\n");
		print_r("yüksek: ".$yüksek."\n");
		print_r("düşük: ".$düşük."\n");
		print_r("lot: ".$lot."\n");
		print_r("tl: ".$tl."\n"."\n"."\n"."\n"."\n");
		};
	};
    
    
}


    

?>
