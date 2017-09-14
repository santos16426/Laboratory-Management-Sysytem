$('#corpPackage').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true

});
$('.delbtn').click(function(){
$('#cid').val($(this).data('id'));
$('#deleteModal').modal('show');
});
$('.packservice').select2({
	placeholder: "Select Services"
});
$('.uppackservice').select2();
$('.updateModal').click(function(){
	$.ajax
    ({
      url: '/updateCorporatePackage',
      type: 'get',
      data:  { id:$(this).data('id')},
      dataType : 'json', 

      success:function(response){
        response.forEach(function(data){
				$('#uppackname').val(data.corpPack_name);
				$('#uppackprice').val(data.price);
				$('#corpPack_id').val(data.corpPack_id);
				var selectedValues = new Array();
				var i = 0;
				response.forEach(function(data){
				selectedValues[i] = data.service_id;
				i++;
				})
				$('.uppackservice').val(selectedValues).trigger('change');
				if(data.gender == 3)
				{
					$('#upBoth').prop('checked',true);
				}
				else if(data.gender == 2)
				{
					$('#upFemale').prop('checked',true);
				}
				else if(data.gender == 1)
				{
					$('#upMale').prop('checked',true);
				}
				if(data.age == 'Teen')
				{
					$('#upTeen').prop('checked',true);
				}
				else if(data.age == 'Adult')
				{
					$('#upAdult').prop('checked',true);
				}
				else if(data.age == 'Senior')
				{
					$('#upSenior').prop('checked',true);
				}
				else if(data.age == 'All')
				{
					$('#upAllAges').prop('checked',true);
				}
				if(data.physical_exam == 'Yes')
				{
					$('#upexam').val('Yes');
				}	
				else if(data.physical_exam == 'No')
				{
					$('#upexam').val('No');
				}	
		     })
				
				
		    },
      error:function(){
      }
    });
});