<?php

namespace App\Http\Controllers;

use App\Models\MapPool;
use Illuminate\Http\Request;

class MappoolController extends Controller
{
    public function index()
    {
        $bgImage = 'https://picsum.photos/1920/1080';
        $heading = 'Welcome to my website';
        $mappools = MapPool::query()->get();

        $maps = MapPool::query()->get()->map(function (MapPool $mapPool) {
            return $mapPool->maps;
        })->flatten();

        return view('mappool', compact('bgImage', 'heading', 'mappools', 'maps'));
    }

}
