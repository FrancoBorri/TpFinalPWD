<?php
declare(strict_types=1);

namespace App\Routes;

use App\Interfaces\IRoutes;
use Slim\App;
use App\Controllers\NoticeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class NoticeRoutes implements IRoutes
{
    static public function configure(App $app): void
    {
        $app->get("/apiv1/notices", function (Request $request, Response $response) {
            $payload = json_encode(NoticeController::read(), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->get("/apiv1/notices/{id}", function (Request $request, Response $response, array $args) {
            $payload = json_encode(NoticeController::findOne($args["id"]), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->post("/apiv1/notices", function (Request $request, Response $response) {
            $params = json_decode(file_get_contents('php://input'));
            $payload = json_encode(NoticeController::create($params), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->put("/apiv1/notices/{id}", function (Request $request, Response $response) {
            $params = json_decode(file_get_contents('php://input'));
            $payload = json_encode(NoticeController::update($params), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

        $app->delete("/apiv1/notices/{id}", function (Request $request, Response $response, array $args) {
            $payload = json_encode(NoticeController::delete($args['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        });

    }
}