<template>
	<div class="head_div">	

		  <ul>
			  <li  v-if="sending_data.indexOf(message)== -1" class="color_code padding">{{message}}<br></li>
			  <li  v-else="sending_data.indexOf(message)== -1" class="padding">{{message}}<br></li>
		   </ul>
		
					
	</div>
</template>
<style type="text/css">
	.color_code{
		background-color: #0084FF;
		color: white;
	}
	.head_div{
		margin-top:10px;margin-left:10px; font-size: 14px;
	}
	.padding{
		padding: 10px;
	}

</style>

<script type="text/javascript">

	export default {
		props: ['message','sending_data']
	}

</script>

