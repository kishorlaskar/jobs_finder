
@extends('layout.admin_layout') @php $i=1; @endphp
@section ('main_panel')
 <div class="content">
        <div class="container-fluid">
          <div class="row">  
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0">Candidate List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <tr>
                          <th>ID</th>
                          <th>Company Name</th>
                          <th>Job Designation</th>
                          <th>Published On</th>
                          <th>Company Email</th>
                           <th>More Information</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($job_lists as $job_list)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$job_list->company_name}}</td>
                          <td>{{$job_list->designation_name}}</td>
                          <td>{{$job_list->published_on}}</td>
                          <td>{{$job_list->company_email}}</td>
                          <td><a href="" class="btn btn-primary">View More</a></td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

