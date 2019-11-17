 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap -->
	{!!Html::style('local/resources/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')!!}
	{!!Html::style('local/resources/assets/admin/vendors/font-awesome/css/font-awesome.min.css')!!}
	{!!Html::style('local/resources/assets/admin/vendors/iCheck/skins/flat/green.css')!!}
	{!!Html::style('local/resources/assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')!!}
	{!!Html::style('local/resources/assets/admin/build/css/custom.min.css')!!}
	
	{!!Html::style('local/resources/assets/admin/js/dataTables.bootstrap.min.css')!!}
	{!!Html::style('local/resources/assets/admin/js/buttons.bootstrap.min.css')!!}
	{!!Html::style('local/resources/assets/admin/js/fixedHeader.bootstrap.min.css')!!}
	{!!Html::style('local/resources/assets/admin/js/responsive.bootstrap.min.css')!!}
	{!!Html::style('local/resources/assets/admin/js/scroller.bootstrap.min.css')!!}
    
    {!!Html::style('local/resources/assets/admin/fontscript/fontselect.css')!!}
    {!!Html::style('local/resources/assets/admin/fontscript/color.css')!!}
    
      {!!Html::script('local/resources/assets/admin/vendors/jquery/dist/jquery.min.js')!!}
    
    {!!Html::style('local/resources/assets/js/tagsinput.css')!!}
    
    {!!Html::script('local/resources/assets/admin/js/jquery.geocomplete.js')!!}
     
     {!!Html::script('https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB6PU-XRqBA-gLGvpD__IPYdGcAT_W-5EA')!!}
    
    
    {!!Html::style('local/resources/assets/admin/build/css/jquery-ui-timepicker-addon.css')!!}
     {!!Html::style('local/resources/assets/admin/build/css/jquery-ui.css')!!}
     
     {!!Html::script('local/resources/assets/admin/build/js/jquery-ui.min.js')!!}
      {!!Html::script('local/resources/assets/admin/build/js/jquery-ui-timepicker-addon.js')!!}
      
      {!!Html::style('local/resources/assets/admin/build/css/new_font-awesome.css')!!}
{!!Html::style('local/resources/assets/admin/build/css/simple-iconpicker.min.css')!!}
{!!Html::script('local/resources/assets/admin/build/js/simple-iconpicker.min.js')!!}

<?php $url = URL::to("/"); ?>  

      <script>
    var whichInput = 0;

    $(document).ready(function(){
     
      $('#inputid1').iconpicker("#inputid1");
	  $('#inputid2').iconpicker("#inputid2");
	  $('#inputid3').iconpicker("#inputid3");
	  $('#inputid4').iconpicker("#inputid4");
      
    });
    </script>
      
       <script type="text/javascript">
      
      $(document).ready(function () {
   $('body').on('click', '#selectAll', function () {
      if ($(this).hasClass('allChecked')) {
         $('input[type="checkbox"]', '#datatable-responsive').prop('checked', false);
      } else {
       $('input[type="checkbox"]', '#datatable-responsive').prop('checked', true);
       }
       $(this).toggleClass('allChecked');
     })
});


$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>


<?php /* text editor */ ?>


<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/local/resources/views/editor/style.css" />
		
		<script type="text/javascript" src="<?php echo $url;?>/local/resources/views/editor/cazary.min.js"></script>
		<script type="text/javascript">
(function($, window)
{
	$(function($)
	{
		
		$("textarea#id_cazary_full").cazary({
			commands: "FULL"
		});
	});
})(jQuery, window);
		</script>
      
  
<?php /* text editor */?>

