@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Police Station</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Police Station</li>
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
                    <form action='update_ps/{{$data_ps->id}}' class="form-horizontal form-material mx-2">
                      @csrf
                      @method('put')
                    <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">Type:</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <select name='P_id' class="form-select shadow-none form-control-line">
                                    <option value="">Select parlament</option>
                                    @foreach($data_p as $data)
                                    <option value="{{$data->id}}">{{$data->name}}-{{$data->no}}</option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;"> Station:</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='PS_name' value='{{$data_p->PS_name}}'type="text" placeholder="Insert Police Station" class="form-control form-control-line">
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



        <div class="row">
            <!-- column -->
            <div class="col-12  w-75 m-auto">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">SL</th>
                                    <th class="border-top-0 text-center">Parlament Name</th>
                                    <th class="border-top-0 text-center">Parlament Number</th>
                                    <th class="border-top-0 text-center">Polish Station Name</th>
                                    <th class="border-top-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data_ps as $data_ps)
                                <tr>
                                    <td>{{$loop->index+1}}
                                    </td>
                                    <td>{{$data_ps->PS_name}}</td>
                                    <td>{{$data_ps->P_id}}</td>
                                    <td>{{$data_ps->name}}</td>
                                    <td class="td_css">
                                    <a  href='/ps_update_page/{{$data_ps->id}}' name="btn_edit" class="btn btn-info"><i class="bi bi-pen"></i></a>
                                    <form class="spacing" method="POST" action='/delete_unit_rp_info/unitRP/{{$data->id}}'>
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