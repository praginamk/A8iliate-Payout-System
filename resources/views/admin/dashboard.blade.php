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
</style>
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- Start Theme Layout Style
        =====================================================================-->
        <!-- Theme style -->
        
        
   <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{count($orders)}}</h3>
                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-flame"></i>
              </div>
              <a href="{{ url('/admin/new_orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
           <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{count($special_order)}}</h3>
                <p>Special Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-flame"></i>
              </div>
              <a href="{{ url('/admin/special_orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
             @php
              $dt = new DateTime();
              
                 $bbb= \DB::table('poojacategories')
                            ->select('*')
                            ->get();
                            
                            $i=1
                           
                            @endphp
                            @foreach($bbb as $row)
                            
                            <?php
                            $c=array("bg-success","bg-danger","bg-warning","bg-info","bg-success","bg-danger","bg-warning","bg-info","bg-success");
                            $class=$c[$i];
                           
                           
                           
                            ?>
                            
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box <?= $class ?>">
              <div class="inner">
                      @php
                     $pooja_categories2 = \DB::table('devotees')
                            ->join('poojas','devotees.pooja_id','poojas.id' ,'left')
                            ->join('poojacategories','poojas.pooja_category','poojacategories.id','left')
                            ->join('orders','devotees.order_table_id','orders.id')
                            ->select('poojacategories.category','poojacategories.color','poojacategories.id',\DB::raw('COUNT(devotees.id) AS order_count') )
                            ->where('devotees.perform_date', $dt->format('d-m-Y'))
                            ->where('poojacategories.id', $row->id)
                            ->where('orders.payment_satus',"success")
                            ->first();
                   // dd($pooja_categories2);
               @endphp
                <h3>@if(empty($pooja_categories2->order_count))
                 0 
                 @else
                 {{$pooja_categories2->order_count}}
                @endif</h3>
                <p>{{$row->category}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-flame"></i>
              </div>
              <a href="{{ url('/admin/new_poojas/'.$row->id)}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> @php
         
          
          $i++;
          
          @endphp @endforeach
          <!-- ./col -->
         
    </section>
    
    </div>
@endsection