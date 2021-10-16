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
	
	  <a href="?btn_list=list" class="outer_link">List of category</a>
  	<div class="wrap-contact100">
  		<form class="contact100-form validate-form" id='form' method="post" enctype="multipart/form-data" action="?btn_process=add">
  			<span class="contact100-form-title">
  				ADD NEW CATEGORY
  			</span>

  			<div class="wrap-input100 validate-input">
  				<span class="label-input100">Category name</span>
				  <span class="showError"></span>
  				<input class="input100" type="text" id='cat_name' required name="cat_name" placeholder="Enter category name" autocomplete="off">
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
          Validator.isRequired('#cat_name'),
        ]
      })

    
    </script>