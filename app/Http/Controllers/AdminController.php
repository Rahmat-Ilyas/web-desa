<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use App\Imports\PendudukImport;

use App\Models\Informasi;
use App\Models\Aparatur;
use App\Models\Apbdes;
use App\Models\Galeri;
use App\Models\KontenGaleri;
use App\Models\Files;
use App\Models\FotoInformasi;
use App\Models\Postingan;
use App\Models\Agenda;
use App\Models\Penduduk;
use App\Models\Admin;
use App\Models\Pesan;

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
            $data['keterangan'] = $request->keterangan ? $request->keterangan : '';
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
            $file = time() . '_' . str_replace(' ', '_', $request->file('file_upload')->getClientOriginalName());
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
        } else if ($target == 'postingan') {
            $request->validate([
                'foto_sampul' => 'mimes:png,jpeg,jpg,bmp',
            ]);

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
                    $image_name = "/images/postingan/" . time() . $item . '.png';
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
            $slug = strtolower(str_replace(' ', '-', $request->judul)) . "-" . time();
            $foto_sampul = $slug . '.' . $request->file('foto_sampul')->getClientOriginalExtension();
            $request->file('foto_sampul')->move('images/postingan/sampul', $foto_sampul);
            $data = $request->except(['files']);
            $data['admin_id'] = Auth::user()->id;
            $data['konten'] = $content;
            $data['foto_sampul'] = $foto_sampul;
            $data['utama'] = isset($request->utama) ? true : false;
            $data['view'] = 0;
            $data['slug'] = $slug;

            Postingan::create($data);
            return redirect('admin-access/postingan/postingan')->with('success', 'Postingan baru berhasil ditambahkan');
        } else if ($target == 'penduduk') {
            $request->validate([
                'nik' => 'unique:data_penduduk|min:16|max:16',
            ]);

            $data = $request->all();
            Penduduk::create($data);

            return back()->with('success', 'Data Penduduk baru berhasil ditambahkan');
        } else if ($target == 'akun') {
            $this->validate($request, [
                'username' => 'unique:admin',
            ]);
            $data = $request->all();
            $data['role'] = 'admin';
            $data['password'] = bcrypt($request->username);
            Admin::create($data);

            return back()->with('success', 'Akun Akses baru berhasil ditambahkan');
        } else if ($target == 'pesan') {
            // Kirim Pesan Disini

            return back()->with('success', 'Berhasil membalas pesan ke ' . $request->email);
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
        } else if ($target == 'postingan') {
            $request->validate([
                'foto_sampul' => 'mimes:png,jpeg,jpg,bmp',
            ]);

            $postingan = Postingan::where('id', $request->id)->first();

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
                    $image_name = "/images/postingan/" . time() . $item . '.png';
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

            $except = ['_token', 'id', 'foto_sampul', 'konten', 'utama', 'files'];
            $slug = strtolower(str_replace(' ', '-', $request->judul)) . "-" . time();
            if ($request->foto_sampul) {
                $nama_foto = $slug . '.' . $request->file('foto_sampul')->getClientOriginalExtension();;
                File::delete(public_path("/images/aparatur/" . $postingan->foto_sampul));
                $postingan->foto_sampul = $nama_foto;
                $file = $request->file('foto_sampul');
                $file->move(public_path("/images/postingan/sampul"), $nama_foto);
            }
            $postingan->konten = $content;
            $postingan->slug = $slug;
            $postingan->utama = isset($request->utama) ? true : false;
            foreach ($request->except($except) as $key => $data) {
                $postingan->$key = $data;
            }

            $postingan->save();
            return redirect('admin-access/postingan/edit-postingan/' . $slug)->with('success', 'Data Postingan berhasil diupdate');
        } else if ($target == 'foto_informasi') {
            $request->validate([
                'foto' => 'mimes:png,jpeg,jpg,bmp',
            ]);

            $foto_info = FotoInformasi::where('jenis', $request->jenis)->first();
            if ($foto_info) {
                # code...
                $foto = $request->file('foto');
                $nama_foto = $request->jenis . '_' . time() . '.' . $foto->getClientOriginalExtension();
                File::delete(public_path("/images/foto_informasi/" . $foto_info->foto));
                $foto->move(public_path("/images/foto_informasi"), $nama_foto);
                $foto_info->foto = $nama_foto;
                $foto_info->save();

                if ($request->jenis == 'anggaran') {
                    $message = 'Desain Apdes berhasil di upload';
                } else if ($request->jenis == 'struktur_pemdes') {
                    $message = 'Desain Struktur Desa berhasil di upload';
                }
                return back()->with('success', $message);
            } else {
                return back()->with('error', 'Terjadi kesalahan');
            }
        } else if ($target == 'penduduk') {
            $request->validate([
                'nik' => 'min:16|max:16',
            ]);
            $cek_nik = Penduduk::where('nik', $request->nik)->where('id', '!=', $request->id)->first();
            if ($cek_nik) {
                return redirect()->back()->withErrors(['error' => ['NIK yang anda masukkan telah terdaftar']])->withInput();
            }

            $penduduk = Penduduk::where('id', $request->id)->first();
            $except = ['_token', 'id'];

            foreach ($request->except($except) as $key => $data) {
                $penduduk->$key = $data;
            }
            $penduduk->save();

            return back()->with('success', 'Data Penduduk berhasil diupdate');
        } else if ($target == 'akun') {
            $akun = Admin::where('id', $request->id)->first();

            $cek_uname = Admin::where('username', $request->username)->where('id', '!=', $request->id)->first();
            if ($cek_uname) {
                return redirect()->back()->withErrors(['error' => ['Username yang anda masukkan telah terdaftar']]);
            }

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
        } else if ($target == 'postingan') {
            $data = Postingan::where('id', $id)->first();
            $data->delete();
            File::delete(public_path("/images/postingan/sampul/" . $data->foto_sampul));

            return redirect('admin-access/postingan/postingan')->with('success', 'Postingan berhasil dihapus');
        } else if ($target == 'foto_informasi') {
            $data = FotoInformasi::where('jenis', $id)->first();
            File::delete(public_path("/images/foto_informasi/" . $data->foto));
            $data->foto = '';
            $data->save();

            return back()->with('success', 'Desain ' . $id . ' berhasil dihapus');
        } else if ($target == 'penduduk') {
            $data = Penduduk::where('id', $id)->first();
            $data->delete();

            return back()->with('success', 'Data penduduk berhasil dihapus');
        } else if ($target == 'akun') {
            $data = Admin::where('id', $id)->first();
            $data->delete();

            return back()->with('success', 'Data akun berhasil dihapus');
        } else if ($target == 'pesan') {
            $data = Pesan::where('id', $id)->first();
            $data->delete();

            return back()->with('success', 'Pesan berhasil dihapus');
        }
    }

    public function config(Request $request)
    {
    }

    public function import_file(Request $request, $target)
    {
        if ($target == 'penduduk') {
            $this->validate($request, [
                'data_penduduk' => 'required|mimes:xls,xlsx'
            ]);

            $validasi_file = (new HeadingRowImport)->toArray($request->file('data_penduduk'));

            if ($validasi_file[0][0][0] != 'sides1402_format_import_data_penduduk_desa_rante_angin') {
                return redirect()->back()->withErrors(['error' => ['Format file excel tidak sesuai. Pastikan anda mendownload format yang telah disediakan']]);
            }

            $import = new PendudukImport();
            $import->import($request->file('data_penduduk'));
            // exit();

            // dd($import);
            return back()->with('success', 'Berhasil mengimport data penduduk (' . $import->getRowCountSuccess() . ' dari ' . $import->getRowCount() . ' total data)');
            // return redirect('p/registrasi/mahasiswa')->with('msg', 'Import Data Mahasiswa Berhasil');
        }
    }

    private function getFileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
