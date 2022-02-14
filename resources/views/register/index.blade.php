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
       <i class="material-icons">import_contacts</i>
   </div>
   <div class="card-content">
       <h4 class="card-title">LIST STUDENTS AND BOOK REGISTER</h4>
       <div class="table-responsive">
        <a href="{{ route('register.create') }}" class="btn btn-primary btn-round">ADD STUDENT AND BOOK</a><br>

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
             <th>Name Student</th>
             <th>Name Book</th>
             <th width="10%">Handing Out Books</th>
         </tr>
         @foreach ($listRegister as $register)
         <tr>
            <td><?= $register->idRegister ?></td>
            <td>{{ $register->firstName }} {{ $register->middleName }} {{ $register->lastName }}</td>
            <td><div class="col-md-7">
                {{ $register->nameBook }}</div>
        </td>
            <td><a class="btn btn-sm btn-fill btn-success" href="{{ route('bill.show', $register->idRegister) }}"><i class="material-icons">skip_next</i></a></td>
        </tr>
        @endforeach
    </table>
    {{ $listRegister->appends([
    'search' => $search
    ])->links('pagination::bootstrap-4') }}
</div>
<a href="{{ route('register.export-excel') }}" class="btn btn-success btn-round">Export excel</a><br>
     
</div>
</div>		
@endsection