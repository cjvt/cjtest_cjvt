<?php

$call = $argv[1];

require_once(dirname(__FILE__) . '/lib_addison.php');

debug("Getting Addison record");

$bib = library_bib_from_call($call);
if (!$bib)
{
	debug("Couldn't retrieve bib number.  Aborting.");
	return(false);
}
debug("Bib:      $bib");

// get the full catalog record, and then filter it into a smaller array

$xrecord = library_xrecord_from_bib($bib);	
$GLOBALS['last_xrecord'] = $xrecord;

if (!$xrecord)
{
	debug("Couldn't retrieve xrecord.  Aborting.");
	return(false);
}

$simple = simple_array_from_xrecord($xrecord);

foreach ($simple as $k => $v)
{
	foreach ($v as $vx)
	{
		echo str_pad($k . ':', 10, ' ', STR_PAD_RIGHT) . $vx . "\n";
	}
}

function debug($text)
{
	echo "$text\n";
}

//git test

//local modify 2

//edit online

//local modify 3
//local modify 4
//local modify 5
