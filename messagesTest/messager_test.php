<?php 	
	require_once '/../vendor/autoload.php';

	use Tgallice\FBMessenger\Client;
	use Tgallice\FBMessenger\Messenger;

	$client = new Client('EAAB1PB7ys6IBACZC8nndluOHIiOUZCxTOWKV3ZAnp33TffitUYuR9v3LswlIcVPZCOl2ClT3VT8fpE6cRV14PT19ZBcpSbOp1ySNH4TjsOdM46FmWyp3aKpzBJhZCsovK9pZAN9LYmn7gZA2AIipT23D8FHS3Ks3ziUD30pTfZA29uwZDZD');
	$messenger = new Messenger($client);

	$pageAccessToken = "EAAB1PB7ys6IBACZC8nndluOHIiOUZCxTOWKV3ZAnp33TffitUYuR9v3LswlIcVPZCOl2ClT3VT8fpE6cRV14PT19ZBcpSbOp1ySNH4TjsOdM46FmWyp3aKpzBJhZCsovK9pZAN9LYmn7gZA2AIipT23D8FHS3Ks3ziUD30pTfZA29uwZDZD";
	
	// Or quick factory
	$messenger = Messenger::create($pageAccessToken);
	
	$response = $messenger->sendMessage('100012293529512', 'My Message gehteheheheh');
		
?>