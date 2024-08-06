<?php
declare(strict_types=1);

namespace App\Routes;

use App\Interfaces\IRoutes;
use Slim\App;
use App\Controllers\UserController;
use App\helpers\Upload;
use App\Middlewares\Validate;
use Nyholm\Psr7\Response;
use Nyholm\Psr7\ServerRequest as Request;

class UserRoutes implements IRoutes
{
    static function configure(App $app): void
    {
        $app->get("/apiv1/users", function (Request $request, Response $response) {
            $payload = json_encode(UserController::read());
            $response->getBody()->write($payload);
            return $response;
        })->add(new Validate());

        $app->delete("/apiv1/users/{id}", function (Request $request, Response $response, array $args) {
            $payload = json_encode(UserController::delete($args['id']));
            $response->getBody()->write($payload);
            return $response;
        })->add(new Validate());

        $app->get("/apiv1/users/{id}", function (Request $request, Response $response, array $args) {
            $payload = json_encode(UserController::findOne($args['id']), JSON_PRETTY_PRINT);
            $response->getBody()->write($payload);
            return $response;
        })->add(new Validate());

        $app->post("/apiv1/users/create/", function (Request $request, Response $response) {
            $params = $request->getParsedBody();
            $directory = $params['directory'];
            if ($params) {
                $files = Upload::save($request, $directory);
                $params['picture_profile'] = $files;
                $payload = json_encode(UserController::create($params));
                $response->getBody()->write($payload);
                return $response;
            }
            return $response;
        });

        $app->post("/apiv1/users/{id}", function (Request $request, Response $response) {

            $params = $request->getParsedBody();
            $directory = $params['directory'];
            $files = Upload::save($request, $directory);
            $params['picture_profile'] = $files;
            $payload = json_encode(UserController::update($params));
            $response->getBody()->write($payload);
            return $response;
        });

        $app->post("/apiv1/check-email", function (Request $request, Response $response) {
            #php://input access body request
            $params = json_decode(file_get_contents('php://input'), true);
            $email = $params['email'];
            #return email or false if email is false
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response->getBody()->write('Invalid email');
                $response->withStatus(400);
                return $response;
            }
            $payload = json_encode(UserController::checkEmail($email));
            $response->getBody()->write($payload);
            return $response;
        });

        $app->get("/apiv1/check-username/{username}", function (Request $request, Response $response, array $args) {
            $payload = json_encode(UserController::checkUsername($args['username']));
            $response->getBody()->write($payload);
            return $response;
        });
    }
}