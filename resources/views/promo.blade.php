<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Promo</title>
</head>
<body>
    @if($barang && $kode)
      Menampilkan promo untuk barang <strong>{{ $barang }}</strong> dengan kode <strong> {{ $kode }}</strong>
    @elseif($barang)
      Menampilkan promo untuk barang <strong>{{ $barang }}</strong>
    @else
      Menampilkan semua promo barang
    @endif
</html>