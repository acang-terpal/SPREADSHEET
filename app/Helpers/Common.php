<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

if(!function_exists('logQueryBuilder')){
    function logQueryBuilder($queryBuilder){
        Log::info("query : " . print_r($queryBuilder->toSql(), true));
        Log::info("query binding : " . print_r($queryBuilder->getBindings(), true));
    }

}
