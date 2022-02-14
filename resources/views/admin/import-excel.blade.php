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
        <i class="material-icons">admin_panel_settings</i>
    </div>
    <div class="card-content">
        <h4 class="card-title">Import Excel Admin</h4>
        <div class="table-responsive">
            <p class="text-warning"><strong>BẢNG EXCEL BAO GỒM CÁC TRƯỜNG:</strong></p>
            <p><strong>( Họ Tên, Username, Password, Email, SĐT, Ngày Sinh, Giới tính, Chức Vụ )</strong></p>
            <p class="text-danger">-- Viết hoa chữ cái đầu của dữ liệu --</p>
            <form action="{{ route('admin.import-excel-process') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <input type="file" name="excel" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                
                <br>
                <div class="btn-box">
                    <button type="submit" class="btn btn-rose">import file</button>
                </div>
            </form>
            
            </div>
        </div>
    </div>
    @endsection
</div>