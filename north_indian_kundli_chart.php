<?php
/*
astrologyclass.org
north indian kundli chart
*/

//example------------------
$n=new north_indian_kundli_chart();
$chart=["Lg"=>100,"Su"=>310,"Mo"=>278,"Ma"=>3,"Me"=>290,"Ju"=>125,"Ve"=>295,"Sa"=>328,"Ra"=>326,"Ke"=>fmod(326+180,360)];
//$chart=["Lg"=>55,"Su"=>102,"Mo"=>104,"Ma"=>106,"Me"=>108,"Ju"=>110,"Ve"=>112,"Sa"=>114,"Ra"=>116,"Ke"=>fmod(116+180,360)];

$which="Lg";
$width=300;
$height=300;
$lang='HI'; // EN|HI
$fillcolor='#F7E033';
$line='#ECA41E';
$linewidth='1';
$opecity='0.3';
$textcolor='#C82A22';
$housetextcolor='#AA8654';

echo $n->createKundli($chart,$which,$width,$height,$lang,$fillcolor,$line,$linewidth,$opecity,$textcolor,$housetextcolor);

//----------------class north indian kundli chart-----------------

class north_indian_kundli_chart{
public $px;
function getC($chart,$g="Lg")
{
$sp = $this->fillAR(13);
if(isset($chart[$g]))
	$gra=$g;
else
	$gra="Lg";
	$ok=intval($chart[$gra]/30);
$xt=0;

foreach($sp as $k=>$v)
{		
	$sco=new stdClass;
	$sco->short='';
	$sco->long='';
	$sp[$k]=[];
	$sp[$k][]=$sco;
}

foreach($chart as $k=>$v)
{
	$sco=new stdClass;
	$sco->short=$k;
	$sco->long=$v;
	if(!isset($sp[intval(abs($v)/30)]))
	$sp[intval(abs($v)/30)]=[];
	$sp[intval(abs($v)/30)][]=$sco;
	if($g == $k)	
	$xt=intval(abs($v)/30);
}

$i=0;
foreach($sp as $k=>$v)
{
$pk=intval(fmod(((12+$k)-($xt)),12));
if($i<12)	
$p[$pk]=$v;
$i++;
} 
return $p;
}	

function createKundli($chart,$which="Lg",$x=300,$y=300,$lang='HI',$fillcolor='#F7E033',$line='#ECA41E',$linewidth='1',$opecity='0.3',$textcolor='#C82A22',$housetextcolor='#AA8654'){
	$chart = $this->getC($chart,$which);
$which="Lg";
$grah_array=array("Lg"=>0,"Su"=>1,"Mo"=>2,"Ma"=>3,"Me"=>4,"Ju"=>5,"Ve"=>6,"Sa"=>7,"Ra"=>8,"Ke"=>9);
$grah=array(0=>"Lg",1=>"Su",2=>"Mo",3=>"Ma",4=>"Me",5=>"Ju",6=>"Ve",7=>"Sa",8=>"Ra",9=>"Ke");
$fwidth  = 0;
 $fheight = 0;
$t='<svg xmlns="http://www.w3.org/2000/svg" class="elastic" width="'.$x.'px" height="'.$y.'px" style="shape-rendering:geometricPrecision;
 text-rendering:geometricPrecision;
 image-rendering:optimizeQuality;
 fill-rule:evenodd;
 clip-rule:evenodd" viewBox="0 0 '.($x+2).' '.($y+2).'"     xmlns:xlink="http://www.w3.org/1999/xlink"><defs>  <style type="text/css">   <![CDATA[    
 .str0 {stroke:'.$line.';
 	opacity:'.$opecity.';
stroke-width:'.$linewidth.'px}    
.fil0 {
	opacity:'.$opecity.';
	fill:'.$fillcolor.';
}	.fil3 {fill:'.$textcolor.';
}	.fil4 {fill:'.$housetextcolor.';
}		.fnt1 {font-weight:normal;
font-size: 8px;
font-family:"Arial"}	.ht{text-anchor: middle;
alignment-baseline:central}   ]]>  </style> </defs> ';
$t .='<rect class="fil0 str0" x="1" y="1" height="'.($y).'" width="'.($x).'"/>';
$t .='<line class="fil0 str0" x1="0" y1="'.($y).'" x2="'.($x).'" y2= "0" />';
$t .='<line class="fil0 str0" x1="'.($x/2).'" y1="0" x2="0" y2= "'.($y/2).'" />';
$t .='<line class="fil0 str0" x1="0" y1="0" x2="'.($x).'" y2= "'.($y).'" />';
$t .='<line class="fil0 str0" x1="0" y1="'.($y/2).'" x2="'.($x/2).'" y2= "'.($y).'" />';
$t .='<line class="fil0 str0" x1="'.($x/2).'" y1="0" x2="'.($x).'" y2= "'.($y/2).'" />';
$t .='<line class="fil0 str0" x1="'.($x).'" y1="'.($y/2).'" x2="'.($x/2).'" y2= "'.($y).'" />';
$lgx=$grah_array[$which];
$font_size=5;
$a="";
$k=0;
$i=0;
$xcenter=array(1=>$this->per(50,$x),2=>$this->per(25,$x),3=>$this->per(10,$x),4=>$this->per(25,$x),5=>$this->per(10,$x),6=>$this->per(25,$x),7=>$this->per(50,$x),8=>$this->per(75,$x),9=>$this->per(90,$x),10=>$this->per(75,$x),11=>$this->per(90,$x),12=>$this->per(75,$x));
$ycenter=array(1=>$this->per(25,$y),2=>$this->per(10.25,$y),3=>$this->per(25,$y),4=>$this->per(50,$y),5=>$this->per(75,$y),6=>$this->per(87.5,$y),7=>$this->per(75,$y),8=>$this->per(87.5,$y),9=>$this->per(75,$y),10=>$this->per(50,$y),11=>$this->per(25,$y),12=>$this->per(10.25,$y));
$rt=0;
$xx=array(1=>50,2=>25,3=>21,4=>46,5=>21,6=>25,7=>50,8=>75,9=>79,10=>56,11=>79,12=>75);
$yy=array(1=>46,2=>21,3=>25,4=>50,5=>75,6=>79,7=>54,8=>79,9=>75,10=>50,11=>25,12=>21);
$rp=true;
$tech=0;
$i=0;
if($lang == 'HI'){
$h1=array(0=>"लग्न",1=>"सूर्य",2=>"चन्द्र",3=>"मंगल",4=>"बुध",5=>"बृहस्पति",6=>"शुक्र",7=>"शनि",8=>"राहु",9=>"केतु");
$h2=array("Lg"=>"लग्न","Su"=>"सूर्य","Mo"=>"चन्द्र","Ma"=>"मंगल","Me"=>"बुध","Ju"=>"बृहस्पति","Ve"=>"शुक्र","Sa"=>"शनि","Ra"=>"राहु","Ke"=>"केतु");
}
else{
$h1=array(0=>"La",1=>"Sun",2=>"Moon",3=>"Mars",4=>"Mercury",5=>"Jupiter",6=>"Venus",7=>"Saturn",8=>"Rahu",9=>"Ketu");
$h2=array("Lg"=>"Lagan","Su"=>"Sun","Mo"=>"Moon","Ma"=>"Mars","Me"=>"Mercury","Ju"=>"Jupiter","Ve"=>"Venus","Sa"=>"Saturn","Ra"=>"Rahu","Ke"=>"Ketu");
$h2=array("Lg"=>"Lg","Su"=>"Sun","Mo"=>"Moon","Ma"=>"Mar","Me"=>"Mer","Ju"=>"Jup","Ve"=>"Ven","Sa"=>"Sat","Ra"=>"Rah","Ke"=>"Ket");

}
$rk=0;
	foreach($chart as $kc=>$kv)
	{	
	$r=array();
			if($rp)
			{			
		$tech=$kc;
		$rp=false;
		}			
	$s='';
	$vk=1;
	$rk=0;
		foreach($kv as $k=>$v){					
		if(isset($h2[trim($v->short)]))
		{				
		if(isset($r[$rk])){					
		if($v->short == "Ju"){					
		$rk++;
		$r[$rk] = $h2[trim($v->short)];
		}					
		else{						
		$r[$rk]= $r[$rk] ." ". $h2[trim($v->short)];
		$rk++;
		}
		}				
		else{				
		$r[$rk] = $h2[trim($v->short)];
		if($v->short == "Ju")					
			$rk++;
		}			
		}			
		}			
		$fontheight=15;
	$rt=$ycenter[$kc+1] - ((count($r) * $fontheight )/2);
	$t .='<g transform="translate('.$xcenter[$kc+1].' '.$rt.')">';
	$t .='  <text x="0" y="0" class="ht fil3 fnt0">';
	   	foreach($r as $k=>$v){		
		$v=trim($v);
		$t.='    <tspan x="0" dy="'.$fontheight.'px">'.$v.'</tspan>';
			$rt=$rt+$fheight+$fontheight;
		}	
		$t .='</text>';
		$t .='</g>';
		$xx1 = ($this->px($xx[$kc+1],$x) - $fwidth) + ($fwidth / 2);
		$yy1 = ($this->px($yy[$kc+1],$y) - $fheight) + ($fheight / 2);
		$t.='<text x="'.$xx1 .'" y="'.$yy1.'"  class="ht fil4 fnt0">'.($i+1).'</text>';
		$i++;
		}
	$t .='</svg>';
return $t;
}

function per($u,$x){
	return ($x*$u)/100;
	}	
	function px($u,$x){
		$r=($x*$u)/100;
	return $r;
 }
 function py($u,$x){
	 $font_size=5;
$fheight = imagefontheight($font_size);
 $r=($x*$u)/100;
	return $r - $fheight;
 }	
 function fillAR($value){
	 for($a=0;$a<$value;$a++)
	$r[$a]='';
	return $r;
	}}
?>