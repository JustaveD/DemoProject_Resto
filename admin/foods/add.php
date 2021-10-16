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
 
  <div class="container-contact100">
	
	  <a href="?btn_list=list" class="outer_link">List of food</a>
  	<div class="wrap-contact100">
  		<form class="contact100-form validate-form" method="post" enctype="multipart/form-data" action="?btn_process=add" id='form'>
  			<span class="contact100-form-title">
  				ADD NEW FOOD
  			</span>

  			<div class="wrap-input100 validate-input">
  				<span class="label-input100">Food name</span>
				<span class="showError"></span>
  				<input class="input100"required id='food_name' type="text" name="food_name" placeholder="Enter food name" autocomplete="off">
  				<span class="focus-input100"></span>
  			</div>

  			<div class="wrap-input100 validate-input">
  				<span class="label-input100">Food price($)</span>
				  <span class="showError"></span>
  				<input class="input100" requiredtype="text"id='food_price' name="food_price" placeholder="Enter food price" autocomplete="off">
  				<span class="focus-input100"></span>
  			</div>

  			<div class="wrap-input100 input100-select">
  				<span class="label-input100">Food category</span>
  				<div>
  					<select class="selection-2" name="cat_id"required>
  						<option value="">Choose category</option>
  						<?php
							$cats = category_show_list();
							foreach ($cats as $cat) {
								extract($cat);
								echo "<option value='$cat_id'>$cat_name</option>";
							}
							?>
  					</select>
  				</div>
  				<span class="focus-input100"></span>
  			</div>

  			<div class="wrap-input100 input100-select">
  				<span class="label-input100">Food image</span>
  				<input class="input100" type="file"required name="food_image_file" >
  				
  			</div>

  			<div class="wrap-input100 validate-input">
  				<span class="label-input100">Food description</span>
				  <span class="showError"></span>
  				<textarea class="input100" id='food_des' name="food_des" required placeholder="Food description here..."></textarea>
  				<span class="focus-input100"></span>
  			</div>

  			<div class="container-contact100-form-btn">
  				<div class="wrap-contact100-form-btn">
  					<div class="contact100-form-bgbtn"></div>
  					<button class="contact100-form-btn" type="submit">
  						<span>
  							Add
  							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
  						</span>
  					</button>
  				</div>
  			</div>
  		</form>
  	</div>
  </div>



  <div id="dropDownSelect1"></div>


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

  