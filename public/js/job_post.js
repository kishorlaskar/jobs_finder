
    //add job requirment............
     function add_job_requirment(job_requirment) {
       var count_row=0;
    var table = document.getElementById(job_requirment);
    var row = table.insertRow(count_row+1);
    var cell = row.insertCell(0);
   
    cell.innerHTML = ' <input type="text" class="form-control re-width" name="job_jequirments[]"  placeholder="Job Requirments"> ';
}
//Job Description................
function add_job_description(job_description) {
       var count_row=0;
    var table = document.getElementById(job_description);
    var row = table.insertRow(count_row+1);
    var cell = row.insertCell(0);
   
    cell.innerHTML = ' <input type="text" class="form-control re-width" name="job_description[]" tabindex="1" placeholder="Job Description">';
}
//<!--========= Educational Requirements============-->
function add_educational_requirment(educational_requirment) {
       var count_row=0;
    var table = document.getElementById(educational_requirment);
    var row = table.insertRow(count_row+1);
    var cell = row.insertCell(0);
   
    cell.innerHTML = '  <input type="text" class="form-control re-width" name="educational_requirment[]" tabindex="1" placeholder="Educational Requirements">';
}
// <!--=========  Other Benefits============-->
function add_other_benifits(other_benifits) {
       var count_row=0;
    var table = document.getElementById(other_benifits);
    var row = table.insertRow(count_row+1);
    var cell = row.insertCell(0);
   
    cell.innerHTML = '  <input type="text" class="form-control re-width" name="other_benifits[]" tabindex="1" placeholder="Other Benefits"> ';
}
//  <!--=========   Job-Source============-->
function add_job_source(job_source) {
       var count_row=0;
    var table = document.getElementById(job_source);
    var row = table.insertRow(count_row+1);
    var cell = row.insertCell(0);
   
    cell.innerHTML = '  <input type="text" class="form-control re-width" name="job_source[]" tabindex="1" placeholder="Job Source"> ';
}

