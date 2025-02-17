<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	
	<title>| SIGA v<?php echo $sigaVersionInfo;?> |</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/siga/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">	
	
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/siga/plugins/datatables/dataTables.bootstrap.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/siga/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- File Input -->
  <link rel="stylesheet" href="/siga/plugins/fileinput/fileinput.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/siga/plugins/iCheck/square/blue.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/siga/plugins/datepicker/datepicker3.css">         
    <!-- fullCalendar -->
  <link rel="stylesheet" href="/siga/plugins/fullcalendaryear/fullcalendar.css">
  <link rel="stylesheet" href="/siga/plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="/siga/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/siga/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/siga/plugins/iCheck/flat/blue.css">
  
  <!-- PNotify -->
  <link href="/siga/plugins/pnotify/dist/pnotify.css" rel="stylesheet">
  <link href="/siga/plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
  <link href="/siga/plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
	<link href="/siga/plugins/select2/select2.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet"/>
	<!-- <link rel="stylesheet" href="/siga/dist/css/spinner.css"> -->
	<link rel="icon" type="image/x-icon" href="/siga/components/siga.ico">

	<style>
	
	/* example of setting the width for multiselect */
	.multiselectjs_multiSelect {
		width: 200px;
	}
		
	button.multiselect {
		font-size: 12px;
	}
	
	.dataTables_wrapper {
		font-family: tahoma;
		font-size: 10px;
	}
	
	#WindowLoad
	{
		position:fixed;
		top:0px;
		left:0px;
		z-index:3200;
		filter:alpha(opacity=65);
	   -moz-opacity:65;
		opacity:0.65;
		background:#000000;
	}
	
	.skin-blue .content-wrapper .content .box .table-chs tbody tr td:first-child span {
		background: rgba(0, 0, 0, 0.15);
		border: 2px solid #fff;
		display: inline-block;
		margin: 0 5px;
		width: 32px;
		height: 32px;
		line-height: 16px;
		padding: 0.5em;
		border-radius: 50%;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		-o-border-radius: 50%;
		text-align: center;
	}
	
	
	.skin-blue .content-wrapper .content .box .table-chs tbody tr td:first-child span i {
		text-align: center;
		color: #fff;
	}

	/* Estilo para videos responsivos */
	video { width: 100%; height: auto; }
	.objeto-oculto { display: none; }
 </style>
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>