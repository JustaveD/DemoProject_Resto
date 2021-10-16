<!Doctype HTML>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/admin/style.css" type="text/css" />
    <style>
        #main {
            padding: 10px;
            margin-left: 150px;
        }

        .wrap {
            padding: 10px;
            background-color: #fff;
            display: flex;
            flex-wrap: wrap-reverse;
            align-items: center;
           
        }

        .wrap__info {
            flex: 1 1 70%;
            display: flex;
            flex-direction: column;

        }

        .wrap__info button {
            border: 1px solid #192a56;
            background-color: #fff;
            color: #192a56;
            width: 100px;
            padding: 5px;
            border-radius: 20px;
            margin-top: 10px;
            cursor: pointer;
            transition: all .3s ease;

        }

        .wrap__info button:hover {
            background-color: #192a56;
            color: #fff;
        }

        .info__item {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
        }

        .info__item label {
            font-size: 20px;
            font-weight: bold;
            user-select: none;
            color: #27ae60;
            margin-bottom: 5px;
            display: inline-block;
        }

        .info__item .item__des {
            /* word-break: break-all ; */
            width: 70%;
            word-wrap: wrap;
            height: auto;
            color: #192a56;
            margin-top: 0;
            font-size: 18px;
            font-style: italic;
            margin-bottom: 5px;
            border: none;
            user-select: none;
            pointer-events: none;
            padding: 7px 0px;
        }

        .item__tools {
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .tools__change {
            color: #192a56;
        }


        .wrap__image {
            flex: 1 1 30%;

        }

        .wrap__image img {
            width: 100%;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../ajax/ajax-change-avatar.js"></script>
</head>


<body>

    <?php 
        $id = $_SESSION['login_id'];
        $cus = customer_get_one($id);
        extract($cus);
    ?>
    <div id="main">
    <?php 
    // require "../menu.php";
?> 
        <form class="wrap" method='post' action='?btn_process=edit&cus_id=<?=$id?>' enctype="multipart/form-data">
            <div class="wrap__info">
                <div class="info__item">
                    <label for="">Name</label>
                    <input class="item__des"value='<?=$first_name .' '. $last_name?>' name="cus_name" required></input>
                    <div class="item__tools">
                        <span class="tools__change">edit</span>
                    </div>
                </div>
                <div class="info__item">
                    <label for="">Username</label>
                    <input class="item__des"value='<?=$username?>' required></input>
                </div>
                <div class="info__item">
                    <label for="">Password After Encrypt</label>
                    <input class="item__des"value='<?=$password?>' name='password'required></input>
                    <div class="item__tools">
                        <span class="tools__change">change</span>
                    </div>
                </div>
                <div class="info__item">
                    <label for="">Email</label>
                    <input class="item__des"value='<?=$cus_email?>'required></input>
                </div>
                <div class="info__item">
                    <label for="">Phone</label>
                    <input class="item__des"value='<?=$cus_phone?>' name='cus_phone'required></input>
                    <div class="item__tools">
                        <span class="tools__change">change</span>
                    </div>
                </div>
                <div class="info__item">
                    <label for="">Date join</label>
                    <?php 
                        $cus_date = implode('-',array_reverse(explode("-",$cus_date_resgister)));
                    ?>
                    <input class="item__des"value='<?=$cus_date?>'></input>
                    
                </div>
                <div class="info__item">
                    <label for="">Address</label>
                    <textarea required class="item__des" name="cus_address" id="" cols="30" rows="3"><?=$cus_address?></textarea>
                    <div class="item__tools">
                        <span class="tools__change">edit</span>
                    </div>
                </div>
                
                <button type='submit'>Save</button>
            </div>
            <div class="wrap__image">
                <img src="<?=$ROOT_URL.$cus_avatar?>" alt="">
                <div class="item__tools " >
                        <input type="file" name='cus_avatar_file' class="change-avatar">
                </div>
            </div>
           
        </form>
    </div>


    <script>
        const editBtns = document.querySelectorAll('.tools__change');
        editBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.target.parentElement.previousElementSibling.style.pointerEvents = 'auto';
                e.target.parentElement.previousElementSibling.focus();
                e.target.parentElement.previousElementSibling.addEventListener('blur',function(){
                    e.target.parentElement.previousElementSibling.style.pointerEvents = 'none';
                })
            })
        })
    </script>

</body>


</html>