@extends('master')
@push('title')
    Edit
@endpush
<style>
    .box{
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        border-radius: 10px;
        padding: 30px
    }
</style>
@section('main')
    <div class="row justify-content-center mt-5">
        <div class="col-md-5 box" >
            <h1 class="text-center text-primary">Edit Employee</h1>
            <form action="/update/{{$employee->id}}" method="post">
                @csrf

                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $employee->name }}">
                @error('name')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror

                <input type="email" name="email" class="form-control mt-3" placeholder="Email" value="{{ $employee->email }}">
                @error('email')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror

                <input type="date" name="date" class="form-control mt-3" value="{{ $employee->birth_date }}">
                @error('date')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror

                <input type="text" name="city" class="form-control mt-3" placeholder="City" value="{{ $employee->city }}">
                @error('city')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror

                <input type="password" name="password" class="form-control mt-3" placeholder="Password" >
                @error('password')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror

                <input type="password" name="passwordConfirmation" class="form-control mt-3" placeholder="Confirm Password" >
                @error('passwordConfirmation')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror

                <div>
                    <input type="submit" class="btn btn-primary mt-3" value="Update">
                </div>
            </form>
        </div>
    </div>
@endsection