<?
$domains2lang = array('traduzioni'=>'it',
 											'traduction'=>'fr',
											'traductor'=>'es',
											'free'=>'en',
											'ubersetzung'=>'de'); 
											
$lang2domains = array('it'=>'traduzioni',
 											'fr'=>'traduction',
											'es'=>'traductor',
											'en'=>'free',
											'de'=>'ubersetzung'); 												
 									
$free_lang_supported = array("it","en","fr","es","de");

$dictionariesList_lec = array("general",
				"automotive",
				"aviation",
				"chemestry",
				"colloquial",
				"computer",
				"business",
				"electronics",
				"foodscience",
				"legal",
				"lifescience",
				"mathematics",
				"mechanicalengineering",
				"medicine",
				"photographyoptics",
				"physics",
				"politicalscience");

$week_days_it = array("Mon"=>"Lun",
		      "Tue"=>"Mar",
		      "Wed"=>"Mer",
		      "Thu"=>"Gio",
		      "Fri"=>"Ven",
		      "Sat"=>"Sab",
		      "Sun"=>"Dom"
		      );

$week_days_fr = array("Mon"=>"Lun",
		      "Tue"=>"Mar",
		      "Wed"=>"Mer",
		      "Thu"=>"Jeu",
		      "Fri"=>"Ven",
		      "Sat"=>"Sam",
		      "Sun"=>"Dim"
		      );

$mt_lp_en_systran = array("en"=>"English",
			  "nl"=>"Dutch",
			  "ja"=>"Japanese",
			  "ko"=>"Korean",
			  "zh"=>"Chinese (Simp.)",
			  "zt"=>"Chinese (Trad.)",
			  "ru"=>"Russian",
			  "es"=>"Spanish",
			  "fr"=>"French",
			  "it"=>"Italian",
			  "de"=>"German",
			  "pt"=>"Portuguese"
			  );

$mt_lp_en_wl = array("en"=>"English",
		  "nl"=>"Dutch",
		  "ja"=>"Japanese",
		  "ko"=>"Korean",
		  "zh_CN"=>"Chinese (Simp.)",
		  "zh_TW"=>"Chinese (Trad.)",
		  "ru"=>"Russian",
		  "es"=>"Spanish",
		  "fr"=>"French",
		  "it"=>"Italian",
		  "de"=>"German",
		  "pt"=>"Portuguese",
		  "el"=>"Greek"
		  );
asort($mt_lp_en_wl);
reset($mt_lp_en_wl);

$mt_lp_it_wl = array("en"=>"Inglese",
		  "nl"=>"Olandese",
		  "ja"=>"Giapponese",
		  "ko"=>"Coreano",
		  "zh_CN"=>"Cinese (Simp.)",
		  "zh_TW"=>"Cinese (Trad.)",
		  "ru"=>"Russo",
		  "es"=>"Spagnolo",
		  "fr"=>"Francese",
		  "it"=>"Italiano",
		  "de"=>"Tedesco",
		  "pt"=>"Portoghese",
		  "el"=>"Greco"
		  );
asort($mt_lp_it_wl);
reset($mt_lp_it_wl);

$mt_lp_fr_wl = array("en"=>"Anglais",
		  "nl"=>"N&eacute;erlandais",
		  "ja"=>"Japonais",
		  "ko"=>"Cor&eacute;en",
		  "zh_CN"=>"Chinois simplifi&eacute;",
		  "zh_TW"=>"Chinois traditionnel",
		  "ru"=>"Russe",
		  "es"=>"Espagnol",
		  "fr"=>"Fran&ccedil;ais",
		  "it"=>"Italien",
		  "de"=>"Allemand",
		  "pt"=>"Portuguais",
		  "el"=>"Grecque"
		  );
asort($mt_lp_fr_wl);
reset($mt_lp_fr_wl);

$glossaries_wl = array('gl1'=>array('en'=>'General',
				 'it'=>'Generico',
				 'fr'=>'G&eacute;n&eacute;ral'),
		    'gl2'=>array('en'=>'Automotive',
				 'it'=>'Automobilistico',
				 'fr'=>'Automobile'),
		    'gl3'=>array('en'=>'Aviation/Space',
				 'it'=>'Aviazione/Spazio',
				 'fr'=>'Aviation/spacial'),
		    'gl4'=>array('en'=>'Chemestry',
				 'it'=>'Chimica',
				 'fr'=>'Chimie'),
		    'gl5'=>array('en'=>'Colloquial',
				 'it'=>'Colloquiale',
				 'fr'=>'Language commun'),
		    'gl6'=>array('en'=>'Computer/IT',
				 'it'=>'Informatica',
				 'fr'=>'Informatique'),
		    'gl7'=>array('en'=>'Earth Sciences',
				 'it'=>'Scienze Terrestri',
				 'fr'=>'Sciences de la terre'),
		    'gl8'=>array('en'=>'Economics/Business',
				 'it'=>'Economia/Business',
				 'fr'=>'Economie/Commerce'),
		    'gl9'=>array('en'=>'Electronics',
				 'it'=>'Elettronica',
				 'fr'=>'Electronique'),
		    'gl10'=>array('en'=>'Food Science',
				  'it'=>'Alimentazione',
				  'fr'=>'Alimentation'),
		    'gl11'=>array('en'=>'Legal',
				  'it'=>'Legale',
				  'fr'=>'Droit'),
		    'gl12'=>array('en'=>'Life Science',
				  'it'=>'Scienze Biologiche',
				  'fr'=>'Sciences naturelles'),
		    'gl13'=>array('en'=>'Mathematics',
				  'it'=>'Matematica',
				  'fr'=>'Math&eacute;matiques'),
		    'gl14'=>array('en'=>'Mechanical Engineering',
				  'it'=>'Meccanica',
				  'fr'=>'Ing&eacute;nierie m&eacute;canique'),
		    'gl15'=>array('en'=>'Medicine',
				  'it'=>'Medicina',
				  'fr'=>'M&eacute;decine'),
		    'gl16'=>array('en'=>'Metallurgy',
				  'it'=>'Metallurgia',
				  'fr'=>'M&eacute;tallurgie'),
		    'gl17'=>array('en'=>'Military Science',
				  'it'=>'Scienze Militari',
				  'fr'=>'Sciences militaires'),
		    'gl18'=>array('en'=>'Naval/Maritime',
				  'it'=>'Navale/Marittimo',
				  'fr'=>'Naval/Maritime'),
		    'gl19'=>array('en'=>'Photography/Optics',
				  'it'=>'Fotografia/Ottica',
				  'fr'=>'Photographie/optique'),
		    'gl20'=>array('en'=>'Physics',
				  'it'=>'Fisica',
				  'fr'=>'Physique'),
		    'gl21'=>array('en'=>'Political Science',
				  'it'=>'Scienze Politiche',
				  'fr'=>'Sciences politiques')
		    );

$mt2translated_wl = array("en"=>"English",
		       "nl"=>"Dutch",
		       "ja"=>"Japanese",
		       "ko"=>"Korean",
		       "zh_CN"=>"Chinese",
		       "zh_TW"=>"Chinese",
		       "ru"=>"Russian",
		       "es"=>"Spanish",
		       "fr"=>"French",
		       "it"=>"Italian",
		       "de"=>"German",
		       "pt"=>"Portuguese",
		       "el"=>"Greek"
		       );
		       

// INIZIO VARIABILI LEC

$mt_lp_en_lec = array(
			"auto"=>"AUTO",
		  "ar"=>"Arabic",
		  "de"=>"German",
		  "en"=>"English",
		  "es"=>"Spanish",
		  "fa"=>"Farsi",
		  "fr"=>"French",
		  "he"=>"Hebrew",
		  "it"=>"Italian",
		  "id"=>"Indonesian",
		  "ja"=>"Japanese",
		  "ko"=>"Korean",
		  "nl"=>"Dutch",
		  "pap"=>"Papiamentu",
		  "pl"=>"Polish",
		  "pt"=>"Portuguese",
		  "ru"=>"Russian",
		  "sv"=>"Swedish",
		  "tr"=>"Turkish",
		  "uk"=>"Ukrainian",
		  "zh"=>"Chinese (China)",
		  "zh_TW"=>"Chinese (Taiwan)",
		  "el"=>"Greek"
		  );
		  
asort($mt_lp_en_lec);
reset($mt_lp_en_lec);

$mt_lp_de_lec = array(
			"auto"=>"AUTO",
		  "ar"=>"Arabic",
		  "de"=>"German",
		  "en"=>"English",
		  "es"=>"Spanish",
		  "fa"=>"Farsi",
		  "fr"=>"French",
		  "he"=>"Hebrew",
		  "it"=>"Italian",
		  "id"=>"Indonesian",
		  "ja"=>"Japanese",
		  "ko"=>"Korean",
		  "nl"=>"Dutch",
		  "pap"=>"Papiamentu",
		  "pl"=>"Polish",
		  "pt"=>"Portuguese",
		  "ru"=>"Russian",
		  "sv"=>"Schwedisch",
		  "tr"=>"Turkish",
		  "uk"=>"Ukrainian",
		  "zh"=>"Chinese (China)",
		  "zh_TW"=>"Chinese (Taiwan)",
		  "el"=>"Greek"
		  );
		  
asort($mt_lp_de_lec);
reset($mt_lp_de_lec);

$mt_lp_es_lec = array(
			"auto"=>"AUTO",
		  "ar"=>"Arabic",
		  "de"=>"German",
		  "en"=>"English",
		  "es"=>"Spanish",
		  "fa"=>"Farsi",
		  "fr"=>"French",
		  "he"=>"Hebrew",
		  "it"=>"Italian",
		  "id"=>"Indonesian",
		  "ja"=>"Japanese",
		  "ko"=>"Korean",
		  "nl"=>"Dutch",
		  "pap"=>"Papiamentu",
		  "pl"=>"Polish",
		  "pt"=>"Portuguese",
		  "ru"=>"Russian",
		  "sv"=>"Swedish",
		  "tr"=>"Turkish",
		  "uk"=>"Ukrainian",
		  "zh"=>"Chinese (China)",
		  "zh_TW"=>"Chinese (Taiwan)",
		  "el"=>"Greek"
		  );
		  
asort($mt_lp_es_lec);
reset($mt_lp_es_lec);


$mt_lp_fr_lec = array(
			"auto"=>"AUTO",
		  "ar"=>"Arabe",
		  "de"=>"Allemand",
		  "en"=>"Anglais",
		  "es"=>"Espagnol",
		  "fa"=>"Farsi",
		  "fr"=>"Fran&ccedil;ais",
		  "he"=>"H&eacute;breu",
		  "it"=>"Italien",
		  "id"=>"Indon&eacute;sien",
		  "ja"=>"Japonais",
		  "ko"=>"Cor&eacute;en",
		  "nl"=>"N&eacute;erlandais",
		  "pap"=>"Papiamentu",
		  "pl"=>"Polonais",
		  "pt"=>"Portuguais",
		  "ru"=>"Russe",
		  "sv"=>"Su&eacute;dois",
		  "tr"=>"Turc",
		  "uk"=>"Ukrainien",
		  "zh"=>"Chinois simplifi&eacute;",
		  "zh_TW"=>"Chinois traditionnel",
		  "el"=>"Grec"
		  );
asort($mt_lp_fr_lec);
reset($mt_lp_fr_lec);

$mt_lp_it_lec = array(
			"auto"=>"AUTO",
		  "ar"=>"Arabo",
		  "de"=>"Tedesco",
		  "en"=>"Inglese",
		  "es"=>"Spagnolo",
		  "fa"=>"Farsi",
		  "fr"=>"Francese",
		  "he"=>"Ebraico",
		  "it"=>"Italiano",
		  "id"=>"Indonesiano",
		  "ja"=>"Giapponese",
		  "ko"=>"Coreano",
		  "nl"=>"Olandese",
		  "pap"=>"Papiamentu",
		  "pl"=>"Polacco",


		  "pt"=>"Portoghese",
		  "ru"=>"Russo",
		  "sv"=>"Svedese",
		  "tr"=>"Turco",
		  "uk"=>"Ucraino",
		  "zh"=>"Cinese (Cina)",
		  "zh_TW"=>"Cinese (Taiwan)",
		  "el"=>"Greco"
		  );
asort($mt_lp_en_lec);
reset($mt_lp_en_lec);


$mt2translated_lec = array(
			"ar"=>"Arabic",
		  	"de"=>"German",
		  	"en"=>"English",
		 	"es"=>"Spanish",
		  	"el"=>"Greek",
		  	"fa"=>"Farsi",
		  	"fr"=>"French",
		  	"he"=>"Hebrew",
			"id"=>"Indonesian",
		  	"it"=>"Italian",
		  	"ja"=>"Japanese",
		  	"ko"=>"Korean",
		  	"nl"=>"Dutch",
		  	"pap"=>"Papiamentu",
		  	"pl"=>"Polish",
		  	"pt"=>"Portuguese",
		  	"ru"=>"Russian",
		  	"sv"=>"Swedish",
		  	"tr"=>"Turkish",
		  	"uk"=>"Ukrainian",
		  	"zh"=>"Chinese",
		  	"zh_TW"=>"Chinese Traditional");
		  
function machine_translation_wordtrans($text, $srclang, $trglang) {
	//ATTENZIONE: $text deve essere una singola parola!
	$a = exec("kwordtrans --nogui --conf /etc/wordtrans -d \"en-it-babylon\" -w -c -i -g \"hello\"",$out);
	print_r($out); //a deve essere 1
	
}

function machine_translation_lec($text, $srclang, $trglang, $dictionary=0, $ACT="TXT", $PostData=0,$url=0) {

// $lec_lang_pairs = array("ar","de","en","es","fa","fr","he","it","ja","ko","nl","pl","pt","ru","tr","uk","zh");
		
if ($text) {

$zh_version = "";
if ($trglang=='zh')    { $zh_version = "\n<t:Option Name=\"UseSimplifiedChineseLanguage\">1</t:Option>"; }
if ($trglang=='zh_TW') { $zh_version = "\n<t:Option Name=\"UseSimplifiedChineseLanguage\">0</t:Option>";
                         $trglang='zh'; }

if($dictionary != "") {
	//$diz_Option = "\n<t:Option Name=\"TDs_0\">".$dictionary."</t:Option>";
}	

if($ACT=="HTML") {
	$HTML="<t:Option Name=\"HTML\">1</t:Option>";		
} else {
	$HTML="<t:Option Name=\"HTML\">0</t:Option>";
}

//OLD: <TicketValue>S:marco@translated.net]172.:1132.R</TicketValue>
$soap_req = "<SOAP:Envelope xmlns:SOAP=\"http://schemas.xmlsoap.org/soap/envelope/\" SOAP:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
<SOAP:Body xmlns:t='urn:LogoMedia.net-TranslationServer'>
<Translate>
<t:sourceLang>$srclang</t:sourceLang>
<t:targetLang>$trglang</t:targetLang>
<t:uiLang>en</t:uiLang>
<TicketValue>s:TN0004</TicketValue>
<t:Options>$HTML
<t:Option Name=\"TransVersion\">0</t:Option>$zh_version
<t:Option Name=\"CorrespondingWord\">0</t:Option>$diz_Option
</t:Options>
<sourceText xml:space=\"preserve\">$text</sourceText>
</Translate>
</SOAP:Body>
</SOAP:Envelope>";


$post = "POST /Translation HTTP/1.1
Host: translationfarm.lec.com
User-Agent: Translated Post
Content-Type: application/soap+xml; charset=utf-8
Content-Length: ".strlen($soap_req)."

$soap_req";

$socket = fsockopen("translationfarm.lec.com", 80, $errno, $errstr);

$socket = fsockopen("translationfarm.lec.com", 80, $errno, $errstr);
	if(!$socket) {
	    echo "ERRORE: $errno $errstr\n";
	    exit;
	}
	fputs($socket, $post);

	while (!feof($socket)) {
		$http_result .= fgets($socket, 1024);
	}
	fclose($socket);
	//echo $http_result; 
	// $http_result = str_replace("\n","<TRANSLATED_NEW_LINE_N>",$http_result);
	// $http_result = str_replace("\r","<TRANSLATED_NEW_LINE_R>",$http_result);
	// preg_match("/(<return>)(.*?)(<\/return>)/i", $http_result, $translation);
	// $translation = $translation[2];
	//$translation = str_replace("<TRANSLATED_NEW_LINE_N>","\n",$translation);
	// $translation = str_replace("<TRANSLATED_NEW_LINE_R>","\r",$translation);
	
	// BUG ATTENZIONE QUESTA ANCHE NON E' TESTATA A FONDO!
	preg_match("/(<return>)(.*)(<\/return>)/is",$http_result,$translation);
	$translation = $translation[2];

	if (strlen(trim($translation))==0 || substr($translation,0,8)=='<Errors>') {
			$translation = ""; //utf8_encode("The service is down. Try in the next days.\r\n\r\nIl sistema � temporaneamente disattivato, riprova tra qualche giorno.\r\n\r\nErreur, cliquer retour et essayer � nouveau");
	}

}  // if ($text)
	if($ACT=="HTML") {
			return translate_web_site_lec($translation,$url,$PostData);
	}

	return $translation;
	

}
	       

$browser_default = Array
  (
   'HTTP_ACCEPT' => "*/*",
   'HTTP_ACCEPT_ENCODING' => "gzip, deflate",
   'HTTP_ACCEPT_LANGUAGE' => "it",
   'HTTP_CONNECTION' => "Keep-Alive",
   'HTTP_COOKIE' => "userlang=it; srclang=it; trglang=en",
   'HTTP_HOST' => "free.translated.net",
   'HTTP_USER_AGENT' => "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)",
   'PATH' => "/sbin:/usr/sbin:/bin:/usr/bin:/usr/X11R6/bin",
   'REMOTE_ADDR' => "194.185.112.249",
   'SCRIPT_FILENAME' => "/home/translated/public_html/free/",
   'SERVER_ADDR' => "10.30.1.241",
   'SERVER_ADMIN' => "webmaster@translated.net",
   'SERVER_NAME' => "free.translated.net",
   'SERVER_PORT' => "80",
   'SERVER_SOFTWARE' => "Apache-AdvancedExtranetServer/1.3.23 (Mandrake Linux/4mdk) mod_ssl/2.8.7 OpenSSL/0.9.6c PHP/4.1.2",
   'GATEWAY_INTERFACE' => "CGI/1.1",
   'SERVER_PROTOCOL' => "HTTP/1.1",
   'REQUEST_METHOD' => "POST",
   'SCRIPT_NAME' => "/index.php",
   'PATH_TRANSLATED' => "/home/translated/public_html/free/index.php",
   'PHP_SELF' => "/index.php"
   );


function create($l,$curr_selection=0) {
		global $dictionariesList_lec; 		
		if($l=="") { $l="it"; }
		if($curr_selection == "") {$curr_selection="general";}
		include "msg_".$l.".inc.php";
		echo "<select name=\"dictionary\">\n";
		foreach($dictionariesList_lec as $diz) {
			if($curr_selection == $diz) { $selected ="SELECTED"; } else { $selected=""; }
			echo "<option ".$selected." value=\"$diz\">".$msg["dict_".$diz]."</option>\n";
		}
		echo "</select>";	    
}

function create_select_gloss($l,$glossaries=0,$default_gl="gl1") {
		create($l,$glossaries);
		/*
    $glossaries = glossary_sort($glossaries, $l);
    echo "<select name=g>\n";
    foreach ($glossaries as $key=>$value) { 
		if ($key==$default_gl) { $selected = "SELECTED "; } else { $selected = ""; }
	    echo "<option " . $selected . "value='$key'>".$value[$l]."\n";
    }
    echo "</select>";
    */
}

function machine_translation_systran($text,$combination) {
    if (!isset($combination)) { $combination = "it_en"; }
    $combination = str_replace("zh_CN","zh",$combination);
    $combination = str_replace("zh_TW","zt",$combination);
    $mt_active_lp = array("it_en","en_it",
			  "ja_en","en_ja",
			  "fr_en","en_fr",
			  "nl_en","en_nl",
			  "ko_en","en_ko",
			  "zh_en","en_zh",
			  "zt_en","en_zt",
			  "ru_en","en_ru",
			  "es_en","en_es",
			  "de_en","en_de",
			  "pt_en","en_pt",

			  "nl_fr","fr_nl",
			  "es_fr","fr_es",
			  "de_fr","fr_de",
			  "pt_fr","fr_pt",
			  "it_fr","fr_it");

    if (!in_array($combination,$mt_active_lp)) {
	// return "Sorry, cannot translate directly in this language pair ($combination)";
	// passo per l'inglese
	$combination_temp1 = substr($combination,0,2) . "_en";
	$combination = "en_" . substr($combination,3,2);
	// echo $combination_temp1;
	// echo $combination_temp2;
	// echo $text . $combination_temp1 . $combination;
	$text = machine_translation_systran($text,$combination_temp1);
	// echo text;
    }

    $text = urlencode("$text");
    // $url = "http://www.systranbox.com/systran/box?urltext=$text&lp=$combination&x=14&y=10&partner=systran-AffiliatesBox-en&pid=916457&url=http%3A%2F%2Fwww.systranlinks.com%2Fsystran%2Fcgi&aid=5338055";
    $url = "http://www.systranbox.com/systran/box?systran_text=$text&systran_lp=$combination&systran_id=SystranSoft-en&systran_charset=utf-8&ttype=text";
    // echo "XXX: " . ini_set('user_agent','Mozilla: (compatible; Windows XP)') ."XXX";
    // $result = fopen("http://www.translated.net/it/index.php",r);  exit;
    $result = file("$url");
    $result_txt = implode("\n",$result);
    eregi("(<textarea name=\"translation\")([^>]*)(>)([^<]*)",$result_txt,$target_tmp);
    $target = $target_tmp[4];
    return $target;
}

function machine_translation($text,$s,$t,$gloss="gl1") {
    $pass = "secret";
    $mimetype = "text/plain";
    /*
    if (!in_array($s,array("ja","zh_TW","zh_CN","ko","el","ru"))) {
	$text = utf8_decode($text);
    }
    */
    
    // PER TRADUZIONI SITI
    /*
    if (substr($text,0,7)=="http://") {
    $text = file($text);
    $text = join('',$text);
    $mimetype = "text/html";
    }
    */
    
    $text = urlencode($text);

    // $url = "http://www.worldlingo.com/S433.1/api?wl_data=$text&wl_srclang=$s&wl_trglang=$t&wl_password=$pass&wl_errorstyle=0&wl_srcenc=UTF-8&wl_trgenc=UTF-8";
    // $url = "http://www.worldlingo.com/S433.1/api?wl_mimetype=$mimetype&wl_data=$text&wl_srclang=$s&wl_trglang=$t&wl_password=$pass&wl_errorstyle=0&wl_srcenc=UTF-8&wl_trgenc=UTF-8&wl_gloss=$gloss";
    $url = "http://www.worldlingo.com/S4754.1/api?wl_mimetype=$mimetype&wl_data=$text&wl_srclang=$s&wl_trglang=$t&wl_password=$pass&wl_errorstyle=0&wl_srcenc=UTF-8&wl_trgenc=UTF-8&wl_gloss=$gloss";
    
    
    //$result = @file($url);
    // temporaneo prima di LEC
    $result = "";
    /*
    echo "</textarea>";
    echo join('',$result);
    exit;
    */
    
    if (trim($result[0])<>"0") {
			return false;
//	return utf8_encode("Error, go back and try again!\r\n\r\nErrore, torna indietro e riprova\r\n\r\nErreur, cliquer retour et essayer � nouveau");
    }
    else {
	$result_txt = implode("\n",array_slice($result,1));
    }
    if ($mimetype=="text/html") {
        $result_txt = "EUNAPAGINAWEB" . $result_txt;
    }
    return $result_txt;
}



function machine_translation_post($text,$s,$t) {

    include('class.HTTPPost.inc.php');
    $params['wl_data'] = $text;
    $params['wl_srclang'] = $s;
    $params['wl_trglang'] = $t;
    $params['wl_password'] = "secret";
//    $post = new HTTPPost('http://www.worldlingo.com/S433.1/api?', $params);
      $post = new HTTPPost('http://www.worldlingo.com/S4754.1/api?', $params);
    return $post->post();
}

// echo machine_translation("la citt�","it_fr");
// echo machine_translation("hello to all","EN_FR");
// echo machine_translation("bonjour tous","fr_en");
// echo machine_translation("ciao a tutti, � bello","IT_EN");
// echo "\npoi\n";
//echo machine_translation("Je peux manger du verre, ça ne me fait pas de mal","fr","en");
/*
function machine_translation_wl($text, $srclang, $trglang) {
    $serviceno = "S433.1";
    $servicepwd = "secret";
    $params = "wl_data=".urlencode($text);
    $params .= "&wl_srcenc=UTF-8&wl_trgenc=UTF-8&wl_errorstyle=1&wl_srclang=".$srclang."&wl_trglang=".$trglang."&wl_password=".$servicepwd;
    $host = "www.worldlingo.com";
    $path = "/".$serviceno."/api";
    $referer = "http://www.worldlingo.com/";
    return httpPost($host, $path, $referer, $params);
}
*/
function httpPost($host, $path, $referer, $data) {
    $fp = fsockopen($host, 80, $errno, $errstr);
    $request = "POST ".$path." HTTP/1.1\r\n";
    $request .= "Host: ".$host."\r\n";
    $request .= "Referer: ".$referer."\r\n";
    $request .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $request .= "Content-Length: ".strlen($data)."\r\n";
    $request .= "\r\n";
    $request .= $data."\r\n";
    $request .= "\r\n";
    fputs($fp, $request);
    $tmp_headers = "";
    while ($str = trim(fgets($fp, 4096))) {
	$tmp_headers .= $str."\n";
    }
    // echo $tmp_headers; exit;
    $tmp_body = "";
    while (!feof($fp)) {
	$tmp_body .= fgets($fp, 4096);
    }
    fclose($fp);
    return $tmp_body;
}

function free_insert_log($mysql_link,$s,$t,$text,$translation,$user="",$free_num_req=0,$dictionary=0,$engine=0,$timer=0) {
    // BUG: togliere da qui per non farlo due volte
    $ip = GetIP();
    $browser = $_SERVER['HTTP_USER_AGENT'];
    // BUG: credo che il trim non sia utf-8 compatibile......
    $text = addslashes(trim($text));
    $translation = addslashes(trim($translation));
    $user = addslashes($user);
    $now    = date("Y-m-d");
    $ipdate = substr($ip,0,15).substr($now,8,2).substr($now,5,2).substr($now,3,1);
    $query = "INSERT INTO FREE_TRANSLATED_LOG (IP,   DATE, S,     T,   TEXT, TRANSLATION, BROWSER, USER, NUM_REQ,DICT,ENGINE,IPDATE,TIMER)
      VALUES        ('$ip', '".date("Y-m-d H:i:s")."','$s','$t','$text', '$translation', '$browser', '$user', '$free_num_req','$dictionary',$engine,'$ipdate',$timer)";
    $mysql_result = mysql_query($query,$mysql_link);
    //echo mysql_error();
		return $mysql_result;	
	}

function max_limit_reached($mysql_link,$s,$t,$text,$user="",$free_num_req=0) {
    global $browser_default;



	if ($free_num_req>30) {
	    return true;
	}

    $ip = GetIP();
    // $browser = implode('\n',array_diff($_SERVER,$browser_default));
    $now = date("Y-m-d");
    // BUG: Ho creato un indice chiamato IPDATE composto da IP-GIORNO-MESE-ANNO di 20 bytes (30M al mese) valido fino al 2010.
    // Teoricamente potrebbe essere di soli 4+3=7bytes (10M al mese)
    // considerando solo i primi 15 caratteri dell'ip, normalmente non identifica i proxy quindi deve essere usato con ip e date.
    $ipdate = substr($ip,0,15).substr($now,8,2).substr($now,5,2).substr($now,3,1);
    $query2 = "SELECT COUNT(IP)/COUNT(DISTINCT BROWSER), COUNT(DISTINCT BROWSER), COUNT(*) from FREE_TRANSLATED_LOG 
		WHERE IPDATE='$ipdate' AND IP='$ip' AND DATE LIKE '" . $now ."%' ";
//echo $query2;exit;
    $mysql_result = mysql_query($query2,$mysql_link);
    $row = mysql_fetch_row($mysql_result);
    // print_r($row); 
    if ( (($row[0]>5) AND ($row[1]<20)) 
	      OR ($row[0]>10)    // con 18.000 utenti un proxy ha in un giorno ha circa 14 browser e 150 richieste
	      OR ($row[2]>300) ) { // con 18.000 utenti AOL puo' fare massimo 500 richieste.....
	
	//	mail("marco@translated.net","BANNATO: $ip", $query);
    return true;
    }
    return false;

}

function GetIP()
{
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
      $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
      $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
      $ip = getenv("REMOTE_ADDR");
    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
      $ip = $_SERVER['REMOTE_ADDR'];
    else
      $ip = "unknown";
    return($ip);
}/*-------GetIP()-------*/

function get_translator($source,$target,$words,$subject,$mysql_link,$r=0,$fast=false) {

    global $translator_order_by_1, $translator_order_by_2, $translator_order_by_3,
      $translator_considered_days,
      $no_translator_rate,
      $no_translator_turnaround,
      $busy_max,
      $my_timezone;
      

    $today=GetOfficeDate("Y-m-d H:i:s",$my_timezone);
    
    if ($fast==true) {
	$delivery = get_delivery($today,2000,$words,1,0,1,$cid);
	$result = array(
	 0=>'TRANSLATED_SRL',
         1=>round(0.12*max($words,100),2),
	 2=>$delivery[1]
	 );
	
	return $result;
    }
    
    
    $disponibile=0;
    $no_translator_found=0;

    $query_vocab = "";
    if ((strtolower($subject)<>'none') AND (strtolower($subject)<>'general') AND $subject) {
	$query_vocab = "AND (a.vocab1='$field' OR a.vocab2='$field' OR a.vocab3='$field')";
    }

    $query = "SELECT a.id_translator, a.vote, a.rate, b.status, $translator_order_by_3 , COUNT(c.id), a.id ,
	       $translator_order_by_1 , $translator_order_by_2, a.turnaround
	       FROM (languages a
		     INNER JOIN translators b ON a.id_translator=b.id)
		 LEFT JOIN jobs c ON c.id_translator=b.id
	       AND (  (c.status_translator = 'APPROVATO')
		      OR  (c.status_translator =  'IN LAVORAZIONE')
		      OR  (c.status_translator =  'DA CONFERMARE')
		      OR  (c.status_translator =  'CONSEGNATO') )
		 AND ((TO_DAYS(NOW())-TO_DAYS(c.order_date))<$translator_considered_days)
		   WHERE a.source='$source' AND
	       a.target='$target' AND
	       a.status='1' AND
	       (b.status='1' OR b.status='2')
		 $query_vocab
	       GROUP BY b.id
	       ORDER BY 8 DESC, 9 DESC,  5 DESC
	       LIMIT 0,10 ";

    $mysql_result=mysql_query($query,$mysql_link);
    $count=mysql_num_rows($mysql_result);
    echo mysql_error();

    // echo $count; exit;
    while($disponibile!="1" ) {
        $row=mysql_fetch_row($mysql_result);

        if(!isset($row[0]) OR ($count<1))
	{ $disponibile=1; $no_translator_found=1; }
        else
        {
	    $id_translator[$i][0]=$row[0];
	    $id_lang=$row[6];

	    $price[$i][0]=get_quote($words,$row[2],$cid,$source,$target[$i]);
	    $delivery_date=get_delivery($today,$row[9],$words,1,0,$num_jobs,$cid);

	    $app=busy_avg($row[0],$today,$delivery_date[0],$mysql_link);

	    $busy=round($app[0],2);

	    if($busy<$busy_max) {  $disponibile=1; }
	    $input_t=$input_t."<input type=hidden name=\"id_translator[$i][0]\" value=\"".$id_translator[$i][0]."\">";
        } // end else isset id_trad

    } //end fetch row and disponibile

    if($no_translator_found==1) {
	$price[$i][0]=get_quote($words,$no_translator_rate,$cid,$source,$target[$i]);
	$delivery_date=get_delivery($today,$no_translator_turnaround,$words,1);
	$turnaround[0]=$no_translator_turnaround;
	// echo $price[$i][0]; exit;
	// $query = "UPDATE jobs SET id_translator='NONE AVAILABLE' WHERE id='".$id_jobs[$i]."' ";
	// $mysql_result=mysql_query($query,$mysql_link);
	// echo $query;

    }

    $price[$i][0] = number_format($price[$i][0],2,'.','');
    $total_s1=$total_s1+$price[$i][0];
    $rate_c=$price[$i][0]/$words;

    $rate_c=round($rate_c,3);
    $rate_a_cartella=$rate_c*$words_per_page;

    /*
     if(isset($id_translator[$i][0]) AND $id_translator[$i][0]!="" )
     {$trad_info="<tr><td><img height=\"1\" width=\"20\" src=\"gif/spacer.gif\"><u>Translator</u>:</td><td>".$id_translator[$i][0]." [ <a class=largelinkblue href=\"javascript:openpopup('profile.php?id_lang=$id_lang',800,500)\">see profile</a> ]</td></tr>";}
     else{$trad_info="<tr><td valign=\"top\"><img height=\"1\" width=\"20\" src=\"gif/spacer.gif\"><u>Translator</u>:</td><td>Profile not available</td></tr>";}
     */

    $table[$i]= "><u>Price</u>:</td><td>" .$price[$i][0]." &euro; (VAT not included)<br><div class=medium>(".$rate_c." &euro; per word, around $rate_a_cartella &euro; per standard page)</div></td></tr>
																								  <tr><td valign=\"top\"><img height=\"1\" valign=\"top\" width=\"20\" src=\"gif/spacer.gif\"><u>Delivery</u>:</td><td>Guaranteed for <b>".substr($delivery_date[1],0,16)."</b></td></tr>
																																													    ".$trad_info."
																																															   <tr><td valign=\"top\"><img height=\"1\" valign=\"top\" width=\"20\" src=\"gif/spacer.gif\"><u>Payment</u>:</td><td class=medium>Within 5 days of delivery of the translated document.<br>Wire transfer or credit card.</b></td></tr>
																																															   </table>
																																															   <br>";

    // REVISIONE
    // ATTENZIONE BUG!!: IL CALCOLO E' SEMPLIFICATO E NON UGUALE AL PREV ONLINE
    if ($r==1) {
	$price[$i][0] = round($price[$i][0] * 1.5,2);
	// echo $delivery_date[1] . $row[9] .
	$delivery_date = get_delivery($delivery_date[1],$row[9],$words*0.5,1,0,$num_jobs,$cid);
    }

    $total_s1=number_format($total_s1,2,'.','');

    return array($id_translator[$i][0],$price[$i][0],substr($delivery_date[1],0,16));
}

// BUG NO-ONE CALLS THIS - NEW_PROJECT EXISTS IN HTS-COMMON.INC TOO...
function new_project_free($source,$target,$words,$mysql_link) {

    $j = 0;
    if (is_array($target)) {

	for($i=0;$i<count($target);$i++)
	{
	    if( (isset($target[$i])) AND  ($target[$i]<>"") )
	    {
		$target_temp[$j] = $target[$i];
		$j++;
	    }
	    $target_param=$target_param."target[$i]=$target[$i]&";
	}

	$num_jobs = $j;

	$target = $target_temp;
    }
    else
    { $target[0] = $target; }

    if ($words<1)
    {
	$url="preventivo.php?error=nowords&".$target_param;
	Header("Location: $url");
    }

    $today=GetOfficeDate("Y-m-d H:i:s",$my_timezone);

    if($from=="1")
    {

	$ipinfo = getipinfo();

	$query = "INSERT INTO projects (name, order_date) VALUES
		   ('IP:".$ipinfo['ip']." ISP:".$ipinfo['isp']."', '$today')";
	$mysql_result=mysql_query($query,$mysql_link);

	$query = "SELECT LAST_INSERT_ID()";
	$mysql_result=mysql_query($query,$mysql_link);
	$row= mysql_fetch_row($mysql_result);
	$id_project = $row[0];

	for($i=0;$i<count($target);$i++)
	{

	    $query = "INSERT INTO jobs (id_project,words, order_date, source, target, subject, status_customer,status_translator)
	      VALUES ('$id_project','$words','$today','$source','$target[$i]', '$field','TEST','TEST')";
	    $mysql_result=mysql_query($query,$mysql_link);
	    $query = "SELECT LAST_INSERT_ID()";
	    $mysql_result=mysql_query($query,$mysql_link);
	    $row= mysql_fetch_row($mysql_result);
	    $id_jobs[$i] = $row[0];
	} //for $i

    }     // from==1

    return array($id_project,$id_jobs);
}

// +-- First let's set up the multidimensional array.

// +-- Here's the function:
  function glossary_sort ($array, $key_sort) { // start function

    $key_sorta = explode(",", $key_sort);

    $keys = array_keys($array['gl1']);
    // sets the $key_sort vars to the first
    for($m=0; $m < count($key_sorta); $m++)
    { $nkeys[$m] = trim($key_sorta[$m]); }
    $n += count($key_sorta);    // counter used inside loop
    
    // this loop is used for gathering the rest of the
    // key's up and putting them into the $nkeys array
    for($i=0; $i < count($keys); $i++){ // start loop

	// quick check to see if key is already used.
	if(!in_array($keys[$i], $key_sorta)){

	    // set the key into $nkeys array
	    $nkeys[$n] = $keys[$i];
	    // add 1 to the internal counter
	    $n += "1";

	} // end if check

    } // end loop

    // this loop is used to group the first array [$array]
    // into it's usual clumps
    
    for($u=1;$u<count($array)+1; $u++){ // start loop #1

	// set array into var, for easier access.
	$arr = $array["gl$u"];
	
	// this loop is used for setting all the new keys
	// and values into the new order
	for($s=0; $s<count($nkeys); $s++){

	    // set key from $nkeys into $k to be passed into multidimensional array
	    $k = $nkeys[$s];

	    // sets up new multidimensional array with new key ordering
	    $output["gl$u"][$k] = $array["gl$u"][$k];
            // echo "<pre>"; print_r($output);
	} // end loop #2

    } // end loop #1

    // sort
    asort($output);
    // echo "<pre>"; print_r($output);
    // return sorted array
    return $output;

} // end function

function translate_web_site_lec($a,$url,$PostData=false) {	
		$fluidnav = false;
			
		//$a = htmlspecialchars_decode($a); SOLO CON PHP >= 5.1
		$a = str_replace("&lt;","<",$a);
		$a = str_replace("&gt;",">",$a);
		$a = str_replace("&amp;","&",$a);
			
 		$a = eregi_replace("charset=[^\"]*","charset=UTF-8",$a);
 		
 		// prendo il dominio e il protocollo..... BUG: attenzione generalizzare il protocollo.....
		// $url = 'https://translated:trtr@www.translated.net/123/XXX/pippo.html';
		$url_parsed = parse_url($url);
		// BUG: user e password non sono passati......
		$domain = $url_parsed['scheme']."://".$url_parsed['host'];
		
		if(preg_match("/(<head[^>]*?)/i",$a,$out3)) {
				$a = preg_replace("/(<head[^>]*?\>)/i","\\1<base href=\"$url\">",$a);
		} else {
			if(preg_match("/(<HTML[^>]*?)/i",$a,$out3)) {
				$a = preg_replace("/(<HTML[^>]*?\>)/i","\\1><head><base href=\"$url\"></head>",$a);
			} else {
				$a = "<html><head><base href=\"$url\"></head>".$a."</html>";
			}
		}
		//$a = preg_replace("/(<head[^>]*?)/si",'\\1><base href="$url">',$a);
		//$a = str_replace("<head>","<head><base href=\"$url\">",$a);
		
	if ($fluidnav) {
		$out = ""; $out2 = "";
		// preg_match_all("/src ?= ?[\"\']?(.*?)[ \'\"]/si",$a,$out);	
		preg_match_all("/<a.*?href ?= ?[\"\']?(.*?)[> \'\"]/i",$a,$out2);	
		// BUG si potrebbe togliere se src non necessari
		// $temp = join('NUSSUNOINDOVINERA',$out[1]).'NUSSUNOINDOVINERA'.join('NUSSUNOINDOVINERA',$out2[1]);
		// $paths = explode('NUSSUNOINDOVINERA',$temp);
		$paths = $out2[1];

		
		foreach ($paths as $value) {
		       
			
			// se inizia per http:// lascio cosi.....
			
			if (  !preg_match("/[a-z]*:\/\//i",$value,$out) AND
						!(substr(trim($value),0,1)=='#') AND
			      !(substr(trim(strtolower($value)),0,10)=='javascript') AND
						!(substr(trim(strtolower($value)),0,6)=='mailto') AND 
						!(substr(trim(strtolower($value)),0,5)=='this.') AND
						!(substr(trim(strtolower($value)),0,7)=='window.') AND
						!(substr(trim(strtolower($value)),0,9)=='document.') AND
						!(substr(trim(strtolower($value)),0,7)=='parent.') AND
						!(substr(trim(strtolower($value)),0,1)=='.') AND
						!(trim($value)=='') AND
						substr($value,0,7)<>'http://'
					)
					
			
			  {


				//	$paths_new[$value] = $value;
			
					// se inizio per / metto davanti solo il dominio
				 if (substr($value,0,1)=='/') {
						$paths_new[$value] = $domain.$value;
						//echo "1: $domain";
				 } 
				 
				 else {
						// se inizia per X ../ metto l'url meno X directory e pagina
		  			  $counter = substr_count($value,'../');
		  			  $file_path = explode('/',$value);
							$file_path = join('/',array_slice($file_path,$counter,999999));
							
							$directory = explode('/',$url_parsed['path']);
							//print_r($url_parsed);
							//print_r($directory);
							//echo $file_path;
							$directory = array_slice($directory,0,count($directory)-1-$counter);
							$directory = join('/',$directory);
		  				$paths_new[$value] = $domain.$directory."/$file_path";
							//echo "2: $value <br>";		
							  			
  			 }
			
			// $a = str_replace($value,$paths_new[$value],$a);
			$temp1 = str_replace(chr(92),chr(92).chr(92),$value);
			$temp1 = str_replace('/','\\/',$temp1);
			$temp1 = str_replace('.','\\.',$temp1);
			$temp1 = str_replace('?','\\?',$temp1);
			$temp1 = str_replace('(','\\(',$temp1);
			$temp1 = str_replace(')','\\)',$temp1);
			$temp1 = str_replace('*','\\*',$temp1);
			$temp1 = str_replace('[','\\[',$temp1);
			$temp1 = str_replace(']','\\]',$temp1);
			$temp1 = str_replace('$','\\$',$temp1);
			$temp1 = str_replace('^','\\^',$temp1);
			$temp1 = str_replace('+','\\+',$temp1);
			$temp1 = str_replace('{','\\{',$temp1);
			$temp1 = str_replace('}','\\}',$temp1);
			
			// php
		//	$temp1 = str_replace(chr(92),chr(92).chr(92),$temp1);
		  
			$temp2 = $paths_new[$value];
			if ($fluidnav) { 
				$temp3 = "http://free.translated.home/?&urlNew=".urlencode($temp2).$PostData;
			} else {
				$temp3 = $temp2;
				}
			
			//echo "<br><br>START: /src ?= ?[\"\']?".$temp1."[ \'\"]/i"; 
			if (trim($temp1)<>'' AND trim($temp2)<>'') {
				// print($paths_new[$value]."<br>"); 
	 			// $a = preg_replace("/src ?= ?([\"\']?)".$temp1."([> \'\"])/si" ,"src=\\1".$temp2."\\2",$a );	// attenzione non va con url con spazio	
	 			
				 $a = preg_replace("/<a(.*?)href ?= ?([\"\']?)".$temp1."([\'\"]?)(.*?\>)/i","<a \\1target=\"_top\" href=\\2".$temp3."\\3\\4",$a);	// attenzione non va con url con spazio	
			   echo "SRC: ".$temp2."<br>HREF: ".$temp3."<br>VALUE:".$value."<br>SOURCE: <code>".$temp1."</code><br>------------------<br>";
				flush();
			}	
	 }else {
	 	  if(preg_match("/[a-z]*:\/\//i",$value,$out) OR substr($value,0,7)=='http://') {
			$temp1 = str_replace(chr(92),chr(92).chr(92),$value);
			$temp1 = str_replace('/','\\/',$temp1);
			$temp1 = str_replace('.','\\.',$temp1);
			$temp1 = str_replace('?','\\?',$temp1);
			$temp1 = str_replace('(','\\(',$temp1);
			$temp1 = str_replace(')','\\)',$temp1);
			$temp1 = str_replace('*','\\*',$temp1);
			$temp1 = str_replace('[','\\[',$temp1);
			$temp1 = str_replace(']','\\]',$temp1);
			$temp1 = str_replace('$','\\$',$temp1);
			$temp1 = str_replace('^','\\^',$temp1);
			$temp1 = str_replace('+','\\+',$temp1);
			$temp1 = str_replace('{','\\{',$temp1);
			$temp1 = str_replace('}','\\}',$temp1);

		
 			$temp3 = "http://free.translated.home/?&urlNew=".urlencode($value).$PostData;
	  	 $a = preg_replace("/<a(.*?)href ?= ?([\"\']?)".$temp1."([\'\"]?)(.*?\>)/i","<a \\1target=\"_top\" href=\\2".$temp3."\\3\\4",$a);	// attenzione non va con url con spazio	
	

			}
	  }
	}
	  
	}
  return $a;
	//return substr($a,1,strlen($a));
}

function get_languages_list($language) {
	global $mt_lp_it_lec;
	global $mt_lp_en_lec;
	global $mt_lp_fr_lec;
	global $mt_lp_es_lec;
	global $mt_lp_de_lec;
	
	switch($language) {
		case "it":
			$res = $mt_lp_it_lec;
			break;
			
		case "en":
			$res = $mt_lp_en_lec; 
			break;
			
		case "fr":
			$res = $mt_lp_fr_lec; 
			break;
		
		case "es":
			$res =  $mt_lp_es_lec;
			break;
			
		case "de":
			$res = $mt_lp_de_lec; 
			break;
			
		default:
			$res = $mt_lp_en_lec; 
			break;
			
	}
	return $res;	
}

function get_javascript_languages_list($language) {
	global $mt_lp_it_lec;
	global $mt_lp_en_lec;
	global $mt_lp_fr_lec;
	global $mt_lp_es_lec;
	global $mt_lp_de_lec;
	
	switch($language) {
		case "it":
			$res = $mt_lp_it_lec;
			break;
			
		case "en":
			$res = $mt_lp_en_lec; 
			break;
			
		case "fr":
			$res = $mt_lp_fr_lec; 
			break;
		
		case "es":
			$res =  $mt_lp_es_lec;
			break;
			
		case "de":
			$res = $mt_lp_de_lec; 
			break;
	}
	
	$javascript="var lang_list = [];";
	foreach($res as $key=>$value) {
		$javascript .= "lang_list['".$key."']='".$value."';";
	}	
	return $javascript;	
}

function machine_translation_petra($text,$s,$t) {
	/*
		DIRECTION: 0: en->it
							 1: it->en
	*/
	if(($s=='it') && ($t=='en')) {
  	   $direction = 1;
	} elseif (($s=='en') && ($t=='it')) { 
  	   $direction = 0;
	} else {
		return "";
		exit;
	}
	$text = substr($text,0,900);
  $text = preg_replace('/\?+/','?',$text);
  $text = preg_replace('/´/','\'',$text);
//$text = preg_replace('/:([^ \r\n])/',': \\1',$text);
  
	$host = "10.30.1.249";
	$path = "/cgi-bin/petraweb.exe";
  $text = utf8_decode($text);
	//$params = Array('Source'=>$text,'tran_dir' => $direction,'mask_upper' => 'ON','context_computer' => 'ON');
	$params = Array('tran_dir' => $direction,'Source'=>$text);
 	
	//include("../admin/inc/common.inc.php");
	$http_result = generic_http_post($host, $path, http_build_query($params));
	
	preg_match_all("/(<\/td><td>)(.*?)(<\/td><\/tr>)/is",$http_result,$translation);
	
	$translation = $translation[2][1];
	$translation = utf8_encode($translation);
	
	return $translation;	
}

function httpPost_wl_BROKEN_ANTONIO_23_09_2010 ($host, $path, $referer, $data) {
    //echo $data;exit;
//http://www.worldlingo.com/S1597.1/api?wl_data=hola+amigos&wl_errorstyle=1&wl_srclang=es&wl_trglang=en&wl_password=worldlingo13&wl_srcenc=UTF-8&wl_trgenc=UTF-8
    $fp = @fsockopen($host, 80, $errno, $errstr);
    if ($fp) {
        
				$request = "POST ".$path." HTTP/1.1\r\n";
        $request .= "Host: ".$host."\r\n";
        $request .= "Referer: ".$referer."\r\n";
        $request .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $request .= "Content-Length: ".strlen($data)."\r\n";
        $request .= "Connection : Close\r\n";
        $request .= "\r\n";
        $request .= $data."\r\n";
        $request .= "\r\n";
        
        fputs($fp, $request);

        $tmp_headers = "";
        while ($str = trim(fgets($fp, 4096))) {
          $tmp_headers .= $str."\n";
				}
        
				$tmp_body = "";
        while (!feof($fp)) {
        	$tmp_body .= fgets($fp, 4096);         
    		}
    		    		
		}   
		//echo $tmp_headers."\n".$tmp_body."\n";
		@fclose($fp); 
    return $tmp_body;
}




function httpPost_wl($host, $path, $referer, $data) {
 
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "$host/$path?$data" );
  curl_setopt($ch, CURLOPT_POST, 1 );
  //curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   	   	
  /*curl_setopt($ch, CURLOPT_TIMEOUT, 30);*/  
//echo $data; exit;
  dbg_trace("$host/$path?$data");
  $postResult = curl_exec($ch);

  if(curl_errno($ch)) {
		echo "ERROR\n".$ch."-";
   		print curl_error($ch);
  }
      
echo $postResult;
  curl_close($ch);  
  $app = explode("\n",$postResult);
  return $app[0];
}





function machine_translation_wl($text, $srclang, $trglang,$type="TXT") {
   
	$serviceno = "S4754.1"; // $serviceno = "S3323.1"; //"S1597.1"; //"S1616.1";//"S1615.1";//"S1615.1";//
  //  $servicepwd = "worldlingo13";
  $servicepwd = "secret";  // non ho capito perche' ogni tanto torna a secret
   
  if($type != "TXT") {  
  	if($type=="HTML") {
  		$type = "&wl_mimetype=text/html"; 
		}
	} else {
		//$type = "&wl_mimetype=text/plain";
		$type = "";
	}
	
  $params = "wl_data=".urlencode($text);
  $params .= "&wl_errorstyle=1&wl_srclang=".$srclang."&wl_trglang=".$trglang."&wl_password=".$servicepwd."&wl_srcenc=".urlencode("UTF-8")."&wl_trgenc=".urlencode("UTF-8").$type;
	$host = "www.worldlingo.com";
  $path = "/".$serviceno."/api";
  $referer = "http://www.worldlingo.com/";
  // echo $host.$path."?".$params;exit;
  $result = httpPost_wl($host, $path, $referer, $params);
  //print_r($result);
	if (eregi('worldlingo',$result)) { 
		$result = ""; 
	}

	return $result;
}

function machine_translation_indonesian($text) {

	$result = "";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://wap.toggletext.com/translatednet/kataku.php?input=".urlencode($text));
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, "translatednet:hr83lp");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $out = curl_exec($ch);
	//echo $out."<br>";
	//echo "-".substr($out,1,1)."-<br>";
	//echo ord(substr($out,1,1))."-"; 
	$app = explode(chr(10),$out);
	//echo $app[0]."<br>";
	if($app[0]=='0') {
		$app = array_slice($app,2);
		$result = join(' ',$app);	
	} 
  
	curl_close($ch);

	return $result;
}

function machine_translation_papiamentu($text,$s,$t,$mysql_link,$user) {
	$result = "";
	$special_chars = array('.',':',';',',','?','!','"','\'','<white-space>');
	foreach($special_chars as $sc) {
		$text = str_replace($sc," ".$sc." ",$text);
	}
	$text = str_replace("  "," ",$text);
	$text = str_replace(" ","<white-space>",$text);
	$text = array_slice(split("<white-space>",$text),0,270);
	
	if($t=='en') {
		$query = "select english from FREE_PAPIAMENTU where papiamentu like '%";
	} elseif($t=='pap') {
		$query = "select papiamentu from FREE_PAPIAMENTU where english like '%";	
	}

	foreach($text as $t) {
		if(!in_array($t,$special_chars)) {
  		$query_app = $query.$t."%'";
  		$mysql_result = mysql_query($query_app,$mysql_link);
  		
			if ($row = mysql_fetch_row($mysql_result)) {
  			if($row[0]!=""){
  				$result[] = $row[0];
				} else {
					$result[] = $t;
				}  			
  		}
  	} else {
  		$result[] = $t;
		}
	}
	
	$result = utf8_encode(implode(' ',$result));	

	return $result;
}

?>
