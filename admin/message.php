<style>
    .message {
        display: inline-block;
        position: absolute;
        top: 10px;
        right: -100%;
        height: 50px;
        min-width: 100px;
        padding: 0 20px;
        line-height: 50px;
        text-align: center;
        border: 1px solid #192a56;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .1);
        cursor: pointer;
        transition: all 2s ease;
        font-size: 25px;
    }
    .message--successful {
        background-color: #fff;
        color: #27ae60;
    }

    .message--error {
        background-color: #fff;
        color: #e63946;
    }

    .message.active {
        right: 10px;
        transition: all 2s ease-in-out;
    }
</style>
<div class="message <?php echo $status?"message--successful":"message--error" ?>">
    <?=$message ?>
</div>

<script>
    (function() {
        const message = document.querySelector('.message');
        setTimeout(function() {
            message.classList.add('active');
            setTimeout(function() {
                message.classList.remove('active');
            }, 5500);
        }, 0);
        message.addEventListener('click',function(){
            message.classList.remove('active');
        })
    })();
</script>
