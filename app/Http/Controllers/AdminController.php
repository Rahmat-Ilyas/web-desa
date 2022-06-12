<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

use App\Models\Informasi;
use App\Models\Aparatur;
use App\Models\Apbdes;

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
        if ($target == 'dataaparatur') {
            $request->validate([
                'foto_upload' => 'required|mimes:png,jpeg,jpg,bmp',
            ]);

            $file = $request->file('foto_upload');
            $nama_foto = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path("/images/aparatur"), $nama_foto);

            $data = $request->except(['foto_upload']);
            $data['foto'] = $nama_foto;
            $add = Aparatur::create($data);
            if ($add)
                return back()->with('success', 'Data Aparatur Desa berhasil ditambahkan');
            else
                return back()->with('error', 'Gagal menambahkan data');
        } else if ($target == 'anggaran') {
            $data = $request->all();
            Apbdes::create($data);
            return back()->with('success', 'Data Anggaran Dana Desa berhasil ditambahkan');
        }
    }

    public function update(Request $request, $target)
    {
        if ($target == 'informasi') {
            $informasi = Informasi::where('kategori', $request->kategori)->first();
            if ($informasi) {
                $content = $request->konten;
                $dom = new \DomDocument();
                @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $imageFile = $dom->getElementsByTagName('img');

                foreach ($imageFile as $item => $image) {
                    $data = $image->getAttribute('src');
                    if (substr($data, 0, 10) == "data:image") {
                        list($type, $data) = explode(';', $data);
                        list(, $data)      = explode(',', $data);
                        $imgeData = base64_decode($data);
                        $image_name = "/images/informasi/" . time() . $item . '.png';
                        $path = public_path() . $image_name;
                        file_put_contents($path, $imgeData);
                        $image_name = URL::to('/') . $image_name;
                    } else {
                        $image_name = $data;
                    }

                    $image->removeAttribute('src');
                    $image->setAttribute('src', $image_name);
                }

                $content = $dom->saveHTML();
                $informasi->konten = $content;
                $informasi->admin_id = Auth::user()->id;
                $informasi->save();
                return back()->with('success', 'Data berhasil diupdate');
            }
            return back()->with('error', 'Terjadi kesalahan');
        } else if ($target == 'dataaparatur') {
            $request->validate([
                'foto_upload' => 'mimes:png,jpeg,jpg,bmp',
            ]);

            $aparat = Aparatur::where('id', $request->id)->first();
            $except = ['_token', 'id', 'foto_upload'];
            if ($request->foto_upload) {
                File::delete(public_path("/images/aparatur/" . $aparat->foto));
                $file = $request->file('foto_upload');
                $nama_foto = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path("/images/aparatur"), $nama_foto);
                $request['foto'] = $nama_foto;
            }

            foreach ($request->except($except) as $key => $data) {
                $aparat->$key = $data;
            }
            $aparat->save();

            return back()->with('success', 'Data Aparatur Desa berhasil diupdate');
        } else if ($target == 'anggaran') {
            $anggaran = Apbdes::where('id', $request->id)->first();
            $except = ['_token', 'id'];

            foreach ($request->except($except) as $key => $data) {
                $anggaran->$key = $data;
            }
            $anggaran->save();

            return back()->with('success', 'Data Anggaran Dana Desa berhasil diupdate');
        }
    }

    public function delete($target, $id)
    {
        if ($target == 'dataaparatur') {
            $data = Aparatur::where('id', $id)->first();
            $data->delete();
            File::delete(public_path("/images/aparatur/" . $data->foto));

            return back()->with('success', 'Data Aparatur Desa berhasil dihapus');
        } else if ($target == 'anggaran') {
            $data = Apbdes::where('id', $id)->first();
            $data->delete();

            return back()->with('success', 'Data Anggaran Dana Desa berhasil dihapus');
        }
    }

    public function config(Request $request)
    {
    }
}
