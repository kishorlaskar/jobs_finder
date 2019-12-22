 
 @php 
 $designation=array(); $city_array=array();$industry_names=array();
 foreach ($job_designation_id as $value) {
  $designation[]=$value->job_designation_id;
 }
 foreach ($city_id as $value) {
  $city_array[]=$value->id;
 }
 foreach ($industry_name as $value) {
  $industry_names[]=$value->industry_type;
 }
 $job_designation_id=array_count_values($designation);
 $city_id=array_count_values($city_array);
 $industry_name=array_count_values($industry_names);
 @endphp
  <div class="col-md-3 col-sm-12"> 
        <!-- Side Bar start -->
        <div class="sidebar"> 
          <form method="get" action="{{url('side_search')}}">
          <!-- Jobs By Title -->
          <div class="widget">
            <h4 class="widget-title">Jobs By Title</h4>
          <ul class="optionlist"> @php $i=0; $count=count($job_designation)-1; @endphp
              @foreach($job_designation as $designation)
                 @if($i == 5)
                    <!-- Modal -->
                    <div class="modal fade" id="category_modal" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" style="height: auto;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Select a Cetegory</h4><hr>
                          </div>
                          <div class="modal-body">
                              <div class="row" style="margin-bottom: 10px;">
                                  
                      @endif
                 
                    @if($i<5)
                    <li>
                    <input type="checkbox" name="job_titles[]" id="{{$designation->id}}"  value="{{$designation->id}}">
                    <label for="{{$designation->id}}"></label>
                    {{$designation->designation_name}}(

                    @if (array_key_exists($designation->id,$job_designation_id))
                    {{$job_designation_id[$designation->id]}}
                    @else 0
                    @endif )
                    </li>
                    @else
                    <div class="col-md-6">
                    <li>   
                    <input type="checkbox" name="job_titles[]" id="{{$designation->id}}" value="{{$designation->id}}">
                    <label for="{{$designation->id}}"></label>
                    {{$designation->designation_name}}(
                      @if (array_key_exists($designation->id,$job_designation_id))
                    {{$job_designation_id[$designation->id]}}
                    @else 0
                    @endif )
                   </li>
                  </div>
                    @endif
                  @if($count == $i)
                </div>
              </div>
            </div> 
          </div>
        </div>
      
                  @endif
                  @php $i++; @endphp
              @endforeach 
          </ul>
            <a style="cursor: pointer;" id="" data-toggle="modal" data-target="#category_modal">View More</a> </div>
          
            
          <!-- Jobs By City -->
          <div class="widget">
            <h4 class="widget-title">Jobs By City</h4>
            <ul class="optionlist"> @php $i=0; $count=count($city)-1; @endphp
                @foreach($city as $city_value)
                   @if($i == 5)
                      <!-- Modal -->
                      <div class="modal fade" id="city_modal" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content" style="height: auto;">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Select City</h4><hr>
                            </div>
                            <div class="modal-body">
                                <div class="row" style="margin-bottom: 10px;">
                                    
                        @endif
                   
                      @if($i<5)
                      <li>
                      <input type="checkbox" name="job_city[]" id="{{$city_value->id}}"  value="{{$city_value->city_name}}">
                      <label for="{{$city_value->id}}"></label>
                      {{$city_value->city_name}}(
  
                      @if (array_key_exists($city_value->id,$city_id))
                      {{$city_id[$city_value->id]}}
                      @else 0
                      @endif )
                      </li>
                      @else
                      <div class="col-md-6">
                      <li>   
                      <input type="checkbox" name="job_titles[]" id="{{$city_value->id}}" value="{{$city_value->city_name}}">
                      <label for="{{$city_value->id}}"></label>
                      {{$city_value->city_name}}(
                        @if (array_key_exists($city_value->id,$city_id))
                      {{$city_id[$city_value->id]}}
                      @else 0
                      @endif )
                     </li>
                    </div>
                      @endif
                    @if($count == $i)
                  </div>
                </div>
              </div> 
            </div>
          </div>
        
                    @endif
                    @php $i++; @endphp
                @endforeach 
            </ul>
            <a style="cursor: pointer;" id="" data-toggle="modal" data-target="#city_modal">View More</a> </div>
          
          <!-- Jobs By Industry -->
          <div class="widget">
            <h4 class="widget-title">Jobs By Industry</h4>
            <ul class="optionlist"> @php $i=0; $count=count($industry)-1; @endphp
              @foreach($industry as $industry_value)
                 @if($i == 5)
                    <!-- Modal -->
                    <div class="modal fade" id="industry_modal" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" style="height: auto;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Select Industry</h4><hr>
                          </div>
                          <div class="modal-body">
                              <div class="row" style="margin-bottom: 10px;">
                                  
                      @endif
                 
                    @if($i<5)
                    <li>
                    <input type="checkbox" name="industry[]" id="{{$industry_value->industry_type_name}}"  value="{{$industry_value->industry_type_name}}">
                    <label for="{{$industry_value->industry_type_name}}"></label>
                    {{$industry_value->industry_type_name}}(

                    @if (array_key_exists($industry_value->industry_type_name,$industry_name))
                    {{$industry_name[$industry_value->industry_type_name]}}
                    @else 0
                    @endif )
                    </li>
                    @else
                    <div class="col-md-6">
                      <li>
                        <input type="checkbox" name="industry[]" id="{{$industry_value->industry_type_name}}"  value="{{$industry_value->industry_type_name}}">
                        <label for="{{$industry_value->industry_type_name}}"></label>
                        {{$industry_value->industry_type_name}}(
    
                        @if (array_key_exists($industry_value->industry_type_name,$industry_name))
                        {{$industry_name[$industry_value->industry_type_name]}}
                        @else 0
                        @endif )
                        </li>
                  </div>
                    @endif
                  @if($count == $i)
                </div>
              </div>
            </div> 
          </div>
        </div>
      
                  @endif
                  @php $i++; @endphp
              @endforeach 
          </ul>
          <a style="cursor: pointer;" id="" data-toggle="modal" data-target="#industry_modal">View More</a> </div>
          <div class="searchnt">
            <button class="btn"><i class="fa fa-search" aria-hidden="true"></i> Search Jobs</button>
          </div>
          </form>
        </div>
        <!-- Side Bar end --> 
      </div>

<script>
  $(document).ready(function(){
    $("#aaa").click(function(){
        $("#more_job_type").toggle(1000);
    });
});
        
</script>