
$('.trigger').on('click', 
		function(e) 
		{
			$('#myModal').modal();
		}
);

$('#myModal').on('shown.bs.modal', function (e) {
		e.preventDefault();
		$('.modal-body').load( "/admin/media #_tile" );
});