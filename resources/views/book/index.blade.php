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
       <h4 class="card-title">LIST BOOK</h4>
       <div class="table-responsive">
        <a href="{{ route('book.create') }}" class="btn btn-primary btn-round">add book</a><br>
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
             <th>Name Book</th>
             <th>Name Subject</th>
             <th>Original Number Of Books </th>
             <th>Number Of Books Distributed </th>
             <th>Number Of Books Remaining</th>
             <th width="10%"></th>
             <th width="10%"></th>
         </tr>
         @foreach ($listBook as $book)
         <tr align="center">
            <td>{{ $book->idBook }}</td>
            <td>{{ $book->nameBook }}</td>
            <td>{{ $book->nameSubject }}</td>
            <td>{{ $book->amount }}</td>
            <td> @php
                $sum =\App\Models\bill::where('idBook','=',$book->idBook)
                ->sum('bill.amountBook');
            @endphp
            {{ $sum}}</td>
            <td>{{ $book->amount - $sum}}</td>
            <td><a class="btn btn-sm btn-fill btn-warning" href="{{ route('book.edit', $book->idBook) }}">EDIT</a></td>
            <td>
                <form action="{{ route('book.destroy', $book->idBook) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sách? Thao tác này không thể hoàn tác.')">DELETE</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $listBook->appends([
    'search' => $search
    ])->links('pagination::bootstrap-4') }}
</div>
            <a href="{{ route('book.import-excel') }}" class="btn btn-rose btn-round">Import excel</a>
            <a href="{{ route('book.export-excel') }}" class="btn btn-success btn-round">Export excel</a><br>
        
</div>
</div>		
@endsection