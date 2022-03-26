<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Menu;
use App\Models\PhotoAlbum;
use App\Models\PhotoAlbumImages;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\StaticPages;
use App\Models\Statistics;
use App\Models\Team;
use App\Models\VedioAlbum;
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
        $about = StaticPages::first();
        $statistics = Statistics::paginate(2);

        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            } elseif ($menu->pages()->first() != null) {
                $menus[] = $menu;
            } elseif ($menu->static == 1) {
                $menus[] = $menu;
            }
        }

        return view('site.home', [
            'slider' => $slider,
            'services' => $services,
            'statistics' => $statistics,
            'about' => $about,
            'news' => $news,
            'projects' => $projects,
            'teams' => $teams,
            'menus' => Menu::where('parent_id', 0)->get(),
        ]);
    }

    public function projects(Request $request)
    {
        $projects = [];
        if (isset($request->search)) {
            $projects = Project::when($request->search, function ($query, $title) {
                $query->where('title', 'LIKE', '%' . $title . '%');
            })
                ->paginate();
        } else {
            $projects = Project::paginate(3);

        }

        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            } elseif ($menu->pages()->first() != null) {
                $menus[] = $menu;
            } elseif ($menu->static == 1) {
                $menus[] = $menu;
            }
        }

        return view('site.projects', [
            'projects' => $projects,
            'menus' => Menu::where('parent_id', 0)->get(),
            'search' => $request->search ?? '',
        ]);
    }

    public function news(Request $request)
    {
        $news = [];
        if (isset($request->search)) {
            $news = Blog::when($request->search, function ($query, $title) {
                $query->where('title', 'LIKE', '%' . $title . '%');
            })
                ->paginate();
        } else {
            $news = Blog::paginate(6);

        }

        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            } elseif ($menu->pages()->first() != null) {
                $menus[] = $menu;
            } elseif ($menu->static == 1) {
                $menus[] = $menu;
            }
        }

        return view('site.news', [
            'news' => $news,
            'menus' => Menu::where('parent_id', 0)->get(),
            'search' => $request->search ?? '',
        ]);
    }

    public function video_album()
    {

        $videos = VedioAlbum::paginate(4);


        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            } elseif ($menu->pages()->first() != null) {
                $menus[] = $menu;
            } elseif ($menu->static == 1) {
                $menus[] = $menu;
            }
        }

        return view('site.video-album', [
            'videos' => $videos,
            'menus' => $menus,
        ]);
    }

    public function photo_album()
    {

        $albums = PhotoAlbum::paginate(6);


        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            } elseif ($menu->pages()->first() != null) {
                $menus[] = $menu;
            } elseif ($menu->static == 1) {
                $menus[] = $menu;
            }
        }

        return view('site.photo-album', [
            'albums' => $albums,
            'menus' => $menus,
        ]);
    }

    public function photos($id)
    {

        $album = PhotoAlbum::findOrFail($id);

        $photos = PhotoAlbumImages::where('photo_album_id', $album->id)->paginate(12);

        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            } elseif ($menu->pages()->first() != null) {
                $menus[] = $menu;
            } elseif ($menu->static == 1) {
                $menus[] = $menu;
            }
        }

        return view('site.photos', [
            'album' => $album,
            'photos' => $photos,
            'menus' => $menus,
        ]);
    }

    public function about_us()
    {
        $about = StaticPages::first();
        $statistics = Statistics::paginate(4);
        $clients = Client::paginate();

        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            } elseif ($menu->pages()->first() != null) {
                $menus[] = $menu;
            } elseif ($menu->static == 1) {
                $menus[] = $menu;
            }
        }

        return view('site.aboutus', [
            'statistics' => $statistics,
            'clients' => $clients,
            'about' => $about,
            'menus' => $menus,
        ]);
    }

    public function post_details($id)
    {
        $new = Blog::findOrFail($id);
        $new1 = Blog::where('id', $id + 1)->first();
        $new2 = Blog::where('id', $id - 1)->first();
        $news = Blog::paginate(3);

        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            } elseif ($menu->pages()->first() != null) {
                $menus[] = $menu;
            } elseif ($menu->static == 1) {
                $menus[] = $menu;
            }
        }

        return view('site.postdetails', [
            'new' => $new,
            'new1' => $new1,
            'new2' => $new2,
            'news' => $news,
            'menus' => $menus,
        ]);
    }

    public function contact_us()
    {

        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            } elseif ($menu->pages()->first() != null) {
                $menus[] = $menu;
            } elseif ($menu->static == 1) {
                $menus[] = $menu;
            }
        }

        return view('site.contactus', [
            'menus' => $menus,
        ]);
    }

    public function save_contact_us(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'phone' => 'required|max:150',
            'email' => 'required|email|max:150',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        toastr()->success('تم العملية بنجاح');


        return redirect()->route('site.contact-us');
    }

    public function view_page($slug)
    {

        $menus = [];
        foreach (Menu::where('parent_id', 0)->get() as $menu) {
            if ($menu->pages()->first() == null && count($menu->child) != 0) {
                $menus[] = $menu;
            } elseif ($menu->pages()->first() != null) {
                $menus[] = $menu;
            } elseif ($menu->static == 1) {
                $menus[] = $menu;
            }
        }

        $menu = Menu::where('slug', $slug)->first();

        if ($menu->pages()->first() == null) {
            return redirect()->back();
        }

        return view('site.page', [
            'menus' => $menus,
            'page' => $menu->pages,
        ]);

    }

}
