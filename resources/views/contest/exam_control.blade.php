<script>var get_id=[];</script>
<script>var get_id_for_show_time=[];</script>
<script>var width_count=[];</script>
<div class="row">
 <div class="col-md-12">
 <div class="exam-topic" >
 
 
 <table class="table table-hover">
 
 <thead>
 <tr>
 <td><strong>Subject</strong></td>
 <td><strong>Start Date</strong></td>
 <td><strong>Start Time</strong></td>
 <td><strong>End Date</strong></td>
 <td><strong>End Time</strong></td>
 <td><strong>Exam Take</strong></td>
 <td style="width: 20%"><strong>Time</strong></td>
 <td class="button-right"><strong>EXAM</strong></td>
 </tr>
 </thead>
 <tbody >
 	@php
 	date_default_timezone_set("Asia/Dhaka");
    $current_date = date("Y-m-d");
    $exam_lists=DB::table('question_contest')->orderBy('start_date','ASC')->orderBy('start_time','ASC')->get();
    @endphp

    @foreach($exam_lists as $exam_list) 
     @if($current_date <= $exam_list->end_date && $current_date >= $exam_list->start_date)
         @php
        $current_time = date("h:i:s a");
        $current_time = strtotime($current_time);
        $start_time = strtotime($exam_list->start_time);
        $end_time = strtotime($exam_list->end_time);
        if ($current_date == $exam_list->end_date && $current_time >= $end_time) {
         // Exam Finished.....
         $subject_id = $exam_list->subject_id;
          $subject_name = $exam_list->subject_name;
          $end_date = $exam_list->end_date;
          $end_time = $exam_list->end_time;
          $exam_take = $exam_list->exam_take;
          DB::table('question_contest')->where('subject_id','=',$subject_id)->delete();
          DB::table('complete_contest')->insert([
                                   'subject_id' => $subject_id,
                                    'subject_name' => $subject_name,
                                    'end_date'=> $end_date,
                                    'end_time'=>$end_time,
                                    'exam_take'=>$exam_take,
                                    'year'=>date("Y")
                                     ]);

     }
     elseif ($current_date == $exam_list->start_date && $current_time >= $start_time || $current_date > $exam_list->start_date) {
 // Exam Started......
  @endphp
  <tr> 
  	<td>{{$exam_list->subject_name}}</td>
  	<td>{{$exam_list->start_date}}</td>
  	<td>{{$exam_list->start_time}}</td>
  	<td>{{$exam_list->end_date}}</td>
  	<td>{{$exam_list->end_time}}</td>
  	<td>{{$exam_list->exam_take}}</td>
  	@php
     $current_time = date("h:i:s a");
     // For find time difference....
     $datetime2 = $exam_list->end_date . ' ' . $exam_list->end_time;
    $datetime1 = $current_date . ' ' . $current_time;
    $dateDiff = intval((strtotime($datetime2) - strtotime($datetime1)) / 60);
     $minits = intval($dateDiff / 60 * 60);
  	@endphp
  	<td style="width: 20%">
 <div class="progress">
 <div class="progress-bar progress-bar-striped progress-bar-animated" id="{{$exam_list->subject_id}}" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
 </div>
 </div>
 <p id="{{'show_time' .$exam_list->subject_id}}">{{$minits+1}} min</p>
 <script> width_count.push("{{$minits}}");</script>
 <script>get_id.push("{{$exam_list->subject_id}}");</script>
 <script>get_id_for_show_time.push("{{'show_time' . $exam_list->subject_id}}");</script>
 </td>
 <td class="button-right">
    <a href="{{ route('post.exam_start',['id' => $exam_list->subject_name]) }}" target="_blank"> 
 <button type="submit" class="btn button">Start Test</button>
  </a> 
 </td>
  </tr>
  @php
}
else {
 // Exam not Started But Today will Start.....
 @endphp
  <tr> 
  	<td>{{$exam_list->subject_name}}</td>
  	<td>{{$exam_list->start_date}}</td>
  	<td>{{$exam_list->start_time}}</td>
  	<td>{{$exam_list->end_date}}</td>
  	<td>{{$exam_list->end_time}}</td>
  	<td>{{$exam_list->exam_take}}</td>
  	@php
     $current_time = date("h:i:s a");
     // For find time difference....
     $datetime2 = $exam_list->end_date . ' ' . $exam_list->end_time;
    $datetime1 = $exam_list->start_date . ' ' . $exam_list->start_time;
    $dateDiff = intval((strtotime($datetime2) - strtotime($datetime1)) / 60);
     $minits = intval($dateDiff / 60 * 60);
  	@endphp
  	<td style="width: 20%">
 <div class="progress">
 <div  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
 </div>
 </div>
 <p >{{$minits+1}} min</p>
 </td>
 <td class="button-right">
 <button type="button" class="btn button" data-toggle="modal" data-target="#exampleModal" disabled> Exam </button>
 </td>
  </tr>
  @php
 }
  @endphp
  @elseif ($current_date > $exam_list->end_date)
    {{-- Exam was finished before days but stand was database--}}
    @php
      $subject_id = $exam_list->subject_id;
          $subject_name = $exam_list->subject_name;
          $end_date = $exam_list->end_date;
          $end_time = $exam_list->end_time;
          $exam_take = $exam_list->exam_take;
          DB::table('question_contest')->where('subject_id','=',$subject_id)->delete();
          DB::table('complete_contest')->insert([
                                   'subject_id' => $subject_id,
                                    'subject_name' => $subject_name,
                                    'end_date'=> $end_date,
                                    'end_time'=>$end_time,
                                    'exam_take'=>$exam_take,
                                    'year'=>date("Y")
                                  ]);
    @endphp
   @else
   {{--Other time exam will start--}}
   <tr> 
  	<td>{{$exam_list->subject_name}}</td>
  	<td>{{$exam_list->start_date}}</td>
  	<td>{{$exam_list->start_time}}</td>
  	<td>{{$exam_list->end_date}}</td>
  	<td>{{$exam_list->end_time}}</td>
  	<td>{{$exam_list->exam_take}}</td>
  @php
     $current_time = date("h:i:s a");
     // For find time difference....
     $datetime2 = $exam_list->end_date . ' ' . $exam_list->end_time;
    $datetime1 = $exam_list->start_date . ' ' . $exam_list->start_time;
    $dateDiff = intval((strtotime($datetime2) - strtotime($datetime1)) / 60);
     $minits = intval($dateDiff / 60 * 60);
  	@endphp
  	<td style="width: 20%">
 <div class="progress">
 <div  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
 </div>
 </div>
 <p >{{$minits+1}} min</p>
 </td>
 <td class="button-right">
 <button type="button" class="btn button" data-toggle="modal" data-target="#exampleModal" disabled> Exam </button>
 </td>
  </tr>
     @endif
     @endforeach
 
</tbody>
 </table>
 </div>
 </div>
 </div>

<script>
$(document).ready(function(){
 var x=get_id.length;
 for(var i=x;i>0;i--){
 var my_bar = document.getElementById(get_id[i]); 
 var time_progress = document.getElementById(get_id_for_show_time[i]); 
 //var width = width_count[i];
 //var width =100%;
 var for_clear_id = setInterval(frame,60000);
 function frame() {
 if (width == 1) {
 // $('body').load('index.php');
 clearInterval(for_clear_id);
 } else {
 
 //width--; 
 //my_bar.style.width = width + '%'; 
 time_progress.innerHTML = width - 1 + ' min';
 
 }
 
} 
 }
 });
</script>