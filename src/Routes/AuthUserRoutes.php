<?php
declare(strict_types=1);

namespace App\Routes;

use App\Interfaces\IRoutes;
use Slim\App;
use App\Controllers\AuthUserController;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AuthUserRoutes implements IRoutes
{
    static public function configure(App $app): App
    {
        $app->post("/login", function (Request $request, Response $response, array $args) {
            $params = json_decode(file_get_contents("php://input"), true);
            $payload = json_encode(AuthUserController::validateAccess($params['username'], $params['password']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });
        return $app;
    }
}