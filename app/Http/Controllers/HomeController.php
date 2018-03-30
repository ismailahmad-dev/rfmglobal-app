<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        protected ProductRepositoryInterface $products
    ) {}

    public function index(): View
    {
        return view('pages.home', [
            'products' => $this->products->getActive(),
        ]);
    }
}
