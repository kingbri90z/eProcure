@extends('layouts.main')

@section('content')

<h1>Users Admin</h1>
  		<div class="container">
          <h2>Registered Users</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                 <th>Edit</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="/admin/edit/{{$user->id}}" class="glyphicon glyphicon-edit"></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>







@stop