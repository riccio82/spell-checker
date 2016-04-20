<?

$dictionary = "en";
$word = "wikipedia";

$res = "res=false;\n";
$pspell_config = @pspell_config_create($dictionary,"","","utf-8");
@pspell_config_mode($pspell_config, PSPELL_FAST);
@pspell_config_personal($pspell_config, "/home/translated/public_html/labs/spell-checker/custom-dicts/custom-".$dictionary.".pws");
$speller = @pspell_new_config($pspell_config);
if(!$speller) {
	echo "Lingua non supportata";
} else {
	pspell_add_to_personal($speller, $word);
	pspell_save_wordlist($speller);
}

$pspell_config = pspell_config_create($dictionary,"","","utf-8");
pspell_config_mode($pspell_config, PSPELL_FAST);
pspell_config_personal($pspell_config, "custom-dicts/custom-$dictionary.pws");
$speller = pspell_new_config($pspell_config);

if (pspell_check($speller, stripslashes($word))) {
	echo "OK";
} else {
	$suggestions = pspell_suggest($speller, $word);
	print_r($suggestions);
}

?>
