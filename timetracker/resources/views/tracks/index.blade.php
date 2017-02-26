@extends('layout.default')



@section('content')
    <h1>überblick</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Kommen</th>
            <th>Gehen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tracks as $track)

            <tr>
                <td>{{$track->start}}</td>
                <td>{{$track->end}}</td>
                <td>def@somemail.com</td>
            </tr>


        @endforeach

        </tbody>
    </table>
    <hr>
    <form action="/tracks" method="POST">
        {{csrf_field()}}
        <button type="submit" class="btn btn-prime">Start</button>
    </form>

@endsection