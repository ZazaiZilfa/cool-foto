<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{ route('upimage') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="idUser" id="" value="{{ $sessionid }}">
        <input type="file" name="postImage"><br>
        <input type="text" name="postTitle" placeholder="title"><br>
        <input type="text" name="postDesc" placeholder="description" id=""><br>
        <input type="number" name="price" placeholder="harga" id=""><br>
        {{-- {{ dd($kategori) }}qq --}}
        @foreach ($kategori as $row)


        <input type="radio" name="postCategory" value="{{ $row['idKategori'] }}"><label for="">{{ $row['namaKategori'] }}</label>
        @endforeach
<br>
<select name="status" id="">
    <option value="1">sale</option>
    <option value="2">public</option>
    <option value="3">private</option>
</select>

        <br><button type="submit">submit</button>
    </form>
</body>
</html>
