@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('usera.create') }}" class="btn btn-info">Add User</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered mt-5" style="margin: auto; width: 95%">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email </th>
                                    <th scope="col">Created By </th>
                                    <th scope="col">Action </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_by }}</td>
                                        <td class="d-flex justify-content-center">
                                            <form action="{{ route('usera.destroy',$user->id) }}" method="POST">
                                                <a type="button" href="{{route('usera.edit',$user->id) }}" class="btn btn-warning ml-5">Edit</a>
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger ml-1">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
