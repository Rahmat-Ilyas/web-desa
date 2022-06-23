<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Informasi;
use App\Models\Aparatur;
use App\Models\Apbdes;
use App\Models\Galeri;
use App\Models\KontenGaleri;
use App\Models\Files;
use App\Models\Postingan;

class LandingController extends Controller
{
    public function home()
    {
        return view('landing/home');
    }

    public function profil($target)
    {
        $lembaga = false;
        if ($target == 'sambutan-kepala-desa') {
            $data = Informasi::where('kategori', 'sambutan')->first();
            $title = 'Sambutan Kepala Desa';
        } else if ($target == 'visi-misi') {
            $data = Informasi::where('kategori', 'visimisi')->first();
            $title = 'Visi Misi';
        } else if ($target == 'sejarah-desa') {
            $data = Informasi::where('kategori', 'sejarah')->first();
            $title = 'Sejarah Desa';
        } else if ($target == 'kondisi-desa') {
            $data = Informasi::where('kategori', 'kondisi')->first();
            $title = 'Kondisi Desa';
        } else if ($target == 'lokasi-kantor-desa') {
            $title = 'Lokasi Kantor Desa';
            return view('landing/informasi/peta', compact('target', 'title'));
        } else if ($target == 'peta-lokasi-desa') {
            $title = 'Peta Lokasi Desa';
            return view('landing/informasi/peta', compact('target', 'title'));
        } else if ($target == 'bpd') {
            $data = Informasi::where('kategori', 'bpd')->first();
            $title = 'Badan Permusyawaratan Desa (BPD)';
            $lembaga = true;
        } else if ($target == 'karang-taruna') {
            $data = Informasi::where('kategori', 'karangtaruna')->first();
            $title = 'Karang Taruna)';
            $lembaga = true;
        } else if ($target == 'bumdes') {
            $data = Informasi::where('kategori', 'bumdes')->first();
            $title = 'Dadan Usaha Milik Desa (BUMDES)';
            $lembaga = true;
        } else {
            abort('404');
        }

        return view('landing/informasi/profil', compact('data', 'title', 'lembaga'));
    }

    public function anggaran()
    {
        return view('landing/anggaran');
    }

    public function aparatur()
    {
        return view('landing/aparatur/aparatur');
    }

    public function aparatur_detail($uid)
    {
        $get_aparatur = Aparatur::all();
        foreach ($get_aparatur as $dta) {
            if ($uid == strtolower(str_replace(' ', '-', $dta->nama) . '-uid0' . $dta->id)) {
                $aprt = $dta;
                $aparatur = Aparatur::where('id', '!=', $dta->id)->limit(5)->get();
                return view('landing/aparatur/aparatur-detail', compact('aprt', 'aparatur'));
            }
        }
        abort('404');
    }

    public function galeri()
    {
        return view('landing/galeri/galeri');
    }

    public function galeri_detail($uid)
    {
        $get_galeri = Galeri::all();
        foreach ($get_galeri as $dta) {
            if ($uid == strtolower(str_replace(' ', '-', $dta->judul) . '-uid0' . $dta->id)) {
                $gal = $dta;
                $galeri = Galeri::where('id', '!=', $dta->id)->limit(5)->get();
                return view('landing/galeri/detail-galeri', compact('gal', 'galeri'));
            }
        }
        abort('404');
    }

    public function agenda()
    {
        return view('landing/agenda');
    }

    public function file()
    {
        return view('landing/file');
    }

    public function file_download($file)
    {
        $db_file = Files::where('nama_file', $file)->first();
        $db_file->download = $db_file->download + 1;
        $db_file->save();
        $myFile = public_path("file/" . $file);
        return response()->download($myFile);
    }

    public function kontak()
    {
        return view('landing/kontak');
    }

    public function page($page)
    {
        return view('landing/' . $page);
    }

    public function pagedir($dir = NULL, $page)
    {
        return view('landing/' . $dir . '/' . $page);
    }

    public function pagedir_id($dir = NULL, $page, $id)
    {
        return view('landing/' . $dir . '/' . $page, compact('id'));
    }
}
