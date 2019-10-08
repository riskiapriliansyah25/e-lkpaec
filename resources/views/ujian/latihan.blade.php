<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/ujian.css')}}">

    <title>Latihan</title>
</head>

<body>
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <div class="card-header">
                    <h5>Latihan</h5> 
                </div>
                <div class="card-body">
                    <form action="{{url('/e-learning/latihan')}}" method="post">
                    @csrf
                    @foreach($list_latihan as $latihan)
                        <span>{{$loop->iteration}}. {{$latihan->soal}} <input type="text" name="latihan_id" value="{{$latihan->id}}" hidden></span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_{{$latihan->id}}" id="a" value="a" >
                            <label class="form-check-label" for="a">
                            A. {{$latihan->a}}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_{{$latihan->id}}" id="b" value="b" >
                            <label class="form-check-label" for="b">
                            B. {{$latihan->a}}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_{{$latihan->id}}" id="c" value="c" >
                            <label class="form-check-label" for="c">
                            C. {{$latihan->c}}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_{{$latihan->id}}" id="d" value="d">
                            <label class="form-check-label" for="d">
                            D. {{$latihan->d}}
                            </label>
                        </div>
                    @endforeach  
                    <button type="submit" class="btn btn-primary">Selesai</button>
                    </form>
                    <div class="row my-5">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
