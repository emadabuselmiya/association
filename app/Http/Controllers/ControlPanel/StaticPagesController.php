<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PageTag;
use App\Models\StaticPages;
use App\Models\SubMenu;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StaticPagesController extends Controller
{

    public function index()
    {

        $pages = StaticPages::first();

        if(!$pages)
        {
            $pages = StaticPages::create([

            ]);
        }
//        dd($pages);
        return view('c-panel.pages.static.edit', [
            'page' => $pages,
        ]);
    }

    public function update($id,Request $request)
    {
        $page = StaticPages::findOrFail($id);
        $data = $request->validate([
            'title' => 'string|required',
            'main_image' => 'image|required|mimes:jpg,png,jpeg',
            'description' => 'required',
            'vision' => 'required',
            'message' => 'required',
            'objectives' => 'required',
        ]);

        $image = $page->main_image;

        if ($request->hasFile('main_image') && $request->file('main_image')->isValid()) {
            Storage::disk('public')->delete($image);
            $image = $request->file('main_image')->store('pages', 'public');
            $data['main_image'] = $image;
        }

        $page->update($data);
        return redirect()->route('static.edit')->with('success','تم التعديل بنجاح');
    }


}
