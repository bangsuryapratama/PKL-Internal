<?php $nama = "Asep" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    @php 
        $umur = 20;
    @endphp
    
    Ini Profile Saya 
    <?php echo $nama; ?>
    <br>
    Umur Saya : {{ $umur }}
</body>
</html>