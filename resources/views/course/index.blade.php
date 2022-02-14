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
             <i class="material-icons">hotel_class</i>
         </div>
             <div class="card-content">
                 <h4 class="card-title">LIST COURSE</h4>
                  <div class="table-responsive">
                    <a href="{{ route('course.create') }}" class="btn btn-primary btn-round">add course</a><br>
                    <form action="">
                        <div class="col-md-3">
                            <input type="text" value="{{ $search }}" name="search" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-blue btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </form>              	
	
	<table class="table table-hover">
		<tr class="success">
                        <th width="5%">ID</th>
                        <th>Name Course</th>
                        <th width="10%"></th>
                        <!-- <th>Xóa</th> -->
                    </tr>
                    <?php foreach ($listCourse as $course) : ?>
                    <tr>
                        <td>{{ $course->idCourse }}</td>
                        <td>{{ $course->nameCourse }}</td>


                            
                            <td><a class="btn btn-sm btn-warning"
                                    href="{{ route('course.edit', $course->idCourse) }}">EDIT</a></td>
                            <!-- <td>
                                <form action="{{ route('course.destroy', $course->idCourse) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"onclick="return confirm('Bạn có chắc chắn muốn xóa ngành học? Thao tác này không thể hoàn tác.')">Xóa</button>
                            </td> -->
                        </tr>
        <?php endforeach ?>
                </table>
                {{ $listCourse->appends([
        'search' => $search,
    ])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection