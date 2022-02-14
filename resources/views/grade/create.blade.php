@extends('layout.app')
@section('content')<br><br><br>
<div class="card">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">class</i>
    </div>
        <div class="card-content">
            <h4 class="card-title">ADD GRADE</h4>

	<form action="{{ route('grade.store') }}" method="post" class="form-horizontal">
		<div class="row">
		@csrf

		<label class="col-md-3 label-on-left">Name Grade:</label>
		<div class="col-md-9">
            <div class="form-group label-floating is-empty">
                 <label class="control-label"></label>
                 <input type="text" class="form-control" name="name" required>
            </div>
        </div>

        <label class="col-md-3 label-on-left">Name Course:</label>            
        <div class="col-md-3">
           <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Course" name="nameCourse" required>
                    @foreach ($listCourse as $course)
						<option value="{{ $course->idCourse }}">{{ $course->nameCourse }}</option>
					@endforeach
            </select>
        </div>
        <div class="row">
            <label class="col-md-3"></label>
            <div class="col-md-9" style="left: 400px">
                <div class="form-group form-button">
                    <button type="submit" class="btn btn-fill btn-rose">Add Grade</button>
                </div>
            </div>
		
		</div>		
	</form>
			</div>
</div>	
@endsection