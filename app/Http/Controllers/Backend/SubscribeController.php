<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SubscribeController extends backendController
{
    public function __construct(Subscribe $model)
    {
        parent::__construct($model);
    }
}
