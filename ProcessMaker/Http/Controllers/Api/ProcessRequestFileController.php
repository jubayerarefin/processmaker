<?php

namespace ProcessMaker\Http\Controllers\Api;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use ProcessMaker\Http\Controllers\Controller;
use ProcessMaker\Http\Resources\ApiCollection;
use ProcessMaker\Models\ProcessRequest;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Illuminate\Http\Resources\Json\ResourceCollection;


class ProcessRequestFileController extends Controller
{
    use HasMediaTrait;
    /*
    * return list of Process Request files
    */
    public function index(ProcessRequest $request)
     {
        return new ResourceCollection($request->getMedia());
     }
}
