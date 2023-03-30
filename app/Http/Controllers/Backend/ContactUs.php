<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContactUs extends backendController
{
    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }
}
