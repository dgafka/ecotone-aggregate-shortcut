<?php

use Ecotone\App\Twitter;
use Ecotone\App\TwitterRepository;
use Ecotone\App\TwitterService;
use Ecotone\Lite\EcotoneLiteApplication;
use PHPUnit\Framework\Assert;

require __DIR__ . "/vendor/autoload.php";

$application = EcotoneLiteApplication::boostrap([]);
// normally fetched from your DI container
/** @var TwitterRepository $repository */
$twitterRepository = $application->getGatewayByName(TwitterRepository::class);
/** @var TwitterService $twitterService */
$twitterService = $application->getGatewayByName(TwitterService::class);


echo "Saving twit using Repository Interface\n";
$id = "123";
$content = "This is impressive!";
$twitterRepository->save(new Twitter($id, $content));


echo "Fetching twit using Repository Interface\n";
$twitter = $twitterRepository->getTwitter($id);
echo $twitter->getContent() . "\n";


echo "Changing content to `New Twit!` using Twitter Service Interface\n";
$twitterService->changeContent($id, "New Twit!");


echo "Fetching twit content using Twitter Service Interface\n";
$content = $twitterService->getContent($id);
echo $content . "\n";