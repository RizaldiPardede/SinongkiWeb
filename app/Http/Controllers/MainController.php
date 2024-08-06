<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index()
    {
        $get = Http::get('http://10.39.50.152:8000/pemesanan/')->object();
        return view('index',['data' => $get]);
    }
    public function menu()
    {
        if (!session()->get('nama')) {
            return back()->with('status','LOGIN DULU BOSS KLO MAU NGATUR !!');
        }

        $get = Http::get('http://10.39.50.152:8000/menu')->object();
        return view('menu',['data' => $get]);
    }
    public function riwayat()
    {
        if (!session()->get('nama')) {
            return back()->with('status','LOGIN DULU BOSS KLO MAU NGATUR !!');
        }
        
        return view('riwayat');
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $get_login = Http::post('http://10.39.50.152:8000/admin/login',$data)->json();
        // dd($get_login);
        if (!$get_login) {
            return back()->with('status','Hayoo Kamu Bukan Admin !!');
        }
        if ($get_login['message'] == 'Successfully logged in') {
            $get_data = Http::get('http://10.39.50.152:8000/admin/?email='.$request->email)->json();
            session()->put('nama',$get_data['user']['nama']);
            return redirect('/');
        }

        return back()->with('status','Hayoo Kamu Bukan Admin !!');
    }
    public function register()
    {
        return view('register');
    }

    public function registration(Request $request)
    {
        $data = [
            'nama' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        Http::post('http://10.39.50.152:8000/admin', $data)->json();
        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/');
    }

    public function createMenu(Request $request)
    {
        $data = [
            'nama_menu' => $request->name,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'stok' => $request->stock,
            'gambar' => $request->file('img')->store('img') 
        ];
        Http::post('http://10.39.50.152:8000/menu/createmenu',$data)->json();
        return redirect('/menu')->with('status','HOREE MENU BARUUU !!');

    }

    public function editMenu(Request $request)
    {
    
        $data = [
            'id_menu' => $request->id_menu,
            'nama_menu' => $request->name,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'stok' => $request->stock
        ];
        Http::post('http://10.39.50.152:8000/menu/updatemenu',$data)->body();
        return redirect('/menu')->with('status', 'Menunya Udah di UPDATE !!');
    }

    public function deleteMenu(Request $request)
    {
        $data = [
            'id_menu' => $request->id_menu
        ];
        Http::delete('http://10.39.50.152:8000/menu/deletemenu',$data);
        return redirect('/menu')->with('status', 'Menunya Udah di HAPUS !!');
    }

    public function deletePesanan(Request $request)
    {
        $data = [
            'nomor_antrian' => $request->nomor_antrian
        ];
        Http::delete('http://10.39.50.152:8000/pemesanan/deletepemesanan',$data);
        return redirect('/')->with('status','Pesanan Berhasil DIHAPUS !!!');
    }

}
