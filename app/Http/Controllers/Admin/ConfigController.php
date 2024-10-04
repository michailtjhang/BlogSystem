<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        return view('admin.config.index', [
            'page_title' => 'Config',
            'data' => Config::paginate(5),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);

        Config::find($data['id'])->update($data);

        return back()->with('success', 'Config updated successfully');
    }
}
