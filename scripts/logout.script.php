<?php

setcookie('user', "guest", time()-3600, '/');
unset($_COOKIE['user']);


header('Location: ../');