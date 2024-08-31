<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Str;

class MenuController extends Controller
{

    public function index()
    {
        // $menu = Menu::with('descendants')->get();
        // $menu = Menu::tree()->get();
        $menu = Menu::tree()->get()->toTree();

        // dd($menu);
        // Log::info($menu);

        return response()->json($menu);
    }
    public function parentNode()
    {
        // $menu = Menu::with('descendants')->get();
        // $menu = Menu::tree()->get();
        $menu = Menu::whereNull('parent_id')->get();

        // dd($menu);
        // Log::info($menu);

        return response()->json($menu);
    }

    public function createMain(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            // 'parent_id' => 'required',

        ]);

        $menu = Menu::create([
            'name' => $request->name,
            "slug" => Str::slug($request->name),
            // 'parent_id' => $request->parent_id
        ]);
        return response()->json($menu, 201);
    }
    public function createSub(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'parent_id' => 'required',

        ]);

        $menu = Menu::create([
            'name' => $request->name,
            "slug" => Str::slug($request->name),
            'parent_id' => $request->parent_id
        ]);
        return response()->json($menu, 201);
    }
    public function update(Request $request, Menu $menu)
    {

        $validated = $request->validate([
            'name' => 'required',
            // 'id' => 'required',

        ]);

        $menu->update([
            'name' => $request->name,
            "slug" => Str::slug($request->name),
            // 'parent_id' => $request->parent_id
        ]);
        return response()->json($menu, 201);
    }
}
