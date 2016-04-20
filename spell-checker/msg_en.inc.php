<?

$msg['li_keywords']    = "language identifier, what language is this"; 


$msg['choose_alt_de'] = "Deutsch";
$msg['choose_alt_fr'] = "Français";
$msg['choose_alt_es'] = "Español ";
$msg['choose_alt_it'] = "Italiano";
$msg['choose_alt_en'] = "English";



$msg['link_home_labs'] = "Labs";
$msg['link_home_trans'] = "Translated";
$msg['link_contacts'] = "Contacts";
$msg['link_about'] = "Information about Labs";

$msg['sem_rel_opening'] = "Insert a list of words and find out what they have in common";
$msg['sem_rel_column'] = "Relationships taken from European Parliament debates";
$msg['sem_rel_only_it'] = "NB/ This technology is currently only available in Italian (English version out soon!)";
$msg['sem_rel_submit'] = "Find their relationships";
$msg['uno'] = "One";
$msg['due'] = "Two";
$msg['tre'] = "Three";
$msg['quattro'] = "Four";
$msg['cinque'] = "Five";
$msg['sei'] = "Six";
$msg['sette'] = "Seven";


$msg['title_logo'] = "Laboratories for automatic language processing";//"Professional translation services";
$msg['alt_logo'] = "Free translations and professional solutions";
$msg['select_language'] =  "choose your language:";
$msg['suggestions'] = "Contacts";
$msg['comment_index'] = "Language is more complicated than it seems!";
$msg['title'] = ".: Translated :. Language labs";
$msg['index_title'] = "Translated Labs, natural language processing";
$msg['comment_rel_sem'] = "Semantic relationships";


$msg['hts_l1'] = "Language API";
$msg['hts_l2'] = "Make managing your multilingual content automatic.";


$msg['li_l1'] = "Language identifier";
$msg['li_l2'] = "Paste some text and find the language.";

$msg['sc_l1'] = "Online Spell check";
$msg['sc_l2'] = "Spell check in 15 languages for online content.";

$msg['cv_l1'] = "CV self-assessment";
$msg['cv_l2'] = "Submit your CV and see if you’re a good translator.";

$msg['ss_l1'] = "Semantix";
$msg['ss_l2'] = "A search engine which speaks your language.";

$msg['mt_l1'] = "Translator map";
$msg['mt_l2'] = "Our network of linguists";

$msg['te_l1'] = "Terminology Extraction";
$msg['te_l2'] = "Paste some text and get the terminology!";

$msg['sr_l1'] = "Semantic relationships";
$msg['sr_l2'] = "What do airplane, bird and helicopter have in common?";

$msg['mm_l1'] = "MyMemory";
$msg['mm_l2'] = "A collaborative translation archive";

$msg['comment_spellcheck'] = "Online Spell check";
$msg['comment_language_identifier']= "Automatic language identifier, 102 languages supported"; //for 102 languages";
$msg['type_text'] = "Type or paste your text:";
$msg['identify_button'] = "Identify";
$msg['explanation_auto'] = "By choosing AUTO, the language will be identified automatically.";
$msg['more_info'] = "More information";
$msg['small_text'] = "The text is too short! I hope...";
$msg['detected_language'] = "This text seems to be";
$msg['clean_textarea'] = "Cancel this text";
$msg['msg_reload_lang'] = "Change language";
$msg['spell_chk_submit'] = "Check";

$msg['term_ext_insert'] = "Insert the text requiring terminology extraction.";
$msg['term_ext_insert_2'] = "For long texts, extraction could take up to a minute.";
$msg['term_legend_title'] = "Top <num_terms> terms";
$msg['term_result_context'] = "Terms in context";
$msg['term_table_term_extracted']="Extracted term";
$msg['term_table_score']="Score";
$msg['esempi'] = "Examples:";
$msg['elettronico'] = "Electronics";
$msg['meccanico'] = "Mechanics";
$msg['assicurativo'] = "Insurance";
$msg['statistico'] = "Statistics";
$msg['patent'] = "Patent";
$msg['nlp'] = "Computational Linguistics";
$msg['medical'] = "Medical";
$msg['chemistry'] = "Chemistry";
$msg['lingue'] = "Languages:";
$msg['lingue_it'] = "Italian";
$msg['lingue_en'] = "English";
$msg['lingue_fr'] = "French";
$msg['lingue_supp'] = "Supported languages:";

$msg['comment_semantic_search'] = "A search engine which speaks your language";
$msg['coming_soon'] = "Online demo under construction.";

$msg['ss_what'] = "What it does:";
$msg['ss_msg_what'] = "<br />Searching:
    		        <br />
    		        <br /><span class=\"small\">- \"Marco Paolo restaurant\"</span> 
    		       	<br />
    			<br />find all documents containing:
    			<br />
    			<br /><span class=\"small\">- \"Marco and Paolo were having dinner together\"</span>
    			<br /><span class=\"small\">- \"after a good meal, Marco and Paolo went to the cinema\"</span>
    			<br /><span class=\"small\">- \"Paolo likes Marco’s cooking\"</span>";
$msg['ss_how'] = "How it’s done:";
$msg['ss_msg_how'] = "By using statistical algorithms (dictionaries, synonyms, etc. are not used). It can access any document sources, analyze their content, learn the language and extract the semantic content.";


$msg['title_lang_id'] = "Automatic online language identifier";
$msg['title_spell_chk'] = "Online spell check";   
$msg['title_term_extract'] = "Terminology Extraction";
$msg['title_sem_rel'] = "The semantic relationships between words";


$msg['legend_title_Term_Extr'] = "Information on extracting terminology ";
$msg['legend_body_Term_Extr'] = "<h2><b>Introduction</b></h2>
	<p>Terminology is the sum of the terms which identify a specific topic.
	Extracting terminology is the process of extracting terminology from a text.

	</p>
	The idea is to compare the frequency of words in a given document with their frequency in the language.
	Words which appear very frequently in the document but rarely in the language are probably terms.

	</p>
	<h2><b>Technology</b></h2>
	<p>It uses Poisson statistics, the <a href=\"http://en.wikipedia.org/wiki/Maximum_likelihood\">Maximum Likelihood Estimation</a> and Inverse Document Frequency 
	between the frequency of words in a given document and a generic corpus of 100 million words per language.
	It uses a probabilistic part of speech tagger to take into account the probability that a particular sequence could 
	be a term. It creates n-grams of words by minimizing the <a href=\"http://en.wikipedia.org/wiki/Information_entropy\">relative entropy</a>.</p>

	<h2><b>Why have we developed this?</b></h2>
	<p>Translated has developed this technology to help its translators to be aware of 
	   the difficulties in a document and to simplify the process of creating glossaries.</p>

	<p>We also use it to improve search results in traditional search engines (es. Google) by giving a better estimation of how much a keyword is relevant to a document.</p>


				  <h2><b>I want it!</b></h2>
	If you are interested in this technology, please read more on <a href=\"\#about\">Translated Labs</a> and our services for <a href=\"/#about\">natural language processing</a>.

	<h2><b>I could do better!</b></h2>
	If you think you could improve these applications, if you are passionate about information retrieval, natural language processing, machine learning or artificial intelligence in general, you have come to the right place. <a href=\"http://www.translated.net/it/lavora-con-noi.php\">Send us your CV</a>";
				  
				  


$msg['legend_title_spell_check'] = "Information on the spell check";
$msg['legend_body_spell_check'] = "<h2><b>Introduction</b></h2>
	This spell checker analyzes in real time the text entered by you to find possible spelling mistakes. It is able to suggest possible corrections in more than 20 languages.
	What is more, if the AUTO function has been chosen, it can identify the language being used by employing our 
	<a href='../language-identifier/'>language identifier</a>.

	<h2><b>Why have we developed this?</b></h2>
	Translated has developed this technology to allow its project managers to check for spelling mistakes in translation projects, irrespective of the languages they themselves understand.</p>
	<p>We are using this technology to improve the usability of our content management systems, newsgroup and forums where often the content is created without correction tools.</p>
				    
	<p>It is also used to improve the quality of our <a href=\"http://traduzioni.translated.net\">automatic translator</a>.
				    

	<h2><b>Technology</b></h2>
	The interface is based on <a href=\"http://it.wikipedia.org/wiki/AJAX\">AJAX</a>. It carries out asynchronous calls to our web correction service based on open source technology <a href=\"http://aspell.net/\">Aspell</a> and on an idea of <a href=\"http://me.eae.net/archive/2005/07/26/litespellchecker/\">Emil A Eklund</a>.
	The interface manages graphic and formatted content (Rich Text Format).</p>
	
	<p>The dictionaries are fed and improved by users through a collaborative model similar to Wikipedia, and are revised by our translators.</p>

	<p>We hope to be able to include soon an automatic correction function thanks to the integration of a
	<a href=\"http://en.wikipedia.org/wiki/Factored_language_model\">factored language model</a> which can choose the suggestion best suited to the context.</p>


	<h2><b>I want it!</b></h2>
	If this technology interests you, please read more on <a href=\"/#about\">Translated Labs</a> and our services for <a href=\"/#about\">natural language processing</a>.

	<h2><b>I could do better!</b></h2>
	If you think you could improve these applications, if you are passionate about information retrieval, natural language processing, machine learning or artificial intelligence in general, you have come to the right place. <a href=\"http://www.translated.net/it/lavora-con-noi.php\">Send us your CV</a>";
	

$msg['legend_title_rel_sem'] = "Information on searching for semantic relationships";
$msg['legend_body_rel_sem'] = "<h2><b>Introduction</b></h2>
	<p>
	This application searches for semantic relationships in a text by analysing the statistical properties of words.
	</p>
	<p>
	It is not based on rules but on the probability that two words can appear in the same phrase without having a relationship.
	</p>

	<h2><b>Why have we developed this?</b></h2>
	<p>This technology is an integral part of a more complicated project able to extract translated terminology from the web.</p>
	
	<p>For example, if you want to find on the web the English translation of ‘Metallizzazione’, it will be difficult to find bilingual sites from where the information can be extracted.

	But you will find on google <a href=\"http://www.google.it/search?hl=it&q=metallizzazione&btnG=Cerca&meta=lr%3Dlang_it\">45.600</a>
	Italian pages which talk about \"<i>Metallizzazione</i>\". From these pages, you will discover that ‘Metallazzione’ has semantic relationships with \"vuoto\", \"impianto\", \"vernice\", \"finitura\", \"metallo\" for which the English translations can be easily found.
	At this point, you can search for what the words \"vacuum\", \"plant\", \"paint\", \"metal\" have in common and the answer will be \"<i>Metallization</i>\", 
	the translation you were looking for!.</p>

	<p>Another application of this technology is; <a href=\"http://www.semantix.it/\">Semantix</a>, our semantic search product.</p>
				
	<h2><b>Technology</b></h2>
	<p>It creates an n-dimensional representation of words (<a href=\"http://en.wikipedia.org/wiki/Probabilistic_latent_semantic_analysis\">PLSA</a>) by using the statistical properties of the words which appear next to them as coordinates.

 	This demo uses European Parliament debates as its corpus.
	</p>


	<h2><b>I want it!</b></h2>
	If this technology interests you, please read more on <a href=\"/#about\">Translated Labs</a> and our services for <a href=\"/#about\">natural language processing</a>.

	<h2><b>I could do better!</b></h2>
	If you think you could improve these applications, if you are passionate about information retrieval, natural language processing, machine learning or artificial intelligence in general, you have come to the right place. <a href=\"http://www.translated.net/it/lavora-con-noi.php\">Send us your CV</a>
";

$msg['legend_title_lang_id'] = "Information on the language identifier";
$msg['legend_body_lang_id'] = "<h2><b>Introduction</b></h2>
	<p>	
	A language identifier is an automatic classifier.
	It calculates the similarity of a text with previously inserted reference texts.

	</p>

	<h2><b>Why have we developed this?</b></h2>
	<p>This technology is an integral part of a spider able to extract useful information for our translators from the web.</p>

	<p>We are also using it to check that untranslated phrases have not been left in a project and to improve the usability of the web interfaces like our <a href=\"http://traduzioni.translated.net\">automatic translator</a></p>

	<p>As an automatic classifier, it can easily be used to say in which category a document belongs by providing example documents.
	For this, we are also using it to classify our correspondence and to identify the topic of a written text in a language we do not understand.

	<h2><b>Technology</b></h2>
	<p>It creates an n-dimensional representation of the text (<a href=\"http://en.wikipedia.org/wiki/Vector_space_model\">Vector Space Model</a>) by using the statistical properties of the byte sequences found in the text as coordinates. It performs the same operation on previously inserted reference texts.
	In the n-dimensional space, the inserted text will have a precise position. The reference text closest to it will be the one which most resembles it.
	</p>


	<h2><b>I want it!</b></h2>
	If you are interested in this technology, please read more on <a href=\"/#about\">Translated Labs</a> and our services for <a href=\"/#about\">natural language processing</a>.

	<h2><b>I could do better!</b></h2>
	If you think you could improve these applications, if you are passionate about information retrieval, natural language processing, machine learning or artificial intelligence in general, you have come to the right place. <a href=\"http://www.translated.net/it/lavora-con-noi.php\">Send us your CV</a>";

$msg['legend_title_home'] = "Information on the Labs";	
$msg['legend_body_home'] = "

	<table border=0 width=95%>
	<tr valign=top>

	<td>
	<h2 style=\"margin-top:0px\"><b>Introduction</b></h2>
	<p>
	The Translated Labs (T-Labs) are a research centre where IT experts and linguists work to teach computers to express themselves like humans.
	</p>

	<p>The T-Labs are Translated’s innovative core.</p>

	<p>
	On these pages you will find some of the tools we are developing.
	</p>
	</td>

	<td align=center><img src=\"gif/labs.jpg\" style=\"border:1px solid black\"><div class=small nowrap>New discoveries for old mysteries.</div></td>

	</tr>
	</table>
	<h2 style=\"margin-top:0px\"><b>What we are working on</b></h2>
	<p>
	TRANSLATED is a language services provider. Its success stems from applying information technology in the translation sector.
	</p>
	<p>
	Technology to improve the quality of professional translation processes is being developed and tested in the T-Labs.
	</p><p>The most important areas of research are:
	<ul>
		<li>Bilingual Sequences Extraction from the web</li>
		<li>Semantic search</li>
		<li>Statistical Machine Translation</li>
		<li>Multilingual Web Architecture and Usability</li>
		<li>Translation Workflow Automation</li>
		<li>Language Modelling</li>
		<li>Data Mining and Web Information Retrieval</li>
		<li>Automatic classification of unstructured data</li>
	</ul>
	</p>
	<h2><b>I want it!</b></h2>
	<p>The T-Labs mainly produce technology for Translated and not final users.</p>

	<p>Some of the technology we are developing has direct applications in many other sectors such as e-business, intelligence and automation of business processes.</p>

	<p>Translated has not turned its applications into products but we can help you achieve your objectives through our consultancy services.</p>
	
	<p>Find our contact details on the contacts page <a href=\"http://www.translated.net/it/contatti.php\">contacts</a>.</p>

	<h2><b>I could do better</b></h2>
	If you think you could improve these applications, if you are passionate about information retrieval, natural language processing, machine learning or artificial intelligence in general, you have come to the right place. <a href=\"http://www.translated.net/it/lavora-con-noi.php\">Send us your CV</a>
	";

$msg['spell_chk_characters_alarm'] = "ATTENTION: only the first 300 words will be checked";

$msg['js_sc_ignore'] = "Ignore";
$msg['js_sc_add'] = "Add";
$msg['js_sc_not_added'] = "Word not added";
$msg['js_sc_no_suggest'] = "No suggestions";
$msg['js_sc_search'] = "Search with google";




//trVSM
$msg['legend_body_trVSM'] = "<h2><b>Introduction</b></h2>

	Translation quality is in part determined by ensuring that texts are assigned to translators
	with relevant experience. This knowledge typically resides in individual project managers, who 
	build up a profile of the translators with whom they work and are therefore able to judge which 
	translator is the best choice for any given job. The idea here is to extract and centralize this knowledge into a resource that will help Project Managers
	make better, faster judgements. By analyzing human job assignment decisions over the last year, this application 
	is able to match new jobs to the translators with the most relevant experience, mimicking an informed human judgement.    

	<h2><b>Technology</b></h2>
	This application is based on a vector space model, which represents each translator as a vector in a 
	multi-dimensional space. Each vector's direction is determined by the most semantically significant words
	present in the translator's work over the last year. New jobs are similarly represented as vectors, which are 
	compared against each of the translator vectors. The translator vector which points in the direction that is 
	most similar to the direction of the job vector is the most experienced person for this translation.

	<h2><b>Why have we developed this?</b></h2>
	We believe that automating and improving the translator selection process is at the core of producing an 
	efficient, high-quality translation process.

	<h2><b>I could do better!</b></h2>
	If you think you could improve these applications, if you are passionate about information retrieval, natural language processing, machine learning or artificial intelligence in general, you have come to the right place. <a href=\"http://www.translated.net/it/lavora-con-noi.php\">Send us your CV</a>";



// -------- READIBILITY --------

 $msg['comment_read'] = "Ease-of-reading analyzer.";
 $msg['read_button'] = "Start evaluation";
 $msg['re_l1'] = "Readability Analyser";
 $msg['re_l2'] = "Type or paste the text that you want to analyze.";
 $msg['title_read_id'] = "Readability analyzer";
 $msg['legend_readability'] = "Information about the readability analysis"; 
 $msg['easy']="EASY";
 $msg['average']="AVERAGE";
 $msg['hard']="HARD";
 $msg['easy1']="Easy";
 $msg['average1']="Average";
 $msg['hard1']="Hard";
 $msg['ident_read']="Not defined (IT, EN, FR, ES, DE)";
 $msg['no_terms_read']="The text does not contain relevant terms";
 $msg['a_result_read']="Result of analysis, text written in: ";
 $msg['title_1_read']="Ease of reading level";  
 $msg['level_read']="The submitted text is ";
 $msg['title_2_read']="Potentially hard or characteristic terms";
 $msg['intro_term_list']="This list contains the words, sentences or concepts which should be researched in advance. A strong understanding of these terms will lead to a better understanding of the text as a whole.";
 $msg['analysis_progress_read']="Analysis in progress...";
 $msg['no_lang_read']="Language not supported.";
 
 $msg['read_description']="Readability index";
 $msg['read_keywords']="readability, ease of reading, easy reading, legibility, gulpease langauges, gulpease";

 $msg['examples_read']="Try these examples";
 $msg['ex_easy']="This phrase is easy. It contains common words and simple concepts.";
 $msg['ex_average']="Although this phrase is slightly harder on average, and despite its complexity, the reader will have no problem understanding it.";
 $msg['ex_hard']="The very phrase contained herein, having rare complexity, may potentially be, without prior preparation, implausibly difficult to parse in as much as it carries, at the level of the text itself, an unnecessarily, albeit notably, low readability level.";
 
 $msg['legend_body_readability'] = "<h2><b>Introduction</b></h2>
	<p>	
	Word length and phrase length influence the ease of reading and understanding of a given text. Short words are usually more common (<a href=\"http://en.wikipedia.org/wiki/Zipf%27s_law\">Zipf's law</a>). Short sentences require less abstraction ability to understand. The readability analysis could be useful to make a text better, augmenting its accessibility.
	</p>
	<h2><b>Why have we developed this?</b></h2>
	<p>
	The readability index tells us how easy a given text is to understand. 
	A well-written text is effective, easy to understand and quick to read. 
	This index helps us understand the text's complexity in order to better schedule the activities of translators and revisers. 
	More than ever, written information, especially in the Internet, must be direct and well structured. 
	This analysis can help achieve both goals. 
	</p>

	<p></p>

	<h2><b>Technology</b></h2>
	<p>
	<b>Readability</b><br>
	Readability is calculated using the Gulpease Index. 
	This index has been implemented for <b>Italian</b>, <b>English</b> and <b>French</b>. 
	For <b>German</b> and <b>Spanish</b>, only the readability index works. 
	If your language is not yet supported and you are interested in this technology, contact us via <a href=\"mailto:info@translated.net?subject=LABS/Leggibilità\" class=\"home_link\">email</a>.
	<br><br><b>Terminology</b><br>
	It uses Poisson statistics, the <a href=\"http://en.wikipedia.org/wiki/Maximum_likelihood\">Maximum Likelihood Estimation</a> and Inverse Document Frequency 
	between the frequency of words in a given document and a generic corpus of 100 million words per language.
	It uses a probabilistic part-of-speech tagger to take into account the probability that a particular sequence of words could 
	be a term. 
	It creates n-grams of words by minimizing the <a href=\"http://en.wikipedia.org/wiki/Information_entropy\">relative entropy</a>. 
	For more information see <a href=\"/terminology-extraction/\"> Terminology Extraction</a>.
	</p>

	<h2><b>I want it!</b></h2>
	<p>
	If you are interested in this technology, please read more about <a href=\"/#about\">Translated Labs</a> and our services for <a href=\"/#about\">natural language processing</a>.
	</p>

	<h2><b>I could do better!</b></h2>
	If you think you could improve these applications, and if you are passionate about information retrieval, natural language processing, machine learning or artificial intelligence in general, 
	you have come to the right place. <a href=\"http://www.translated.net/it/lavora-con-noi.php\">Send us your CV</a>";

 $msg['legend_list']="<font color=\"FF0000\">".$msg['hard']."</font>: this text contains either long sentences and/or long or uncommon words. 
 This implies a low readability index. 
 By modifying the selection of words and the sentence lengths the readability can be easily improved. <br>
<br><font color=\"0000FF\">".$msg['average']."</font>: the difficulty of the text seems to be average. 
The majority of well-written content falls into this category.<br>
<br><font color=\"008800\">".$msg['easy']."</font>: This text is easy to read.  Easy to read, well-written documents can be easily understood by audiences with any education level.<br>";

// -----------------------

?>
