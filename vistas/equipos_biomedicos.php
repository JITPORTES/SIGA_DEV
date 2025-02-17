<!-- ==== Page: Equipos_biomedicos ==== -->
	<div id="iframeEquiposBiomedicos">
		<iframe src="http://gtihdm.hospitalsatelite.com:8083/gtihdm/catalog_eq_biomedico_siga.asp" style="width: 100%; height: 100%;" frameborder="0"></iframe>
	</div>
	<script type="text/javascript">
		function reajustarContenedor() {
			var altoContenedor = parseInt($("div.content-wrapper").css("height")) - 60;
			$("#iframeEquiposBiomedicos").css("height", altoContenedor + "px");
		}
		$(window).resize(function() {
			reajustarContenedor();
		});
		$( document ).ready(function() {
			reajustarContenedor();
		});
	</script>
<!-- ==== Page: Equipos_biomedicos ==== -->