
@extends('layout.admin_layout') @php $i=1; @endphp
@section ('main_panel')
 <div class="content">
        <div class="container-fluid">
          <div class="row">  
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="">
                    <a href="{{url('manage_job')}}" style="color: orchid">Industry Type</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{url('job_designation')}}" style="color: orchid">Job Designation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{url('job_type')}}" style="color: orchid">Job Type</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <h4 style="color: #862FA0; display: inline-block;padding: 5px;">Job Type Information</h4>
                    <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-6">
                       <table class="table table-hover">
                      <thead class="">
                        <tr>
                          <th>ID</th>
                          <th>Job Type</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($job_types as $job_type)
                       <tr>
                         <td>{{$i}}</td>
                         <td>{{$job_type->job_name}}</td>
                       </tr>
                        @php $i++; @endphp
                        @endforeach
                      </tbody>
                    </table>
                    {{$job_types->links()}}
                    </div>
                    <div class="col-md-1" style="border-left: thick solid #862FA0; height: 300px;"> 
                    </div>
                    <div class="col-md-4">
                      <h4 style="color: white; display: inline-block;padding: 5px;">Add Job Type</h4><br><br>
                      <form>
                      <input type="text" class="form-control" name="" placeholder="Enter Industry Type"><br>
                      <input type="submit" class="btn btn-primary" name="" value="Submit">
                      </form>
                    </div>
                   </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

