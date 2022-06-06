<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Informasi;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function home()
    {
        return view('admin/home');
    }

    public function page($page)
    {
        return view('admin/' . $page);
    }

    public function pagedir($dir = NULL, $page)
    {
        return view('admin/' . $dir . '/' . $page);
    }

    public function store(Request $request, $target)
    {
        if ($target == 'universitas-fav') {
            $data = $request->all();
            Informasi::create($data);
            return back()->with('success', 'Universitas favorit berhasil ditambahkan');
        }
    }

    public function update(Request $request, $target)
    {
        if ($target == 'sambutan') {
            dd($request->all());
            $akun = Informasi::where('id', $request->id)->first();
            if ($request->password == '') $except = ['_token', 'id', 'password'];
            else {
                $except = ['_token', 'id'];
                $request['password'] = bcrypt($request->password);
            }
            foreach ($request->except($except) as $key => $data) {
                $akun->$key = $data;
            }
            $akun->save();

            return back()->with('success', 'Data akun berhasil diupdate');
        }
    }
}
