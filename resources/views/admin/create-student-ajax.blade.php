@extends('admin.master')

@section('content')
<form id="new_student">
    @csrf
    @isset($student)
    @method('PUT')
    @endisset
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="@isset($student){{$student->name}}@endisset" required>
    </div>

    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" class="form-control" value="@isset($student){{$student->age}}@endisset" required>
    </div>

    <div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" class="form-control"  required>
            <option value="">Select Gender</option>
            <option @isset($student) {{ $student->gender == "Male" ? "selected" : ""}}@endisset value="Male">Male</option>
            <option value="Female" @isset($student) {{ $student->gender == "Female" ? "selected" : ""}}@endisset>Female</option>
            <option value="Other" @isset($student) {{ $student->gender == "Other" ? "selected" : ""}}@endisset>Other</option>
        </select>
    </div>

    <div class="form-group">
        <label for="score">Score:</label>
        <input type="number" id="score" name="score" value="{@isset($student){{$student->score}}@endisset" class="form-control" required>
    </div>

    <div class="form-group">
        <button type="button" id="register" class="btn btn-primary">@isset($student) Update @else Create @endisset Student</button>
    </div>
</form>

@stop
@section('js')
    <script>
        $('#register').on('click', function (){
            // get form data
            var formData = $("#new_student").serialize();

            // send AJAX request
            $.ajax({
                url: "{{ route('students.store') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    // handle success response
                    Swal.fire({
                        title: 'Success!',
                        text: response,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect or do other actions here
                        }
                    });
                },
                error: function(xhr, status, error) {
                    // handle error response
                    console.log(error);
                }
             })
        })
    </script>
    @stop
