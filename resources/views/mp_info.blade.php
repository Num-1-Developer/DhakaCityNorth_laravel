@extends('layout.master')
<!-- Page wrapper  -->
<!-- ============================================================== -->
@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add M.P Information</h4>
            </div>
            @if(session()->has('message'))
            @if(session()->get('message')=='0')
                <div class="alert alert-danger">
                    <p>You value already existed (Insert Failed)</p>
    
                </div>
            @else
                <div class="alert alert-success">
                    <p>Insert Success</p>
    
                </div>
            @endif
        @endif
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add M.P Information</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">


        <!-- ============================================================== -->
        <!-- Add Police Station -->
        <div class="col-12  w-75 m-auto">
            <div class="card">
                <div class="card-body">
                    <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                    <form action='insert_mp_info' method="POST" class="form-horizontal form-material mx-2">
                      @csrf
                    <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">Add M.P Information</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <select name='p_id' class="form-select shadow-none form-control-line">
                                    <option value="">Select parlament</option>
                                    @foreach($data_p as $data)
                                    <option value="{{$data->id}}">{{$data->name.'-'.$data->no}}</option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">M.P Name</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_name' type="text" placeholder="Insert M.P's Name" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">M.P Phone</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_phone' type="number" placeholder="Insert M.P's phone No." class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">M.P NID</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_nid' type="number" placeholder="Insert M.P's NID No." class="form-control form-control-line">
                            </div>
                        </div>
                       
                        <div class="form-group d-flex">
                            <div class="col-sm-12" style="width: 25%;"></div>
                            <div class="col-sm-12" style="width: 75%;">
                                <button href='insert_ps' class="btn btn-success text-white">Submit</button> <button class="btn btn-success text-white">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Add Police Station -->
        <!-- ============================================================== -->





{{-- =======================================================================================================
==============================       Show show table        ===========================================
==================================================================================================== --}}
        <div class="row">
            <!-- column -->
            <div class="col-12  w-75 m-auto">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">SL</th>
                                    <th class="border-top-0 text-center">Parlament</th>
                                    <th class="border-top-0 text-center">M.P's Name</th>
                                    <th class="border-top-0 text-center">M.P's Phone</th>
                                    <th class="border-top-0 text-center">M.P's NID</th>
                                    <th class="border-top-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data_mp as $data)
                                <tr>
                                <!--  -->
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$loop->index+1}}
                                    </td>
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->name.'-'.$data->no}}</td>
                                    <td style='line-height: 0.5;padding: .5rem; text-align: center'>{{$data->mp_name}}</td>
                                    <td style='line-height: 0.5;padding: .5rem; text-align: center'>{{$data->mp_phone}}</td>
                                    <td style='line-height: 0.5;padding: .5rem; text-align: center'>{{$data->mp_nid}}</td>
                                    <td class="td_css" style='line-height: 0.5;padding: .5rem;text-align: center'>
                                    <a  href='/ps_update_page/{{$data->id}}' name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                    <form class="spacing" method="POST" action='/delete/mpDetail/{{$data->id}}'>
                                        @csrf
                                        @method('delete')
                                        <button id='custom-btn' class="btn btn-danger"> <i class="bi bi-trash"></i> </button>
                                     </form>
                                </td>
                                
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- =======================================================================================================
==============================     End Show show table        ===========================================
==================================================================================================== --}}







    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        All Rights Reserved by Nice admin. Designed and Developed by
        <a href="https://www.wrappixel.com">WrapPixel</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
    
@endsection



