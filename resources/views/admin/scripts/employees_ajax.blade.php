<script>
	$(document).ready(function(){
		$("#Employee").click(function(){
		    alert('Hi');
		    var emp_id = $this.attr('data-value');
			alert(emp_id);
			/*$.ajax({
				type: 'get',
				dataType: 'html',
				url: '{{url('/employee')}}',
				data: 'emp_id=' +emp_id,
				success:function(response){
					//console.log(response);
					$("#emp_detail").html(response);
				}
			});*/
		});
	});
</script>