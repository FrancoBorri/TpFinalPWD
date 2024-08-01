<?php
declare(strict_types=1);

namespace App\Routes;

use App\Interfaces\IRoutes;
use Slim\App;
use App\Controllers\FilmController;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class FilmRoutes implements IRoutes
{

    static public function configure(App $app): void
    {
        $app->get("/apiv1/films", function (Request $request, Response $response) {
            $payload = json_encode(FilmController::read(), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->get("/apiv1/films/{id}", function (Request $request, Response $response, array $args) {
            $payload = json_encode(FilmController::findOne($args['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->post("/apiv1/films", function (Request $request, Response $response) {
            $params = json_decode(file_get_contents('php://input'), TRUE);
            $payload = json_encode(FilmController::create($params), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->put("/apiv1/films/{id}", function (Request $request, Response $response, array $args) {
            $payload = json_encode(FilmController::update($args['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->delete("/apiv1/films/{id}", function (Request $request, Response $response, array $args) {
            $payload = json_encode(FilmController::delete($args['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

    }
}