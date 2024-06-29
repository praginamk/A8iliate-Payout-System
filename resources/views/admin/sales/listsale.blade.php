@extends('admin.layout')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Sales Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
              
           
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
                                <th>Sale Amount</th>
                                <th>Amount After Commission</th>
                                <th>Date of Sale</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$row->amount}} </td>
                                <td> {{$row->amount_after_commission}} </td>
                                <td> {{ $row->created_at->format('Y-m-d') }}
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
