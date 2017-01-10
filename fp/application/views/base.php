<!DOCTYPE html>
<html>
<head>
	<title>Fashion Princess - Online Shopping</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/logo.ico'); ?>">
	<link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css'); ?>" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url('assets/css/megamenu.css'); ?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url('assets/css/flexslider.css'); ?>" type="text/css" media="screen" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel='stylesheet' type='text/css' />


	<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
	<!-- start menu -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/megamenu.js'); ?>"></script>

	<script src="<?php echo base_url('assets/js/menu_jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/simpleCart.min.js'); ?>"> </script>
	<script src="<?php echo base_url('assets/js/moment.min.js'); ?>"> </script>
	<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"> </script>
	<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js'); ?>"> </script>
	<script src="<?php echo base_url('assets/js/modernizr.custom.js'); ?>"></script>
	<!--//web-fonts-->
	<script type="text/javascript" src="<?php echo base_url('assets/js/move-top.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/easing.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.flexisel.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.table2excel.min.js'); ?>"></script>

	<!--web-fonts-->
	 <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,300italic,600,700' rel='stylesheet' type='text/css'>
	 <link href='//fonts.googleapis.com/css?family=Roboto+Slab:300,400,700' rel='stylesheet' type='text/css'>

	 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/theme.min.css'); ?>" />
	 <link rel="stylesheet/less" type="text/css" href="<?php echo base_url('assets/css/styles.less'); ?>" />
	
	<script type="applijegleryion/x-javascript"> 
	addEventListener("load", function() { 
		setTimeout(hideURLbar, 0); 
		}, false); 

	function hideURLbar(){ 
		window.scrollTo(0,1); 
	} 
	</script>

	<script>
	$(document).ready(function(){
		$(".megamenu").megamenu();

		$().UItoTop({ easingType: 'easeOutQuart' });
	});
	</script>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
			});
		});
	</script>

	<script type="text/javascript">
	/* Product Brands slide  */
		$(window).load(function() {
		    $(".flexiselDemo3").flexisel({
		        visibleItems: 5,
		        animationSpeed: 1000,
		        autoPlay: true,
		        autoPlaySpeed: 3000,            
		        pauseOnHover: true,
		        enableResponsiveBreakpoints: true,
		        responsiveBreakpoints: { 
		            portrait: { 
		                changePoint:480,
		                visibleItems: 2
		            }, 
		            landscape: { 
		                changePoint:640,
		                visibleItems: 3
		            },
		            tablet: { 
		                changePoint:768,
		                visibleItems: 3
		            }
		        }
		    });
		});
	</script>
</head>