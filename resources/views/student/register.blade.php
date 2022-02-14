@extends('layout.app')
@section('content')<br><br><br>

	<div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
             <i class="material-icons">app_registration</i>
         </div>
             <div class="card-content">
                 <h4 class="card-title">LIST STUDENTS REGISTER</h4>
                  <div class="table-responsive">
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
                        <th>Grade</th>
                    </tr>
                    <?php foreach ($listStudent as $student) : ?>
            <tr>
            @if($student->status == '1')
                <td><?= $student->idStudent ?></td>
                <td><?= "$student->firstName $student->middleName $student->lastName" ?></td>               
                <td><?= $student->email ?></td>
                <th><?= $student->phone ?></td>
                <td><?= $student->gender == 1 ? 'Nam' : 'Nữ' ?></td>
                <td><?= $student->birthDate ?></td>
                <td>{{ $student->nameGrade }}</td>   
                                                                 
            @endif 
            </tr>
            <tr></tr>
        <?php endforeach ?>
                </table><a class="btn btn-success btn-fill btn-wd" href="{{ route('unregister') }}">LIST STUDENTS UNREGISTER  <i class="material-icons">double_arrow</i></a>
                {{ $listStudent->appends([
        'search' => $search,
    ])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    

    
@endsection