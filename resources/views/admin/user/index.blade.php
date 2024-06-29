@extends('admin.layout')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
              
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/user-registration')}}">Add</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <div class="row">
            <div class="col-md-10 offset-md-2">
                 @if(session()->has('success'))

                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="text-align: center;margin-bottom: 0;"><strong></strong> {{ session()->get('success')  }}.</p>
                    </div>
                @endif
                @if(session()->has('err_message'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="text-align: center;margin-bottom: 0;"><strong></strong> {{ session()->get('err_message')  }}.</p>
                    </div>
                 @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ implode('', $errors->all(':message')) }}
                    </div>
                @endif
            </div>
        </div>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">       
          
           <div class="card">
                
                <div class="card-body">
                     <table id="example" class="table table-striped table table-bordered" style="width:100%" >
                        <thead>
                            <tr>
                                <th> SI. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                 <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$row->name}} </td>
                                <td> {{$row->email}} </td>
                                <td>
                                    <a href="{{ url('admin/user-remove/'. $row->id)}}" onclick="return confirm('are you sure?')" title="delete row"><i class="fa fa-trash" aria-hidden="true" style="color: #c10707"></i></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    </div>
    
  </section>
<br><br>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
   
@endsection
