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
                ->addColumn('actions', function (Menu $menu) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $menu->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('menus.edit', $menu->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions', 'image'])
                ->make(true);
        }

        $menus = Menu::all();
        return view('c-panel.menus.index', compact('menus'));
    }


    public function create()
    {
        $subMenus = SubMenu::all();
        return view('c-panel.menus.create', compact('subMenus'));
    }


    public function store(MenuRequest $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->slug = $request->slug;
        $menu->save();
        return redirect()->route('menus.index');
    }


    public function edit(Menu $menu)
    {
        $subMenus = SubMenu::all();
        if (Websit::first()->url != null) {
            Websit::first()->url = null;
        } else {
            dd('Not Have');
        }
        return view('c-panel.menus.edit', ['menu' => $menu, 'subMenus' => $subMenus]);
    }

    public function update(MenuRequest $request, Menu $menu)
    {
        $data = $request->validated();
//        dd(Websit::first()->url.'/'.$request->link);
//        $data['link'] = Websit::first()->url . '/' . $request->link;
        $menu->update($data);
        return redirect()->route('menus.index')->with('success', 'Menu Updated Successfully!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Menu Deleted Successfully');
        //
    }
}
