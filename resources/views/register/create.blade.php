@extends('layout.app')
@section('content')<br><br><br>
<div class="card">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">import_contacts</i>
    </div>
    <div class="card-content">
        <h4 class="card-title">ADD STUDENT AND BOOK REGISTER</h4>

        <form action="{{ route('register.store') }}" method="post" class="form-horizontal">
          <div class="row">
              @csrf
                <div>
              <label class="col-md-2 label-on-left">Name Book:</label>          
           <div class="col-md-3">
             <select class="selectpicker" data-style="btn btn-primary btn-round" title="Name Book" name="nameBook" required>
                @foreach ($listBook as $book)
                <option value="{{ $book->idBook }}">{{ $book->nameBook }}</option>
                
                @endforeach
            </select>
        </div>
           <label class="col-md-2 label-on-left">Name Student:</label>            
           <div class="col-md-3">
             <select class="selectpicker" data-style="btn btn-primary btn-round" title="Name Student" name="nameStudent" required>
                @foreach ($listStudent as $student) @if($student->status == '1')
                <option value="{{ $student->idStudent }}">{{ $student->firstName }} {{ $student->middleName }} {{ $student->lastName }}</option>
                @endif
                @endforeach
            </select>
        </div>
       
        <div class="row">
            <label class="col-md-3"></label>
            <div class="col-md-9" style="left: 400px">
                <div class="form-group form-button">
                    <button type="submit" class="btn btn-fill btn-rose">Add Student</button>
                </div>
            </div>
        </div>
    
</div>		
</form>
</div>
</div>	
@endsection