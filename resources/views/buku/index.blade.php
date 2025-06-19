<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buku</title>
</head>
<body>
    <h2>Data Buku</h2>
    <a href="{{ route('buku.create') }}">Tambah data</a>
    <br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>

        @php  $no =1; @endphp

        @foreach ($buku as $data)

        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data['judul']}}</td>
            <td>Rp. {{ number_format($data['harga']) }}</td>
            <td>{{ $data['kategori'] }}</td>
            <td>
                 
                 <form action="/buku/{{ $data['id'] }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/buku/{{ $data['id'] }}">Lihat</a> |
                    <a href="/buku/{{ $data['id'] }}/edit">Ubah</a> 
                    <button type="submit" onclick="return confirm('Apakah anda yakin?')">
                          Hapus
                    </button>
                </form>
                 
            </td>
        </tr>
            
        @endforeach


    </table>
</body>
</html>