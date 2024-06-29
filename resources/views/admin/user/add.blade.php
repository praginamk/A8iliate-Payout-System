@extends('admin.layout')

@section('content')
<div class="main-content">
    <div class="container">
       <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1 class="m-0 text-dark"> Pooja </h1>-->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin')}}"> Home </a></li>
              <li class="breadcrumb-item active"> Users </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
        <div class="row">
            <div class="col-md-10 offset-md-2">
        @if(session()->has('message'))

            <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <p><strong>Well done!</strong> {{ session()->get('message')  }}.</p>
            </div>

        @endif
        @if(session()->has('err_message'))

          <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><strong>Oh Snap!</strong> {{ session()->get('err_message')  }}.</p>
          </div>

      @endif

      @if($errors->any())
        <div class="alert alert-danger">
            {{ implode('', $errors->all(':message')) }}
        </div>
    @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 style="float:left;">Register User</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form  action="{{route('storeuser')}}"   method="post" class="forms-sample">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName18">Name*</label>
                                            <div class="row">
                                                    <input required type="text" class="form-control" id="name" name="name" placeholder="Enter Name" /> 
                                                    <br>
                                            </div>
                                         </div>

                                        <div class="form-group">
                                            <label for="exampleInputName18">Email</label>
                                            <div class="row">
                                                    <input required type="text" class="form-control"  id="email" name="email" placeholder="Enter Email" /> <br>
                                            </div>
                                         </div>
                                       
                                         <div class="form-group">
                                            <label for="exampleInputName18">Password</label>
                                            <div class="row">
                                            <input type="password" name="password" id="password" class="form-control" required>                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label for="exampleInputName18">Confirm Password</label>
                                            <div class="row">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                            </div>
                                         </div>
                                               
                                        <button style="float: right;" type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
</div>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    
@endsection
