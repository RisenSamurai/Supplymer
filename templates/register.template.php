


<?php
 if($_COOKIE['user'] == 'guest') {
?>
<section class="sections">

    <div class="register-form-wrapper">
        <form class="modal-login-form register-form" action="scripts/register.script.php" method="POST">
            <?=  $_SESSION['message'];?>
            <label class="modal-login-form-label" for="register-email">Email</label>
            <div class="modal-email-input-container">
                <input class="register-input" type="email" name="register_email" placeholder="Email" id="register-email"
                       required value="<?= $_REQUEST['email']?>">
                <div class="modal-email-icon"></div>
            </div>

            <label class="modal-login-form-label" for="register-pass">Пароль</label>

            <div class="modal-pass-input-container">
                <input class="register-input" type="password" name="register_pass" placeholder="Пароль" id="register-pass"
                       required value="" minlength="8">
                <div class="modal-pass-icon"></div>
            </div>

            <label class="modal-login-form-label" for="register-repass">Повторите пароль</label>
            <div class="modal-pass-input-container">
                <input class="register-input" type="password" name="register_repass" placeholder=""
                       id="register-repass" value="" required minlength="8">
                <div class="modal-pass-icon"></div>
            </div>



            <input class="modal-send-input" type="submit" value="Отправить">
        </form>
    </div>

</section>

<?php } else {echo "<p>Вы уже зарегистрированы!</p>";} ?>



