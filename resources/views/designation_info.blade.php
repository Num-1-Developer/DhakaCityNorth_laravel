
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
                  <h4 class="page-title">Add Designation information</h4>
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
                              <li class="breadcrumb-item active" aria-current="page">Add Designation Information</li>
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
                      <form action='insert_designation_info' method="POST" class="form-horizontal form-material mx-2">
                        @csrf
                      <div class="form-group d-flex">
                              <label class="col-sm-12" style="width: 25%;">Designation Name</label>
                              <div class="col-sm-12" style="width: 75%;">
                                  <select name='d_name' class="form-select shadow-none form-control-line">
                                      <option value="Presindent">Select Designatin Name</option>  
                                      <option value="Presindent">President</option>  
                                      <option value="Secreatry">Secreatry</option>  
                                  </select>
                              </div>
                          </div>
                         
                          <div class="form-group d-flex">
                              <div class="col-sm-12" style="width: 25%;"></div>
                              <div class="col-sm-12" style="width: 75%;">
                                  <button class="btn btn-success text-white">Submit</button> 
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
                                      <th class="border-top-0 text-center">Designation Name</th>
                                      <th class="border-top-0 text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($data as $data)
                                  <tr>
                                  <!--  -->
                                      <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$loop->index+1}}
                                      </td>
                                      <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->d_name}}</td>
                                      <td class="td_css" style='line-height: 0.5;padding: .5rem;text-align: center'>
                                            <td class="td_css" style='line-height: 0.5;padding: .5rem;text-align: center'>
                                      <a   href='/parlament_update_page/{{$data->id}}' name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                      <form class="spacing" method="POST" action='/delete/designation/{{$data->id}}'>
                                        @csrf
                                        @method('delete')
                                        <button id="custom-btn" class="btn btn-danger"> <i class="bi bi-trash"></i> </button>
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


  

