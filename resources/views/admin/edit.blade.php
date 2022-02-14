@extends('layout.app')
@section('title', 'Cập nhật admin')
@section('content')<br><br><br>
<div class="card">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">admin_panel_settings</i>
    </div>
    <div class="card-content">
       <h4 class="card-title">EDIT ADMIN</h4>

       <form action="{{ route('admin.update', $admin->idAdmin) }}" method="post" class="form-horizontal">
          <div class="row">
              
              @method('PUT')
              @csrf
              <label class="col-md-3 label-on-left">Name:</label>
              <div class="col-md-9">
                <div class="form-group label-floating is-empty">
                   <label class="control-label"></label>
                   <input type="text" class="form-control" name="name" value="{{ $admin->nameAdmin }}" required>
               </div>
           </div>

           <label class="col-md-3 label-on-left">Username:</label>
           <div class="col-md-9">
            <div class="form-group label-floating is-empty">
               <label class="control-label"></label>
               <input type="text" class="form-control" name="username" value="{{ $admin->username }}" required>
           </div>
       </div>
       
       <label class="col-md-3 label-on-left">Password:</label>
       <div class="col-md-9">
        <div class="form-group label-floating is-empty">
           <label class="control-label"></label>
           <input type="password" class="form-control" name="password" value="{{ $admin->password }}" required>
       </div>
   </div>

   <label class="col-md-3 label-on-left">Email:</label>
   <div class="col-md-9">
    <div class="form-group label-floating is-empty">
       <label class="control-label"></label>
       <input type="text" class="form-control" name="email" value="{{ $admin->email }}" required>
   </div>
</div>

<label class="col-md-3 label-on-left">Phone:</label>
<div class="col-md-9">
    <div class="form-group label-floating is-empty">
       <label class="control-label"></label>
       <input type="number" class="form-control" name="phone" value="{{ $admin->phone }}" required>
   </div>
</div>

<label class="col-md-3 label-on-left">Date Birth:</label>
<div class="col-md-9">
   <div class="form-group label-floating is-empty">
    <label class="label-control"></label>
    <input type="date" class="form-control datepicker" name="dateBirth" value="{{ $admin->dateBirth }}" />
</div>
</div>

<label class="col-md-3 label-on-left">Gender:</label>            
<div class="col-md-3">
 <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Gender" name="gender"  required>
    <option value="1">Nam</option>
    <option value="0">Nữ</option>
</select>
</div>

<label class="col-md-3 label-on-left">Role:</label>            
<div class="col-md-3">
 <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Role" name="role" required>
    <option value="1">Super Admin</option>
    <option value="0">Admin</option>
</select>
</div>

<div class="row">
    <label class="col-md-3"></label>
    <div class="col-md-9" style="left: 400px">
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