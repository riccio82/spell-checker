<?
/*
$word = "maccchina";
$speller = pspell_new("rfg","","","",PSPELL_FAST);

if(pspell_check($speller, $word)) {
        echo "OK\n";
} else {
        print_r(pspell_suggest($speller, $word));
}
*/

/*
$pspell_config = pspell_config_create("it","","","utf-8");
pspell_config_mode($pspell_config, PSPELL_FAST);
pspell_config_personal($pspell_config, "/home/translated/public_html/labs/spell-checker/custom-dicts/custom-it.pws");
$speller = pspell_new_config($pspell_config);;


pspell_add_to_personal($speller,utf8_encode("maccchina"));
pspell_save_wordlist($speller);
*/

include("../../semantix/functions.inc.php");
include("inc/functions-lang-ident.php");
include ("inc/connect.inc.php");

$text = utf8_encode("this is a simple test");

print_r(get_lang_with_spell($text,$mysql_link,"","UTF-8","LANG_IDENT_PATTERNS"));


?>
