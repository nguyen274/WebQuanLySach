@extends('layout.app')
@section('content')<br><br><br>
<div class="card">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">admin_panel_settings</i>
    </div>
    <div class="card-content">
     <h4 class="card-title">PERSONAL INFORMATION</h4>
     <div class="row">
         <div class="col-md-10">
             <div class="form-group label-floating">
                 <label class="control-label">FULL NAME</label>
                 <h1 class="form-control" >{{ Session::get('name') }}{{ Session::get('name1') }} </h1>
             </div>
            </div>
         <div class="col-md-5">
            <div class="form-group label-floating">
                <label class="control-label">USERNAME</label>
                <h1 class="form-control" >{{ Session::get('username') }}{{ Session::get('username1') }} </h1>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group label-floating">
                <label class="control-label">PASSWORD</label>
                <h1 class="form-control" >{{ Session::get('password') }}{{ Session::get('password1') }} </h1>
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group label-floating">
                <label class="control-label">EMAIL</label>
                <h1 class="form-control" >{{ Session::get('email') }}{{ Session::get('email1') }} </h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group label-floating">
                <label class="control-label">PHONE</label>
                <h1 class="form-control" >
                {{ Session::get('phone') }}  {{ Session::get('phone1') }}</h1>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group label-floating">
                <label class="control-label">DATE BIRTH</label>
                <h1 class="form-control" >
                   {{ Session::get('dateBirth') }}{{ Session::get('dateBirth1') }}
               </h1>
           </div>
       </div>
   </div>   
   <div class="col-md-3">
     <div class="form-group label-floating">
         <label class="control-label">GENDER</label>
         <h1 class="form-control">
            @if (Session::get('gender')  == '1' || Session::get('gender1')  == '1')
            Nam
            @else
            Nữ
            @endif
        </h1>
    </div>
</div>

<div class="row">
 <div class="col-md-4">
     <div class="form-group label-floating">
         <label class="control-label">ROLE</label>
         <h1 class="form-control">
             
             @if (Session::get('role'))
             Super Admin
             @else
             Admin
             @endif
         </h1>
     </div>
 </div>
</div>

</div>
</div>	
@endsection