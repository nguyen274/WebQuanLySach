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
             <i class="material-icons">subject</i>
         </div>
             <div class="card-content">
                 <h4 class="card-title">LIST SUBJECT</h4>
                  <div class="table-responsive">
                    <a href="{{ route('subject.create') }}" class="btn btn-primary btn-round">add subject</a><br>
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
                        <th>Name Subject</th>
                        <!-- <th>Grade</th> -->
                        <th width="10%"></th>
                        <!-- <th>Xóa</th> -->
                    </tr>
                    @foreach ($listSubject as $subject) 
                    <tr>
                        <td>{{ $subject->idSubject }}</td>
                        <td>{{ $subject->nameSubject }}</td>
                        <!-- <td>{{ $subject->nameGrade }}</td> -->



                            
                            <td><a class="btn btn-sm btn-warning"
                                    href="{{ route('subject.edit', $subject->idSubject) }}">EDIT</a></td>
                            <!-- <td>
                                <form action="{{ route('subject.destroy', $subject->idSubject) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"onclick="return confirm('Bạn có chắc chắn muốn xóa môn học? Thao tác này không thể hoàn tác.')">Xóa</button>
                            </td>
                            </td> -->
                        </tr>
        @endforeach 
                </table>
                {{ $listSubject->appends([
        'search' => $search,
    ])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection