<?php

namespace App\Http\Controllers;

use App\Attributes\Inject;
use App\Services\SomeService;

class SomeController extends Controller
{
    #[Inject]
    private SomeService $myService;

    public function index()
    {
        return $this->myService->foo();
    }
}
