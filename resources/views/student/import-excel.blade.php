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
        <i class="material-icons">school</i>
    </div>
    <div class="card-content">
        <h4 class="card-title">Import Excel Student</h4>
        <div class="table-responsive">
            <p class="text-warning"><strong>BẢNG EXCEL BAO GỒM CÁC TRƯỜNG:</strong></p>
            <p><strong>( Họ , Tên đệm , Tên , Email , SĐT , Giới tính , Ngày Sinh , Trạng thái , Mã lớp )</strong></p>
            <p class="text-danger">-- Viết hoa chữ cái đầu của dữ liệu --</p>
            <form action="{{ route('student.import-excel-process') }}" method="post" enctype="multipart/form-data">
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