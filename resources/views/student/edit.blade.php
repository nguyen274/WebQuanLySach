@extends('layout.app')
@section('content')<br><br><br>
@if(session()->has('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>THÔNG BÁO : </strong>{{session()->get('success')}}
</div>
@endif
<div class="card">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">school</i>
    </div>
        <div class="card-content">
            <h4 class="card-title">EDIT STUDENT</h4>

	<form action="{{ route('student.update', $student->idStudent) }}" method="post" class="form-horizontal">
		<div class="row">
		@csrf
		@method('PUT')

		<label class="col-md-3 label-on-left">FirstName:</label>
		<div class="col-md-9">
            <div class="form-group label-floating is-empty">
                 <label class="control-label"></label>
                 <input type="text" class="form-control" name="firstName" value=" {{$student -> firstName}}">
            </div>
        </div>

        <label class="col-md-3 label-on-left">MiddleName:</label>
		<div class="col-md-9">
            <div class="form-group label-floating is-empty">
                 <label class="control-label"></label>
                 <input type="text" class="form-control" name="middleName" value=" {{$student -> middleName}}">
            </div>
        </div>

        <label class="col-md-3 label-on-left">LastName:</label>
		<div class="col-md-9">
            <div class="form-group label-floating is-empty">
                 <label class="control-label"></label>
                 <input type="text" class="form-control" name="name" value=" {{$student -> lastName}}">
            </div>
        </div>

        <label class="col-md-3 label-on-left">Email:</label>
		<div class="col-md-9">
            <div class="form-group label-floating is-empty">
                 <label class="control-label"></label>
                 <input type="text" class="form-control" name="email" value=" {{$student -> email}}">
            </div>
        </div>

        <label class="col-md-3 label-on-left">Phone:</label>
		<div class="col-md-9">
            <div class="form-group label-floating is-empty">
                 <label class="control-label"></label>
                 <input type="number" class="form-control" name="phone" value="{{ $student->phone }}" required>
            </div>
        </div>


        
        <label class="col-md-3 label-on-left">Gender:</label>            
        <div class="col-md-3">
            <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Gender" name="gender" value=" {{$student -> gender}}"required>
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
            </select>
        </div>   
        <label class="col-md-3 label-on-left">Date Birth:</label>
		<div class="col-md-3">
            <div class="form-group label-floating is-empty">
                 <label class="control-label"></label>
                 <input type="date" class="form-control datepicker" name="birthDate" value=" {{ $student->birthDate }}" />
            </div>
        </div>

        <label class="col-md-3 label-on-left">Status:</label>            
        <div class="col-md-3">
            <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Status" name="status" required value=" {{$student -> status}}">
            <option value="1">Đã đăng ký</option>
            <option value="0">Chưa đăng ký</option>

            </select>
        </div>   

        

		<label class="col-md-3 label-on-left">Grade:</label>            
           <div class="col-md-3">
             <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Grade" name="nameGrade">
                @foreach ($listGrade as $grade)
                <option value="{{ $grade->idGrade }}"
                 <?php 
                 if($student->idGrade == $grade->idGrade){
                   echo "selected";
               }
               ?>
               >{{ $grade->nameGrade }}</option>
               @endforeach
           </select>

       
           
		
           <div class="row">
            <label class="col-md-3"></label>
                <div class="col-md-9" >
                    <div class="form-group form-button">
                        <button type="submit" class="btn btn-fill btn-rose">Update</button>
                    </div>
                </div>
        </div>
		
		</div>		
	</form>
			</div>
</div>	
@endsection