<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

use App\Models\Informasi;
use App\Models\Aparatur;
use App\Models\Apbdes;
use App\Models\Galeri;
use App\Models\KontenGaleri;
use App\Models\Files;

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

    public function pagedir_id($dir = NULL, $page, $id)
    {
        return view('admin/' . $dir . '/' . $page, compact('id'));
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
        } else if ($target == 'galeri') {
            $request->validate([
                'judul' => 'required',
                'foto' => 'required',
            ]);

            $data = [];
            $data['judul'] = $request->judul;
            $data['keterangan'] = $request->keterangan;
            $data['admin_id'] = Auth::user()->id;
            $data['view'] = 0;

            $galeri = Galeri::create($data);
            $files =  $request->file('foto');

            foreach ($files as $i => $dta) {
                $nama_foto = 'galeri_' . $i . time() . '.' . $dta->getClientOriginalExtension();

                $foto = [];
                $foto['galeri_id'] = $galeri->id;
                $foto['foto'] = $nama_foto;
                KontenGaleri::create($foto);

                $path = 'images/galeri';
                $dta->move($path, $nama_foto);
            }
            return response()->json('success', 200); 
        } else if ($target == 'file') {
            $data = [];
            $data['keterangan'] = $request->keterangan;
            $file = time().'_'.str_replace(' ', '_', $request->file('file_upload')->getClientOriginalName());
            $data['nama_file'] = $file;
            $data['download'] = 0;
            $data['ukuran'] = $this->getFileSize($request->file('file_upload')->getSize());
            Files::create($data);
            $request->file('file_upload')->move('file', $file);

            return back()->with('success', 'File baru berhasil ditambahkan');
        } else if ($target == 'agenda') {
            $data = $request->all();
            Agenda::create($data);

            return back()->with('success', 'Agenda baru berhasil ditambahkan');
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
        } else if ($target == 'agenda') {
            $agenda = Agenda::where('id', $request->id)->first();
            $except = ['_token', 'id'];

            foreach ($request->except($except) as $key => $data) {
                $agenda->$key = $data;
            }
            $agenda->save();

            return back()->with('success', 'Agenda berhasil diupdate');
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
        } else if ($target == 'galeri') {
            $galeri = Galeri::where('id', $id)->first();
            $galeri->delete();
            $kont_galeri = KontenGaleri::where('galeri_id', $id)->get();
            foreach ($kont_galeri as $kg) {
                File::delete(public_path("/images/galeri/" . $kg->foto));
                $kg->delete();
            }

            return back()->with('success', 'Data Galeri Kegiatan Desa berhasil dihapus');
        } else if ($target == 'file') {
            $data = Files::where('id', $id)->first();
            $data->delete();
            File::delete(public_path("file/" . $data->nama_file));

            return back()->with('success', 'Data File berhasil dihapus');
        } else if ($target == 'agenda') {
            $data = Agenda::where('id', $id)->first();
            $data->delete();

            return back()->with('success', 'Agenda berhasil dihapus');
        }
    }

    public function config(Request $request)
    {
    }

    private function getFileSize($bytes) {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
