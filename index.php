<?php

require __DIR__ . '/vendor/autoload.php';


use \LINE\LINEBot\SignatureValidator as SignatureValidator;

// load config
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// initiate app
$configs =  [
	'settings' => ['displayErrorDetails' => true],
];
$app = new Slim\App($configs);

/* ROUTES */
$app->get('/', function ($request, $response) {
	return "Lanjutkan!";
});

$app->post('/', function ($request, $response)
{
	// get request body and line signature header
	$body 	   = file_get_contents('php://input');
	$signature = $_SERVER['HTTP_X_LINE_SIGNATURE'];

	// log body and signature
	file_put_contents('php://stderr', 'Body: '.$body);

	// is LINE_SIGNATURE exists in request header?
	if (empty($signature)){
		return $response->withStatus(400, 'Signature not set');
	}

	// is this request comes from LINE?
	if($_ENV['PASS_SIGNATURE'] == false && ! SignatureValidator::validateSignature($body, $_ENV['CHANNEL_SECRET'], $signature)){
		return $response->withStatus(400, 'Invalid signature');
	}

	// init bot linenya
	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV['CHANNEL_ACCESS_TOKEN']);
	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV['CHANNEL_SECRET']]);
	$data = json_decode($body, true);
	foreach ($data['events'] as $event)
	{	
	if($userMessage == "kamu"){
$confirmTemplateBuilder = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder(
   "Apakah Kamu $user ?",
   [
   new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder('Ya',"/ya"),
   new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder('Tidak','/tidak'),
   ]
   );
$templateMessage = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder('nama template', $confirmTemplateBuilder);
$result = $bot->replyMessage($event['replyToken'], $templateMessage);
return $result->getHTTPStatus() . ' ' . $result->getRawBody();
}
		
	{
		$userMessage = $event['message']['text'];
		if(strtolower($userMessage) == 'alo')
			
		{
			
			$message = "Halo Silahkan Pilih Pada Bagian Menu kk";
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		
		}
		
		
	}
{
		if($userMessage == "Tips Fashion"){
$carouselTemplateBuilder = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder([
  new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder("Niko Chong", "Fashion Designer","https://i0.wp.com/angryanimebitches.com/wp-content/uploads/2013/03/tamakomarket-overallreview-tamakoanddera.jpg",[
  new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder('Lihat Yuk',"http://interstudifashion.com/"),
  ]),
	
  new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder("Adji Notonegoro", "Fashion World","https://i0.wp.com/angryanimebitches.com/wp-content/uploads/2013/03/tamakomarket-overallreview-tamakoanddera.jpg",[
  new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder('Lihat Yuk',"http://interstudisekretaris.com/"),
  ]),
  ]);
$templateMessage = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder('nama template',$carouselTemplateBuilder);
$result = $bot->replyMessage($event['replyToken'], $templateMessage);
return $result->getHTTPStatus() . ' ' . $result->getRawBody();
}
		
		
	}
	
	
});

// $app->get('/push/{to}/{message}', function ($request, $response, $args)
// {
// 	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV['CHANNEL_ACCESS_TOKEN']);
// 	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV['CHANNEL_SECRET']]);

// 	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($args['message']);
// 	$result = $bot->pushMessage($args['to'], $textMessageBuilder);
// 	return $result->getHTTPStatus() . ' ' . $result->getRawBody();
//	Coding By Bobien Martien 
// });

/* JUST RUN IT */
$app->run();
