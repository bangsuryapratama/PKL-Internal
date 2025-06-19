<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Buku</title>
</head>
<body>

    <h2>Tambah data</h2>

    <form action="/buku" method="POST">
      @csrf
        
      <table>
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td>
                <input type="text" name="judul" id="" placeholder="Tambahkan Judul" required>
            </td>
        </tr>

        <tr>
            <td>Harga</td>
            <td>:</td>
            <td>
                <input type="number" name="harga" required placeholder="Tambah Harga">
            </td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>:</td>
            <td>
                  <select name="kategori" required>
                    <option value="Tahayul">Tahayul</option>
                    <option value="GrowthUP">GrowthUP</option>
                    <option value="Kartun">Kartun</option>
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