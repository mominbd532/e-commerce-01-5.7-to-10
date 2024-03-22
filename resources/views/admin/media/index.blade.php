@extends('layouts.adminLayout.admin_design')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">View
                    Categories</a> </div>
            @if (Session::has('message'))
                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{!! session('message') !!}</strong>

                </div>
            @endif
        </div>
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Media</h5>
                            <button type="button" class="btn btn-primary btn-sm pull-right">
                                Add New
                            </button>
                        </div>
                        <div class="widget-content nopadding">
                            ......................
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
