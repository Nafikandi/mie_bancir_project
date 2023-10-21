<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\menu;

use Alert;

class MenuController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $menu = menu::with('categories')->get();

        $title = 'Hapus Menu!';
        $text = "Apakah Anda Yakin?";
        confirmDelete($title, $text);
        return view('pages.admin.menu.index', compact('menu'));
    }

    public function create(){
        $category = category::all();
        return view('pages.admin.menu.create', compact('category'));
    }

    public function store(Request $request){

        $validation = $request->validate([
            'name_menu' => 'required|max:100',
            'category_menu' => 'required',
            'price_menu' => 'required|integer',
            'photo' => 'required|image',
            'descripted_menu' => 'required|max:256',
        ]);

        $kdrand = rand(100,100000);
        $kdmenu = 'S'.'00' . $kdrand;

        $creimg = time() . '.' . $request->photo->extension();
        $creimg = $request->file('photo')->store(
            'assets/menu',
            'public'
        );
        // $request->img->storeAs('public/assets/menu', $creimg);

        menu::create([
            'kd_menu' => $kdmenu,
            'photo' => $creimg,
            'name_menu' => $validation['name_menu'],
            'category_menu' => $validation['category_menu'],
            'status_menu' => $request->status_menu,
            'price_menu' => $validation['price_menu'],
            'description_menu' => $validation['descripted_menu']
        ]);

        Alert::toast('Menu Berhasil Dibuat','success')
        ->autoClose(2000)->position('bottom-end');
        return redirect()->route('menu.create');
    }
    public function show($id){

        $menu = menu::findorfail($id);

        return view('pages.admin.menu.show',compact('menu'));

    }

    public function edit($id){
        $category = category::all();
        $menu = menu::findorfail($id);
        return view('pages.admin.menu.edit', compact('category','menu'));
    }

    public function update(Request $request, $id){
        $validation = $request->validate([
            'name_menu' => 'required|max:100',
            'category_menu' => 'required',
            'price_menu' => 'required|integer',
            'descripted_menu' => 'required|max:256',
        ]);

        $idmenu = menu::findorfail($id);

        if($request['photo'] == null){

            $idmenu->update([
                'name_menu' => $validation['name_menu'],
                'category_menu' => $validation['category_menu'],
                'status_menu' => $request->status_menu,
                'price_menu' => $validation['price_menu'],
                'description_menu' => $validation['descripted_menu']
            ]);
        }
        else{

            $creimg = time() . '.' . $request->photo->extension();
            $creimg = $request->file('photo')->store(
                'assets/menu',
                'public'
            );
            $idmenu->update([
                'photo' => $creimg,
                'name_menu' => $validation['name_menu'],
                'category_menu' => $validation['category_menu'],
                'status_menu' => $request->status_menu,
                'price_menu' => $validation['price_menu'],
                'description_menu' => $validation['descripted_menu']
            ]);
        }

        Alert::toast('Menu Berhasil Diubah','success')
        ->autoClose(2000)->position('bottom-end');
        return redirect()->route('menu.index');
    }

    public function destroy($id){
        $id = menu::findorfail($id);
        $id->delete();

        Alert::toast('Menu Berhasil Dihapus','success')
        ->autoClose(2000)->position('bottom-end');
        return redirect()->route('menu.index');
    }
}
