<?
/*****************************************************************

PER AGGIUNGERE UNA LINGUA:

- tradurre msg_it.inc.php
- aggiungere in lang_dir
- aggiungere in link_areas
- modificare labs_get_lang_links
- modificare top-labs.php

*******************************************************************/

$lang_dir = array("language-identifier"=>"en",
				  "spell-checker"=>"en",
				  "semantic-relations"=>"en",
				  "terminology-extraction"=>"en",
				  "text-readability"=>"en",

				  "identificatore-lingua"=>"it",
				  "correttore-ortografico"=>"it",
				  "relazioni-semantiche"=>"it",
				  "estrazione-terminologia"=>"it",
			      "leggibilita-testo"=>"it",
				  
	  			  "identificateur-langue"=>"fr",
	  			  "correcteur-orthographe"=>"fr",
	  			  "extraction-terminologie"=>"fr",
	  			  "relations-semantiques"=>"fr",
	  			  "lisibilite-texte"=>"fr"
				  );
				  
$link_areas = array("it"=> array("lang_id"=>"identificatore-lingua",
				                "spell_chk"=>"correttore-ortografico",
								"term_ext"=>"estrazione-terminologia",
								"sem_rel"=>"relazioni-semantiche",
							    "rea_txt"=>"leggibilita-testo",

								"trad_map"=>"http://www.translated.net/int/tmap.php",
								"semantix"=>"http://www.semantix.it/",
								"lang_api"=>"http://www.translated.net/it/hts.php",
								"mymemory"=>"http://mymemory.translated.net/"),
								
	    			"en" => array("lang_id"=>"language-identifier",
			                      "spell_chk"=>"spell-checker",
								  "term_ext"=>"terminology-extraction",
								  "sem_rel"=>"semantic-relations",
								  "rea_txt"=>"text-readability",

							      "trad_map"=>"http://www.translated.net/int/tmap.php",
								  "semantix"=>"http://www.semantix.it/",
								  "lang_api"=>"http://www.translated.net/en/hts.php",
								  "mymemory"=>"http://mymemory.translated.net/"),
								  
					"fr" => array("lang_id"=>"identificateur-langue",
				                  "spell_chk"=>"correcteur-orthographe",
								  "term_ext"=>"extraction-terminologie",
								  "sem_rel"=>"relations-semantiques",
								  "rea_txt"=>"lisibilite-texte",

								  "trad_map"=>"http://www.translated.net/int/tmap.php",
								  "semantix"=>"http://www.semantix.it/",
								  "lang_api"=>"http://www.translated.net/fr/hts.php",
								  "mymemory"=>"http://mymemory.translated.net/")
				);


function labs_user_lang($request_uri) {
	global $lang_dir;
	$request_uri = $_SERVER['REQUEST_URI'];
	$request_uri = explode("/",$request_uri);
	
	/*foreach($request_uri as $ru) {
		if(trim($ru)) {
		    $request_dir = $ru;
		}
	}*/
	//Todo indentificazione lingua
	$request_dir = $request_uri[1];
	$l = $lang_dir[$request_dir];
	
	return $l;
}


function labs_get_lang_links($curr_dir) {
    if($curr_dir == "/"){
        $lang_links["en"] = "?l=en";
	  	$lang_links["it"] = "?l=it";
	  	$lang_links["fr"] = "?l=fr";
	} else {
		global $link_areas;
	  	$lang_links["en"] = "/".$link_areas["en"][$curr_dir]."/";
	  	$lang_links["it"] = "/".$link_areas["it"][$curr_dir]."/";
	  	$lang_links["fr"] = "/".$link_areas["fr"][$curr_dir]."/";
	}
	return $lang_links;
}

?>
