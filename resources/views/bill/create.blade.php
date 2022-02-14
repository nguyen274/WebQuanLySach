@extends('layout.app')
@section('content')<br><br><br>
<div class="card">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">import_contacts</i>
    </div>
    <div class="card-content">
        <h4 class="card-title">ADD BILL</h4>

        <form action="{{ route('bill.store') }}" method="post" class="form-horizontal">
          <div class="row">
              @csrf

              {{-- <label class="col-md-3 label-on-left">Ngày nhập phiếu:</label>
              <div class="col-md-9">
                <div class="form-group label-floating is-empty">
                   <label class="control-label"></label>
                
                   <input type="date" class="form-control" name="" readonly>
               </div>
           </div> --}}
           
           

           <label class="col-md-3 label-on-left">Name Book:</label>          
           <div class="col-md-9"><div class="form-group label-floating is-empty">
             {{-- <select class="selectpicker" data-style="btn btn-primary btn-round" title="Tên sách" name="nameBook" required>
                đây nài 2 cái biến này này lấy ở đâu đổ ra
                @foreach ($listBook as $book)
                <option value="{{ $book->idBook }}">{{ $book->nameBook }}</option>
                @endforeach
            </select> --}}
            <label class="control-label"></label>
            <input type="hidden" class="form-control" value="{{$id->idBook}}" name="nameBook">
            <input type="text" class="form-control" data-style="btn btn-primary btn-round" title="Tên sách" name=""  value="{{$id->book}}" required>
        </div>
    </div>
           <label class="col-md-3 label-on-left">Name Student:</label>            
           <div class="col-md-9"><div class="form-group label-floating is-empty">
           
             {{-- <select class="selectpicker" data-style="btn btn-primary btn-round" title="Tên SV" name="name" required>
                @foreach ($listStudent as $student)@if($student->status == '1')
                <option value="{{ $student->idStudent }}">{{ $student->firstName }} {{ $student->middleName }} {{ $student->lastName }}</option>
                @endif      
                 @endforeach
            </select> --}}<label class="control-label"></label>
            <input type="hidden" class="form-control" name="name" value="{{$id->idStudent}}">
            <input type="text" class="form-control" data-style="btn btn-primary btn-round" title="Tên SV" name="" value="{{$id->student}}" readonly >
        </div></div>
        <label class="col-md-3 label-on-left">Amount:</label>
        <div class="col-md-1">
            <div class="form-group label-floating is-empty">
               <label class="control-label"></label>
               <input type="number" class="form-control" name="amountBook" min="1" required>
           </div>
       </div>
       
       <div class="row">
        <label class="col-md-3"></label>
        <div class="col-md-9" style="left: 400px">
            <div class="form-group form-button">
                <button type="submit" class="btn btn-fill btn-rose">Add Bill</button>
            </div>
        </div>
    </div>
    
</div>		
</form>
</div>
</div>	
@endsection