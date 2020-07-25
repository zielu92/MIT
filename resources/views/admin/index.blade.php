@extends('admin.layout.admin')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Dashboard <small>Statistics Overview</small></h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-6 text-right">
                                <p class="announcement-heading">456</p>
                                <p class="announcement-text">Users!</p>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer announcement-bottom">
                            <div class="row">
                                <div class="col-xs-6">
                                    View Users
                                </div>
                                <div class="col-xs-6 text-right">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-gift fa-5x"></i>
                            </div>
                            <div class="col-xs-6 text-right">
                                <p class="announcement-heading">12</p>
                                <p class="announcement-text">Products</p>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer announcement-bottom">
                            <div class="row">
                                <div class="col-xs-6">
                                    View products
                                </div>
                                <div class="col-xs-6 text-right">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-6 text-right">
                                <p class="announcement-heading">18</p>
                                <p class="announcement-text">Orders</p>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer announcement-bottom">
                            <div class="row">
                                <div class="col-xs-6">
                                    View orders
                                </div>
                                <div class="col-xs-6 text-right">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-dollar fa-5x"></i>
                            </div>
                            <div class="col-xs-6 text-right">
                                <p class="announcement-heading">56</p>
                                <p class="announcement-text">Donations!</p>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer announcement-bottom">
                            <div class="row">
                                <div class="col-xs-6">
                                    View donations
                                </div>
                                <div class="col-xs-6 text-right">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div><!-- /.row -->



    </div><!-- /#page-wrapper -->

@endsection
