  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=$ROOT_URL?>/contact-form-v4/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=$ROOT_URL?>/contact-form-v4/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=$ROOT_URL?>/contact-form-v4/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=$ROOT_URL?>/contact-form-v4/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=$ROOT_URL?>/contact-form-v4/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=$ROOT_URL?>/contact-form-v4/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=$ROOT_URL?>/contact-form-v4/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=$ROOT_URL?>/contact-form-v4/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?=$ROOT_URL?>/contact-form-v4/css/main.css">
  <!--===============================================================================================-->
<?PHP 
    $food = food_get_one($_GET['id']);
    extract($food);
?>
  <div class="container-contact100">
	
	  <a href="?btn_list=list" class="outer_link">List of food</a>
  	<div class="wrap-contact100">
  		<form class="contact100-form validate-form" id='form'method="post" enctype="multipart/form-data" action="?btn_process=update&id=<?=$food_id?>">
  			<span class="contact100-form-title">
  				EDIT FOOD
  			</span>

  			<div class="wrap-input100 validate-input">
  				<span class="label-input100">Food name</span>
				  <span class="showError"></span>
  				<input class="input100" type="text" id='food_name' name="food_name" value='<?=$food_name ?>' placeholder="Enter food name" autocomplete="off" required>
  				<span class="focus-input100"></span>
  			</div>

  			<div class="wrap-input100 validate-input">
  				<span class="label-input100">Food price($)</span>
				  <span class="showError"></span>
  				<input class="input100" type="text" id='food_price'name="food_price" value='<?=$food_price ?>' placeholder="Enter food price" autocomplete="off"required>
  				<span class="focus-input100"></span>
  			</div>

  			<div class="wrap-input100 input100-select">
  				<span class="label-input100">Food category</span>
  				<div>
  					<select class="selection-2" name="cat_id">
  						<option value="">Choose category</option>
  						<?php
							$cats = category_show_list();
							foreach ($cats as $cat) {
								extract($cat);
                                if($cat['cat_id'] === $food['cat_id'])
								echo "<option value='$cat_id' selected>$cat_name</option>";
                                else{
                                    echo "<option value='$cat_id'>$cat_name</option>";
                                }
							}
							?>
  					</select>
  				</div>
  				<span class="focus-input100"></span>
  			</div>

  			<div class="wrap-input100 input100-select">
  				<span class="label-input100">Food image</span>
  				<input class="input100" type="file" name="food_image_file">
  				
  			</div>

  			<div class="wrap-input100 validate-input">
  				<span class="label-input100">Food description</span>
				  <span class="showError"></span>
  				<textarea class="input100" name="food_des" required id='food_des'placeholder="Food description here..." ><?=$food_des?></textarea>
  				<span class="focus-input100"></span>
  			</div>

  			<div class="container-contact100-form-btn">
  				<div class="wrap-contact100-form-btn">
  					<div class="contact100-form-bgbtn"></div>
  					<button class="contact100-form-btn" type="submit">
  						<span>
  							Change
  							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
  						</span>
  					</button>
  				</div>
  			</div>
  		</form>
  	</div>
  </div>



  <div id="dropDownSelect1"></div>
 
  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <script>
  	$(".selection-2").select2({
  		minimumResultsForSearch: 20,
  		dropdownParent: $('#dropDownSelect1')
  	});
  </script>
  <!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
  	window.dataLayer = window.dataLayer || [];

  	function gtag() {
  		dataLayer.push(arguments);
  	}
  	gtag('js', new Date());

  	gtag('config', 'UA-23581568-13');
  </script>
  
  <script src='../../content/js/validator.js'>
    </script>
    <script>
        
      Validator({
        form: '#form',
        messageElement: '.showError',
        rules: [
          Validator.isRequired('#food_name'),
          Validator.isNumber('#food_price'),
          Validator.isRequired('#food_des')
        ]
      })

    
    </script>