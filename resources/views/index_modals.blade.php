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
		        	@foreach($job_designation as $designation_name)
		            <div class="col-md-6">
		                <button onclick="designation_name_set(this.value)" data-dismiss="modal" value="{{$designation_name->designation_name}}">{{$designation_name->designation_name}}</button>
		            </div>
		            @endforeach  
		        </div>
		    </div>
		  </div> 
		</div>
</div>


<div class="modal fade" id="position_modal" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <h4 class="modal-title">Select a Position</h4><hr>
		    </div>
		    <div class="modal-body">
		        <div class="row">
		            <div class="col-md-4">
		                <button>Any Level</button>
		            </div>  
		        </div>
		    </div>
		  </div> 
		</div>
</div>

<script type="text/javascript">
	function designation_name_set(name) {
		document.getElementById('designation_category').value=name;
	}
</script>