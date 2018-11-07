<script>
	$(document).ready(function(){
		@foreach($employees as $employee)
		$("#Employee{{$employee->EmployeeID}}").click(function(){
			var emp_id =('{{$employee->EmployeeID}}');
			$.ajax({
				type: 'get',
				dataType: 'html',
				url: '{{url('/employee')}}',
				data: 'emp_id=' +emp_id,
				success:function(response){
					//console.log(response);
					$("#emp_detail").html(response);
				}
			});
		});
		@endforeach
	});
</script>