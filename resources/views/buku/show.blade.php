<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lihat Buku</title>
</head>
<body>
    
    <h2>Detail Buku </h2>
    
      <table>

        <tr>
            <td>ID</td>
            <td>:</td>
            <td>
                {{ $buku['id'] }}
            </td>
        </tr>

        <tr>
            <td>Judul</td>
            <td>:</td>
            <td>
               {{ $buku['judul'] }}
            </td>
        </tr>

        <tr>
            <td>Harga</td>
            <td>:</td>
            <td>
              Rp .  {{ number_format($buku['harga']) }}
            </td>
        </tr>

        <tr>
            <td>Kategori</td>
            <td>:</td>
            <td>
               {{ $buku['kategori'] }}
            </td>
        </tr>



    

    </form>
    </table>


</body>
</html>