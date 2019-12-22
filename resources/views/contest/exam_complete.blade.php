<div class="row">
    <div class="col-md-12">
        <div class="exam-topic">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td><strong>Subject</strong></td>
                        <td><strong>End Date</strong></td>
                        <td><strong>End Time</strong></td>
                        <td><strong>Exam Take</strong></td>
                        <td class="button-right"><strong>Question Paper</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                if($keyword=='answer_show'){
                             $completed_exam_lists=DB::table('complete_contest')->get();
                               }
                               else{
                               $completed_exam_lists=DB::table('complete_contest')->where('year',$keyword)->get();
                                
                            }
                                foreach($completed_exam_lists as $completed_exam_list) {
                                ?>
                    <tr>
                        <td>{{$completed_exam_list->subject_name}} </td>
                        <td>{{$completed_exam_list->end_date}} </td>
                        <td>{{$completed_exam_list->end_time}} </td>
                        <td>{{$completed_exam_list->exam_take}} </td>
                        <td class="button-right">
                            <?php
                                       if($keyword=='answer_show'){ ?>
                            <a href="{{ route('post.exam_start',['name' => $completed_exam_list->subject_name]) }}"
                                target="_blank">
                                <button type="submit" class="btn button">Show Question</button>
                            </a>
                            <?php   }
                                       else{
                                      ?>
                            <a href="{{ route('post.trial_exam',['year'=>$completed_exam_list->year,'name' => $completed_exam_list->subject_name ]) }}"
                                target="_blank">
                                <button type="submit" class="btn button">Try it</button>
                            </a>

                            <?php } ?>
                        </td>
                    </tr>
                    @php
                    }

                    @endphp

                </tbody>
            </table>
        </div>
    </div>
</div>