<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- token untuk menggunakan metode post pada laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <hr>
    <div class="container">

        {{-- @foreach ($isi as $i) --}}
        <form action="/alamat/{{$isi->id}}" method="POST">
            @method('patch')
            @csrf
        <p>daerah</p>
        <select name="id_jasa" id="">
            <option value="{{$isi->jasa_id}}">{{$isi->jasa->tujuan}}</option>
            @foreach ($isi1 as $i)
            <option value="{{$i->id}}">{{$i->tujuan}}</option>
            @endforeach
          </select>
        <p>detail alamat</p>
        <input type="text" name="detail" value="{{$isi->detail}}">
        {{-- @endforeach --}}
      

        
        <button type="submit" value="Submit">Edit</button>
      </form>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {{-- <script type="text/javascript" src="{{ URL::asset('js/cart.js') }}"></script> --}}
  </body>
</html>