<?

$min_corpus_size = 10000; // bytes  

// INFORMAZIONI
// PER ELIMINARE LA DIPENDENZA DALLE DIM DEL CORPUS SONO NECESSARI > DI 1Mb
// I CORPUS DOVONO ESSERE RINORMALIZZATI SENZA PUNTEGGIATURA E DOPPI SPAZI
// E' DA NOTARE CHE QUESTO ALGORITMO E' COMPLETAMENTE SCALABILE PERCHE' LA QUALITA' DEL RISULTATO DIPENDE SOLO DA QUANTA QUALITA' DI VUOLE 
// LA COMPLESSITA E'  byte_utente*LOG(byte_corpus)

/* COME FUNZIONA:
1) scarico manualmente dal web pagine html per ogni lingua
2) metto ogni lingua in un file (in copora_verbose) e converto UTF-8
3) purge_corpora toglie l'html e le entities
4) copio da corpora_purged a copora
5) estraggo le ngram e eseguo il traning (vedi test.php)
*/

function purge_corpora() {
    // SOLO DI SERVIZIO... SERVE QUANDO SI HANNO NUOVI CORPORA UTF8 CON HTML CHE VANNO PULITI
    // PRENDE DALLA CARTELLA CORPORA_VERBOSE E RIPETTE IN CORPORA_PURGED
    $input_folder  = "corpora_verbose";
    $output_folder = "corpora_purged";
    
exec("cd $input_folder;find * -type f ",$list);

    foreach ($list as $file) {
    $line = trim($file);
    $text = join('',file("$input_folder/$file"));
    
    // solo per UN Human Rights
    $text = preg_replace("'<html>.*?<!-- Main content -->'si"," ",$text);
    $text = preg_replace("'PROFILE</span><br>.*?Sources</a></font></td>'si"," ",$text);
    $text = preg_replace("'<!-- --------------    footer -------------------- -->.*?</html>'si"," ",$text);
    // fine
    
    $text = preg_replace("'<script[^>]*?".">.*?</script>'si"," ",$text);
    $text = preg_replace("'<style[^>]*?".">.*?</style>'si"," ",$text);
    $text = preg_replace("'<\!--.*?-->'si"," ",$text);
    $text = strip_tags($text);
    $text = decodeHTML_EP($text,true);

	
    //$text = preg_replace("'[ \r\n\t]+'s"," ",$text);

    // NORMALIZZAZIONE
    $text = preg_replace('/\s+/',' ',$text);
	
    // $text = ereg_replace ("[ \r\n\t]+", " ",$text);
    /*
    $n = 1;
    $m = 0;
    while ($m<>$n) {
	$m = strlen($text);
	$text = preg_replace("'[\n\r\t ]{3}'s","\n",$text);
	$n = strlen($text);
	echo "$line X\n";
    }
    */
    $f = fopen("$output_folder/$line",w);
    fwrite($f,$text, strlen($text));
    fclose($f);
}
}

function corpora2word_freq($mysql_link) {
    // CERCA NELLA CARTELLA CORPORA E AGGIUNGE AL DB CON LE FREQUENZE RELATIVE
    // SI ASPETTA I CORPUS GIA' NORMALIZZATI ( corpora_purge() )
    global $min_corpus_size;
    exec("find corpora -type f ",$list);
    
    $query = "DELETE from LANG_IDENT_FREQ ";
    if (!($mysql_result=mysql_query($query,$mysql_link))) {
	echo mysql_error(); }
    
    foreach ($list as $line) {
	
	$line = trim($line);
	    ereg("([A-Z]{2}-[A-Z]{2})",$line,$temp);
	    $lang = $temp[1];
	if (filesize($line)>$min_corpus_size) {
	    
	    $text = join(' ',file($line));

  	    $word_list = words_freq($text,"MANUAL",1);
	    
	    foreach ($word_list[1] as $key => $value) {
		if ($key) { 
		    $value = $value/$word_list[0];
		    $query = "INSERT INTO LANG_IDENT_FREQ (lang,word,freq) VALUES ('".$lang."','".addslashes($key)."','".$value."')";
		    if (!($mysql_result=mysql_query($query,$mysql_link))) {
			echo mysql_error(); }
		}
	    }
		
	    echo "$lang\t".$word_list[0]."\tDONE\n";
	} else { echo "$lang\t".$word_list[0]."\tSKIPPED\n"; }
	}
    }
    
function corpora2pattern_freq($mysql_link,$db_table="LANG_IDENT_PATTERNS") {
		global $min_corpus_size;
exec("find corpora -type f ",$list);

//    print_r($list); exit;
    
    $query = "DELETE from ".$db_table;
    if (!($mysql_result=mysql_query($query,$mysql_link))) {
	echo mysql_error();
    }
    foreach ($list as $line) {
        
	$line = trim($line);
	ereg("([A-Z]{2}-[A-Z]{2})",$line,$temp);
	$lang = $temp[1];
	 if (filesize($line)>$min_corpus_size) {
	     
	     $f = fopen($line,'r');
	     $text = fread($f,filesize($line));
	     
      	     $text = substr($text,0,$min_corpus_size);    // SOLO PER LA METRICA SEMPLIFICATA DI TROMBETTI
	                                                  // PER GARANTIRE CHE LE DIMENZIONI DEL CORPUS NON INCIDANO STATISTICAMENTE
	                                                  // SONO COSTRETTO PERCHE ALMENO FINO A 100Mb CRESCE LA DIFERSIFICAZIONE ANCHE PER BIGRAM!
							  // UTILIZZANDO LA METRICA DELLA DISTANZA QUADRATICA DELLE DISTRIBUZIONI NON ANDREBBE ASSOLUTAMENTE FATTO
							  // 

	     // $text = "1234";
	     $table = extract_all_patterns($text); // MOLTO PIU' PRECISO DI LZW
	     // $table = extract_lzw_patterns(join('',file($line)));  // ATTENZIONE MI ASPETTO IL CORPUS PULITO DAI DOPPI SPAZI!
	     $tot_patterns = array_sum($table);
	     // Taglio a 50.000 perch ho messo il limite > 7K per i corpus
	     // quindi se 7K generano minimo 50.000 patterns teorici
	     // Marco fidati di te stesso.....
	     // e se ti mancano dei dati.. vai a vedere il taglio sul corpus, slice di fatto non taglia mai...
	     $table = array_slice($table,0,50000);

	     foreach ($table as $key => $value) {
		 if (isset($key)) {
		     
		     // Nuova rinormalizazione valida solo per corpus grandi
		     // $tot_patterns_for_this_length = (strlen($text) + 1 - strlen($key));
		     // $value = $value/$tot_patterns_for_this_length; // ATTENZIONE NUOVA DEFINIZIONE DI PROBABILITA!
		     
		     $value = $value/$tot_patterns;   // VECCHIA
		     $query = "INSERT INTO ".$db_table." (lang,word,freq) VALUES ('".$lang."','".addslashes($key)."','".$value."')";
		     // echo $query ."\n";
		     $mysql_result=mysql_query($query,$mysql_link);
		     echo mysql_error(); 
		 
		 }
	    
	     }
	     echo "$lang\tDONE\n";
	 } else { echo "$lang\tSKIPPED\n"; }
    }

}
 



function get_lang($text,$mysql_link,$table="LANG_IDENT_PATTERNS",$langs_set="",$method=1) {
    // calcolo probabilistico basato sulla frequenza della parole o pattern
    
    // CLUE LINGUISTICO, RIMUOVERLO PER SCOPI PIU' GENERALI
    $text = " " . $text . " ";
    
    
    
    // RINORMALIZZAZIONE 
    $text = str_replace("¬†"," ",$text);
    $text = preg_replace('/\s+/',' ',$text);
    
    // TRUNCATING FOR SPEED
    $text = substr($text,0,200);
    
/*
    $langs_set = Array('AR-AR','ZH-CN','ZH-TW','NL-NL','EN-GB','EN-US','FR-FR','DE-DE'
				,'EL-GR','ID-ID','IT-IT','JA-JA','KO-KO','PT-PT','RU-RU','ES-ES','SV-SE');
*/

    $where_lang_in = "";
    
    if($langs_set) {
    	$where_lang_in = "AND LANG IN ('".join('\',\'',$langs_set)."') ";    
  	}

    
    // $method = 1;
    
    $max_words_to_check = 500;  // PURTROPPO NON E' POSSIBILE ABBASSARE TROPPO QUESTO PARAMETRO ALTRIMENTI IN STRINGHE CORTE TUTTE HANNO LA STESSA FREQUENZA E 
                                // VENGONO TAGLIATE IN MODO IMPROPRIO
    
    // CI SONO DUE METODI
    // UNO EURISTICO CHE PER OGNI PAROLA CERCA LA LINGUA PIU' PROBABILE E POI CONTA CHI HA PIU' VOTI (MAGGIORITARIO)
    // L'ALTRO CHE CALCOLA LA PROBABILITA' COMPLESSIVA PER SU OGNI LINGUA (PROPORZIONALE)
    if ($method==0) {
	
      	// BUG BRUTTO MODO PER DIRE SE SONO PATTERN
      	if ($table=='LANG_IDENT_FREQ') {
      	    $user_word_list = text2words($text,'MANUAL');	    
      	}
      	else
      	{
      	    $temp = extract_all_patterns($text);	    
      	    $user_word_list = array_keys($temp); // BRUTTO PERCHE' NON TENGO CONTO DELLE FREQ!
      	}
	
				foreach ($user_word_list as $word) {
	    			if ($word) {
							$tot_words++;
							$query = "SELECT LANG from $table 
        					WHERE word='".addslashes($word)."' $where_lang_in 
        							     ORDER BY FREQ DESC 
        							     LIMIT 0,1";
        	
							     
          		$mysql_result=mysql_query($query,$mysql_link);
          		echo mysql_error();
          		if ($row = mysql_fetch_row($mysql_result)) {
          		    $words_lang[$word] = $row[0];
          		    $tot_found_words++;
          	   }
	    	    }
		    }
	
      	if (is_array($words_lang)) {
      	    $lang_freq = array_count_values ($words_lang);
      	    arsort($lang_freq,SORT_NUMERIC);
      	    foreach ($lang_freq as $key=>$value) {
          		$lang = $key;
          		break;
      	    }
      	    $match = round($lang_freq[$lang]/$tot_words,3);
      	    $match_on_found = round($lang_freq[$lang]/$tot_found_words,3);
      	    
      	    
      	    // SOLO PER DEBUG
      	    $stats = array_count_values($words_lang);
      	    arsort($stats,SORT_NUMERIC);
      	    $stats = array_slice($stats,0,5);
      	}
      	// FINE
      	$result = array('LANG'=>$lang,'MATCH'=>$match,'MATCH_ON_FOUND'=>$match_on_found,'WORDS_LANG'=>$words_lang,'STATS'=>$stats);
      	
 		}
    
    // METODO CON PROBABILITA' COMPLESSIMA
    // MIGLIORE MA MIGLIORABILE

if ($method==1) {
	// BUG NELLA METRICA
	// PER 'ABCAB' A E AB che hanno frequenza 2 non vengono pesati due volte per fare tutto con una query
	
	
	$patterns = extract_all_patterns($text);
	
		    
	$patterns = array_slice($patterns,0,$max_words_to_check);  // VEDI LIMIT IN ALTO
	

	$i = 0;
	foreach ($patterns as $word=>$freq) {
	    if ($i<>0) { $or = "OR"; }
	    $where .= "$or word='".addslashes($word)."' \n";
	    $i++;
	}
	
	// IL 2 E' IL COEFFICIENTE CHE INDICA IL RAPPORTO DI PROBABILITA'
	// TRA un ngram lungo x ed una lunga x-1
	// QUINDI SE DO PESO 2^X A PAROLE LUNGHE X
	// BUG: FATTO AD OCCHIO TRAMITE QUERY DOVREBBE ESSERE UN FIT
	// IN REALTA' E' UNA VERA METRICA CHE MANCA....
	if($where_lang_in!="") {
		$where = "(".$where.") ".$where_lang_in;
	}
	$query = "SELECT LANG, SUM(freq*POW(2,LENGTH(word))), word from $table WHERE
		   $where 
		   GROUP BY LANG
		   ORDER BY 2 DESC";
	
	/*
	 * TESTING
	 $query = "SELECT LANG, word, freq from $table WHERE
	 $where
	 ORDER BY WORD,2 DESC";
	 */
	$mysql_result=mysql_query($query,$mysql_link);
	echo mysql_error();
	//echo $query;
	$row =  mysql_fetch_row($mysql_result);
	$lang = $row[0];
	$match = $row[1];
	$word_score["$row[0]"]=$row[1];
	$sum_score =$row[1];
	$i = 0;

	while ($row = mysql_fetch_row($mysql_result)) {
	    // echo "X: $row[0] $row[1] $row[2] X<br>\n";
	    if ($i<3) { $sum_score += $row[1]; }
	    $i++;
	    $word_score["$row[0]"]=$row[1];
	}
	
	// echo "<pre>"; print_r($word_score); echo "</pre>";
	// exit;
	if ($sum_score==0) { $sum_score=0.0000000001; } // MARCO MA CHE FAI LO ZOZZONE....
     $result = array('LANG'=>$lang,'MATCH'=>$match/$sum_score,'WORD_SCORE'=>$word_score);

}
    
    // Metodo con la distanza quadratica media delle distribuzioni
    // (= distanza di trombetti con cordinate le frequenze(pattern_i)*Diversificazione(len(pattern))
if ($method==2) {
	
	$patterns = extract_all_patterns($text);
	$patterns = array_slice($patterns,0,$max_words_to_check);  // VEDI LIMIT IN ALTO
	
	$query = "SELECT word, freq from $table 
		  WHERE LANG='IT-IT'
		   order by freq DESC LIMIT 0,100";
	$mysql_result=mysql_query($query,$mysql_link);
	echo mysql_error();
	while ($row =  mysql_fetch_row($mysql_result)) {
	    $cord1['$row[0]'] = $row[1];
	}
	$cord1 = $patterns;
	print_r($cord1);
	
	$query = "SELECT word, freq from $table
		   WHERE LANG='ES-ES'
		   order by freq DESC LIMIT 0,100";
	$mysql_result=mysql_query($query,$mysql_link);
	echo mysql_error();
	while ($row =  mysql_fetch_row($mysql_result)) {
	    $cord2['$row[0]'] = $row[1];
	}

	// echo trombetti_dist($cord1,$cord2); exit;
	
	if ($sum_score==0) { $sum_score=0.0000001; }
	$result = array('LANG'=>$lang,'MATCH'=>$match/$sum_score,'WORD_SCORE'=>$word_score);
	
    }
    
    return $result;
    
}


function extract_lzw_patterns($text) {
 // Questa funzione estrai i pattern pi√πfrequenti
 // utilizzando l'algoritmo LZW
    $i = 1;
     $string = $text[0];
          while (isset($text[$i])) {
              $char = $text[$i]; 
              IF (isset($table[$string.$char])) {
		  $table[$string.$char]++;
                  $string .= $char;
	         }
              ELSE {
            //      echo "<$string>";
                  $table[$string.$char]=1;
                  $string = $char;
	      }
	      $i++;

	  }
         // echo "<$string>";
    arsort($table);
    
    return $table;
}

function extract_all_patterns($text,$min_len=2,$max_len=5) {
    // default min=1 max=7 ma ho problemi di rinormalizzazione
    
    // ESTRAE CIRCA TUTTE LE SOTTOSTRINGE DA UNA STRINGA
    // N+(N-1)+(N-2)+...+(N-max_len-min_len) ~ (max-min)*N dove M Ë la lunghezza della stringa
    // DA "ciao" restutuisce ci=1,ia=1,ao=1,cia=1,ioa=1,ciao=1 con le relative frequenze
    
    // SE SI VOGLIONO MODIFICARE I PARAMETRI MIN E MAX BISOGNAGNEREBBE RIGENERARE I PATTERN DAL CORPUS!
    
    $i = 0;
    while (isset($text[$i])) {
	     for ($j=$min_len-1;$j<$max_len;$j++) {
		 			if (isset($text[$j+$i])) {
		  			$char = substr($text,$i,$j+1);
		  		// echo "<$char>";
		    		if (isset($table[$char])) {
		   				$table[$char]++;
		   			} else {
		   				$table[$char]=1;
		   			}
		  		}
	   	}
		 	$i++;
	  }
    
    arsort($table);  //BUG TERRIBILE RICORDARSI DI RIABILITARE
    return $table;
    
    
    
}

function extract_all_patterns_test($text,$min_len=1,$max_len=7) {

    // ESTRAE CIRCA TUTTE LE SOTTOSTRINGE DA UNA STRINGA
    // N+(N-1)+(N-2)+...+(N-max_len-min_len) ~ (max-min)*N dove M Ë la lunghezza della stringa
    // DA "ciao" restutuisce ci=1,ia=1,ao=1,cia=1,ioa=1,ciao=1 con le relative frequenze

    // SE SI VOGLIONO MODIFICARE I PARAMETRI MIN E MAX BISOGNAGNEREBBE RIGENERARE I PATTERN DAL CORPUS!

    $i = 0;
          while ($text[$i]<>'') {
	      for ($j=$min_len-1;$j<$max_len;$j++) {
		 	if ($text[$j+$i]<>'') {
		  		$char = substr($text,$i,$j+1);
		  		// echo "<$char>";
		    if ($table[$char]<>'') {
		   		$table[$char]++;
		   		}
		    else {
		   		$table[$char]=1;
		   	}
		  }
	      }
		  $i++;
	      // echo "\n";
	  }

    // arsort($table);  //BUGTERRIBILERICORDARSIDIRIABILITARE
    return $table;



}



function lz77_huffman_entropy_diff($text) {
     global $min_corpus_size;
// AGGIUNGO AL CORPUS E MISURO LA DIFFERENZA DEL GZIP
    exec("find corpora/ -type f ",$list);
    foreach ($list as $line) {
	$line = trim($line);
	ereg("([A-Z]{2}-[A-Z]{2})",$line,$temp);
	$lang = $temp[1];
	IF (filesize($line)>$min_corpus_size) {
	    $known_corpus = join(' ',file($line));
	
	$s1 = strlen(gzcompress($known_corpus, 9)); // NON C'E' BISOGNO DI FARLO SEMPRE, QUINDI POTRI RIDURRE ALLA META' IL TEMPO DI CALCOLO
	$s2 = strlen(gzcompress($known_corpus . " " . $text, 9));
	// echo "$lang $s1 $s2\n";
	$dist[$lang] = round(($s2-$s1),8);
	}
    }
    asort($dist);
    foreach ($dist as $lang=>$value) {
	break;
    }
    $result = array('LANG'=>$lang,'STATS'=>$dist);
    return $result;
    
}


function bzip2_entropy_diff($text,$exe_name='gzip -c ') {
     global $min_corpus_size;
// AGGIUNGO AL CORPUS E MISURO LA DIFFERENZA DEL GZIP
    exec("find corpora -type f ",$list);
    foreach ($list as $line) {
	$line = trim($line);
	ereg("([A-Z]{2}-[A-Z]{2})",$line,$temp);
	$lang = $temp[1];
	IF (filesize($line)>$min_corpus_size) {
	    
	    // DA SOSTITUIRE CON FUNZIONI BZIP2 PHP APPENA RICOMPILATO
	    exec("$exe_name $line|bzip2 -c > s1.bz2",$output);
	    $s1 = filesize("s1.bz2");
	    
	    $f = fopen($line,'r');
    	    $known_corpus = fread($f,filesize($line)); 
	    fclose($f);
	    
	    $f = fopen('user_temp_file.txt','w');
    	    fwrite($f,$known_corpus. " " . $text);
	    fclose($f);
	    
	    exec("$exe_name user_temp_file.txt|bzip2 -c > s2.bz2",$output);
	    $s2 = filesize("s2.bz2");
	    
	    
	    // echo "$lang $s1 $s2 " . ($s2-$s1). "\n";
	    $dist[$lang] = round(($s2-$s1),8);
	}
    }
    asort($dist);
    foreach ($dist as $lang=>$value) {
	break;
    }
    $result = array('LANG'=>$lang,'STATS'=>$dist);
    return $result;
}



function trombetti_dist($contour1,$contour2) {
    $dist = 0;
    $metric_power = 2;
    //  print_r($contour1);
    //  print_r($contour2);
    // $i=count($contour1);
    // $j=count($contour2);
    $i = 0;
    $j = 0;
    
    // OTTIMIZZAZIONE: NON CI SAREBBE BISOGNO DI DUE CICLI.
    foreach ($contour1 as $key => $value) {
	$dist = $dist + pow($contour1[$key] - $contour2[$key],$metric_power);
	$contour1[$key] = 0;  // ASSICURA CHE NEL CICLO DOPO NON VENGA CONTATA
	$contour2[$key] = 0;
	$i = 1;
    }
    
    // echo "DIST: $dist\n";
    foreach ($contour2 as $key => $value) {
	$dist = $dist + pow($contour2[$key] - $contour1[$key],$metric_power);
	$j = 1;
    }
    // echo "DIST: $dist\n";  exit;
    
    if (($i==0) OR ($j==0)) { $dist = 2; }
    
    // PER COMODITA' NORMALIZZO A UN VALORE TRA 0 e 1
    $dist = pow($dist,1/$metric_power);
    if (!$dist) { $dist = 0; }
    
    return $dist;
}


// versione piu' evoluta fa una migliora la stima con pspell
function get_lang_with_spell($text,$mysql_link,$langs="",$encoding="UTF-8",$table="LANG_IDENT_PATTERNS") {
	
	//BUG: metto il cut a 400 caratteri perchË combina male con lo SC:
	$text = substr($text,0,400);
    

	
	// Lingua di cui abbiamo lo spell-check
	$langs = Array('AR-AR'=>'Arabic',
					'DE-DE'=>'German',
					'EN-GB'=>'English',
					'ES-ES'=>'Spanish',
					'FA-FA'=>'Persian',
					'FR-FR'=>'French',
					'HE-HE'=>'Hebrew',
					'IT-IT'=>'Italian',
//					'JA-JA'=>'Japanese',
//					'KO-KO'=>'Korean',
					'NL-NL'=>'Dutch',
					'PL-PL'=>'Polish',
					'PT-PT'=>'Portuguese',
					'RU-RU'=>'Russian',
//					'TR-TR'=>'Turkish',
					'UK-UK'=>'Ukrainian'
//					'ZH-CN'=>'Chinese'

		       );

	$res_patterns = get_lang($text,$mysql_link,$table);
	//print_r($res_patterns);exit;
	/*
	if($all_lang_no_sp) {
		return $res_patterns['WORD_SCORE']; 
	}
	*/
	
	//BUG: AGGINGERE UTF8 a text2words
  // score con spell
	$words = text2words($text);
	$words_unique = array_unique($words); 
	$words_unique = array_slice($words_unique,0,10); 
	$NW = count($words_unique);
	$res = Array();
	
	foreach($langs as $lang => $descr) {
		$speller = @pspell_new($lang,"","",$encoding,PSPELL_FAST);
		$correct_words = Array();
		$i = 0;
		foreach($words_unique as $word) {
			if (@pspell_check($speller, $word)) {
				$correct_words[$i] = $word;	
				$i++;							
			} 
		}
		$NAI = count(array_intersect($words_unique,$correct_words));
		$perc = $NAI / $NW;
		$res[$lang] = $perc;
	  //pspell_clear_session($speller);
	}
	

	// metrica totale
	foreach($res_patterns['WORD_SCORE'] as $lang=>$descr) {
    	if (!array_key_exists($lang, $res)) {
    		  $res_total[$lang] = $res_patterns['WORD_SCORE'][$lang]; 
    	} else {
    			$res_total[$lang] = ($res_patterns['WORD_SCORE'][$lang] + $res[$lang])/2; // $res_patterns['WORD_SCORE'][$lang]; //
    	}
	// penalizzo lingue con errori di corpus
	if($lang=='SM-SM') { $res_total[$lang]= $res_total[$lang] *  0.90; }
	if($lang=='SC-SC') { $res_total[$lang]= $res_total[$lang] *  0.80; }
	if($lang=='CO-CO') { $res_total[$lang]= $res_total[$lang] *  0.80; }
	if($lang=='TY-TY') { $res_total[$lang]= $res_total[$lang] *  0.80; }
	
	}
  arsort($res_total);
  /*
	echo "<PRE>";
	print_r($res_total);
	echo "</PRE>";
	*/
	return $res_total;
}




// MAIN

// METTO LE FREQUENZE NEL DB
// CERCO PER OGNI PAROLA DELL'UTENTE LA LINGUA NELLA QUALE IL TERMINE HA MAGGIORE FREQUENZA
// QUINDI CREO UN ARRAY 'parola'=>'lingua_probabile'
// FACCIO UN ANALISI IN FREQ DELLA LINGUA PIU PROBABILE, E NE DO LA PROBABILITA' COME num_parole_lingua_pi˘_probabile/numero_parole_tot_utente

$li_active_languages = array( 'AB-AB'=>'Abkhazian'
,'AF-AF'=>'Afrikaans'
,'AR-AR'=>'Arabic'
,'AY-AY'=>'Aymara'
,'AZ-AZ'=>'Azerbaijani'
,'BG-BG'=>'Bulgarian'
,'BM-BM'=>'Bambara'
,'BR-BR'=>'Breton'
,'BS-BS'=>'Bosnian'
,'CH-CH'=>'Chamorro'
,'CO-CO'=>'Corsican'
,'CS-CS'=>'Czech'
,'CY-CY'=>'Welsh'
,'DA-DA'=>'Danish'
,'DE-DE'=>'German'
,'EE-EE'=>'Ewe'
,'EL-EL'=>'Greek'
,'EN-GB'=>'English'
,'EO-EO'=>'Esperanto'
,'ES-ES'=>'Spanish'
,'ET-ET'=>'Estonian'
,'FA-FA'=>'Persian'
,'FI-FI'=>'Finnish'
,'FJ-FJ'=>'Fijian'
,'FO-FO'=>'Faroese'
,'FR-FR'=>'French'
,'FY-FY'=>'Frisian'
,'GA-GA'=>'Irish'
,'GN-GN'=>'Guarani'
,'HA-HA'=>'Hausa'
,'HE-HE'=>'Hebrew'
,'HI-HI'=>'Hindi'
,'HR-HR'=>'Croatian'
,'HT-HT'=>'Haitian'
,'HU-HU'=>'Hungarian'
,'ID-ID'=>'Indonesian'
,'IG-IG'=>'Igbo'
,'IO-IO'=>'Ido'
,'IS-IS'=>'Icelandic'
,'IT-IT'=>'Italian'
,'IT-NA'=>'Napolitan (dialect)'			      
,'JA-JA'=>'Japanese'
,'JV-JV'=>'Javanese'
,'KA-KA'=>'Georgian'
,'KG-KG'=>'Kongo'
,'KK-KK'=>'Kazakh'
,'KR-KR'=>'Kanuri'
,'KS-KS'=>'Kashmiri'
,'KU-KU'=>'Kurdish'
,'KY-KY'=>'Kirghiz'
,'LA-LA'=>'Latin'
,'LN-LN'=>'Lingala'
,'LT-LT'=>'Lithuanian'
,'LU-LU'=>'Luba-Katanga'
,'LV-LV'=>'Latvian'
,'MG-MG'=>'Malagasy'
,'MH-MH'=>'Marshallese'
,'MI-MI'=>'Maori'
,'MK-MK'=>'Macedonian'
,'MS-MS'=>'Malay'
,'MT-MT'=>'Maltese'
,'NE-NE'=>'Nepali'
,'NL-NL'=>'Dutch'
,'NO-NO'=>'Norwegian'
,'NV-NV'=>'Navajo'
,'PL-PL'=>'Polish'
,'PS-PS'=>'Pushto'
,'PT-PT'=>'Portuguese'
,'QU-QU'=>'Quechua'
,'RN-RN'=>'Rundi'
,'RO-RO'=>'Romanian'
,'RU-RU'=>'Russian'
,'RW-RW'=>'Kinyarwanda'
,'SA-SA'=>'Sanskrit'
,'SC-SC'=>'Sardinian'
,'SG-SG'=>'Sango'
,'SK-SK'=>'Slovak'
,'SL-SL'=>'Slovenian'
,'SM-SM'=>'Samoan'
,'SN-SN'=>'Shona'
,'SO-SO'=>'Somali'
,'SQ-SQ'=>'Albanian'
,'SR-SR'=>'Serbian'
,'SU-SU'=>'Sundanese'
,'SV-SE'=>'Swedish'
,'SW-SW'=>'Swahili'
,'TA-TA'=>'Tamil'
,'TH-TH'=>'Thai'
,'TL-TL'=>'Tagalog'
,'TR-TR'=>'Turkish'
,'TY-TY'=>'Tahitian'
,'UK-UK'=>'Ukrainian'
,'UR-UR'=>'Urdu'
,'UZ-UZ'=>'Uzbek'
,'VI-VI'=>'Vietnamese'
,'WA-WA'=>'Walloon'
,'WO-WO'=>'Wolof'
,'XH-XH'=>'Xhosa'
,'YO-YO'=>'Yoruba'
,'ZH-CN'=>'Chinese'
,'ZU-ZU'=>'Zulu'
); 
?>
