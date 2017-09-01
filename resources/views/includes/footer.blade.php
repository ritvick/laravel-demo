
<footer class="main-footer">
		<div id="loader" class="loading" align="center" style="display:none;">
			<img src="<?=URL::to("/");?>/public/asset/images/loader.gif" />
		</div>
        <div class="pull-right hidden-xs">
          
        </div>
        <strong>Copyright &copy; <?php echo date("Y")?>
      </footer>
    </div>
  </body>
</html>
	<!-- Data Table Export -->
	<script src="<?=URL::to("/");?>/public/asset/js/dataTables.tableTools.js"></script>
<script>
$(function () {
	$(".staticDatatable").DataTable(
	/* {
		dom: 'T<"clear">lfrtip',
			tableTools: {
				"sSwfPath": "<?=URL::to("/");?>/public/asset/js/swf/copy_csv_xls_pdf.swf",
				"aButtons": [ "xls"]
			}

	} */);
	
	// Left Menu Set Position
	var site_url = document.URL;			
	var menuflag = true;
	$(".sidebar-menu").find("a").each(function () {
		if ($(this).attr('href') == site_url) {			
			$(this).parent("li").addClass("active").parent("ul").addClass("in").parent("li").addClass("active").parent("ul").addClass("in").parent("li").addClass("active");
			menuflag = false;
		}
		if($(this).attr('href') != "" && $(this).attr('href').length > 0)
		{
			$(this).click(function(){
				setCookie("page", $(this).attr('href'), 1);
			});
		}
	});
	if(menuflag){
		$(".sidebar-menu").find("a").each(function () {
			var page = getCookie("page");
			if (page == $(this).attr('href')) {
				$(this).parent("li").addClass("active").parent("ul").addClass("in").parent("li").addClass("active").parent("ul").addClass("in").parent("li").addClass("active");
			}
		});
	}
	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	}
	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1);
			if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
		}
		return "";
	}
	$(".DTTT_button").addClass("btn btn-success");
	
	
	
	//////// JAVASCRIPT ///////
		$(document).ajaxSend(function(event, jqXHR, settings) {
			$("#loader").css('display','block');
		});
		$(document).ajaxStart(function(event, jqXHR, settings) {
			$("#loader").css('display','block');
		});

		// Hide Loader
		$(document).ajaxComplete(function(event, jqXHR, settings) {
			$("#loader").css('display','none');
		});
		$(document).ajaxError(function(event, jqXHR, settings) {
			$("#loader").css('display','none');
		});
		$(document).ajaxStop(function(event, jqXHR, settings) {
			$("#loader").css('display','none');
		});
		$(document).ajaxSuccess(function(event, jqXHR, settings) {
			$("#loader").css('display','none');
		});
	
	
});
</script>
