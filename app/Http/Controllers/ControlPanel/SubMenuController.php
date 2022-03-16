<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subMenus = SubMenu::all();
            return datatables()->of($subMenus)
                ->addColumn('actions', function (SubMenu $sub) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $sub->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('sub-menus.edit', $sub->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->addColumn('parent', function (SubMenu $sub) {
                    return $sub->menu->name;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        $subMenus = SubMenu::all();
        return view('c-panel.sub-menus.index',['subMenus'=>$subMenus]);
    }


    public function create()
    {
        return view('c-panel.sub-menus.create');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required',
            'menu_id' => 'required|exists:menus,id'
        ]);
//        dd();
        SubMenu::create($request->all());
        return redirect()->route('sub-menus.index')->with('success',__('Sub Menu Created Successfully!'));

    }


    public function show($id)
    {
        //
    }


    public function edit(SubMenu $sub_menu)
    {
        return view('c-panel.sub-menus.edit',compact('sub_menu'));
    }


    public function update(Request $request, SubMenu $sub_menu)
    {
        $validate = $request->validate([
            'name'=>'required',
            'menu_id' => 'required|exists:menus,id'
        ]);
        // dd($request->all());
        $sub_menu->update($request->all());
        return redirect()->route('sub-menus.index')->with('success',__('Sub Menu Updated Successfully!'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMenu $sub_menu)
    {
        $sub_menu->delete();
        return redirect()->route('sub-menus.index')->with('success',__('Sub Menu Deleted Successfully!'));

    }
}
