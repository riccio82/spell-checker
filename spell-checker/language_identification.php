<?
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");              // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-type: text/javascript; charset=UTF-8");



function code2utf($num){
   if($num<128)return chr($num);
   if($num<2048)return chr(($num>>6)+192).chr(($num&63)+128);
   if($num<65536)return chr(($num>>12)+224).chr((($num>>6)&63)+128).chr(($num&63)+128);
   if($num<2097152)return chr(($num>>18)+240).chr((($num>>12)&63)+128).chr((($num>>6)&63)+128) .chr(($num&63)+128);
   return '';
}

function unescape($source, $iconv_to = 'UTF-8') {
   $decodedStr = '';
   $pos = 0;
   $len = strlen ($source);
   while ($pos < $len) {
       $charAt = substr ($source, $pos, 1);
       if ($charAt == '%') {
           $pos++;
           $charAt = substr ($source, $pos, 1);
           if ($charAt == 'u') {
               $pos++;
               $unicodeHexVal = substr ($source, $pos, 4);
               $unicode = hexdec ($unicodeHexVal);
               $decodedStr .= code2utf($unicode);
               $pos += 4;
           }
           else {
               $hexVal = substr ($source, $pos, 2);
               $decodedStr .= chr (hexdec ($hexVal));
               $pos += 2;
           }
       }
       else {
           $decodedStr .= $charAt;
           $pos++;
       }
   }

   if ($iconv_to != "UTF-8") {
       $decodedStr = iconv("UTF-8", $iconv_to, $decodedStr);
   }
  
   return $decodedStr;
}


$h = fopen("log","a");
$app = join("\n",$_GET);
fwrite($h, "RICEVO IN PHP:\n\n");
fwrite($h, $app."\n\n"); 

fclose($h);


//exit;

if ($_GET['txt']) {
  include("../semantix/functions.inc.php");
  include("inc/functions-lang-ident.php");
  include ("inc/connect.inc.php");
  
  $text = stripslashes($_GET['txt']);
  $text = str_replace(" "," ",$text);

  $lang = get_lang_with_spell($text,$mysql_link,"","UTF-8","LANG_IDENT_PATTERNS");
  $res = array_keys($lang); 
  $h = fopen("log","a");
	fwrite($h, "MANDO AL LANGIDENT: $text\n\n");
  fwrite($h, "LINGUA: ". substr($res[0],0,2)."\n\n");

  echo strtolower(substr($res[0],0,2));

}

?>
