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
        <i class="material-icons">class</i>
    </div>
        <div class="card-content">
            <h4 class="card-title">EDIT GRADE</h4>

	<form action="{{ route('grade.update', $grade->idGrade) }}" method="post" class="form-horizontal">
		<div class="row">
		@csrf
		@method('PUT')

		<label class="col-md-3 label-on-left">Name Grade:</label>
		<div class="col-md-9">
            <div class="form-group label-floating is-empty">
                 <label class="control-label"></label>
                 <input type="text" class="form-control" name="name" value="{{ $grade->nameGrade }}" required>
            </div>
        </div>

        <label class="col-md-3 label-on-left">Name Course:</label>            
           <div class="col-md-3">
             <select class="selectpicker" data-style="btn btn-primary btn-round" title="Chọn tên khóa học" name="nameCourse" required>
                @foreach ($listCourse as $course)
                <option value="{{ $course->idCourse }}"
                 <?php 
                 if($grade->idCourse == $course->idCourse){
                   echo "selected";
               }
               ?>
               >{{ $course->nameCourse }}</option>
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