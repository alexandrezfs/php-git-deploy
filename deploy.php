<?php

	use PhpDeploy\Command;

	require_once __DIR__ . '/vendor/autoload.php';

	$replyArray = array();
	$commandArgsArray = array(
		'appBasePath' => '/code',
		'branchToUpdate' => 'master'
	);

	if (!$_GET) {
		$replyArray['error'][] = '$_GET is undefined !';
		echo json_encode($replyArray);
		return;
	}

	$requiredArgs = array(
		'branchToUpdate',
		'appBasePath'
	);

	foreach ($requiredArgs as $requiredArg) {
		if (!isset($_GET[$requiredArg])) {
			$replyArray['error'][] = $requiredArg . ' is not defined !';
		}
		else {
			$commandArgsArray[$requiredArg] = $_GET[$requiredArg];
		}
	}

	if (isset($replyArray['error'])) {
		echo json_encode($replyArray);
	}
	else {
		$shell = new Command($commandArgsArray['appBasePath'], $commandArgsArray['branchToUpdate']);
		$shell->deploy();
	}