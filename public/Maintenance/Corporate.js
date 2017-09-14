$('.corppackages').click(function(){
	$('#corp_id').val($(this).data('id'));
	$('#createcorppackage').submit();
});
$('#corpTbl').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true

});
$('.select2').select2();	
$('.packservice').select2({
  placeholder: 'Services offered'
});

$('.delbtn').click(function(){
    $('#cid').val($(this).data('id'));
    $('#deleteModal').modal('show');
    });
    $('.updatepackservice').change(function(){
	var idstr = $('.updatepackservice').val();
	
	$.ajax
	({
		url: '/getTotalPrice',
		type: 'get',
		data:{id:idstr},
		dataType: 'json',
		success:function(response)
		{
			response.forEach(function(data){
				$('#packprice').attr('placeholder','Suggested Price: 0');
				$('#packprice').attr('placeholder','Suggested Price: '+data.total);
				
				
			})
		}
	});
});
    $('.updateModal').click(function(){
    $.ajax
    ({
      url: '/updateCorporate',
      type: 'get',
      data:  { id:$(this).data('id')},
      dataType : 'json', 

      success:function(response){
        response.forEach(function(data){

			$('#upcorpid').val(data.corp_id);
			$('#upcompanyname').val(data.corp_name);
			$('#upcontactperson').val(data.corp_contactperson);
			$('#upcontactnumber').val(data.corp_contact);
			$('#upemail').val(data.corp_email);
			$('#uppackprice').val(data.price)
			var selectedValues = new Array();
			var i = 0;
			response.forEach(function(data){
			selectedValues[i] = data.service_id;
			i++;
			})
			$('.uppackservice').val(selectedValues).trigger('change');
        })
      },
      error:function(){
      }
    });
  });