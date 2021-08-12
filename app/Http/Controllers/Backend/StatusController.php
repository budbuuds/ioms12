<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $data['active'] = 'status';
        return view('backend/page/status/index', $data);
    }
}
