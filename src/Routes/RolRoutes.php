<?php
declare(strict_types=1);

namespace App\Routes;

use App\Interfaces\IRoutes;
use Slim\App;
use App\Controllers\RolController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RolRoutes implements IRoutes
{
    static public function configure(App $app): void
    {
        $app->get('/apiv1/roles', function (Request $request, Response $response) {
            $payload = json_encode(RolController::read(), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->get("/apiv1/roles/{id}", function (Request $request, Response $response, array $args) {
            $payload = json_encode(RolController::findOne($args['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->post('/apiv1/roles', function (Request $request, Response $response) {
            $params = json_decode(file_get_contents("php://input"));
            $payload = json_encode(RolController::create($params), JSON_PRETTY_PRINT);
            $response->withHeader('Content-Type', 'application/json');
            $response->getBody()->write($payload);
            return $response;
        });

        $app->put('/apiv1/roles/{id}', function (Request $request, Response $response) {
            $params = json_decode(file_get_contents("php://input"), true);
            $payload = json_encode(RolController::update($params), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->delete('/apiv1/roles/{id}', function (Request $request, Response $response, array $args) {
            $payload = json_encode(RolController::delete($args['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });
    }
}