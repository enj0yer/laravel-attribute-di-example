<?php

namespace App\Http\Controllers;

use App\Attributes\Inject;
use App\Services\SomeService;
use App\Traits\CanInjectProperties;

class SomeController extends Controller
{
    use CanInjectProperties;
    
    #[Inject]
    private SomeService $myService;

    public function index()
    {
        return $this->myService->foo();
    }
}
