
@extends('layout.admin_layout') @php $i=1; @endphp
@section ('main_panel')
 <div class="content">
        <div class="container-fluid">
          <div class="row">  
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0">Candidate Skill Test List</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <tr>
                          <th>ID</th>
                          <th>Subject Name</th>
                          <th>Category</th>
                          <th>More Information</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($skill_tests as $skill_test)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$skill_test->subject_name}}</td>
                          <td>{{$skill_test->category}}</td>
                           <td><a href="" class="btn btn-primary">View More</a></td>
                        </tr> 
                        @php $i++; @endphp
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                    </div>
                    <div class="col-md-2" style="margin-top: 50px;">
                       <h4>Archive</h4>
                      <div style="border-left: thick solid #862FA0;"> 

                        <h5><a href="" style="color: #9c27b0">2015</a></h5>
                        <h5><a href="" style="color: #9c27b0">2015</a></h5>
                        <h5><a href="" style="color: #9c27b0">2015</a></h5>
                        <h5><a href="" style="color: #9c27b0">2015</a></h5>

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

