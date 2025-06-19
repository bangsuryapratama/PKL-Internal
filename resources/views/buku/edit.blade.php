<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Buku</title>
</head>
<body>

    <h2>Edit Data</h2>

    <form action="/buku/{{ $buku['id'] }}" method="POST">
      @csrf
      @method('PUT')
      <table>
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td>
                <input type="text" name="judul" id="" value="{{ $buku['judul'] }}" required>
            </td>
        </tr>

        <tr>
            <td>Harga</td>
            <td>:</td>
            <td>
                <input type="number" name="harga" required value="{{ $buku['harga']}}">
            </td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>:</td>
            <td>
                <select name="kategori" required>
                    <option disabled {{ !$buku['kategori'] ? 'selected' : '' }}>Pilih Kategori</option>
                    <option value="Tahayul" {{ $buku['kategori'] == 'Tahayul' ? 'selected' : '' }}>Tahayul</option>
                    <option value="GrowthUP" {{ $buku['kategori'] == 'GrowthUP' ? 'selected' : '' }}>GrowthUP</option>
                    <option value="Kartun" {{ $buku['kategori'] == 'Kartun' ? 'selected' : '' }}>Kartun</option>
                </select>
            </td>
            <tr>
                <td>
                        <button type="submit">Simpan</button>
                        <button type="reset">Refresh</button>
                </td>
            </tr>
        </tr>
    </table>

    </form>
</body>
</html>