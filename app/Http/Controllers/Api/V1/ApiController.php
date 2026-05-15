<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiResponses;


class ApiController extends Controller
{
    use ApiResponses;
    public function include(string $relationship) : bool {
        // get include query parameter in URL
        $param = request()->query('include');

        if (!isset($param)) {
            return false;
        }

        $includeValues = explode(',', strtolower($param));

        return in_array(strtolower($relationship), $includeValues);
    }
}
