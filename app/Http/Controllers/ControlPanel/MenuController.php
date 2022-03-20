<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Websit;
use Illuminate\Http\Request;
use function dd;
use function redirect;
use function validator;
use function view;

class MenuController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $menus = Menu::all();
            return datatables()->of($menus)
                ->addColumn('parent', function (Menu $menu) {
                    return $menu->parent->name ?? 'رئيسي';
                })
                ->addColumn('actions', function (Menu $menu) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $menu->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('menus.edit', $menu->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions', 'image'])
                ->addIndexColumn()
                ->make(true);
        }

        $menus = Menu::all();
        return view('c-panel.menus.index', compact('menus'));
    }


    public function create()
    {
        $menus = Menu::where('parent_id', 0)->get();

        return view('c-panel.menus.create', [
            'menus' => $menus
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'link' => 'required|string',
            'slug' => 'required|string|unique:menus,slug',
            'parent_id' => 'required',
        ]);
        Menu::create($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu Created Successfully!');
    }


    public function edit(Menu $menu)
    {
        $menus = Menu::where('parent_id', 0)->get();
        return view('c-panel.menus.edit', [
            'menu' => $menu,
            'menus' => $menus,
        ]);
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string',
            'link' => 'required|url|string',
            'slug' => "required|string|unique:menus,slug, $menu->id",
        ]);

        $menu->update($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu Updated Successfully!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Menu Deleted Successfully');
    }
}
