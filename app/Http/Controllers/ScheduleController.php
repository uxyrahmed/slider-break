<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $bgImage = 'https://picsum.photos/1920/1080';
        $heading = 'Welcome to my website';

        return view('schedule', compact('bgImage', 'heading'));
    }
}
