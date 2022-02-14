@extends('layout.app')
@section('content')<br><br><br>
<div class="card">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">import_contacts</i>
    </div>
    <div class="card-content">
        <h4 class="card-title">ADD BOOK</h4>

        <form action="{{ route('book.store') }}" method="post" class="form-horizontal">
          <div class="row">
              @csrf

              <label class="col-md-3 label-on-left">Name Book:</label>
              <div class="col-md-9">
                <div class="form-group label-floating is-empty">
                   <label class="control-label"></label>
                   <input type="text" class="form-control" name="name">
               </div>
           </div>

           <label class="col-md-3 label-on-left">Name Subject:</label>            
           <div class="col-md-3">
             <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Subject" name="nameSubject">
                @foreach ($listSubject as $subject)
                <option value="{{ $subject->idSubject }}">{{ $subject->nameSubject }}</option>
                @endforeach
            </select>
        </div>
        <label class="col-md-2 label-on-left">Amount:</label>
        <div class="col-md-4">
            <div class="form-group label-floating is-empty">
               <label class="control-label"></label>
               <input type="number" class="form-control" name="amount" min="1">
           </div>
       </div>
       
       <div class="row">
        <label class="col-md-3"></label>
        <div class="col-md-9" >
            <div class="form-group form-button">
                <button type="submit" class="btn btn-fill btn-rose">Add Book</button>
            </div>
        </div>
    </div>
    
</div>		
</form>
</div>
</div>	
@endsection