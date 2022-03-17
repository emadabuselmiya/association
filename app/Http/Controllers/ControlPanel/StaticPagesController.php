<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PageTag;
use App\Models\SubMenu;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StaticPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pages = Page::where('status', 1)->get();
            return datatables()->of($pages)
                ->editColumn('main_image', function (Page $page) {
                    return '<img src="' . asset('storage/' . $page->main_image) . '" width="50" alt="' . $page->title . '">';
                })
                ->addColumn('actions', function (Page $page) {

                    $edit = ' <a href="' . route('pages.edit', $page->id) . '" class="btn btn-sm btn-primary">تعديل</a>';
                    $show = ' <a href="' . route('pages.show', $page->id) . '" class="btn btn-sm btn-success">عرض</a>';

                    return $edit . $show;

                })
                ->rawColumns(['actions', 'main_image'])
                ->make(true);
        }
        $pages = Page::where('status', 1)->get();
        return view('c-panel.pages.index', [
            'pages' => $pages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();

//        dd(Menu::has('subMenus')->get());
        return view('c-panel.pages.create', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $data = $request->validated();

        $image = null;

//        dd($data);
        DB::beginTransaction();

        try {
            if ($request->hasFile('main_image') && $request->file('main_image')->isValid()) {
                $image = $request->file('main_image')->store('pages', 'public');
            }

            $data['main_image'] = $image;

            $page = Page::create($data);

            $this->insertTags($data['tags'], $page);

            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $file) {
                    $image = $file->store('pages', 'public');
                    $page->images()->create([
                        'image' => $image,
                    ]);
                }
            }

            DB::commit();

        } catch (Throwable $e) {
            DB::rollBack();

            return $e;
        }

        return redirect()->route('static.index')->with('success', __('Page ') . $page->name . __(' Created Done!'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('c-panel.pages.show', [
            'page' => $page,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $menus = Menu::all();
        $tags = $page->tags()->pluck('name')->toArray();
        $tags = implode(', ', $tags);

        return view('c-panel.pages.edit', [
            'page' => $page,
            'tags' => $tags,
            'menus' => $menus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {

        $data = $request->validated();

        $image = $page->main_image;

        DB::beginTransaction();

        try {

            if ($request->hasFile('main_image') && $request->file('main_image')->isValid()) {
                Storage::disk('public')->delete($image);
                $image = $request->file('main_image')->store('pages', 'public');
                $data['main_image'] = $image;
            }


            foreach ($page->images as $gallery) {
                if ($request->has("check_" . $gallery->id) == 1) {
                    Storage::disk('public')->delete($gallery->image);
                    $gallery->delete();
                }
            }


            $page->update($data);
            $this->insertTags($data['tags'], $page);
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $file) {
                    $gallery_image = $file->store('pages', 'public');
                    $page->images()->create([
                        'image' => $gallery_image,
                    ]);
                }
            }
            DB::commit();

        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('pages.index')
                ->with('error', 'Operation failed');
        }

        return redirect()->route('static.index')->with('success', __('Page ') . $page->name . __(' Updated Done!'));

    }

    protected function insertTags($tags, $page)
    {
        PageTag::where('page_id', $page->id)->delete();
        $tags_ids = [];
        if ($tags) {
            $tags_array = explode(',', $tags);
            foreach ($tags_array as $tag_name) {
                $tag_name = trim($tag_name);
                $tag = Tag::where('name', $tag_name)->first();
                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $tag_name,
                    ]);
                }
                PageTag::create([
                    'page_id' => $page->id,
                    'tag_id' => $tag->id,
                ]);
            }
        }

    }

    public function getSubMenus($subid = 0)
    {
        $subMenu = SubMenu::where('menu_id', $subid)->get();
//        dd($subMenu);
//        $a = "";
//        foreach($subMenu as $s){
//            $a.="<option value='".$s->id."'>".$s->name."</option>";
//        }
        return response()->json($subMenu);
    }
}
