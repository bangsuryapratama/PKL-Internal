<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyController extends Controller
{

    //data array
    private $data = [
        [ 'id' =>1 , 'judul' => 'Pulpen Ajaib' , 'harga' => 10000, 'kategori' => 'Tahayul' ],
        [ 'id' =>2 , 'judul' => 'Uang dan Kehidupan' , 'harga' => 20000, 'kategori' => 'GrowthUP' ],
        [ 'id' =>3 , 'judul' => 'SiUnyil' , 'harga' => 30000 ,'kategori' => 'Kartun' ]
    ];


    // mengambil data array lalu dimasukan ke dalam sebuah session 'data_buku'
    public function index()
    {
        $buku = session('buku', $this->data);
    
        return view('buku.index', compact('buku'));
    }

    // fungsi create untuk menambahkan data buku baru

    public function create()
    {
        return view('buku.create');
    }
    
    public function store(Request $request)
    {
        // validasi input
        // $request->validate([
        //     'judul' => 'required|string|max:255',
        //     'harga' => 'required|numeric',
        //     'kategori' => 'required|string|max:255',
        // ]);

        // ambil data buku dari session
        $buku = session('buku', $this->data);

        // buat id baru berdasarkan jumlah buku yang ada
        $id_baru = collect($buku)->max('id') + 1;

        // tambahkan buku baru ke array
        $buku[] = [
            'id' => $id_baru,
            'judul' => $request->judul,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
        ];

        // simpan kembali ke session
        session(['buku' => $buku]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }


    //show 

    public function show($id)
    {
        $buku = session('buku', $this->data);
        $buku = collect($buku)->firstWhere('id', $id);
 
        if (! $buku) {
            abort(404, 'Buku tidak ditemukan');
        }
    
        return view('buku.show', compact('buku'));
    }

    //fungsi untuk mengedit data buku
    public function edit($id)
    {
        $buku = session('buku', $this->data);
        $buku = collect($buku)->firstWhere('id', $id);
    
        if (! $buku) {
            abort(404, 'Buku tidak ditemukan');
        }
    
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = session('buku', $this->data);
       
        foreach ($buku as &$data) {
            if ($data['id'] == $id) {
                // update data buku
                $data['judul'] = $request->judul;
                $data['harga'] = $request->harga;
                $data['kategori'] = $request->kategori;
                break;
            }
        }

        // simpan kembali ke session
        session(['buku' => $buku]);

        return redirect('/buku');
    
    }

    //fungsi untuk menghapus data buku
    public function destroy($id){

        $buku = session('buku', $this->data);
        
        $index = array_search($id, array_column($buku, 'id'));
        array_splice($buku, $index, 1);

        session(['buku' => $buku ]);

        return redirect('buku');
    }
}

