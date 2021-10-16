<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custum css link -->
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/basic.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/variable.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/sign-up.css">
    <style>
        option {
            padding: 20px;
            background-color: #fff;
            color: #192a56;
            font-size: 18px;
        }
    </style>
    <title>Resto | Sign up</title>
</head>

<body>
    <div class="container">
        <h1><a href="../home">Resto</a> sign up</h1>
        <h4>it's free and only takes a minute</h4>
        <form action="?btn_process=signup" method='post' enctype="multipart/form-data" id='form'>
            <label>first name</label>
            <span class="showError"></span>
            <input type="text" name='first_name' id='first_name' placeholder="" required>
            <label>last name</label>
            <span class="showError"></span>
            <input type="text" name='last_name' id='last_name'placeholder=" "required>
            <label>username</label>
            <span class="showError"></span>
            <input type="text" name='username' id='username'placeholder=" "required>
            <label>password</label>
            <span class="showError"></span>
            <input type="password" name='password'id='password' placeholder=" "required>
            <label>confirm password</label>
            <span class="showError"></span>
            <input type="password" name='repassword' id ='password-confirmation'placeholder=" "required>
            <label>email</label>
            <span class="showError"></span>
            <input type="email" name='cus_email'id="cus_email" placeholder=" "required>
            <label>avatar</label>
            <input type="file" name='cus_avatar_file' placeholder=" "required>
            <label>phone</label>
            <span class="showError"></span>
            <input type="text" name='cus_phone' id='cus_phone'placeholder=" "required>
            <label>address</label>
            <label>Provice</label>
            <select name="cus_provice" id="provice" required>
                <option value="">Choose here</option>
            </select>
            <label>district</label>
            <select name="cus_district" id="district"required>
                <option value="">Choose here</option>
            </select>
            <label>wards</label>
            <select name="cus_wards" id="wards"required>
                <option value="">Choose here</option>
            </select>
            <label>more specific</label>
            <span class="showError"></span>
            <input type="text" name="cus_specific" id="cus_specific"required>

            <input type="submit" class="submit-btn" value='Submit'>
        </form>
        <p>By clicking the Sign up button you agree to our <a href="#">terms and condition</a>
            and <a href="#">policy privacy</a></p>
    </div>
    <p>already have an account? <a href="../login">login here</a></p>
    <script>
        const provice = document.querySelector("#provice");
        const district = document.querySelector("#district");
        const wards = document.querySelector("#wards");

        async function fetchText() {
            let response = await fetch('https://provinces.open-api.vn/api/?depth=3');
            let data = await response.text();
            data = JSON.parse(data);
            return data;

        }
        let proviceList = fetchText();
        let districtList = [];
        proviceList.then(response => {
            response.forEach(e => {
                const option = document.createElement("option");
                option.value = e.name;
                option.innerText = e.name;
                provice.appendChild(option);
            })
        });
        provice.addEventListener('change', function(e) {
            district.innerText = '';
            let proviceValue = e.target.value;
            proviceList.then(response => {

                for (let i = 0; i < response.length; i++) {
                    if (response[i].name == proviceValue) {

                        districtList = response[i]['districts'];
                        console.log(districtList);
                        districtList.forEach(dis => {
                            const option = document.createElement("option");
                            option.value = dis.name;
                            option.innerText = dis.name;
                            district.appendChild(option);
                        })
                        break;

                    }

                }

            })
        })
        district.addEventListener('change', function(e) {
            wards.innerText = "";
            let districtValue = e.target.value;
            for (let i = 0; i < districtList.length; i++) {
                if (districtList[i].name == districtValue) {
                    let wardsList = districtList[i]['wards'];
                    wardsList.forEach(ward => {
                        const option = document.createElement("option");
                        option.value = ward.name;
                        option.innerText = ward.name;
                        wards.appendChild(option);
                    })
                    break;

                }

            }
        })
        // fetchText();
    </script>
    <script src='../../content/js/validator.js'>
    </script>
    <script>
        
      Validator({
        form: '#form',
        messageElement: '.showError',
        rules: [
          Validator.isRequired('#first_name'),
          Validator.isRequired('#last_name'),
          Validator.isRequired('#username'),
          Validator.minLength('#password',8),
          Validator.checkPassword('#form','#password-confirmation','#password'),
          Validator.isEmail('#cus_email'),
          Validator.checkPhone('#cus_phone'),
          Validator.isRequired('#cus_specific'),
        ]
      })

    
    </script>
</body>

</html>