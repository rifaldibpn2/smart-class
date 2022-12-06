<?php
namespace App\Http\API;

use App\Helpers\ApiFormat;
use App\Models\DataObject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObjectApi extends Controller
{
    public function index()
    {
        $data = DataObject::all();
        if ($data) {
            return ApiFormat::createResponse($data, 'DataObject', 200);
        } else {
            return ApiFormat::createResponse(null, 'Error', 404);
        }
    }
}

?>