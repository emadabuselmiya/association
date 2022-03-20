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
        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            }elseif ($menu->pages()->first() != null){
                $menus[] = $menu;
            }
        }

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
        if ($menu == null) {
            $menu = SubMenu::where('slug', $slug)->first();
        } elseif (count($menu->submenu ?? []) != 0) {
            $menu = SubMenu::where('slug', $slug)->first();
        }
        dd($menu);

    }

}
