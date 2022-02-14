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
                 <h4 class="card-title">LIST STUDENT</h4>
                  <div class="table-responsive">
                    <a href="{{ route('student.create') }}" class="btn btn-primary btn-round">add student</a><br>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Date Birth</th>
                        {{-- <th>Tình trạng</th>  --}}
                        <th>Grade</th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                    </tr>
                    <?php foreach ($listStudent as $student) : ?>
            <tr>
                <td><?= $student->idStudent ?></td>
                <td><?= "$student->firstName $student->middleName $student->lastName" ?></td>
                <td><?= $student->email ?></td>
                <th><?= $student->phone ?></td>
                <td><?= $student->gender == 1 ? 'Nam' : 'Nữ' ?></td>
                <td><?= $student->birthDate ?></td>
                {{-- <td><?= $student->status == 1 ? 'Đã đăng ký' : 'Chưa đăng ký' ?></td> --}}
                <td>{{ $student->nameGrade }}</td>
                          
                            <td><a class="btn btn-sm btn-warning"
                                    href="{{ route('student.edit', $student->idStudent) }}">EDIT</a></td>
                            <td>
                                <form action="{{ route('student.destroy', $student->idStudent) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa Student? Thao tác này không thể hoàn tác.')">DELETE</button>
                                </form>
                            </td>
                        </tr>
        <?php endforeach ?>
                </table>
                {{ $listStudent->appends([
        'search' => $search,
    ])->links('pagination::bootstrap-4') }}
            </div>
            <a href="{{ route('student.import-excel') }}" class="btn btn-rose btn-round">Import excel</a>
            <a href="{{ route('student.export-excel') }}" class="btn btn-success btn-round">Export excel</a><br>
        
        </div>
    </div>
@endsection