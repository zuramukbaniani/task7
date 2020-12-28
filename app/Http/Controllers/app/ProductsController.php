<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class ProductsController extends Controller
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->middleware('auth:api');
        $this->request = $request;
    }
    public function index()
    {
        return $this->request->user()->id;
    }
}
