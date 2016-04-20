<?
$word_separator = "[ \t\n\r\?\"\.\,\;\:\!\(\)\{\}\`\|\'\+]";
// $word_separator_semantix = "[ \t\n\r\?\"\.\,\;\:\!\(\)\{\}\`\|\'\+]";
// $word_separator = "[ \t\n\?\`\|\'\+]";

$score = " ((1/(REDUNDANCY + 0.5))*(FREQUENCY_DIST + 1)*(IN_SEG_DIST + 1)*(LENGTH_DIST + 1)*(WORDCOUNT_DIST + 2)*(LEVENSTEIN_DIST + 2)) as score ";
/*
// http://www.scuolaitalianavalpo.cl/Informaciones/Documentos/Grammatica.htm
$grammar_ita = array("il", "lo", "la", "i", "gli", "le",
"un", "uno","una",
"del", "dello", "dei", "degli", "della", "delle",
"io", "tu", "egli","ella","esso","essa","noi","voi","essi","esse",
"me", "te", "sé", "lui", "lei", "noi", "voi", "loro",
"mi", "ti", "si", "lo", "la", "gli", "ne", "ci", "vi", "li", "le",
"mio", "tuo", "suo", "nostro", "vostro", "loro",                    // --1--
"questo", "codesto", "quello",                                      // --2--
"questi", "quegli", "costui", "costei", "costoro", "colui", "colei", "coloro",
"alcuno", "taluno", "ciascuno", "nessuno", "molto", "poco", "parecchio", "troppo", "tutto", "tanto", "alquanto", "altrettanto",
"uno", "ognuno", "qualcuno", "qualcheduno",
"chi", "chiunque", "chicchessia",
"qualcosa",
"niente", "nulla", "alcunché",
"si",
"che",
"ha","è");
 */
$connectors_ita = array ("di", "e", "che", "la", "in", "il", "per", "a", "un", "l", "del", "non", "è",
		"della", "i", "le", "una", "si", "dei", "dell", "con", "al", "delle", "sono",
		"da", "alla", "questo", "gli", "più", "ha", "nel", "anche", "come", "ma", "all",
		"essere", "ad", "cui", "se", "sia", "degli", "questa", "ai", "nella", "alle",
		"quanto", "ci", "o", "dal", "mi", "tale", "modo", "lo", "sulla", "su",
		"sul", "tutti", "d", "loro", "hanno", "molto", "perché", "ciò",
		"nell", "abbiamo", "tra", "nei", "dalla", "ed", "fatto",
		"può", "solo", "dall", "già", "ho", "ancora", "noi", "sua", "mio", "vorrei",
		"nostro", "altri", "tutto", "uno", "altro", "così", "siamo", "quali", "base", "sull");


$connectors_eng = array ("the", "of", "to", "and", "in", "a", "that", "is", "we", "this", "for",
		"i", "on", "it", "be", "are", "as", "have", "which", "not", "with",
		"by", "will","has", "at", "mr", "s", "would", "but", "an", "all", "must",
		"from", "our", "also", "should", "been", "there", "was",
		"you", "its", "or", "can", "they", "if", "what",
		"these", "do", "more", "no", "their", "so", "one", "very",
		"like", "my", "other", "us", "time", "because", "only",
		"who", "about", "out", "up", "people", "now", "take",
		"need", "when", "am", "such", "therefore",
		"new", "policy", "first", "between", "any",
		"some", "make", "those", "into", "were", "than", "made",
		"being", "way", "right", "however", "eu", "them", "fact", "just", "even", "many",
		"say", "state", "issue", "here", "does", "within",
		"believe", "against", "think", "point", "health", "national", "had",
		"order", "then", "mrs", "well", "may", "part", "possible",
		"too", "same", "cannot", "future", "could", "how", "see", "want", "today",
		"where", "me", "know", "over", "most", "he", "course", "still", "much", "good", "said", "view",
		"own", "his", "able", "already", "why", "far", "clear", "last", "case");



// stopwords for all the languages
// it, fr, de, en, es, fi, sv, pt, da, ru, no, hu, nl
// other lines addons: sv, sl,gr,latvian	 
$stopwords_all_lang = array(
		"de","la","que","el","en","y","a","los","del","se","las","por","un","para","con","no","una","su","al","lo","como","más","pero","sus","le","ya","o","este","sí","porque","esta","entre","cuando","muy","sin","sobre","también","me","hasta","hay","donde","quien","desde","todo","nos","durante","todos","uno","les","ni","contra","otros","ese","eso","ante","ellos","e","esto","mí","antes","algunos","qué","unos","yo","otro","otras","otra","él","tanto","esa","estos","mucho","quienes","nada","muchos","cual","poco","ella","estar","estas","algunas","algo","nosotros","mi","mis","tú","te","ti","tu","tus","ellas","nosotras","vosotros","vosotras","os","mío","mía","míos","mías","tuyo","tuya","tuyos","tuyas","suyo","suya","suyos","suyas","nuestro","nuestra","nuestros","nuestras","vuestro","vuestra","vuestros","vuestras","esos","esas","estoy","estás","está","estamos","estáis","están","esté","estés","estemos","estéis","estén","estaré","estarás","estará","estaremos","estaréis","estarán","estaría","estarías","estaríamos","estaríais","estarían","estaba","estabas","estábamos","estabais","estaban","estuve","estuviste","estuvo","estuvimos","estuvisteis","estuvieron","estuviera","estuvieras","estuviéramos","estuvierais","estuvieran","estuviese","estuvieses","estuviésemos","estuvieseis","estuviesen","estando","estado","estada","estados","estadas","estad","he","has","ha","hemos","habéis","han","haya","hayas","hayamos","hayáis","hayan","habré","habrás","habrá","habremos","habréis","habrán","habría","habrías","habríamos","habríais","habrían","había","habías","habíamos","habíais","habían","hube","hubiste","hubo","hubimos","hubisteis","hubieron","hubiera","hubieras","hubiéramos","hubierais","hubieran","hubiese","hubieses","hubiésemos","hubieseis","hubiesen","habiendo","habido","habida","habidos","habidas","soy","eres","es","somos","sois","son","sea","seas","seamos","seáis","sean","seré","serás","será","seremos","seréis","serán","sería","serías","seríamos","seríais","serían","era","eras","éramos","erais","eran","fui","fuiste","fue","fuimos","fuisteis","fueron","fuera","fueras","fuéramos","fuerais","fueran","fuese","fueses","fuésemos","fueseis","fuesen","siendo","sido","tengo","tienes","tiene","tenemos","tenéis","tienen","tenga","tengas","tengamos","tengáis","tengan","tendré","tendrás","tendrá","tendremos","tendréis","tendrán","tendría","tendrías","tendríamos","tendríais","tendrían","tenía","tenías","teníamos","teníais","tenían","tuve","tuviste","tuvo","tuvimos","tuvisteis","tuvieron","tuviera","tuvieras","tuviéramos","tuvierais","tuvieran","tuviese","tuvieses","tuviésemos","tuvieseis","tuviesen","teniendo","tenido","tenida","tenidos","tenidas","tened","og","i","jeg","det","at","en","et","den","til","er","som","på","de","med","han","av","ikke","ikkje","der","så","var","meg","seg","men","ett","har","om","vi","min","mitt","ha","hadde","hun","nå","over","da","ved","fra","du","ut","sin","dem","oss","opp","man","kan","hans","hvor","eller","hva","skal","selv","sjøl","her","alle","vil","bli","ble","blei","blitt","kunne","inn","når","være","kom","noen","noe","ville","dere","som","deres","kun","ja","etter","ned","skulle","denne","for","deg","si","sine","sitt","mot","å","meget","hvorfor","dette","disse","uten","hvordan","ingen","din","ditt","blir","samme","hvilken","hvilke","sånn","inni","mellom","vår","hver","hvem","vors","hvis","både","bare","enn","fordi","før","mange","også","slik","vært","være","båe","begge","siden","dykk","dykkar","dei","deira","deires","deim","di","då","eg","ein","eit","eitt","elles","honom","hjå","ho","hoe","henne","hennar","hennes","hoss","hossen","ikkje","ingi","inkje","korleis","korso","kva","kvar","kvarhelst","kven","kvi","kvifor","me","medan","mi","mine","mykje","no","nokon","noka","nokor","noko","nokre","si","sia","sidan","so","somt","somme","um","upp","vere","vore","verte","vort","varte","vart","de","a","o","que","e","do","da","em","um","para","com","não","uma","os","no","se","na","por","mais","as","dos","como","mas","ao","ele","das","à","seu","sua","ou","quando","muito","nos","já","eu","também","só","pelo","pela","até","isso","ela","entre","depois","sem","mesmo","aos","seus","quem","nas","me","esse","eles","você","essa","num","nem","suas","meu","às","minha","numa","pelos","elas","qual","nós","lhe","deles","essas","esses","pelas","este","dele","tu","te","vocês","vos","lhes","meus","minhas","teu","tua","teus","tuas","nosso","nossa","nossos","nossas","dela","delas","esta","estes","estas","aquele","aquela","aqueles","aquelas","isto","aquilo","estou","está","estamos","estão","estive","esteve","estivemos","estiveram","estava","estávamos","estavam","estivera","estivéramos","esteja","estejamos","estejam","estivesse","estivéssemos","estivessem","estiver","estivermos","estiverem","hei","há","havemos","hão","houve","houvemos","houveram","houvera","houvéramos","haja","hajamos","hajam","houvesse","houvéssemos","houvessem","houver","houvermos","houverem","houverei","houverá","houveremos","houverão","houveria","houveríamos","houveriam","sou","somos","são","era","éramos","eram","fui","foi","fomos","foram","fora","fôramos","seja","sejamos","sejam","fosse","fôssemos","fossem","for","formos","forem","serei","será","seremos","serão","seria","seríamos","seriam","tenho","tem","temos","tém","tinha","tínhamos","tinham","tive","teve","tivemos","tiveram","tivera","tivéramos","tenha","tenhamos","tenham","tivesse","tivéssemos","tivessem","tiver","tivermos","tiverem","terei","terá","teremos","terão","teria","teríamos","teriam","i","me","my","myself","we","our","ours","ourselves","you","your","yours","yourself","yourselves","he","him","his","himself","she","her","hers","herself","it","its","itself","they","them","their","theirs","themselves","what","which","who","whom","this","that","these","those","am","is","are","was","were","be","been","being","have","has","had","having","do","does","did","doing","would","should","could","ought","i'm","you're","he's","she's","it's","we're","they're","i've","you've","we've","they've","i'd","you'd","he'd","she'd","we'd","they'd","i'll","you'll","he'll","she'll","we'll","they'll","isn't","aren't","wasn't","weren't","hasn't","haven't","hadn't","doesn't","don't","didn't","won't","wouldn't","shan't","shouldn't","can't","cannot","couldn't","mustn't","let's","that's","who's","what's","here's","there's","when's","where's","why's","how's","a","an","the","and","but","if","or","because","as","until","while","of","at","by","for","with","about","against","between","into","through","during","before","after","above","below","to","from","up","down","in","out","on","off","over","under","again","further","then","once","here","there","when","where","why","how","all","any","both","each","few","more","most","other","some","such","no","nor","not","only","own","same","so","than","too","very","ad","al","allo","ai","agli","all","agl","alla","alle","con","col","coi","da","dal","dallo","dai","dagli","dall","dagl","dalla","dalle","di","del","dello","dei","degli","dell","degl","della","delle","in","nel","nello","nei","negli","nell","negl","nella","nelle","su","sul","sullo","sui","sugli","sull","sugl","sulla","sulle","per","tra","contro","io","tu","lui","lei","noi","voi","loro","mio","mia","miei","mie","tuo","tua","tuoi","tue","suo","sua","suoi","sue","nostro","nostra","nostri","nostre","vostro","vostra","vostri","vostre","mi","ti","ci","vi","lo","la","li","le","gli","ne","il","un","uno","una","ma","ed","se","perché","anche","come","dov","dove","che","chi","cui","non","più","quale","quanto","quanti","quanta","quante","quello","quelli","quella","quelle","questo","questi","questa","queste","si","tutto","tutti","a","c","e","i","l","o","ho","hai","ha","abbiamo","avete","hanno","abbia","abbiate","abbiano","avrò","avrai","avrà","avremo","avrete","avranno","avrei","avresti","avrebbe","avremmo","avreste","avrebbero","avevo","avevi","aveva","avevamo","avevate","avevano","ebbi","avesti","ebbe","avemmo","aveste","ebbero","avessi","avesse","avessimo","avessero","avendo","avuto","avuta","avuti","avute","sono","sei","è","siamo","siete","sia","siate","siano","sarò","sarai","sarà","saremo","sarete","saranno","sarei","saresti","sarebbe","saremmo","sareste","sarebbero","ero","eri","era","eravamo","eravate","erano","fui","fosti","fu","fummo","foste","furono","fossi","fosse","fossimo","fossero","essendo","faccio","fai","facciamo","fanno","faccia","facciate","facciano","farò","farai","farà","faremo","farete","faranno","farei","faresti","farebbe","faremmo","fareste","farebbero","facevo","facevi","faceva","facevamo","facevate","facevano","feci","facesti","fece","facemmo","faceste","fecero","facessi","facesse","facessimo","facessero","facendo","sto","stai","sta","stiamo","stanno","stia","stiate","stiano","starò","starai","starà","staremo","starete","staranno","starei","staresti","starebbe","staremmo","stareste","starebbero","stavo","stavi","stava","stavamo","stavate","stavano","stetti","stesti","stette","stemmo","steste","stettero","stessi","stesse","stessimo","stessero","stando","aber","alle","allem","allen","aller","alles","als","also","am","an","ander","andere","anderem","anderen","anderer","anderes","anderm","andern","anderr","anders","auch","auf","aus","bei","bin","bis","bist","da","damit","dann","der","den","des","dem","die","das","daß","derselbe","derselben","denselben","desselben","demselben","dieselbe","dieselben","dasselbe","dazu","dein","deine","deinem","deinen","deiner","deines","denn","derer","dessen","dich","dir","du","dies","diese","diesem","diesen","dieser","dieses","doch","dort","durch","ein","eine","einem","einen","einer","eines","einig","einige","einigem","einigen","einiger","einiges","einmal","er","ihn","ihm","es","etwas","euer","eure","eurem","euren","eurer","eures","für","gegen","gewesen","hab","habe","haben","hat","hatte","hatten","hier","hin","hinter","ich","mich","mir","ihr","ihre","ihrem","ihren","ihrer","ihres","euch","im","in","indem","ins","ist","jede","jedem","jeden","jeder","jedes","jene","jenem","jenen","jener","jenes","jetzt","kann","kein","keine","keinem","keinen","keiner","keines","können","könnte","machen","man","manche","manchem","manchen","mancher","manches","mein","meine","meinem","meinen","meiner","meines","mit","muss","musste","nach","nicht","nichts","noch","nun","nur","ob","oder","ohne","sehr","sein","seine","seinem","seinen","seiner","seines","selbst","sich","sie","ihnen","sind","so","solche","solchem","solchen","solcher","solches","soll","sollte","sondern","sonst","über","um","und","uns","unse","unsem","unsen","unser","unses","unter","viel","vom","von","vor","während","war","waren","warst","was","weg","weil","weiter","welche","welchem","welchen","welcher","welches","wenn","werde","werden","wie","wieder","will","wir","wird","wirst","wo","wollen","wollte","würde","würden","zu","zum","zur","zwar","zwischen","au","aux","avec","ce","ces","dans","de","des","du","elle","en","et","eux","il","je","la","le","leur","lui","ma","mais","me","même","mes","moi","mon","ne","nos","notre","nous","on","ou","par","pas","pour","qu","que","qui","sa","se","ses","son","sur","ta","te","tes","toi","ton","tu","un","une","vos","votre","vous","c","d","j","l","à","m","n","s","t","y","été","étée","étées","étés","étant","étante","étants","étantes","suis","es","est","sommes","êtes","sont","serai","seras","sera","serons","serez","seront","serais","serait","serions","seriez","seraient","étais","était","étions","étiez","étaient","fus","fut","fûmes","fûtes","furent","sois","soit","soyons","soyez","soient","fusse","fusses","fût","fussions","fussiez","fussent","ayant","ayante","ayantes","ayants","eu","eue","eues","eus","ai","as","avons","avez","ont","aurai","auras","aura","aurons","aurez","auront","aurais","aurait","aurions","auriez","auraient","avais","avait","avions","aviez","avaient","eut","eûmes","eûtes","eurent","aie","aies","ait","ayons","ayez","aient","eusse","eusses","eût","eussions","eussiez","eussent","a","ahogy","ahol","aki","akik","akkor","alatt","által","általában","amely","amelyek","amelyekben","amelyeket","amelyet","amelynek","ami","amit","amolyan","amíg","amikor","át","abban","ahhoz","annak","arra","arról","az","azok","azon","azt","azzal","azért","aztán","azután","azonban","bár","be","belül","benne","cikk","cikkek","cikkeket","csak","de","e","eddig","egész","egy","egyes","egyetlen","egyéb","egyik","egyre","ekkor","el","elég","ellen","elõ","elõször","elõtt","elsõ","én","éppen","ebben","ehhez","emilyen","ennek","erre","ez","ezt","ezek","ezen","ezzel","ezért","és","fel","felé","hanem","hiszen","hogy","hogyan","igen","így","illetve","ill.","ill","ilyen","ilyenkor","ison","ismét","itt","jó","jól","jobban","kell","kellett","keresztül","keressünk","ki","kívül","között","közül","legalább","lehet","lehetett","legyen","lenne","lenni","lesz","lett","maga","magát","majd","majd","már","más","másik","meg","még","mellett","mert","mely","melyek","mi","mit","míg","miért","milyen","mikor","minden","mindent","mindenki","mindig","mint","mintha","mivel","most","nagy","nagyobb","nagyon","ne","néha","nekem","neki","nem","néhány","nélkül","nincs","olyan","ott","össze","õ","õk","õket","pedig","persze","rá","s","saját","sem","semmi","sok","sokat","sokkal","számára","szemben","szerint","szinte","talán","tehát","teljes","tovább","továbbá","több","úgy","ugyanis","új","újabb","újra","után","utána","utolsó","vagy","vagyis","valaki","valami","valamint","való","vagyok","van","vannak","volt","voltam","voltak","voltunk","vissza","vele","viszont","volna","É","×"

		,"för","och","att","till","flera","är","jag","skall","detta","bör","från","enligt","måste",

		"pri", "être", "fait",
		"το", "η", "ο", "οι", "ένα", "ένας", "μία", "μια", "σε", "του", "των", "της", "τις", "τα", "για", "μου", "σου", "στο", "στον","θα","που",
		"to", "par", "a", "ka","jūsu ","in", "het", "zijn", "een", "aan"

		);
//"			 


function comparesegments($list_s1,$list_t1,$list_s2,$list_t2,$action='intersect',$remove_stopwords=false) {

	// QUESTA FUNZIONE RESTITUISCE L'INTERSEZIONE O IL DIFF, LA BIUNIVOCITA'(NO IN DIFF) E LA CONTINUITA'
	// DI DUE COPPIE DI STRINGHE (GIA' ESPLOSE PER PAROLA).

	// i vado a casa -> i go to school
	// Mi piace la scuola -> i like the school

	// in caso di action='intersect' il risultato è
	// scuola -> i school
	// scuola -> i school
	// biunivocità: VERO
	// prossimità : FALSO

	// OTTIMIZZAZIONE: PUO' ESSERE MIGLIORATA STABILENDO ALTRE CONDIZIONI MINIME.
	// ES. FARE IL PRIMO INTERSECT SE E' OK CONTINUO ECC...

	$contatore_tot = 0;   // CONTA TUTTE LE AZIONI
	$contatore_parz = 0;  // CONTA LE AZIONI CHE NON HANNO PARTATO RISULTATI
	global $debug , $stopwords_all_lang ;

	if ($action=='intersect') {
		$intersection_s1 = array_intersect($list_s1,$list_s2);
		$intersection_t1 = array_intersect($list_t1,$list_t2);
		$intersection_s2 = array_intersect($list_s2,$list_s1);
		$intersection_t2 = array_intersect($list_t2,$list_t1);
	}
	else
	{
		$intersection_s1 = array_diff($list_s1,$list_s2);          // POSSIBILE MEMORY LEAK
		$intersection_t1 = array_diff($list_t1,$list_t2);
		$intersection_s2 = array_diff($list_s2,$list_s1);
		$intersection_t2 = array_diff($list_t2,$list_t1);
	}

	if ($debug>2) {
		echo "$action S1:\n";
		print_r($intersection_s1);
		echo "$action S2:\n";
		print_r($intersection_s2);
		echo "$action T1:\n";
		print_r($intersection_t1);
		echo "$action T2:\n";
		print_r($intersection_t2);
	}

	// BUG!!!! NON USARE, SOLO ESTRARRE TERMINOLOGIA
	// ELIMINO LE PAROLE TROPPO FREQUENTI
	// MOLTO LENTO PER VIA DELLA DIMENSIONE DI STOPWORDS_ALL_LANG
	// SE POSSIBILE MEGLIO FARLO SUI DATI PRIMA DI CHIAMARE QUESTA FUNZIONE
	if ($remove_stopwords) {
		$intersection_s1 = array_diff($intersection_s1,$stopwords_all_lang);
		$intersection_s2 = array_diff($intersection_s2,$stopwords_all_lang);
		$intersection_t1 = array_diff($intersection_t1,$stopwords_all_lang);
		$intersection_t2 = array_diff($intersection_t2,$stopwords_all_lang);
	}

	$contatore_tot++;

	for ($z=0;$z<2;$z++) {

		if ($debug>2) {
			echo "\nENTRO IN NUOVO CICLO Z=$z\n";
		}
		// QUESTI SONO I DATI IMPORTANTI --------------------------
		$segment_result_intersection[0] = trim(implode(" ",$intersection_s1));
		$segment_result_intersection[1] = trim(implode(" ",$intersection_t1));
		$segment_result_intersection[2] = trim(implode(" ",$intersection_s2));
		$segment_result_intersection[3] = trim(implode(" ",$intersection_t2));
		// LA BIUNIVOCITA' PER DEFAULT E' 1
		$segment_result_intersection['BIUNIV'] = 1;
		// LA PROSSIMITA' PER DEFAULT E' 1
		$segment_result_intersection['PROXIM_1'] = 1;
		$segment_result_intersection['PROXIM_2'] = 1;
		// PER DEFUAL LA IN_SEG_DIST E' MASSIMA
		$segment_result_intersection['IN_SEG_DIST'] = 1;

		// FINE DATI IMPORTANTI           --------------------------

		// CONTROLLA LA BIUNIVOCITA' (SOLO IN ACTION='INTERSECT')

		if ($action=='intersect') {

			if (($segment_result_intersection[0]<>$segment_result_intersection[2]) OR
					$segment_result_intersection[1]<>$segment_result_intersection[3]) {
				$contatore_parz++;
				if ($debug>1) { echo $contatore_parz ."/". $contatore_tot ." " .strtoupper($action) ." NON BIUNIVOCA.\n"; }
				// NON E' BIUNIVOCA
				$segment_result_intersection['BIUNIV'] = 0;
				// NON PUO' ESSERE NEANCHE CONTINUA
				$segment_result_intersection['PROXIM_1'] = 0;
				$segment_result_intersection['PROXIM_2'] = 0;
			}

		}

		if ($segment_result_intersection['BIUNIV']==1) {
			// CONTROLLA LA CONTINUITA (PROSSIMITA' delle parole) (ovvero che non sia "la è bella")
			// PER RISPARMIARE RISORSE LO CONTROLLA SOLO SE E'BIUNIVOCITA'.
			// OVVIAMENTE SE NON E' BIUNIVOCA NON PUO' ESSERE CONTINUA

			$segment_original_s1 = trim(implode(" ",$list_s1));          // IL TRIM SERVE VERAMENTE?
			$segment_original_s2 = trim(implode(" ",$list_s2));
			$segment_original_t1 = trim(implode(" ",$list_t1));
			$segment_original_t2 = trim(implode(" ",$list_t2));

			// CONTROLLO CHE SOURCE E TARGET SIANO NON VUOTI

			if ( ((strlen($segment_result_intersection[0])>0) AND (strlen($segment_result_intersection[1])>0)) ) {

				// LA REGOLA: SE IL TESTO ESTRATTO NON E' CONTENUTO SEQUENZIALMENTE NEL SEGMENTO NON E' CONTINUO
				// METTO UNO SPAZIO AVANTI AL SEGMENTO ORIGINALE PER BUG STRPOS
				// PIU' AGGIUNGO A TUTTI UNO SPAZIO AVANTI E DIETRO PER EVITARE CHE:
				// "a scuola di" risulti continuo in " gli alunni della scuola dicono..."
				// " a scuola di " invece non è continuo in " gli alunni della scuola dicono... "

				// OTTIMIZZAZIONE: SE NON ERRO QUESTO DA LO STESSO RISULTATO PER PIU' DEI 4000 CICLI MEDI...
				if (!(strpos("  " . $segment_original_s1 . " ", " " . $segment_result_intersection[0] . " ")) OR
						!(strpos("  " . $segment_original_t1 . " ", " " . $segment_result_intersection[1] . " "))) {
					$contatore_parz++;
					if ($debug>1) {
						echo $contatore_parz ."/". $contatore_tot ." ". strtoupper($action) . " 1 NON CONTINUA.\n";
					}
					// NON E' CONTINUA
					$segment_result_intersection['PROXIM_1'] = 0;
				}
			} else { // E' CMQ VUOTO, CHE PER ME E' NON CONTINUO
				$segment_result_intersection['PROXIM_1'] = 0; }

			// STESSO CONTROLLO PER LA SECONDA COPPIA DI LINGUE
			if ( ((strlen($segment_result_intersection[2])>0) AND (strlen($segment_result_intersection[3])>0)) ) {

				if (!(strpos("  " . $segment_original_s2 . " ", " " . $segment_result_intersection[2] . " ")) OR
						!(strpos("  " . $segment_original_t2 . " ", " " . $segment_result_intersection[3] . " "))) {
					$contatore_parz++;
					if ($debug>1) {
						echo $contatore_parz ."/". $contatore_tot ." ". strtoupper($action) ." 2 NON CONTINUA.\n";
					}
					// NON E' CONTINUA
					$segment_result_intersection['PROXIM_2'] = 0;
				}
			} else { // E' CMQ VUOTO, CHE PER ME E' NON CONTINUO
				$segment_result_intersection['PROXIM_2'] = 0; }

		}

		// OTTIMIZZAZIONE: DEVE ESSERE CALCOLATA SOLO QUANDO SERVE!!
		$segment_result_intersection['IN_SEG_DIST'] = (in_seg_dist($intersection_s1,$intersection_t1,count($list_s1),count($list_t1)) + in_seg_dist($intersection_s2,$intersection_t2,count($list_s2),count($list_t2)) ) / 2;

		if ($debug>1) {
			echo strtoupper($action)."\n";
			$segment_original_s1 = trim(implode(" ",$list_s1));          // LI RIFACCIO QUI PER RISPARMIARE
			$segment_original_s2 = trim(implode(" ",$list_s2));          // ALTRIMENTI DOVREI FARLI ANCHE QUANDO NON SERVE
			$segment_original_t1 = trim(implode(" ",$list_t1));
			$segment_original_t2 = trim(implode(" ",$list_t2));
			echo $segment_original_s1 . "\n";
			echo $segment_original_t1 . "\n";
			echo $segment_original_s2 . "\n";
			echo $segment_original_t2 . "\n";
			print_r($segment_result_intersection);

		}
		/*
		//      swd($intersection_s1);
		if ( ($segment_result_intersection['BIUNIV']== 1)  AND ($action=='intersect') AND
		(($segment_result_intersection['PROXIM_1']== 0) OR ($segment_result_intersection['PROXIM_2']== 0))
		)
		{
		if ( (swd($intersection_s1)>=0) AND
		(swd($intersection_s2)>=0) AND
		(swd($intersection_t1)>=0) AND
		(swd($intersection_t2)>=0) )
		{
		echo "FORSE BUCATE MA BUONE !!!\n";
		}
		}
		//      swd($intersection_t1);
		//      swd($intersection_t2);
		 */

		if (($segment_result_intersection['BIUNIV']==0) OR ($segment_result_intersection['PROXIM_1']==0) OR ($segment_result_intersection['PROXIM_2']==0)) {

			if ($z==0) {
				if ($debug>1) {
					echo "MI DISPIACE MA NON RIESCO AD ESTRARRE UN INFORMAZIONE!!!\n";
				}
				$intersection_s1 = extract_cont($intersection_s1);
				$intersection_t1 = extract_cont($intersection_t1);
				$intersection_s2 = extract_cont($intersection_s2);
				$intersection_t2 = extract_cont($intersection_t2);
				if (($intersection_s1) AND ($intersection_s2) AND ($intersection_t1) AND ($intersection_t2)) {
					if ($debug>1) { 
						echo "\nPOTREI PROVARE AD APPRENDERE QUESTO...\n";
						echo implode(" ",$intersection_s1) ." = ";
						echo implode(" ",$intersection_t1) ."\n";
						echo implode(" ",$intersection_s2) ." = ";
						echo implode(" ",$intersection_t2) ."\n";
					}
				} else { 
					if ($debug>1) { 
						echo "NON TROVO NIENTE DI BUONO QUI...\n"; } 
					$z=2; 
				} // BUG: SE UN INTERSEZIONE ANCHE UNA SOLA E' VUOTA LASCIO PERDERE
			}

		} else { // E' OK ED ESCO DA CICLO
			if ($debug>1) { 
				echo "E' OK QUINDI SALTO LE ANALISI SECCESSIVE\n";
			}
			$z=2;
		}

	}
	if ($debug>1) { 
		echo "VALORE Z: $z\n\n";
	}
	return $segment_result_intersection;

}

function text2words($text,$fast="NO",$unicode=false,$lowercase=true) {
	// RESTITUISCE LE PAROLE IN UN TESTO
	// IN REALTA' POCHI SONO VERI SEPARATORI DI PAROLA, GLI ALTRI ANDREBBERO
	// ELIMINATI DOPO LO SPLIT
	// ES co-branding è bene che sia trattato come una sola parola
	// quindi non esplodere per - ma eliminare - dopo se all'inizio o alla fine di una parola
	// hello -word -> hello,-word -> sostituisco - con niente
	// AGGIUNGERE I SEPARATORI DI PAROLA IN UNICODE E ALTRI CHARSET
	//global $word_separator;
	
	if ($unicode){
		// in realtà se è UTF-8
		mb_internal_encoding('UTF-8');
		mb_regex_encoding('UTF-8');
		//setlocale(LC_ALL, 'en-us');
		if ($lowercase) {
			$text = mb_strtolower($text,'UTF-8');
		}
		/*
		//escape stuff we don't want to split on (we'll replace them later on)
		$orig=array(':\\','\\');
		$sub=array('TRANSLATEDSEPARATORWINPATH','TRANSLATEDSEPARATORBACKSLASH');
		$text=str_replace($orig,$sub,$text);
		*/
		//split for words, but keep dots for now
		$regexp='[^\w.]+';
		$words = mb_split($regexp,$text);

		$res = array();
		/*
		//restore original references
		foreach($words as $k=>$word) {
			$words[$k]=str_replace($sub,$orig,$word);
		}*/

		//now scan again to sort out ambiguities in case of dots in words
		foreach($words as $word) {
			//clean word
			$word=trim($word);

			//skip emtpy spaces
			if (strlen($word)>0) {
				//if the word contains a dot and is not a number (or a numbered index paragraph)
				if(strpos($word,'.')!==FALSE and !is_numeric($word) and strlen(preg_replace('/[0-9\.]/','',$word))>0){
					//check if it's a whole filename; otherwise it may be a bad-formatted period
					//get tokens
					$suspect_filename=explode('.',$word);
					//get the token we suspect to be a filename extension
					$alleged_extension=end($suspect_filename);
					//reset pointer, for sanity
					reset($suspect_filename);

					//assume a filename has the extension all same cased (ie, file.mp3 or file.MP3 but not file.Mp3)
					if(strtoupper($alleged_extension)==$alleged_extension xor strtolower($alleged_extension)==$alleged_extension){
						//filename, add as it is
						$res[]=$word;
					}else{
						//let's try to separate the filename from the (probable) glued word
						//remove last token from word
						$suspect_filename=array_slice($suspect_filename,0,-1);

						//add chunks to array
						$res[]=implode('.',$suspect_filename);
						$res[]=$alleged_extension;
					}
				}else{
					//no dots: just add the word as it is
					$res[]=$word;
				}
			}
		}
		return $res;
	}


	$word_separator = "[ \t\n\r\?\"\.\,\;\:\!\(\)\{\}\`\|\'\+]";
	if ($lowercase) {
		$text = strtolower($text);                           // DA ELIMINARE APPENA ATTIVA LA GESTIONE DEL CASE
	}


	$text = str_replace(chr(160)," ",$text);

	// SE LA MODALITA' E' FAST FACCIO COSI'
	if ($fast=="FAST")  {
		// CON UNICODE FUNZIONA?????
		$u = "";
		if ($unicode) { $u = "u"; }
		$words = preg_split("/\W+/$u", $text, -1, PREG_SPLIT_NO_EMPTY);  // CMQ LA DIRETTIVA /u non AIUTA CON \W+
		// $words = array_filter($words,'trim');  // PER MOTIVI NON NOTI ARRAY_FILTER NON FUNZIONA
		foreach ($words as $value) {
			$words_temp[] = trim($value);
		}
		return $words_temp;
	}


	if ($fast=="VERY_FAST") {
		$text = str_replace("'","' ",$text);
		$words = explode(" ",$text);
		foreach ($words as $value) {
			$words_temp[] = trim($value);
		}
		return $words_temp;
		exit;
	}

	if ($fast=="MANUAL") {
		// LENTO MA LINEARE E CONTROLLATO
		// BUG: DEVO CONTROLLARE SE UTF-8 SAFE (non so se :!? etc possono essere parte di un multi-byte)

		$text .= " ";
		$len = strlen($text);
		$wl = 0;
		$start_w = 0;
		for ($i=0;$i<$len;$i++) {
			// echo "i: $i, wl: $wl, start_w: $start_w\n";
			if (  
					($text[$i]==' ') OR
					($text[$i]=='-') OR
					($text[$i]=='\r') OR
					($text[$i]=='\n') OR
					($text[$i]=='\t') OR
					($text[$i]=='.') OR
					($text[$i]==',') OR
					($text[$i]==';') OR
					($text[$i]==':') OR
					($text[$i]=='?') OR
					($text[$i]=='!') OR
					($text[$i]=='"') OR
					($text[$i]=='\'') OR
					($text[$i]=='(') OR
					($text[$i]==')') OR
					($text[$i]=='{') OR
					($text[$i]=='}') OR
					($text[$i]=='[') OR
					($text[$i]==']') OR 
					($text[$i]=='+') 
					)
					{ 
						$temp = trim(substr($text,$start_w,$wl));
						$start_w=$i+1;
						$wl = 0;
						if ($temp) {
							$words[] = $temp;
						}
					}

			else 
			{ $wl++; }
		}
		return $words;

	}

	$text = str_replace("[","",$text);
	$text = str_replace("]","",$text);                   // UNA VOLTA CAPITO POSSONO ESSERE SOSTITUITI

	// I VERI SEPARATORI SEMATICI SONO [ \n\r\t|] il resto serve per fare pulizia....

	/*
	   $text = str_replace(" -"," ",$text);
	   $text = str_replace("- "," ",$text);
	   $text = str_replace("*"," ",$text);  // TEMPORANEO PER EREG
	   $text = str_replace("-"," ",$text);
	   $text = str_replace("^"," ",$text);
	   $text = str_replace("~"," ",$text);
	   $text = str_replace("+"," ",$text);
	 */
	// $word_separator = "[ \t\n]";

	$words = split($word_separator,$text);   // MOLTO LENTO PER TESTI GRANDI

	// BISOGNA PORTARE TUTTO A SPAZIO E POI EXPLODE
	foreach ($words as $value) {
		//	 $value = wordclean($value);
		$trimmed = trim($value);
		if ($trimmed) {
			$words_temp[] = $trimmed;
		}

	}

	return $words_temp;
}

function word_clean($array) {
	return str_replace('.','',$array);

}

function words_freq($text,$fast=0,$unicode=false) {
	// RESTITUISCE LA FREQUENZA DELLE PAROLE IN UN TESTO
	$words = text2words($text,$fast,$unicode);
	$wordcount = count($words);
	$frequencies = array_count_values ($words);
	// Potrebbero essere ordinati con sort, ma non mi funziona sulla chiavi...
	arsort($frequencies,SORT_NUMERIC);
	$result = array($wordcount,$frequencies);
	return $result;
}

// LA FUNZIONE DI ORDINAMENTO
// E' ESTREMAMENTE IMPORTANTE PERCHE' DEVE ORDINARE SECONDO IL VALORE SEMANTICO
// QUINDI TRADURRE SOLO I TERMINI
function cmp ($a, $b) {
	if (strlen($a) == strlen($b)) return 0;
	return (strlen($a) > strlen($b)) ? -1 : 1;
}

// GENERA TUTTI I SOTTO SEGMENTI CONTINUI DI UN SEGMENTO
function sub_segments($text) {
	$h = 0;
	$result = text2words($text);
	$word_count = count($result);

	for ($j=1;$j<$word_count+1;$j++) {
		$k = $word_count;
		for ($i=$j;$i<$word_count+1;$i++) {
			$k = $k - 1;
			$sub_seg = array_slice ($result, $j-1, $word_count - $i + 1);
			// echo "SLICE: " . ($j-1) ."-". ($word_count - $i) ."\n";
			// print_r($sub_seg);
			$sub_segments[$h] = implode(" ",$sub_seg);                   // TEMPORANEAMENTE NON TENGO CONTO DELLA PUNTEGGIATURA --- CAMBIARE
			$assoc["$sub_segments[$h]"] = array();
			for ($z=0;$z<($word_count - $i + 1);$z++) {
				array_push($assoc["$sub_segments[$h]"],$z + $j);
			}
			//   print_r($assoc);
			// $assoc["$sub_segments[$h]"] = array($j,$word_count - $i + 1,'TRANSLATED'=>0);
			$h++;
			// echo "$j\t$i\t$k\t$sub_seg\n";
		}
	}

	usort ($sub_segments, "cmp");

	/*
	 * PER DEBUG
	 while (list ($chiave, $valore) = each ($sub_segments)) {
	 echo "$chiave: $valore\n";
	 }
	 */
	return array($sub_segments,$assoc);
}

function decodeHTML_EP($string,$utf8=false,$keep_xml_default=false) {


	if ($keep_xml_default) {
		$string = str_replace("&lt;","<TRANSLATED_ENT_LT>",$string);
		$string = str_replace("&gt;","<TRANSLATED_ENT_GT>",$string);

		// tolti perchè trados è uno stronzo e non è conforme al TMX
		//		$string = str_replace("&amp;","<TRANSLATED_ENT_AMP>",$string);
		//		$string = str_replace("&quot;","<TRANSLATED_ENT_QUOT>",$string);
		//		$string = str_replace("&apos;","<TRANSLATED_ENT_APOS>",$string);
	}

	if ($utf8) {
		$tags = get_html_translation_table(HTML_ENTITIES);
		$tags = array_flip($tags);

		foreach ($tags as $kk => $vv){
			$tags[$kk]=utf8_encode($vv);
		}


		$string = strtr($string,$tags);
		// chi sa l'equivalente utf-8????
		//	$string = str_replace('&ldquo;','',$string);
		//	$string = str_replace('&rdquo;','',$string);
		$string = preg_replace("/&#([0-9]+);/me", "unicode_to_utf8('\\1')", $string); // non testata a fondo
		$string = preg_replace("/&#x([A-Z0-9]+);/me", "chr(hexdec('\\1'))", $string); // non supportato per ora
		unset($tags);
	}
	else {
		$string = strtr($string, array_flip(get_html_translation_table(HTML_ENTITIES)));
		$string = preg_replace("/&#([0-9]+);/me", "chr('\\1')", $string);
		$string = preg_replace("/&#x([A-Z0-9]+);/me", "chr(hexdec('\\1'))", $string);
		$string = str_replace(chr(160)," ",$string);
	}

	if ($keep_xml_default) {
		$string = str_replace("<TRANSLATED_ENT_LT>","&lt;",$string);
		$string = str_replace("<TRANSLATED_ENT_GT>","&gt;",$string);
		$string = str_replace("<TRANSLATED_ENT_AMP>","&amp;",$string);
		$string = str_replace("<TRANSLATED_ENT_QUOT>","&quot;",$string);
		$string = str_replace("<TRANSLATED_ENT_APOS>","&apos;",$string);
	}


	return $string;
}

function freq_dist($source,$target,$table) {
	GLOBAL $mysql_link;
	GLOBAL $ultimo_source_count;
	GLOBAL $ultimo_source;
	GLOBAL $word_separator;
	//      $word_separator = "[ \t\n\r?\".,;:!(){}|]";
	$my_w_s = $word_separator . "+";
	$min_match_length = 100000000;  // NON VOGLIO USARE MAI IL MATCH

	// MI CREO UN RLIKE PERFETTO
	// BUG NON FUNZIONA BENE SE CI SONO CARATTERI COME + e gli altri di REGEX
	$source_rlike = addslashes($my_w_s . implode("$my_w_s",text2words($source)) . $my_w_s);
	$target_rlike = addslashes($my_w_s . implode("$my_w_s",text2words($target)) . $my_w_s);

	// $source = addslashes($source);
	// $target = addslashes($target);

	// $query = "SELECT COUNT(*) from RESULTS WHERE MATCH(SOURCE) AGAINST ('$source')";
	// if (strlen($source)<$min_match_length) {

	// RICOLCOLO IL SOURCE SOLO SE E' CAMBIATO
	if ($ultimo_source<>$source) {
		// echo "ALTRO SOURCE (Vecchio: $ultimo_source - $ultimo_source_count)\n";
		// $query = "SELECT COUNT(*) from $table WHERE CONCAT(' ',SOURCE,' ') RLIKE '" . $word_separator . $source . $word_separator . "'";
		$query = "SELECT COUNT(*) from $table WHERE CONCAT(' ',SOURCE,' ') RLIKE '$source_rlike'";
		//      echo "$query\n";
		// }
	if (!($mysql_result1 = mysql_query($query,$mysql_link))) {
		echo "$query " . mysql_error();

		// exit;
	}
	$result_s = mysql_fetch_row($mysql_result1);
	$ultimo_source_count = $result_s[0];
	//     echo "ULTIMO COUNT S: $ultimo_source_count\n";
}
else {
	$result_s[0] = $ultimo_source_count;
	//	  echo "ULTIMO COUNT S: $ultimo_source_count\n";
}

//$query = "SELECT COUNT(*) from RESULTS WHERE MATCH(TARGET) AGAINST ('$target')";
// if (strlen($target)<$min_match_length) {
// $query = "SELECT COUNT(*) from $table WHERE CONCAT(' ',TARGET,' ') RLIKE '" . $word_separator . $target . $word_separator . "'";
$query = "SELECT COUNT(*) from $table WHERE CONCAT(' ',TARGET,' ') RLIKE '$target_rlike'";
//      echo "$query\n";
// }
$mysql_result2 = mysql_query($query,$mysql_link);
$result_t = mysql_fetch_row($mysql_result2);
//      echo "ULTIMO COUNT T: $result_t[0]\n";

if ( ($result_s[0]==0) OR ($result_t[0]==0) ) {
	$dist = 1000000000; }
	else {
		$dist = abs($result_s[0]*$result_s[0] - $result_t[0]*$result_t[0]) / (2*$result_s[0]*$result_t[0]);
	}
return $dist;
}


function freq_dist_fast($source,$target,$table) {
	GLOBAL $mysql_link;
	GLOBAL $ultimo_source_count;
	GLOBAL $ultimo_source;

	$min_match_length = 1;  // NON VOGLIO USARE MAI IL MATCH

	$source = addslashes($source);
	$target = addslashes($target);

	if ($ultimo_source<>$source) {
		$query = "SELECT COUNT(*) from $table WHERE CONCAT(' ',SOURCE,' ') LIKE '% $source %'";
		if (!($mysql_result1 = mysql_query($query,$mysql_link))) {
			echo "$query " . mysql_error();
		}
		$result_s = mysql_fetch_row($mysql_result1);
		$ultimo_source_count = $result_s[0];
	}
	else {
		$result_s[0] = $ultimo_source_count;
	}

	$query = "SELECT COUNT(*) from $table WHERE CONCAT(' ',TARGET,' ') LIKE '% $target %'";
	$mysql_result2 = mysql_query($query,$mysql_link);
	$result_t = mysql_fetch_row($mysql_result2);

	$var1 = $result_s[0];
	$var2 = $result_t[0];
	$risultato = 0;
	if (($var1)AND($var2)) {
		$risultato =  abs($var1-$var2)/(max($var1,$var2));

	}elseif( ($var1) OR ($var2) ){
		$risultato =  1;
	}
	return $risultato;
}




function length_dist($source,$target) {
	$n = strlen($source);
	$m = strlen($target);
	$dist = abs( ($n - $m) / ($n + $m) );
	return $dist;
}

//modifica paolo
function length_dist2($source,$target) {
	$n = strlen($source);
	$m = strlen($target);
	$dist =($n - $m);
	return $dist;
}
//fine modifica

function wordcount_dist($source,$target) {

	$wc1 = count(text2words($source));
	$wc2 = count(text2words($target));

	if ( ($wc1==0) OR ($wc2==0) ) {
		$dist = 1000000000; }
	else {
		$dist = abs($wc1*$wc1 - $wc2*$wc2) / (2*$wc1*$wc2);
	}
	// echo "WORDCOUNT_DIST($source,$target)\t\t\t: $dist\n";
	return $dist;
}

function levenshtein_dist($source,$target) {
	// OTTIMIZZAZZIONE TOGLIERE UNO DEI DUE LEVEN..
	$dist = ((levenshtein($source,$target))*levenshtein($source,$target)) / (2*strlen($source) * strlen($target));
	return $dist;
}

// In-Segment distance
// DA LA DISTANZA MEDIA PERCENTUALE TRA LE ENTITA' ESTRATTE IN DUE SEGMENTI
function in_seg_dist($word_list_s,$word_list_t,$size_s,$size_t) {
	// OTTIMIZZAZZIONE: SE VIENE CALCOLATA SOLO SULLE CONTINUE NON E' STRETTAMENTE NECESSARIO CALCOLARE LA POS MEDIA
	$n = count($word_list_s);
	$m = count($word_list_t);
	$dist = 0;

	// ANCHE QUESTO CONTROLLO PUO' ESSERE EVITATO
	if (($n==0) OR ($m==0)) { $dist = 1; }
	else {
		// POSIZIONE MEDIA PERCENTUALE DELL'EMS
		if (($n<>0) AND ($size_s>1)) { $ems_s_pos = (array_sum(array_keys($word_list_s)) / $n) / ($size_s-1); } else { $ems_s_pos = 1; }
		if (($m<>0) AND ($size_t>1)) { $ems_t_pos = (array_sum(array_keys($word_list_t)) / $m) / ($size_t-1); } else { $ems_t_pos = 1; }
		$dist = abs($ems_s_pos - $ems_t_pos);
	}

	return $dist;
}

// Single Word Discontinuity
function swd($word_list) {
	$dist=0;

	$n = count($word_list);
	reset($word_list);
	for ($h=1;$h<$n;$h++) {
		$primo = key($word_list);
		next($word_list);
		$secondo = key($word_list);
		$dist = $dist + ($secondo - $primo);
	}
	// print_r($word_list);
	// echo "DIST: $dist \n";
	if (($dist==$n) AND ($dist<>0)) {
		// echo "HA UN BUCO DI UNA PAROLA (DIST: $dist)\n\t(" . implode(" ",$word_list) . ")\n";
		return 1;
		//	exit;
	}
	if (($dist==$n-1) AND ($dist<>0)) {
		// echo "E' CONTINUA (DIST: $dist)\n\t(" . implode(" ",$word_list) . ")\n";
		return 0;
		//	exit;
	}

	// echo "E' UNA GROVIERA\n";
	return -1;
}

// ESTRAE DA UNA LISTA DI PAROLE GLI ELEMENTI CONTINUI
// SI BASA SULLA SEQUENZIALITA' DELLE CHIAVI
// QUINDI APSETTA UN VETTORE DEL TIPO DI INTERSECT O DIFF

function extract_cont($word_list) {
	$n = count($word_list);
	$last = "";
	$num_ems = 0;
	for ($h=1;$h<$n;$h++) {
		$primo = key($word_list);
		next($word_list);
		$secondo = key($word_list);
		$dist = $secondo - $primo;
		if ($dist>1) {
			if ($last<>"continuos") {
				$word_list[$primo] = "";
			}
			$last = "";
		}
		else { $last = "continuos"; }

	}
	// CANCELLA L'ULTIMO ELEMENTO SE DISCONTINUO
	if ($dist>1) { $word_list[$secondo] = ""; }
	$word_list = array_diff($word_list,array(""));

	if (swd($word_list)<>0) {
		// echo "CA N CE STA NIENT A FA\n";
		$word_list = false;
	}
	return $word_list;
}


function utf8_to_unicode( $str ) {

	$unicode = array();
	$values = array();
	$lookingFor = 1;

	for ($i = 0; $i < strlen( $str ); $i++ ) {
		$thisValue = ord( $str[ $i ] );
		if ( $thisValue < 128 ) $unicode[] = $thisValue;
		else {
			if ( count( $values ) == 0 ) $lookingFor = ( $thisValue < 224 ) ? 2 : 3;
			$values[] = $thisValue;
			if ( count( $values ) == $lookingFor ) {
				$number = ( $lookingFor == 3 ) ?
					( ( $values[0] % 16 ) * 4096 ) + ( ( $values[1] % 64 ) * 64 ) + ( $values[2] % 64 ):
					( ( $values[0] % 32 ) * 64 ) + ( $values[1] % 64 );
				$unicode[] = $number;
				$values = array();
				$lookingFor = 1;
			} // if
		} // if
	} // for
	return $unicode;
} // utf8_to_unicode

function unicode_to_utf8( $unicode ) {
	// dal valore numerico unicode restituisce l'utf-8
	$utf8 = '';
	if ( $unicode < 128 ) {
		$utf8.= chr( $unicode );
	} elseif ( $unicode < 2048 ) {
		$utf8.= chr( 192 +  ( ( $unicode - ( $unicode % 64 ) ) / 64 ) );
		$utf8.= chr( 128 + ( $unicode % 64 ) );
	} else {
		$utf8.= chr( 224 + ( ( $unicode - ( $unicode % 4096 ) ) / 4096 ) );
		$utf8.= chr( 128 + ( ( ( $unicode % 4096 ) - ( $unicode % 64 ) ) / 64 ) );
		$utf8.= chr( 128 + ( $unicode % 64 ) );
	} // if
	return $utf8;

} // unicode_to_utf8

function xliff2segs($text) {
	$text = str_replace("\n", " ", $text);
	$text = str_replace("\r", " ", $text);
	$result = preg_match_all("/(<source[^>]*?".">)(.*?)(<\/source>)/i",$text,$matches);
	// print_r($matches);
	// result > 1 if something found
	return array($result,$matches[2]);
}

function segs2stats($data) {
	$tot_words = count(text2words(strip_tags(join(' ',$data)),'FAST'));
	$no_matches=array_unique($data);
	$nm_words = count(text2words(strip_tags(join(' ',$no_matches))));
	$rep_words = $tot_words - $nm_words;
	$eq_words  = round($nm_words + $rep_words*0.3);
	return array('total'=>$tot_words,
			'no-match'=>$nm_words,
			'repetitions'=>$rep_words,
			'equivalent'=>$eq_words);
}

function keepmarks_support($txt,$word_separator_a,$i) {
	$result = array();
	$app = array();

	$del = $word_separator_a[$i];
	foreach($txt as $k=>$v) {
		$app = explode($del,$v);
		if(count($app)>1) {
			$c = count($app);
			$k = 1;
			foreach($app as $kk=>$vv) {
				if(trim($vv)!='') {
					$result[] = $vv;
				}
				if($k<$c) {
					$result[] = $del;
				}
				$k++;
			}
		} else {
			$result[] = $v;
		}
	}

	if($i<count($word_separator_a)-1) {
		$result = keepmarks_support($result,$word_separator_a,$i+1);
	}	

	return $result;
}   	

function text2words_keepmarks($text) {
	$word_separator_a = array(" ","?","\"",".",",",";",":","!","(",")","{","}","`","|","'","+");
	$app_phrases = explode(' ',$text);
	return keepmarks_support($app_phrases,$word_separator_a,1);
}

?>
