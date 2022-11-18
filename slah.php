<?php 

header('Content-Type: application/json;charset=utf-8');
error_reporting(E_ERROR | E_PARSE);
$name = $_GET['name'];
$url = file_get_contents("https://libgen.is/search.php?req=$name&open=0&res=25&view=simple&phrase=0&column=def");

if(isset($name)){
//================= td ===================== //

// ##################### title ################## //
$title_code = <<<mo
#<a href='(.*?)' title='' id=(.*?)>(.*?)<br>#
mo;
preg_match_all($title_code,$url,$title); 
// ################### publisher & Pages & Language ################# //

$ppl_code = <<<mo
#<td>(.*?)</td>#
mo;
preg_match_all($ppl_code,$url,$ppl); 

// ############### Year & Size & Extension###################### //

$ysx_code = <<<mo
#<td nowrap>(.*?)</td>#
mo;
preg_match_all($ysx_code,$url,$ysx); 

// ############### download ############################ // 

$download_code = <<<mo
#<td><a href='(.*?)' title='(.*?)'>(.*?)</a></td>#
mo;
preg_match_all($download_code,$url,$download); 

#######################################################


echo json_encode(array_merge([
    'ok'=> true,
    'Creator'=>"@MONSTER_hp",
    'results'=>[
      
    '1'=>[
       
 'id'=>$title[2][0],
 'title'=>str_replace("<font face=Times color=green><i>[1st&nbsp;ed.]</i></font>","",str_replace("<font face=Times color=green><i>[1&nbsp;ed.]</i></font>","",$title[3][0])),
 'publisher'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][13])),
 'year'=>$ysx[1][0],
 'size'=>$ysx[1][1],
 'extension'=>$ysx[1][2],
  'pages'=>str_replace("<br>","-",str_replace("</td>","",str_replace("<td>","",$ppl[0][14]))),
  'language'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][15])),
  'd1'=>$download[1][0],
  'd2'=>$download[1][1],
  'd3'=>$download[1][2],
  'd4'=>$download[1][3],
  'd5'=>$download[1][4],

],
       
    '2'=>[
       
 'id'=>$title[2][1],
 'title'=>str_replace("<font face=Times color=green><i>[1st&nbsp;ed.]</i></font>","",str_replace("<font face=Times color=green><i>[1&nbsp;ed.]</i></font>","",$title[3][1])),
  'publisher'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][24])),
 'year'=>$ysx[1][3],
 'size'=>$ysx[1][4],
 'extension'=>$ysx[1][5],
   'pages'=>str_replace("<br>","-",str_replace("</td>","",str_replace("<td>","",$ppl[0][25]))),
  'language'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][26])),
  'd1'=>$download[1][6],
  'd2'=>$download[1][7],
  'd3'=>$download[1][8],
  'd4'=>$download[1][9],
  'd5'=>$download[1][10],
],

    '3'=>[
       
 'id'=>$title[2][2],
 'title'=>str_replace("<font face=Times color=green><i>[1st&nbsp;ed.]</i></font>","",str_replace("<font face=Times color=green><i>[1&nbsp;ed.]</i></font>","",$title[3][2])),
 'publisher'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][35])),
  'year'=>$ysx[1][6],
 'size'=>$ysx[1][7],
 'extension'=>$ysx[1][8],
   'pages'=>str_replace("<br>","-",str_replace("</td>","",str_replace("<td>","",$ppl[0][36]))),
  'language'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][37])),
  'd1'=>$download[1][12],
  'd2'=>$download[1][13],
  'd3'=>$download[1][14],
  'd4'=>$download[1][15],
  'd5'=>$download[1][16],
],

    '4'=>[
       
 'id'=>$title[2][3],
 'title'=>str_replace("<font face=Times color=green><i>[1st&nbsp;ed.]</i></font>","",str_replace("<font face=Times color=green><i>[1&nbsp;ed.]</i></font>","",$title[3][3])),
 'publisher'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][46])),
  'year'=>$ysx[1][9],
 'size'=>$ysx[1][10],
 'extension'=>$ysx[1][11],
   'pages'=>str_replace("<br>","-",str_replace("</td>","",str_replace("<td>","",$ppl[0][47]))),
  'language'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][48])),
  'd1'=>$download[1][18],
  'd2'=>$download[1][19],
  'd3'=>$download[1][20],
  'd4'=>$download[1][21],
  'd5'=>$download[1][22],
],

    '5'=>[
       
 'id'=>$title[2][4],
 'title'=>str_replace("<font face=Times color=green><i>[1st&nbsp;ed.]</i></font>","",str_replace("<font face=Times color=green><i>[1&nbsp;ed.]</i></font>","",$title[3][4])),
 'publisher'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][57])),
  'year'=>$ysx[1][12],
 'size'=>$ysx[1][13],
 'extension'=>$ysx[1][14],
   'pages'=>str_replace("<br>","-",str_replace("</td>","",str_replace("<td>","",$ppl[0][58]))),
  'language'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][59])),
  'd1'=>$download[1][24],
  'd2'=>$download[1][25],
  'd3'=>$download[1][26],
  'd4'=>$download[1][27],
  'd5'=>$download[1][28],
],
    '6'=>[
       
 'id'=>$title[2][5],
 'title'=>str_replace("<font face=Times color=green><i>[1st&nbsp;ed.]</i></font>","",str_replace("<font face=Times color=green><i>[1&nbsp;ed.]</i></font>","",$title[3][5])),
 'publisher'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][68])),
  'year'=>$ysx[1][15],
 'size'=>$ysx[1][16],
 'extension'=>$ysx[1][17],
   'pages'=>str_replace("<br>","-",str_replace("</td>","",str_replace("<td>","",$ppl[0][69]))),
  'language'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][70])),
  'd1'=>$download[1][30],
  'd2'=>$download[1][31],
  'd3'=>$download[1][32],
  'd4'=>$download[1][33],
  'd5'=>$download[1][34],
],

    '7'=>[
       
 'id'=>$title[2][6],
 'title'=>str_replace("<font face=Times color=green><i>[1st&nbsp;ed.]</i></font>","",str_replace("<font face=Times color=green><i>[1&nbsp;ed.]</i></font>","",$title[3][6])),
 'publisher'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][79])),
  'year'=>$ysx[1][18],
 'size'=>$ysx[1][19],
 'extension'=>$ysx[1][20],
   'pages'=>str_replace("<br>","-",str_replace("</td>","",str_replace("<td>","",$ppl[0][80]))),
  'language'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][81])),
  'd1'=>$download[1][36],
  'd2'=>$download[1][37],
  'd3'=>$download[1][38],
  'd4'=>$download[1][39],
  'd5'=>$download[1][40],
],

    '8'=>[
       
 'id'=>$title[2][7],
 'title'=>str_replace("<font face=Times color=green><i>[1st&nbsp;ed.]</i></font>","",str_replace("<font face=Times color=green><i>[1&nbsp;ed.]</i></font>","",$title[3][7])),
 'publisher'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][90])),
  'year'=>$ysx[1][21],
 'size'=>$ysx[1][22],
 'extension'=>$ysx[1][23],
   'pages'=>str_replace("<br>","-",str_replace("</td>","",str_replace("<td>","",$ppl[0][91]))),
  'language'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][92])),
  'd1'=>$download[1][42],
  'd2'=>$download[1][43],
  'd3'=>$download[1][44],
  'd4'=>$download[1][45],
  'd5'=>$download[1][46],
],

    '9'=>[
       
 'id'=>$title[2][8],
 'title'=>str_replace("<font face=Times color=green><i>[1st&nbsp;ed.]</i></font>","",str_replace("<font face=Times color=green><i>[1&nbsp;ed.]</i></font>","",$title[3][8])),
 'publisher'=>str_replace("</td>","",str_replace("<td>","",$publisher[0][101])),
  'year'=>$ysx[1][24],
 'size'=>$ysx[1][25],
 'extension'=>$ysx[1][26],
   'pages'=>str_replace("<br>","-",str_replace("</td>","",str_replace("<td>","",$ppl[0][102]))),
  'language'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][103])),
  'd1'=>$download[1][48],
  'd2'=>$download[1][49],
  'd3'=>$download[1][50],
  'd4'=>$download[1][51],
  'd5'=>$download[1][52],
],

    '10'=>[
       
 'id'=>$title[2][9],
 'title'=>str_replace("<font face=Times color=green><i>[1st&nbsp;ed.]</i></font>","",str_replace("<font face=Times color=green><i>[1&nbsp;ed.]</i></font>","",$title[3][9])),
 'publisher'=>str_replace("</td>","",str_replace("<td>","",$publisher[0][112])),
  'year'=>$ysx[1][27],
 'size'=>$ysx[1][28],
 'extension'=>$ysx[1][29],
   'pages'=>str_replace("<br>","-",str_replace("</td>","",str_replace("<td>","",$ppl[0][113]))),
  'language'=>str_replace("</td>","",str_replace("<td>","",$ppl[0][114])),
  'd1'=>$download[1][54],
  'd2'=>$download[1][55],
  'd3'=>$download[1][56],
  'd4'=>$download[1][57],
  'd5'=>$download[1][58],
],

]]), 448);

}else{

echo "The 'name' Get Parameter Is Empty !";	
	
}
?>