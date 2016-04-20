<?
/* SPELL-CHECKER */
header("Content-type: text/html; charset=utf-8");

include("inc/free-common.inc.php");   //Serve?!?
include("labs_utils.php");

$lang_links = labs_get_lang_links('spell_chk');

$l = labs_user_lang($_SERVER['REQUEST_URI']);
// TODO fix different languages
include("msg_$l.inc.php");
//include("msg_en.inc.php");

$tag_line_id = "comment_spellcheck";

/* TODO: Da dove viene questa variabile???
*/
/*if($srclang=="ar") {
    $dir = "dir=\"RTL\"";
    $jsdir = "'RTL'";
} else {
    $jsdir = "''";
}*/

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?= $msg['title_spell_chk'] ?></title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css" media="screen">
	<link rel="stylesheet" type="text/css" href="spellchecker.css" media="screen">
 	<script type="text/javascript">
 		
 		var msg_ignore = "<?= $msg['js_sc_ignore'] ?>";
 		var msg_add = "<?= $msg['js_sc_add'] ?>";
 		var msg_not_added = "<?= $msg['js_sc_not_added'] ?>";
 		var msg_no_sugg = "<?= $msg['js_sc_no_suggest'] ?>";
 		var msg_search = "<?= $msg['js_sc_search'] ?>";
		
		function load() {
            if (document.getElementById) {  // DOM3 = IE5, NS6
				document.getElementById('hidepage').style.visibility = 'hidden';
			} else {
			  if (document.layers) {  // Netscape 4
				document.hidepage.visibility = 'hidden';
			  } else {  // IE 4
				document.all.hidepage.style.visibility = 'hidden';
		      }
		   }
		}
 	
 	
		function UpdateLanguage() {
            var selIndex = document.getElementById('source_lang').selectedIndex;
            var curr_lang = document.getElementById('source_lang').options[selIndex].value;
            var i = 0;
            var presente = false;
            for(i; i < unsupp_langs.length ;i++) {
                if(unsupp_langs[i] == curr_lang) {
                  presente = true;
              }
            }
            if(presente) {
            	//alert(server_down);
            }
        }

        function ScanAgain() {
            o.rescan();
        }

        function Test() {
            var lang = "it";
			return false;
        }

        
        function CustomMatch(c) {
            //alert(c.charCodeAt(0));
            if(c==';' || c==' ' || c == ',' || c == ':' || c == '.' || c == '_' || c == '-' ||
				c == '#' || c == '§' || c == '*' || c == '+' || c == '[' || c == ']' || c == '^' || c == '?' ||
				c == '|' || c == '!' || c == '\"' || c == '£' || c == '$' || c == '%' || c == '&' || c == '/' ||
				c == '(' || c == ')' || c == '<' || c == '>' || c=='/' ||
				c==String.fromCharCode(8217) || c==String.fromCharCode(8221) || c==String.fromCharCode(8220) || c==String.fromCharCode(10) ) {
                return false;
            }  else {
                return true;
            }
        }
        

        function ShowWaitCursor() {
			var wc = document.getElementById('wait_cursor');
			wc.style.visibility = 'visible';
		}
		
		function HideWaitCursor() {
            var wc = document.getElementById('wait_cursor');
			wc.style.visibility = 'hidden';
		}
		
		function ShowCharsAlarm() {
			var wc = document.getElementById('chars_alarm');
			wc.style.visibility = 'visible';
		}
		
		function HideCharsAlarm(){
		    var wc = document.getElementById('chars_alarm');
			wc.style.visibility = 'hidden';
		}
		
		function open_search(word) {
			window.open("http://www.google.it/search?q="+escape(word),"Google","width=600,height=450,status=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes");		
		}
       
    </script>
    <script type="text/javascript" src="web2.js"></script>
    <noscript>Your browser does not support JavaScript!</noscript>
</head>
<body onload="init();load();" leftmargin="0" topmargin="0" bottommargin="0" rightmargin="0" marginheight="0">
<div id="hidepage" style="position:absolute; left:0px;background-color: #FFFFFF; layer-background-color: #FFFFFF; height: 100%; width: 100%;">
<table width=100%><tr><td>&nbsp;</td></tr></table>
<noscript>Your browser does not support JavaScript!</noscript>
</div>

<? include("top-labs.php") ?>

<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td width="100%">

<center><form name="f">
 <table style="margin-top:0px;margin:0px;width:85%;" border="0" cellpadding="0px" cellspacing="2px">
    <tr>
        <td valign="top" width="90%">
			<div class="labs_label"><?= $msg['type_text'] ?></div>
		</td>
	<td>&nbsp;</td></tr>
	<tr>
        <td valign="top" style="margin:0; padding:0;">
            <textarea name="text" id="edit" style="border:none;width:100%;height: 250px;"></textarea>
             <script type="text/javascript">

					var el, o;

                    function init() {
                        el = document.getElementById('edit');
                        o = new WebFXSpellChecker(el, true);
                    }

                    //window.onload = init;
                    document.f.text.focus();
                </script>
                <noscript>Your browser does not support JavaScript!</noscript>
         </td>
		 <td valign="top">
              <table border="0" cellpadding="0" cellspacing="0">
                <tr><td valign="top">
                    <select multiple style="margin:0px;padding:0px;width:130px;height:226px" size="12" onchange="ScanAgain();" name="s" id="source_lang" >
<?
include("langs_list.php");
$unsupp_langs = Array("fa","ja","zh","zh_TW","tr","he","ar","ko","pap");

foreach($lang_list as $key => $value) {
    if(!in_array($key,$unsupp_langs)) {
        if($key =="auto") {
            echo "<option selected VALUE=\"$key\">$value\n";
        } else {
            echo "<option VALUE=\"$key\">$value\n";
        }
    }
}

?></select></td>
                <td valign="top">
					<div class="alert">[<a href="" class="clean_txt" title="<?= $msg['explanation_auto'] ?>" alt="<?= $msg['explanation_auto'] ?>" onclick="return false;" >?</a>]</div>
				</td>
              <tr>
              <tr>
                <td valign="top">
                    <input style="margin-top:2px;padding:2px;width:130px;" type='submit' value='<?= $msg['spell_chk_submit'] ?>' onclick='ScanAgain();return false;'>
				</td>
				<td>
                    <img id="wait_cursor" style="visibility:hidden;" src="gif/wait20trans.gif">
				</td>
              </tr>              
              </table>
              
     </td></tr>
	<tr>
	    <td align="right"><h2 id="chars_alarm" class="alarm" style="visibility:hidden"><b><?= $msg['spell_chk_characters_alarm'] ?></b></h2></td>
	    <td>&nbsp;</td>
	</tr>
     </table>
     </form>


     </center>
</td></tr>
<tr><td>
<fieldset><legend><?= $msg['legend_title_spell_check'] ?>&nbsp;</legend>
		<div class="info">
			<?= $msg['legend_body_spell_check'] ?>
		</div>
		</fieldset>

</td></tr>
</table>
</body>
</html>
