<?php

$databaseCredentialsFile = __DIR__ . '/../private/Configuration.php';
$databaseDumpFile = $argv[1];

if (file_exists($databaseCredentialsFile) && file_exists($databaseDumpFile)) {
	require_once ($databaseCredentialsFile);

	$cmd = 'cat '.$databaseDumpFile.' > mysql '.$GLOBALS['TYPO3_CONF_VARS']['DB']['database'].' -u'.$GLOBALS['TYPO3_CONF_VARS']['DB']['username'].' -p'.$GLOBALS['TYPO3_CONF_VARS']['DB']['password'].' -h'.$GLOBALS['TYPO3_CONF_VARS']['DB']['host'];

	echo $cmd;
	return system($cmd);

} else {
		return -1;
}


?>
