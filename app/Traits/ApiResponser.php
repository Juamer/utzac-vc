<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait ApiResponser {

    /*
    Gestiona los mensajes y respuestas de la API
    */

    private function successResponse($data,  $code) {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code) {
        return response()->json([
            'error' => true,
            'msg' => $message, 
            'code' => $code
        ]);
    }

    protected function showAll(Collection $collection, $code=200) {
        $collection = $this->cacheResponse($collection);
        return $this->successResponse(['data' => $collection],
        $code);
    }

    protected function showOne($instance, $message, $code) {
        return response()->json([
            'error' => false,
            'msg' => $message, 
            'data' => $instance,
            'code' => $code
        ]);
    }

    protected function caheResponse($data)
    {
        $url=request()->url();
        $queryParams=request()->query();
        ksort($queryParams);
        $queryString=http_build_query($queryParams);
        $fulUrl="{$url}?{$queryString}";
        return Cache::remember($fullUrl, 30/60, function () use
        ($data){
            return $data;
        });

    }

}