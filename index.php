<?php

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $messages = array();


  if (!empty($_COOKIE['save'])) {

    setcookie('save', '', 10000);

    $messages[] = 'Спасибо, результаты сохранены.';
  }


  $errors = array();
  $errors['fio'] = !empty($_COOKIE['fio_error']);
  $errors['email'] = !empty($_COOKIE['email_error']);
  $errors['bd'] = !empty($_COOKIE['bd_error']);
  $errors['bio'] = !empty($_COOKIE['bio_error']);
  $errors['sex'] = !empty($_COOKIE['sex_error']);
  $errors['limbs'] = !empty($_COOKIE['limbs_error']);
  $errors['accept'] = !empty($_COOKIE['accept_error']);
  $errors['abilities'] = !empty($_COOKIE['abilities_error']);



  if ($errors['fio']) {

    setcookie('fio_error', '', 100000);

    $messages[] = '<div class="error">Заполните имя.</div>';
  }
  if ($errors['email']) {

    setcookie('email_error', '', 100000);

    $messages[] = '<div class="error">Заполните email.</div>';
  }
  if ($errors['bd']) {

    setcookie('bd_error', '', 100000);

    $messages[] = '<div class="error">Заполните date.</div>';
  }



    if ($errors['bio']) {

        setcookie('bio_error', '', 100000);

        $messages[] = '<div class="error">pull bio.</div>';
    }

    if ($errors['sex']) {

        setcookie('sex_error', '', 100000);

        $messages[] = '<div class="error">pull sex.</div>';
    }

    if ($errors['limbs']) {

        setcookie('limbs_error', '', 100000);

        $messages[] = '<div class="error">pull limbs.</div>';
    }

    if ($errors['abilities']) {

        setcookie('abilities_error', '', 100000);

        $messages[] = '<div class="error">abilities error.</div>';
    }

       if ($errors['accept']) {

        setcookie('accept_error', '', 100000);

        $messages[] = '<div class="error">accept error.</div>';
    }


  $values = array();
  $values['fio'] = empty($_COOKIE['fio_value']) ? '' : $_COOKIE['fio_value'];
  $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
  $values['bd'] = empty($_COOKIE['bd_value']) ? '' : $_COOKIE['bd_value'];
  $values['bio'] = empty($_COOKIE['bio_value']) ? '' : $_COOKIE['bio_value'];
  $values['sex'] = empty($_COOKIE['sex_value']) ? '' : $_COOKIE['sex_value'];
  $values['limbs'] = empty($_COOKIE['limbs_value']) ? '' : $_COOKIE['limbs_value'];
  $values['accept'] = empty($_COOKIE['accept_value']) ? '' : $_COOKIE['accept_value'];
  $values['abilities'] = array();
  $values['abilities'][0] = empty($_COOKIE['abilities_value_1']) ? '' : $_COOKIE['abilities_value_1'];
  $values['abilities'][1] = empty($_COOKIE['abilities_value_2']) ? '' : $_COOKIE['abilities_value_2'];
  $values['abilities'][2] = empty($_COOKIE['abilities_value_3']) ? '' : $_COOKIE['abilities_value_3'];
    $values['abilities'][3] = empty($_COOKIE['abilities_value_4']) ? '' : $_COOKIE['abilities_value_4'];
  include('form.php');
}

else {

  $errors = FALSE;
  if (empty($_POST['fio'])) {

    setcookie('fio_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {

    setcookie('fio_value', $_POST['fio'], time() + 30 * 24 * 60 * 60);
  }

  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    setcookie('email_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
}
  else {

  setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);
  }

  if (empty($_POST['bd'])) {
    setcookie('bd_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
}
else {
  setcookie('bd_value', $_POST['bd'], time() + 30 * 24 * 60 * 60);
}

    if (empty($_POST['sex'])) {
        setcookie('sex_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else {

        setcookie('sex_value', $_POST['sex'], time() + 30 * 24 * 60 * 60);
    }

    if (empty($_POST['limbs'])) {
        setcookie('limbs_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else {

        setcookie('limbs_value', $_POST['limbs'], time() + 30 * 24 * 60 * 60);
    }


    if (empty($_POST['bio'])) {
        setcookie('bio_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else {

        setcookie('bio_value', $_POST['bio'], time() + 30 * 24 * 60 * 60);
    }

  if (!isset($_POST['accept'])) {
    setcookie('accept_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }


  

    setcookie('abilities_value_1', '0', time() + 30 * 24 * 60 * 60);
    setcookie('abilities_value_2', '0', time() + 30 * 24 * 60 * 60);
    setcookie('abilities_value_3', '0', time() + 30 * 24 * 60 * 60);
    setcookie('abilities_value_4', '0', time() + 30 * 24 * 60 * 60);

    if (empty($_POST['abilities'])) {
        setcookie('abilities_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else {

          
             foreach($_POST['abilities'] as $super) {
                  setcookie('abilities_value_' . $super, '1', time() + 30 * 24 * 60 * 60);
    }

    

    }




  if ($errors) {

    header('Location: index.php');
    exit();
  }
  else {

    setcookie('fio_error', '', 100000);
    setcookie('email_error', '', 100000);
    setcookie('bd_error', '', 100000);
    setcookie('abilities_error', '', 100000);
    setcookie('bio_error', '', 100000);
    setcookie('sex_error', '', 100000);
    setcookie('limbs_error', '', 100000);
    setcookie('accept_error', '', 100000);
  }


  $user = 'u40078';
$pass = '8932258';
$db = new PDO('mysql:host=localhost;dbname=u40078', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {
    $db->beginTransaction();
  $stmt = $db->prepare("INSERT INTO formtab SET fio = ?, email = ?, bd = ?, sex = ?, limbs = ?, bio = ?");
  $stmt -> execute([$_POST['fio'], $_POST['email'], $_POST['bd'], $_POST['sex'], intval($_POST['limbs']), $_POST['bio']]);
 $stmt2 = $db->prepare("INSERT INTO usertab SET form_id = ?, abid = ?");
  $id = $db->lastInsertId();
  foreach ($_POST['abilities'] as $s){
   $stmt2 -> execute([$id, intval($s)]);
  }
    $db->commit();
}

catch(PDOException $e) {
    $db->rollBack();
    print('Error : ' . $e->getMessage());
    exit();
}



  setcookie('save', '1');


  header('Location: index.php');
}

