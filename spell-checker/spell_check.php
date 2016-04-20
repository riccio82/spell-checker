<? 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");              // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-type: text/javascript; charset=UTF-8");

function pre_spell($word, $level=0,$h) {
// check acronyms, proper names, numbers

// se il prespell � true non la parola � corretta.

// ACRONIMI
preg_match_all('/[A-Z0-9]+/',$word, $out);
if (($out[0][0]==$word) AND (strlen($word)<5) ) {
	if($h) {
        fwrite($h,"ACRONIMO:".$word);
	}
    return true;
}

// CONTIENE ANCHE UN SOLO NUMERO
preg_match_all('/[0-9]+/',$word,$out);
if(($out[0][0]==$word)) {
    if($h) {
        fwrite($h,"NUM:".$word);
	}
	return true;
}


// dominio EMAIL ricevo @traslated
if (preg_match("/@[a-z]/",$word)) {
    if($h) {
        fwrite($h,"EMAIL:".$word);
	}
    return true;
}


// controllo nomi propri con SELECT
/*
code here
*/

return false;

}



$debug = false;
$log = false;
$h = false;

$dictionary = $_GET['source_lang']; 
$words = $_GET['words'];

if($log) {
    $h = fopen("log","a");
    fwrite($h,"CLIENT CALL\n");
    fwrite($h,$dictionary."\n");
    fwrite($h, $words."\n\n");
}



if(isset($_GET['action'])) {
	if($_GET['action'] == "ADDWORD") {
	    $word =  $_GET['word'];
	    
	    if(($dictionary=="it" || $dictionary=="fr" || $dictionary=="es") AND (preg_match("/'/",$word))) {
			$app = explode("'",$word);
			$word = $app[1];
			$pre = $app[0]."'";
			if($log) {
            	fwrite($h, $pre."---".$word."\n");
			}
        }
	    
	    if($log) {
		    fwrite($h, "ADD: ".$word."\n\nDIC:".$dictionary."\n");		    
		}

	    
	    
		$res = "res=false;\n";
		$pspell_config = @pspell_config_create($dictionary,"","","utf-8");
		@pspell_config_mode($pspell_config, PSPELL_FAST);
		@pspell_config_personal($pspell_config, "/home/translated/public_html/labs/spell-checker/custom-dicts/custom-".$dictionary.".pws");
		$speller = @pspell_new_config($pspell_config);
		if(!$speller) {
		    if($log) {
		        fwrite($h,"Lingua non supportata\n");
		    }
		} else {
		    if($log) {
		        fwrite($h,"AGGIUNGO -".$word."- (trattini solo per evidenziare)\n");
		    }
            @pspell_add_to_personal($speller, $word);
			@pspell_save_wordlist($speller);
			$res = "res=true;\n";
		}
	    print $res;
	    exit;
	}
}

if($debug) {     
    unset($words);
    $words[] = "это";   
    $words[] = "будет";
    $words[] = "простоd";
    $words[] = "испытание";
    /* 
    $words[] = utf8_encode("test"); 
    $words[] = utf8_encode("but");
    $words[] = utf8_encode("asd");rm -f *
    
    */
    $dictionary = "ru"; 
    
}  else {
    $words = explode(";",$words);
}



$pspell_config = pspell_config_create($dictionary,"","","utf-8");
pspell_config_mode($pspell_config, PSPELL_FAST);
pspell_config_personal($pspell_config, "/home/translated/public_html/labs/spell-checker/custom-dicts/custom-$dictionary.pws");
$speller = pspell_new_config($pspell_config);

//pspell_add_to_personal($pspell_link, "Translated");
//pspell_save_wordlist($pspell_link);
//semplice
// $speller = @pspell_new($dictionary,"","","utf-8",PSPELL_FAST);


if(!$speller ) {
    if($log) {      
        fwrite($h,"Lingua non supportata\n");
    }
    print "data=[[1]];\n";
    exit;  
}
$word_separator = "[ \t\n\r\?\"\.\,\;\:\!\(\)\{\}\`\|\'\+]";
$i = 0;
 
print "data = [";  
 

foreach($words as $key => $word) {
    // print '[1]'; continue;
    //fwrite($h, $key."-".trim($word)."-\n");
    $word = trim(stripslashes($word));
	if($key!=='source_lang') {
	    if (!$word) {
            continue;
        }
        
		if ($i>0) { 
            print ","; 
        }
        $word = str_replace("﻿","",$word);
        $word = str_replace("�","",$word);
        /*
        if(substr($word,-2,-1)=='�') {
		    $word = substr($word,0,strlen($word)-2);
        }
        */
        $pre = "";
        if(($dictionary=="it" || $dictionary="fr" || $dictionary=="es") AND (preg_match("/'/",$word))) {
			$app = explode("'",$word);
			$word = $app[1];
			$pre = $app[0]."'";
			if($log) {
            	fwrite($h, $pre."---".$word."\n");
			}
        }
        //$word = str_replace("'","",$word);
        //SE CONTIENE UN NUMERO NON FACCIO CONTROLLI:
        //bug: per il futuro dovr� controllare se � un acronimo
        //if(preg_match("/[0-9]/",$word)) {
        if(pre_spell($word,0,$h)) {
            if($log) {
                fwrite($h, "OK\n");
            }
			print '[1]';
    	} else {
			if (pspell_check($speller, stripslashes($word))) {
	            if($log) {
	                fwrite($h, "OK\n");
	            }
				print '[1]';
			} else {
				print '[0,[';
				$suggestions = pspell_suggest($speller, $word);

				if (count($suggestions) > 0) {

	                $app = array();
	                foreach($suggestions as $s) {
	                    $app[] = urlencode($pre.$s);
	                }
	                unset($suggestions);
	                $suggestions = $app;
	                if($log) {
	                    fwrite($h, '\'' . implode('\',\'', $suggestions) . '\''."\n\n");
	                }
					print '"' . implode('","', $suggestions) . '"';
				}
				print ']]';
			}
    	}
		$i++;
	}
};

if($log) {
    fclose($h); 
}

print "];\n";

?>
