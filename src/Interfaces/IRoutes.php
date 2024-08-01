<?php
declare(strict_types=1);

namespace App\Interfaces;

use Slim\App;
use Nyholm\Psr7\Response;

interface IRoutes
{
    static public function configure(App $app);
}