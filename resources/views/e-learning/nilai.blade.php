@extends('layouts/elearningmaster')
@section('title', 'Nilai')
@section('content')
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Learning english <span>faster</span> <br> and <span>better</span> with us</h1>
    </div>
</div>
<div class="row justify-content-center my-5" id="login">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Nilai</h3>
            </div>
            <ul class="list-group list-group-flush">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Materi</th>
                                <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" width="15">1</th>
                                <td>Simple Present Tense</td>
                                <td>80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </ul>
        </div>
    </div>
</div>

<!-- end jumbotron -->
@endsection
