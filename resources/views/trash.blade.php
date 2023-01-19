@extends('master')
@push('title')
    Trash
@endpush
@section('main')

    <table class="table mt-5">

        <thead>

            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Birth-Date</th>
                <th scope="col">City</th>
                <th scope="col">Registration-Date</th>
                <th scope="col">Deletation-Date</th>
                <th scope="col">Action</th>
            </tr>

        </thead>


        <tbody>

            @foreach ($employee as $data)
                <tr>

                    <th scope="row">{{$data->name}}</th>
                    <td>{{$data->email}}</td>
                    <td>{{$data->birth_date}}</td>
                    <td>{{$data->city}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>{{$data->deleted_at}}</td>
                    <td>
                        <a href="/restore/{{$data->id}}"><button class="btn btn-outline-warning">Restore</button></a>
                        <a href="/delete/{{$data->id}}"><button class="btn btn-outline-danger">Delete</button></a>
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

@endsection