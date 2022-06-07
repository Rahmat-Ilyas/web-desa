<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

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
        }
    }
}
