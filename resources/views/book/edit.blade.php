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
        <h4 class="card-title">EDIT BOOK</h4>

        <form action="{{ route('book.update', $book->idBook) }}" method="post" class="form-horizontal">
          <div class="row">
              @csrf
              @method('PUT')

              <label class="col-md-3 label-on-left">Name Book:</label>
              <div class="col-md-9">
                <div class="form-group label-floating is-empty">
                   <label class="control-label"></label>
                   <input type="text" class="form-control" name="name" value="{{ $book->nameBook }}">
               </div>
           </div>
           
           <label class="col-md-3 label-on-left">Name Subject:</label>            
           <div class="col-md-3">
             <select class="selectpicker" data-style="btn btn-primary btn-round" title="Chọn môn" name="nameSubject">
                @foreach ($listSubject as $subject)
                <option value="{{ $subject->idSubject }}"
                 <?php 
                 if($book->idSubject == $subject->idSubject){
                   echo "selected";
               }
               ?>
               >{{ $subject->nameSubject }}</option>
               @endforeach
           </select>
       </div>

       <label class="col-md-2 label-on-left">Amount:</label>
       <div class="col-md-4">
        <div class="form-group label-floating is-empty">
           <label class="control-label"></label>
           <input type="number" class="form-control" name="amount" value="{{ $book->amount }}">
       </div>
   </div>
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