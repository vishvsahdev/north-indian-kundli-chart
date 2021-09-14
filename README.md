# north-indian-kundli-chart
North Indian Kundli Chart


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
