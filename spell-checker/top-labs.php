<?

$lang_tl = "?l=".$l;

if($l=="en") {
	$lang_tl = "";
}

?><table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<a href="/<?= $lang_tl  ?>"><img src="gif/logo_labs2.gif" style="margin-top:2px;margin-bottom:2px;" title="<? echo $msg['title_logo'];?>" alt="<? echo $msg['alt_logo']; ?>"></a>
			</td>
			<td valign="middle" align="right">
			    <table border="0" cellpadding="0" cellspacing="0">
			    <?
			        // if(!$hide_languages) {
			         if(true) {
				?>
				    <tr>
	    			<td valign="top">
						<?
						if($l=="en") {
						    ?>
                            <b class="small" style="color:#0066cc"><?= $msg['choose_alt_en']; ?></b>
							<?
						} else {
						    ?>
						    <a class="small" href="<?= $lang_links['en'] ?>" ><?= $msg['choose_alt_en']; ?></a>
						    <?
						}
						?>
	      			</td>
		      		<td style="color:#0066cc">
							&nbsp;|&nbsp;
					</td>
		    		<td valign="top">
		    		    <?
						if($l=="it") {
						    ?>
						    <b class="small" style="color:#0066cc"><?= $msg['choose_alt_it']; ?></b>
						    <?
						} else {
						    ?>
						    <a class="small"  href="<?= $lang_links['it'] ?>" ><?= $msg['choose_alt_it']; ?></a>
						    <?
						}
						?>
		        	</td>
        			<td style="color:#0066cc">
							&nbsp;|&nbsp;
					</td>
    				<td valign="top">
    				    <?
						if($l=="fr") {
						    ?>
						    <b class="small" style="color:#0066cc"><?= $msg['choose_alt_fr']; ?></b>
							<?
						} else {
						    ?>
						    <a class="small" href="<?= $lang_links['fr'] ?>" ><?= $msg['choose_alt_fr']; ?></a>
						    <?
						}
						?>
    					
    				</td>
    				</tr>
    				<? } ?>
  				</table>
  				<br>
  				<br>
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
	    				<td valign="middle" height="17">
	    					<a href="/<?= $lang_tl  ?>" class="home_link"><b><u><?= $msg['link_home_labs'] ?></u></b></a>
	    				</td>
	    				<td style="color:#0066cc">
							&nbsp;|&nbsp;
						</td>
	    				<td  valign="middle" height="17">
	    					<a href="http://www.translated.net/" class="home_link"><?= $msg['link_home_trans'] ?></a>
	    				</td>
	    				<td style="color:#0066cc">
							&nbsp;|&nbsp;
						</td>
	    				<td  valign="middle" height="17">
	    					<a href="mailto:info@translated.net?subject=LABS/Comments" class="home_link"><?= $msg['link_contacts'] ?></a>
	    				</td>
						<td style="color:#0066cc">
							&nbsp;|&nbsp;
						</td>
	    				<td  valign="middle" height="17">
	    					<a href="/<?= $lang_tl  ?>#about" class="home_link"><?= $msg['link_about'] ?></a>
	    				</td>
    				</tr>
				</table>
			</td>
		</tr>
	</table>
</td></tr>
<tr><td height="1px" bgcolor="#0066CC"></td></tr>
<tr><td>
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td valign="top">
				<h1 class="labs"><b><?= $msg[$tag_line_id] ?></b></h1>
			</td>
			<td  valign="top" align="right">

			</td>
		</tr>
	</table>
</td></tr>
<tr><td>&nbsp;</td></tr>
</table>
