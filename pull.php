<!DOCTYPE html>
<html lang="en">
<head>
  <title>B.E Results</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>BE  results</h2>    
  <table class="table table-bordered">

<?php

  $tc=0;
  $link ="http://abcresults.in/results_be_32/default.aspx";
 // $file = fopen('ece.csv', 'w');


    $file = fopen('branch-all.csv', 'w');
      // save the column headers
fputcsv($file, array('Roll', 'Name', 'Branch','code1','subject1','credit1','grade1'
       ,'code2','subject2','credit2','grade2'
       ,'code3','subject3','credit3','grade3'
     ,'code4','subject4','credit4','grade4'
   ,'code5','subject5','credit5','grade5'
 ,'code6','subject6','credit6','grade7'
,'code7','subject7','credit7','grade7'
,'code8','subject8','credit8','grade8'
,'code9','subject9','credit9','grade9'
,'code10','subject10','credit10','grade10'
,'code11','subject11','credit11','grade11','sgpa'));
  for($j=732;$j<=737;$j++)
  {
    

for($p=1;$p<=324;$p++)
{

  if($j==732 && $p>=61&&$p<301)
    continue;
  if($j==734 && $p>=63&&$p<301)
    continue;
  if($j==732 && $p==313)
    break;
  if($j==734 && $p==313)
    break;
   if($j==735 && $p>=123&&$p<301)
    continue;
  if($p>123 && $p<301)
    continue;
    $zroll=$p;
  if($p<=9)
  {
    $zroll='00'.$p;
  }
  if($p>9 &&$p<=99)
  {
    $zroll='0'.$p;
  }

$roll='1602-15-';
$rollnum=$roll.$j.'-'.$zroll;
  $postdata = array(
  '__VIEWSTATE' => 'Ko8HoS6W42vTuvWOLaaE4T4koavYksNgzsxO60ZlV9yx+Yu4N44OGO8gOC0iiriU7iNPkxIheHD8ZblKvRQxFTKctTJE9avVuEN2jTMk2gq8DvwncdY0iI8dAt+2B088W7qTzcnw7pEMA5LgfvAC7VkRQ4ZYysOQrGoiTwKBqrGH+AIKhOAnGlVUxRbMVN2N5L0MTRSQtfKAFyY3v5WBnaD5FUlX7faM2mWaa6B6gbk=',
  '__VIEWSTATEGENERATOR' => '2EE911A9',
  '__EVENTVALIDATION' => 'kfI8ZtTIDn3EFKAuZU6zN7L3NMeAjJIstdpmd9EgzMLgRq8qX+H/lLkzOJou7MMtAJ1qQFVDpAXRuiNu7VnnReZCMef4gnbB+T59ZVrfSTZA4Bpreceh+5ikT5UghHlUFOCwhogejf6gNlVaMKN5SQ==',
  'txtHTNO'=>$rollnum,
  'btnResults'=>'Submit',
   );

$opts = array('http' =>
  array(
    'method'  => 'POST',
    'header'  => 'Content-type: application/x-www-form-urlencoded',
    'content' => http_build_query($postdata, '', '&'),
    'timeout' => 5,
  )
);
$context = stream_context_create($opts);
$res= file_get_contents($link, 0, $context);
$m1='<span id="lblStudName">';
$n1=stripos($res,$m1);
if(!stripos($res,$m1))
{ 
   echo  "Invalid HallTicket";
   continue;
    //array_push($sg, $sgpa);
  
}

echo "    <thead>
      <tr>
        <th>Hall Ticket</th>
        <th>NAME</th>
        <th>Father Name</th>
        <th>Course</th>

      </tr>
    </thead>
    <tbody>";

$m2='</span></td>
            </tr>
          <tr>
';
$n2=stripos($res,$m2);
$name=substr($res,$n1+strlen($m1),$n2-$n1);
echo '<td>'.$rollnum.'</td>
      <td>'.$name.'</td>';
$sname=$name;
$m1='<span id="lblFName">';
$n1=stripos($res,$m1);
$m2='</span></td>
            </tr>
        </table>
';
$n2=stripos($res,$m2);
$name=substr($res,$n1+strlen($m1),$n2-$n1);
echo '
      <td>'.$name.'</td>';


$m1='<span id="lblCourse">';
$n1=stripos($res,$m1);
$m2='</span></td>
            <td>Examination</td>
';
$n2=stripos($res,$m2);
$branch=substr($res,$n1+strlen($m1),$n2-$n1);
echo '
      <td>'.$branch.'</td>';


echo '</tbody>
  </table>';






$m1="</span></td>
            </tr>
        </table>
";
$n1=stripos($res,$m1);

$m2="</td></tr></table></div>";
$n2=stripos($res,$m2);
$bl=substr($res,$n1,$n2-$n1);
 $a="3</td><td style='text-align:center; color:red;'>2</td><td style='text-align:center; color:red;'>";
 $status=0;

if(strripos($bl,$a))
{ 
  continue;
   echo  '<td>'.$bl.'</td>';
   $status=1;

    //array_push($sg, $sgpa);
  
}


$data =array($rollnum,checkstring($sname),checkstring($branch));
 
// save each row of the data



 

$m1=">Marks Details";
$n1=stripos($res,$m1);

$m2=">Result</font>";
$n2=stripos($res,$m2);
$bl=substr($res,$n1,$n2);
$sg = array();
$sum=0;
$i=0;
$m1="3</td><td style='text-align:center; color:green;'>2</td><td style='text-align:center; color:green;'>";
echo '<table class="table table-bordered">
    <thead>';
 echo "
    <thead>
      <tr>
        <th>S.NO</th>
        <th>Subject Code</th>
        <th>Subject</th>
        <th>Year</th>
        <th>Semester</th>
        <th>Credits</th>
        <th>Grade Secured</th>

      </tr>
    </thead>
    <tbody>";
for($i=1;strripos($bl,$m1);$i++)
{ 
echo '<tr>';
  $a="3</td><td style='text-align:center; color:green;'>2</td><td style='text-align:center; color:green;'>";
	$q=";'>".$i."</td><td style='text-align:center;'>";
  $n1=stripos($bl,$q);
  $code=substr($bl,$n1+strlen($q),6);
  $c=$code;
$code=$code.'</td><td>';
$n1=stripos($bl,$code);
$temp=substr($bl,$n1+strlen($code),120);
$n2=stripos($temp,"</td>");
$sub=substr($bl,$n1+strlen($code),$n2);
   echo  '<td>'.$i.'</td>';
   echo  '<td>'.$c.'</td>';
   echo '<td>'.$sub.'</td>';
   echo '<td>'.'3'.'</td>';
   echo '<td>'.'2'.'</td>';
   $Credit=checkcredit($sub,$branch,$c);
   echo '<td>'.$Credit.'</td>';
  $tc=$tc+$Credit;

   $c=stripos($bl,$a);
   $sgpa=substr($bl,$c+strlen($a),2);

   if($sgpa[1]=='<')
   {
   	 $sgpa=$sgpa[0];
   }
   //echo  '<tr><td>'.$i.'</td>';
   echo  '<td>'.$sgpa.'</td>';
   $sum=$sum+convertgrade($sgpa)*$Credit;
   $bl=substr($bl,$c+strlen($a),strlen($bl));
   echo '</tr>';
   //array_push($sg, $sgpa);
   array_push($data, checkstring($code), checkstring($sub), checkstring($Credit), checkstring($sgpa));
  
}
//array_push($sg, $sum);

//$sgpa=substr($res,$n1+strlen($m1),4);
//echo $res;

 array_push($data, round($sum/$tc,2));
// Close the file
 if($status==1)
 {
  array_push($data, 0);
 }
fputcsv($file, $data);
echo '</tbody>
  </table>';
  echo '<table class="table table-bordered">';
echo "    <thead>
      <tr>
        <th>SGPA</th>
        <th>".round($sum/$tc,2)."</th>
        
      </tr>
    </thead>
    <tbody>";
    $sum=$tc=0;
  }
}




function checkstring($name)
{
  if(stripos($name,'<'))
  {
   $n=stripos($name,'<');
   $name=substr($name,0,$n);
   return $name;
 }
  else 
    return $name;
}







function checkcredit($sub,$branch,$code) 
{

  if($code=="EE3070")
  {
    return 4;
  }
  else
  {

  if(stripos($branch,"Communication"))
  {
    if(stripos($sub,"Skills"))
      return 1;
   elseif(stripos($sub,"Lab"))
      return 2;
    elseif(stripos($sub,"Ethics"))
      return 1;
    elseif(stripos($sub,"Project"))
      return 2;
   else
       return 3;
    }
    else
    {
       if(stripos($sub,"Skills"))
      return 1;
   elseif(stripos($sub,"Lab"))
      return 1;
    elseif(stripos($sub,"Ethics"))
      return 1;
    elseif(stripos($sub,"Project"))
      return 1;
   else
       return 3;
    }
}
}


function convertgrade($grade) 
{
    if($grade=='A+')
    	return 10;
    if($grade=='A')
    	return 9;
    if($grade=='B+')
    	return 8;
    if($grade=='B')
    	return 7;
    if($grade=='C')
    	return 6;
    if($grade=='D')
    	return 5;
    
}
// Close the file
fclose($file);
  ?>