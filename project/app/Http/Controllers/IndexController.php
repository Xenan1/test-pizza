<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Room;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $config = Config::query()->first();
        $heroSlider = $config->attachments('slider')->get();
        $gallery = $config->attachments('gallery')->get();
        $logo = '/storage/static/logo.png';
        $rooms = Room::query()->with('attachments')->get();

        return view('index', ['config' => $config, 'logo' => $logo, 'rooms' => $rooms, 'heroSlider' => $heroSlider, 'gallery' => $gallery]);
    }
}
