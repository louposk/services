<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>Administrator</title>
	<meta charset="utf-8">
	<meta name="description" content=@yield('description')>
	<?php echo Asset::container('bootstrapper')->styles(); ?>
	<?php echo Asset::container('bootstrapper')->scripts(); ?>
	{{ HTML::style('css/pickadate/pickadate.02.classic.css') }}
	{{ HTML::script('js/pickadate/pickadate.min.js') }}

	<SCRIPT TYPE="text/javascript">
	$(document).ready(function () {
		$( '.datepicker' ).pickadate({
			monthsFull: [ 'Ιανουάριος', 'Φεβρουάριος', 'Μάρτιος', 'Απρίλιος', 'Μάιος', 'Ιούνιος', 'Ιούλιος', 'Αύγουστος', 'Σεπτέμβριος', 'Οκτώβριος', 'Νοέμβριος', 'Δεκέμβριος' ],
			weekdaysFull: [ 'Κυριακή', 'Δευτέρα', 'Τρίτη', 'Τετάρτη', 'Πέμπτη', 'Παρασκευή', 'Σάββατο' ],

			// Today and clear
			today: 'Σήμερα',
			clear: 'Καθαρισμός',

			// Date formats
			format: 'yyyy-mm-dd',
			formatSubmit: 'yyyy-mm-dd',
			hiddenSuffix: '_submit',

			// First day of week
			firstDay: 1,

			// Month & year dropdown selectors
			monthSelector: true,
			yearSelector: true,

		    onOpen: function() {
		        scrollPageTo( this.$node )
		    }
		})

		function scrollPageTo( $node ) {
		    $( 'body' ).animate({
		        scrollTop: ~~$node.offset().top - 60
		    }, 150)
		}
	});
	</SCRIPT>

  <!-- @yield('script') -->
	<style type="text/css">
	 	html { height: 100% }
      	body { height: 100%; margin: 0; padding: 0 }
/*		header {width:400px; height:100px;}
		article {min-width: 500px; min-height: 300px;}
		aside {width:200px; height:120px;border:1px solid #fefefe;background-color: #fafafa;}*/
		#map_canvas { height: 100% }
	</style>
</head>
<body>

<div class="container">
	<div class="navbar navbar-inverse nav">
    <div class="navbar-inner">
	        <div class="container">
	            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </a>
	            <a class="brand" href="/">Project Services</a>
				
	          	<div class="nav-collapse collapse">
	              <ul class="nav">
	                  <li class="divider-vertical"></li>
	                  <!-- <li><a href="#"><i class="icon-home icon-white"></i>Αρχική</a></li> -->
	                  <li><?php echo HTML::decode(HTML::link('admin', '<i class="icon-home icon-white"></i>' )); ?></li>
   	                  <li><?php echo HTML::link('admin/customer','Πελάτες'); ?></li>
  	                  <li><?php echo HTML::link('admin/domain','Domains'); ?></a></li>
	              </ul>
	              <div class="pull-right">
	                <ul class="nav pull-right">
	                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, User <b class="caret"></b></a>
	                        <ul class="dropdown-menu">
	                            <li><a href="/user/preferences"><i class="icon-cog"></i> Ρυθμίσεις</a></li>
	                            <li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
	                            <li class="divider"></li>
	                            <li><a href="/auth/logout"><i class="icon-off"></i> Αποσύνδεση</a></li>
	                        </ul>
	                    </li>
	                </ul>
	              </div>
	            </div>
	        </div>
	    </div>
	</div>


	<div class="container-fluid">
	  <div class="row-fluid">
	    <div class="span12 well">
	      @yield('content')
	    </div>
	  </div>
	</div>

	<footer><br />Project Team @2012</footer>

</div> <!-- .container -->
</body>
</html>