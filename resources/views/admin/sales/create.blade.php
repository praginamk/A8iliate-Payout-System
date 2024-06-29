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
              <li class="breadcrumb-item active"> Sales</li>
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
                        <h3 style="float:left;">Sales</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                        @if(session()->has('success'))

<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p style="text-align: center;margin-bottom: 0;"><strong></strong> {{ session()->get('success')  }}.</p>
</div>
@endif
                            <div class="row">
                                <div class="col-md-12">
                                <form action="{{ route('sales.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Record Sale</button>
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
