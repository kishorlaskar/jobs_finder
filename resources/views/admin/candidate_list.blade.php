
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
                        <th>
                          ID
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Mobile
                        </th>
                        <th>More Information</th>
                      </thead>

                      <tbody>
                      	@foreach($candidate_lists as $candidate_list)
                        <tr>
                        	<td>{{$i}}</td>
                        	<td>{{$candidate_list->jobseekeremail}}</td>
                        	<td>{{$candidate_list->firstname}} {{$candidate_list->lastname}}</td>
                        	<td>{{$candidate_list->mobile}}</td>
                            <td><a href="" class="btn btn-primary">View More</a></td>
                        </tr> 
                        @php $i++; @endphp
                        @endforeach   
                      </tbody>

                    </table>
                     
					    {{$candidate_lists->links()}}
				       
                     </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

