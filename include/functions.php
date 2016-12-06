<?php

function reduireText($text)
{
	$mots = explode(' ', $text);
	$nbMots = sizeof($mots);
	if($nbMots > 30)
		$nbMots = 30;

	$newText = array();
	for($i = 0; $i < $nbMots; $i++)	
		$newText []= $mots[$i];
	
	return implode(' ', $newText).'...';
}

?>