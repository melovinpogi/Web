<?= menu(); ?>
<link href='https://fonts.googleapis.com/css?family=Nosifer|League+Script|Yellowtail|Permanent+Marker|Codystar|Eater|Molle:400italic|Snowburst+One|Shojumaru|Frijole|Gloria+Hallelujah|Calligraffitti|Tangerine|Monofett|Monoton|Arbutus|Chewy|Playball|Black+Ops+One|Rock+Salt|Pinyon+Script|Orbitron|Sacramento|Sancreek|Kranky|UnifrakturMaguntia|Creepster|Pirata+One|Seaweed+Script|Miltonian|Herr+Von+Muellerhoff|Rye|Jacques+Francois+Shadow|Montserrat+Subrayada|Akronim|Faster+One|Megrim|Cedarville+Cursive|Ewert|Plaster' rel='stylesheet' type='text/css'>

<link href="<?php echo base_url('assets/css/api.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet"/>

<script type="text/javascript" src="<?php echo base_url('assets/js/html2canvas.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/jquery.form.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/mainapp.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>

<script type="text/javascript">
	function changeval() {
		$total = parseInt($("#small").val()) + parseInt($("#medium").val()) + parseInt($("#large").val()) + parseInt($("#xlarge").val()) + parseInt($("#xxlarge").val());
		//alert($total);
		$('.small').val($("#small").val());
		$('.medium').val($("#medium").val());
		$('.large').val($("#large").val());
		$('.xlarge').val($("#xlarge").val());
		$('.xxlarge').val($("#xxlarge").val());

		$('#size_small').val($("#small").val());
		$('#size_medium').val($("#medium").val());
		$('#size_large').val($("#large").val());
		$('#size_xl').val($("#xlarge").val());
		$('#size_xxl').val($("#xxlarge").val());

		$('.total').val($total);
		
		totalPrice();
		showhideBtn();
	}

	function b() {
		$('#custom_text').toggleClass('bold_text');
		$("#bold_button").toggleClass('box-shadow', '0 0 10px inset #3c3c3c');
	}

	function i() {
		$('#custom_text').toggleClass('italic_text');
	}

	function changeFont(_name) {
		$('#custom_text').css("font-family", _name);
	}

	function changeFontSize(_size) {
		$('#custom_text').css("font-size", _size);
	}

	function changeColor(_color) {
		$('#custom_text').css("color", _color);
	}

	function totalPrice(){
		var design = parseInt($("#totalprice").text());
		if($total ==''){
			$total = 1;
		}
		$("#grandprice").text( design * $total );
		console.log(design * $total);
	}

	function getPrice(){
		var shirtprice;
		var price = 100;

		if($type == 'tee'){
			shirtprice = 200;
		}
		if($type == 'hoodie'){
			shirtprice = 300;
		}

		$('#price_small').val($("#small").val() * price);
		$('#price_medium').val($("#medium").val() * price);
		$('#price_large').val($("#large").val() * price);
		$('#price_xl').val($("#xlarge").val() * price);
		$('#price_xxl').val($("#xxlarge").val() * price);

		var total = price * ($nos_icons + $nos_text + $custom_img) + shirtprice;
		$("#totalprice").text(total);
	}


	function showhideBtn(){
		$total = parseInt($("#small").val()) + parseInt($("#medium").val()) + parseInt($("#large").val()) + parseInt($("#xlarge").val()) + parseInt($("#xxlarge").val());

		if($nos_icons == 0 && $nos_text == 0 && $custom_img == 0 || $total == 0){
			$("#preview_images").hide();
			$("#proceed").hide();
		}else{
			$("#preview_images").show();
			$("#proceed").show();
		}
	}
</script>

<div class="container design_api_container">
	<div class='design_api'>
		<!--=============================================================-->
		<div id="menu">
			<div class="menu_option sel_type" data-toggle="tooltip" data-placement="right" title="Shirt Type">

			</div>
			<div class="menu_option sel_color">
				<!-- <i class="fa fa-paint-brush fa-3x"></i> -->
				<img src="<?php echo base_url('assets/customize/images/menu_icons/color_select.png'); ?>" class="img-responsive" data-toggle="tooltip" data-placement="right" title="Custom Color">
			</div>
			<div class="menu_option sel_art">
				<!-- <i class="fa fa-camera-retro fa-3x"></i> -->
				<img src="<?php echo base_url('assets/customize/images/menu_icons/custom.png'); ?>" class="img-responsive" 
				data-toggle="tooltip" data-placement="right" title="Custom Design">
			</div>
			<div class="menu_option sel_custom_icon">
				<!-- <span class="glyphicon glyphicon-open"></span> -->
			<img src="<?php echo base_url('assets/customize/images/menu_icons/upload.png'); ?>" class="img-responsive"
			data-toggle="tooltip" data-placement="right" title="Upload Image">
			</div>
			<div class="menu_option sel_text">
				<!-- <i class="fa fa-font fa-3x"></i> -->
				<img src="<?php echo base_url('assets/customize/images/menu_icons/addtext.png'); ?>" class="img-responsive"
				data-toggle="tooltip" data-placement="right" title="Add Text">

			</div>
		</div>
		<!--=============================================================-->
		<div id='options'>
			<div class="T_type">
				<div id="radio1" ><img src="<?php echo base_url('assets/customize/images/menu_icons/submenu/tee.jpg'); ?>" width="100%" height="100%" />
				</div>
				<!--<div id="radio2" ><img src="tdesignAPI/images/menu_icons/submenu/collar.jpg" width="100%" height="100%" />
				</div>-->
				<div id="radio3" ><img src="<?php echo base_url('assets/customize/images/menu_icons/submenu/hoodie.jpg'); ?>" width="100%" height="100%" />
				</div>
			</div>

			<div class="color_pick">
				<div class="color_radio_div" id="red"></div>
				<div class="color_radio_div" id="black"></div>
				<div class="color_radio_div" id="white"></div>
				<div class="color_radio_div" id="navy"></div>
				<div class="color_radio_div" id="green"></div>
				<!-- <div class="color_radio_div" id="purple"></div> -->
			</div>
			<!-- Designs -->
			<div class="default_samples">
			<?php
				foreach ($shirt_design as $design) {
					echo '<div class="sample_icons">
							<img src="' . $design->design_image .'" width="100%" height="100%" data-toggle="tooltip" data-placement="top" title="'.$design->design_name.'" />
						</div>' ;
				}

				/*$map 	= site_url();
				$dir    = 'assets/customize/images/Images';
				$files1 = scandir($dir);
				//$files2 = scandir($dir, 1);
				foreach ($files1 as &$value) {
					if (strpos($value,'.png') !== false) {
			    		//echo 'true';
						echo '<div class="sample_icons"><img src="' . $dir .'/' .$value. '" width="100%" height="100%" /></div>' ;
					}elseif(strpos($value,'.') === false){
						//echo '<div class="sample_icons"><img src="tdesignAPI/images/folder.png" width="100%" height="100%" />' .$value. '</div>' ;
					}
			    		//echo "Value: $value<br />\n";
				}*/
			?>
			</div>
			<div class="custom_icon">
				<form id="form1" runat="server">
					<span class="btn btn-default btn-file"> Browse
						<input type='file' id="imgInp" />
					</span>
				</form>
			</div>

			<div class="custom_font">
				<select id="fs" onchange="changeFont(this.value);" class="form-control" >
					<option value="arial">Arial</option>
					<option value="Nosifer, cursive">Nosifer</option>
					<option value="League Script, cursive">League Script</option>
					<option value="Yellowtail, cursive">Yellowtail</option>
					<option value="Permanent Marker, cursive">Permanent Marker</option>
					<option value="Codystar, cursive">Codystar</option>
					<option value="'Eater', cursive">Eater</option>
					<option value="Molle, cursive">Molle</option>
					<option value="Snowburst One, cursive">Snowburst One</option>
					<option value="Shojumaru, cursive">Shojumaru</option>
					<option value="Frijole, cursive">Frijole</option>
					<option value="Gloria Hallelujah, cursive">Gloria Hallelujah</option>
					<option value="Calligraffitti, cursive">Calligraffitti</option>
					<option value="Tangerine, cursive">Tangerine</option>
					<option value="Monofett, cursive">Monofett</option>
					<option value="Monoton, cursive">Monoton</option>
					<option value="Arbutus, cursive">Arbutus</option>
					<option value="Chewy, cursive">Chewy</option>
					<option value="Playball, cursive">Playball</option>
					<option value="Black Ops One, cursive">Black Ops One</option>
					<option value="'Rock Salt', cursive">Rock Salt</option>
					<option value=" 'Pinyon Script', cursive">Pinyon Script</option>
					<option value="'Orbitron', sans-serif">Orbitron</option>
					<option value="'Sacramento', cursive">acramento</option>
					<option value="'Sancreek', cursive">Sancreek</option>
					<option value="'Kranky', cursive">Kranky</option>
					<option value="'UnifrakturMaguntia', cursive">UnifrakturMaguntia</option>
					<option value="'Creepster', cursive">Creepster</option>
					<option value="'Pirata One', cursive">Pirata One</option>
					<option value=" 'Seaweed Script', cursive">Seaweed Script</option>
					<option value=" 'Miltonian', cursive">Miltonian</option>
					<option value=" 'Herr Von Muellerhoff', cursive">Herr Von Muellerhoff</option>
					<option value=" 'Rye', cursive"> 'Rye'</option>
					<option value=" 'Jacques Francois Shadow', cursive">Jacques Francois Shadow</option>
					<option value=" 'Montserrat Subrayada', sans-serif">Montserrat Subrayada</option>
					<option value=" 'Akronim', cursive">Akronim</option>
					<option value=" 'Faster One', cursive">Faster One</option>
					<option value=" 'Megrim', cursive">Megrim</option>
					<option value=" 'Cedarville Cursive', cursive">Cedarville Cursive</option>
					<option value=" 'Ewert', cursive">Ewert</option>
					<option value="'Plaster', cursive">Plaster</option>
					<option value="verdana">Verdana</option>
					<option value="impact">Impact</option>
					<option value="ms comic sans">MS Comic Sans</option>
				</select>
				<input type="color" name="favcolor" onChange="changeColor(this.value);" placeholder="Color Name" />
				<div class="font_styling" style="height: 40px;">
					<span class="form-control" id="bold_button" onclick="b();" style="height: 25px;width: 35px;"><b>B</b></span>
					<span class="form-control" id="italic_button" onclick="i();" style="height: 25px;width: 35px;"><i>I</i></span>
					<select class="form-control" id="font_size" onchange="changeFontSize(this.value);" style="width: 50%;">
						<?php for($i=10;$i<=140;$i+=2){ ?>
							<option value="<?php echo $i; ?>px"><?php echo $i; ?>px</option>
						<?php } ?>
					</select>
				</div>
				<textarea class="form-control" id="custom_text" placeholder="Create Your Custom Text..."></textarea>
				<button type="button" class="btn btn-primary" id="apply_text">Apply</button>
			</div>
		</div>
		<!--=============================================================-->
		<!--=========================preview start====================================-->
		<div id='preview_t'>
			<div id="preview_front">
				<div class="front_print"></div>
			</div>
			<div id="preview_back">
				<div class="back_print"></div>
			</div>
		</div>
		<!--=============================================================-->
		<!--======================view start=======================================-->
		<div id='view_mode'>
			<div  class="mode">
				<img id="o_front" src="<?php echo base_url('assets/customize/images/product/tee/black/black_front.png'); ?>" 
					width="100%" height="80%" /><b>Front</b>
			</div>
			<div  class="mode">
				<img id="o_back" src="<?php echo base_url('assets/customize/images/product/tee/black/black_back.png'); ?>" 
					width="100%" height="80%" /><b>Back</b>
			</div>
			<!-- <div class="mode">
				<i class="fa fa-search fa-4x preview_images" id="preview_images" data-toggle="modal" data-target=".bs-example-modal-lg" title="Preview your design"></i>
				<b>Preview</b>
			</div> -->
		</div>
		<!--=====================View Ends========================================-->
		<div id="overview">
			<div class="">
				<table class="table">
					<tr>
						<th>Size</th>
						<th>Quantity</th>
					</tr>
					<tr>
						<td><b>S</b></td>
						<td>
						<input id="small" onchange="changeval()" name="small" type="number" value="0" class="form-control small input-md" min=0 max=99999 />
						</td>
					</tr>
					<tr>
						<td><b>M</b></td>
						<td>
						<input id="medium" onchange="changeval()" name="medium" type="number" value="0" class="form-control medium input-md" min=0 max=99999 />
						</td>
					</tr>
					<tr>
						<td><b>L</b></td>
						<td>
						<input id="large" onchange="changeval()" name="large" type="number" value="0" class="form-control large input-md" min=0 max=99999 />
						</td>
					</tr>
					<tr>
						<td><b>XL</b></td>
						<td>
						<input id="xlarge" onchange="changeval()" name="xlarge" type="number" value="0" class="form-control xlarge input-md" min=0 max=99999 />
						</td>
					</tr>
					<tr>
						<td><b>XXL</b></td>
						<td>
						<input id="xxlarge" onchange="changeval()"  name="xxlarge" type="number" value="0" class="form-control xxlarge input-md" min=0 max=99999 />
						</td>
					</tr>
					<tr>
						<td><b>Total</b></td>
						<td>
						<input id="total" name="total" type="number" value="0" class="form-control total input-md" readonly="" min=1 max=99999 />
						</td>
					</tr>
				</table>
				<button id="proceed" type="button" class="btn btn-default btn-block preview_images" data-toggle="modal" data-target=".bs-example-modal-lg">Proceed <i class="fa fa-check"></i></button>
			</div>
		</div>
		<h3>NOTE*</h3>
	</div>


	<!-- Large modal -->
	<div class="layer">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close_img" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only close_img">Close</span>
				</button>
				<h4 class="modal-title">Showcase</h4>
			</div>
			<div class="modal-body">

				<div id="image_reply"></div>
				<div class="modal-footer">
					<div class="row">
						<form method="POST" enctype="multipart/form-data" id="imageFileForm" action="checkout/createShirt">
							<div class="col-md-8" style="font-weight: bold;">
								Price per piece : &#8369; <span id="totalprice"></span><br>
								Total Price : &#8369; <span id="grandprice"></span>
							</div>
							<div class="col-md-12">
								<input type="hidden" name="img_front" id="img_front" value="" />
								<input type="hidden" name="img_back" id="img_back" value="" />
								<input type="text" name="creation_name" value="" placeholder="Shirt name" class="form-control" required="" /><br>
								<div class="input-group">
								  <span class="input-group-addon">Small Size:</span>
								  <input type="number" name="size_small" id="size_small" readonly=""  class="form-control">
								   <span class="input-group-addon">Price:</span>
								  <input type="number" name="price_small" id="price_small" readonly="" class="form-control">
								</div>
								<div class="input-group">
								  <span class="input-group-addon">Medium Size:</span>
								  <input type="number" name="size_medium" id="size_medium" readonly="" class="form-control">
								   <span class="input-group-addon">Price:</span>
								  <input type="number" name="price_medium" id="price_medium" readonly="" class="form-control">
								</div>
								<div class="input-group">
								  <span class="input-group-addon">Large Size:</span>
								  <input type="number" name="size_large" id="size_large" readonly="" class="form-control">
								   <span class="input-group-addon">Price:</span>
								  <input type="number" name="price_large" id="price_large" readonly="" class="form-control">
								</div>
								<div class="input-group">
								  <span class="input-group-addon">XL Size:</span>
								  <input type="number" name="size_xl" id="size_xl" readonly="" class="form-control">
								   <span class="input-group-addon">Price:</span>
								  <input type="number" name="price_xl" id="price_xl" readonly="" class="form-control">
								</div>
								<div class="input-group">
								  <span class="input-group-addon">XXL Size:</span>
								  <input type="number" name="size_xxl" id="size_xxl" readonly="" class="form-control">
								   <span class="input-group-addon">Price:</span>
								  <input type="number" name="price_xxl" id="price_xxl" readonly="" class="form-control">
								</div><br>
								<button type="submit" class="btn btn-primary">
									Save and Proceed to Checkout <i class="fa fa-floppy-o"></i>
								</button>
								<button type="button" class="btn btn-default close_img" data-dismiss="modal">
									Close
								</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	//$('input[type=file]').bootstrapFileInput();
	//$('.file-inputs').bootstrapFileInput();
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				image_icon(e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function() {
		readURL(this);
	});

	$('[data-toggle="tooltip"]').tooltip();

</script>

<?php $this->load->view('menu/footer'); ?>