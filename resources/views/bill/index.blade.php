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
                 <h4 class="card-title">Inventory delivery voucher</h4>
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
            <th>Date Time</th>
			<th>Name Book</th>
            <th>Name Student</th>
			<th>Quantity</th>
            <th width="10%"></th>
            <th width="10%"></th>
		</tr>
		@foreach ($listBill as $bill)
			<tr>
				<td>{{ $bill->idBill }}</td>
                <td>{{ $bill->billDate }}</td>
				<td>{{ $bill->nameBook }}</td>
                <td>{{ $bill->firstName }} {{ $bill->middleName }} {{ $bill->lastName }}</td>
				<td>{{ $bill->amountBook }}</td>
				<td><a class="btn btn-sm btn-fill btn-warning" href="{{ route('bill.edit', $bill->idBill) }}">EDIT</a></td>
                <td>
                    <form action="{{ route('bill.destroy', $bill->idBill) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bill? Thao tác này không thể hoàn tác.')">DELETE</button>
                    </form>
                </td>
            </tr>
		@endforeach
	</table>
	{{ $listBill->appends([
		'search' => $search
		])->links('pagination::bootstrap-4') }}
					</div>
                    <a href="{{ route('bill.export-excel') }}" class="btn btn-success btn-round">Export excel</a><br>

				</div>
		</div>		
@endsection