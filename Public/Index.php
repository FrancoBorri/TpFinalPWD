<?php
declare(strict_types=1);
require __DIR__ . '/../env.php';


use App\Routes\UserRoutes;
use App\Routes\FilmRoutes;
use App\Routes\NoticeRoutes;
use App\Routes\AuthUserRoutes;
use Slim\Factory\AppFactory;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Allow: GET, POST, PUT, DELETE, OPTIONS");

$app = AppFactory::create();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);
UserRoutes::configure($app);
FilmRoutes::configure($app);
NoticeRoutes::configure($app);
AuthUserRoutes::configure($app);
$app->run();
