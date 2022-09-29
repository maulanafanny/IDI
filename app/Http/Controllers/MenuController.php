<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.menu.menu', [
            'menus' => Menu::orderBy('best_seller', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.menu.menu_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'img' => 'required',
            'price' => 'required',
            'desc' => 'required',
        ]);

        Menu::create($validated_data);
        return redirect('dash/menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.menu.menu_edit', [
            'menu' => Menu::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'img' => 'required',
            'price' => 'required',
            'desc' => 'required',
        ]);

        Menu::where('id', $id)->update($validated_data);
        return redirect('dash/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::destroy($id);

        return redirect('/dash/menu');
    }

    function getAll()
    {
        $menus = Menu::orderBy('best_seller', 'desc')->get();
        return response()->json($menus);
    }

    function getOne($id)
    {
        $menus = Menu::where('id', $id)->get();
        return response()->json($menus);
    }

    function toggleBest(Request $request)
    {
        $bests = json_decode($request->bests);

        foreach ($bests as $best) {
            Menu::where('id', $best->id)->update([
                'best_seller' => $best->value
            ]);
        }

        return redirect('/dash/menu');
    }
}
