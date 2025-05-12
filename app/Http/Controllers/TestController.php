<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BlogRepository;

class TestController extends Controller
{
    private $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function test()
    {
        /**
         * Run command php artisan db:seed --class=UserSeeder & php artisan db:seed --class=BlogSeeder, add data test to DB
         */
        $rs = $this->blogRepository->all();

        return response()->json([
            $rs,
        ]);
    }
}
