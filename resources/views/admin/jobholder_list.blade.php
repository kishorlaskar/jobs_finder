
@extends('layout.admin_layout') @php $i=1; @endphp
@section('main_panel')
 <div class="content">
        <div class="container-fluid">
          <div class="row">  
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0">Jobholder List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <tr>
                       <th>ID</th>
                       <th>Username</th>
                       <th>Company Name</th>
                       <th>Company Email</th>
                       <th>Company Contact</th>
                       <th>More Information</th>
                       </tr>
                      </thead>
                      <tbody>
                        @foreach($jobholder_lists as $jobholder_list)
                        <tr>
                         <td>{{$i}}</td>
                         <td>{{$jobholder_list->username}}</td>
                         <td>{{$jobholder_list->company_name}}</td>
                         <td>{{$jobholder_list->contact_person_email}}</td>
                         <td>{{$jobholder_list->contact_person_phone}}</td>
                         <td><a href="" class="btn btn-primary">View More</a></td>
                        </tr> 
                        @php $i++; @endphp
                        @endforeach
                      </tbody>
                    </table>
                    {{$jobholder_lists->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

