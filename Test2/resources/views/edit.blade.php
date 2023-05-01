@extends('master')
@section('content')

<div class="card">
    <div class="card-header">Edit Employes</div>
    <div class="card-body">
        <form method="post" action="{{route('students.update' , $student->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"> Roll NO</label>
                <div class="col-sm-10">
                    <input type="text" name="rollno" class="form-control " value="{{$student->rollno}}"/>

                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Student Name</label>
                <div class="col-sm-10">
                    <input type="text" name="student_name" class="form-control " value="{{$student->student_name}}"/>

                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Student Image</label>
                <div class="col-sm-10">
                    <input type="file" name="student_image" />
                    <br>
                    <img src="{{asset('images/' .$student->student_image)}}" width="100" class="img-thumbnail"/>
                    <input type="hidden" name="hidden_student_image" value="{{$student->student_image}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Marks</label>
                <div class="col-sm-10">
                    <input class="text" name="marks" class="form-control" value="{{$student->marks}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Address</label>
                <div class="col-sm-10">
                    <input class="text" name="address" class="form-control" value="{{$student->address}}"/>
                </div>
            </div>

            
           

            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{$student->id}}"/>
                <input type="submit" class="btn btn-primary" value="Edit"/>

            </div>

        </form>

    </div>

</div>
<!-- <script>
        document.getElementsByName('student_gender')[0].value="{{$student->student_gender}}";
</script> -->

@endsection('content')