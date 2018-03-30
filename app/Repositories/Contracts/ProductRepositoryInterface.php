<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function getActive(): Collection;
}
