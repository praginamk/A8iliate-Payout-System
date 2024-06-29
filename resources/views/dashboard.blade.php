@extends('admin.layout')
@section('content')

<style>
  /**/
.card-sec {
    text-align: center;
    border-radius: 5px;
    padding: 2rem;
    color:#fff;
     font-weight: 600;
}
.card-sec h2{
    font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
   
}
.blue{
        background: #009de1;
}
.green{
    background: #53b848;
}
.rose{
    background: #d82d60;
}
.orange{
        background: #fdba12;
}
.litblue{
    background: #087bad;
}
.litgreen{
    background: #418e38;
}
.dash-brackground{
    background-image: url('{{ asset('assests/images/LB logo NoBackground.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed; /* This ensures the background stays fixed even when scrolling */
}
</style>
   <!-- Content Wrapper. Contains page content -->
   <div class="dash-brackground" >
   <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header"  >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
           
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </div>
    </div>



   
       

   
   
@endsection