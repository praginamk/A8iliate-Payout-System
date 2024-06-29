@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Payroll</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-body">
                        <h3>Total  Amount from sale: {{ $totalSalesAmount }}</h3>
                        <h3>Total Commission Amount: {{ $totalCommissionAmount }}</h3>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    @endsection