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
        <h4 class="card-title">LIST ADMIN</h4>
        <div class="table-responsive">
            <a href="{{ route('admin.create') }}" class="btn btn-primary btn-round">Add Admin</a><br>               
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
                <tr class="success" >
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date Birth</th>
                    <th>Gender</th>
                    <th>Role</th>  
                    <th width="10%"></th>
                    <th width="10%"></th>
                    
                </tr>
                <?php foreach ($listAdmin as $admin) : ?>
                    <tr>                     
                        <td>{{ $admin->nameAdmin }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->password }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->phone }}</td>
                        <td>{{ $admin->dateBirth }}</td>
                        <td>{{ $admin->gender == 1 ? 'Nam' : 'Nữ'}}</td>
                        <td>{{ $admin->role == 1 ? 'Super Admin' : 'Admin'}}</td>
                        
                        <td><a class="btn btn-sm btn-warning"
                            href="{{ route('admin.edit', $admin->idAdmin) }}">EDIT</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.destroy', $admin->idAdmin) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa Admin? Thao tác này không thể hoàn tác.')">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
                
                {{ $listAdmin->appends([
                'search' => $search,
                ])->links('pagination::bootstrap-4') }}
            </div>
            <a href="{{ route('admin.import-excel') }}" class="btn btn-rose btn-round">Import excel</a>
            <a href="{{ route('admin.export-excel') }}" class="btn btn-success btn-round">Export excel</a><br>
        </div>
    </div>
    @endsection
</div>