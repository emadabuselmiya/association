<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Menu;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\SubMenu;
use App\Models\Team;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $slider = Slider::latest()->first();
        $services = Service::take(6)->get();
        $news = Blog::take(6)->get();
        $projects = Project::take(3)->get();
        $teams = Team::orderBy('created_at', 'asc')->take(4)->get();
        $menus = Menu::all();

        return view('site.home', [
            'slider' => $slider,
            'services' => $services,
            'news' => $news,
            'projects' => $projects,
            'teams' => $teams,
            'menus' => $menus,
        ]);
    }

    public function view_page($slug)
    {
        $menu = Menu::where('slug', $slug)->first();
        if ($menu == null){
            $menu = SubMenu::where('slug', $slug)->first();
        }
        dd($menu);

    }

}
