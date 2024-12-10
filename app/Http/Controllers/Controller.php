<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\OpenApi(
 *
 *     @OA\Info(
 *         title="Todo API",
 *         version="1.0.0",
 *         description="This is the API documentation for the Todo app.",
 *
 *         @OA\Contact(
 *             email="your_email@example.com"
 *         ),
 *
 *         @OA\License(
 *             name="Apache 2.0",
 *             url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *         )
 *     ),
 *
 *     @OA\Server(
 *         url="http://localhost:8000",
 *         description="Local Development Server"
 *     )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
