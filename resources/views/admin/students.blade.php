@extends('admin.master')

@section('content')
    <table class="table table-bordered">
        <thead>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Score</th>
        <th>Action</th>
        </thead>
   <tbody>
@foreach($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->age}}</td>
        <td>{{$student->gender}}</td>
        <td>{{$student->score}}</td>
        <td>
            <div class="form-group">
            <a class="buttons btn btn-success">View</a>
            <a href="{{route('students.edit',($student->id))}}" class="buttons btn btn-primary primary">Edit</a>
            <a class="buttons btn btn-danger">delete</a>
            </div>
        </td>
    </tr>
@endforeach
   </tbody>
    </table>
@stop
