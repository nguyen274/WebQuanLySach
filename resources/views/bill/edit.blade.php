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
        <h4 class="card-title">EDIT BILL</h4>

        <form action="{{ route('bill.update', $bill->idBill) }}" method="post" class="form-horizontal">
          <div class="row">
              @csrf
              @method('PUT')

              <label class="col-md-3 label-on-left">Ngày nhập phiếu:</label>
              <div class="col-md-9">
                <div class="form-group label-floating is-empty">
                   <label class="control-label"></label>
                   <input type="date" class="form-control" name="billDate" value="{{ $bill->billDate }}" />
               </div>
           </div>


           <label class="col-md-3 label-on-left">Name Book:</label>            
           <div class="col-md-3">
             <select class="selectpicker" data-style="btn btn-primary btn-round" title="Chọn tên sách" name="nameBook">
                @foreach ($listBook as $book)
                <option value="{{ $book->idBook }}"
                 <?php 
                 if($bill->idBook == $book->idBook){
                   echo "selected";
               }
               ?>
               >{{ $book->nameBook }}</option>
               @endforeach
           </select>

           <label class="col-md-3 label-on-left">Name Student:</label>            
           <div class="col-md-9">
             <select class="selectpicker" data-style="btn btn-primary btn-round" title="Tên SV" name="lastName">
                @foreach ($listStudent as $student)
                <option value="{{ $student->idStudent }}">{{ $student->firstName }} {{ $student->middleName }} {{ $student->lastName }}</option>
                @endforeach
            </select>
        </div>
        <label class="col-md-2 label-on-left">Amount:</label>
        <div class="col-md-4">
            <div class="form-group label-floating is-empty">
               <label class="control-label"></label>
               <input type="number" class="form-control" name="amountBook" min="1" value="{{ $bill->amountBook }}">
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