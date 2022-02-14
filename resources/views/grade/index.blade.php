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
                 <h4 class="card-title">LIST GRADE</h4>
                  <div class="table-responsive">
                    <a href="{{ route('grade.create') }}" class="btn btn-primary btn-round">add grade</a><br>
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
                        <th>Name Grade</th>
                        <th>Name Course</th>
                        <th>Number of Books Distributed </th>
                        <th width="10%"></th>
                    </tr>
                    @foreach ($listGrade as $grade)
                        <tr>
                            <td>{{ $grade->idGrade }}</td>
                            <td>{{ $grade->nameGrade }}</td>
                            <td>{{ $grade->nameCourse }}</td>
                            <td>
                                @php
                $sum =\App\Models\bill::where('idStudent','=',$grade->idGrade)
                ->sum('bill.amountBook');                
            @endphp
            {{ $grade->amount + $sum}}
                            </td>
                            
                            <td><a class="btn btn-sm btn-warning"
                                    href="{{ route('grade.edit', $grade->idGrade) }}">EDIT</a></td>
                            <!-- <td>
                                <form action="{{ route('grade.destroy', $grade->idGrade) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"onclick="return confirm('Bạn có chắc chắn muốn xóa lớp? Thao tác này không thể hoàn tác.')">Xóa</button>
                            </td> -->
                        </tr>
                    @endforeach
                </table>
                {{ $listGrade->appends([
        'search' => $search,
    ])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection