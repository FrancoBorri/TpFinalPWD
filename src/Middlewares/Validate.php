<?php
declare(strict_types=1);

namespace App\Middlewares;

use App\helpers\Create_JWT;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nyholm\Psr7\Response as Psr7Response;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class Validate
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $response = new Psr7Response;

        if ($request->getHeaderLine("Authorization")) {
            $aut = (string)($request->getHeaderLine("Authorization"));

            $jwt = explode(" ", $aut);
            $checked = Create_JWT::check($jwt[1]);
            /*
            (
            [sub] => 1234567890
            [name] => John Doe
            [iat] => 1516239022
            [exp] => 1516242622
             )
            */
            if (time() > $checked->exp) {
                $resp = json_encode(['message' => "Access denied token not valid" . time()], JSON_PRETTY_PRINT);
                $response->getBody()->write($resp);
                return $response->withStatus(403);
            }
            return $handler->handle($request);
        } else {
            $resp = json_encode(['message' => 'Access denied'], JSON_PRETTY_PRINT);
            $response->getBody()->write($resp);
            return $response->withStatus(403);
        }
    }
}