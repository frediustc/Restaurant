<?php
if(isset($_POST['update'])){
    $fn = trim(htmlspecialchars($_POST['fn']));
    $em = trim(htmlspecialchars($_POST['em']));
    $nb = trim(htmlspecialchars($_POST['nb']));

    $ok = true;
    ?>
    <script type="text/javascript">

    <?php
    //check if the Full Name format is correct (letter within 2 and 5 char)
    if(!preg_match('/^[a-zA-Z ]{5,100}$/', $fn)) {
        $ok = false;
        ?>

        $.notify({
           title: '<strong>Full Name Wrong Format!</strong>',
           message: '5 - 100 letters & spaces only.'
       },{
           type: 'danger'
       });

       <?php
    }

    //check if the Full Name format is correct (letter within 2 and 5 char)
    if(!preg_match('/^[0-9]{10}$/', $nb)) {
        $ok = false;
        ?>

        $.notify({
           title: '<strong>Number Wrong Format!</strong>',
           message: '10 numbers only.'
       },{
           type: 'danger'
       });

       <?php
    }

    //check if the email does not exist
    $check = $db->prepare('SELECT COUNT(*) AS nbr FROM users WHERE em = ? AND id != ?');
    $check->execute(array($em, $_SESSION['id']));
    $result = $check->fetch();
    if($result['nbr'] > 0){
        $ok = false;
        ?>

        $.notify({
           title: '<strong>Error!</strong>',
           message: 'Email already exist.'
       },{
           type: 'danger'
       });

       <?php
    }

    //check if the email format is correct (letter within 2 and 5 char)
    if(!preg_match('/(^[a-zA-Z0-9_.+-]+)@([a-zA-Z_-]+).([a-zA-Z]){2,4}$/', $em)) {
        $ok = false;
        ?>

        $.notify({
           title: '<strong>Email Wrong Format!</strong>',
           message: 'must be in example@domain.extension format.'
       },{
           type: 'danger'
       });

       <?php
    }

    //if all is alright ($ok === true) we insert the value
    if($ok){
        //see if password need to be update
        $ps = trim(htmlspecialchars($_POST['ps']));
        $cn = trim(htmlspecialchars($_POST['cn']));
        if(!empty($ps) && !empty($cn)){
            if(!empty($ps) && !empty($cn)){
                if(strlen($ps) < 6 || strlen($ps) > 16){
                    $ok = false;
                    ?>

                    $.notify({
                       title: '<strong>Password!</strong>',
                       message: '6 - 16 characters.'
                   },{
                       type: 'danger'
                   });

                   <?php
                }

                if ($ps != $cn) {
                    $ok = false;
                    ?>

                    $.notify({
                       title: '<strong>Confirm!</strong>',
                       message: 'password do not match.'
                   },{
                       type: 'danger'
                   });

                   <?php
                }

                if($ok){
                    $stdadd = $db->prepare('UPDATE users SET fn = ?, em = ?, nb = ?, ps = ? WHERE id = ?');
                    if($stdadd->execute(array(ucwords($fn), $em, $nb, sha1($ps), $_SESSION['id']))){
                        $user = $db->prepare('SELECT * FROM users WHERE id = ?');
                        $user->execute(array($_SESSION['id']));
                        $u = $user->fetch();
                        ?>

                        $.notify({
                           title: '<strong>Success!</strong>',
                           message: 'Info and password Updated.'
                       },{
                           type: 'success'
                       });

                       <?php
                    }
                    else {
                        ?>

                        $.notify({
                           title: '<strong>Error!</strong>',
                           message: 'Something went wrong.'
                       },{
                           type: 'danger'
                       });

                       <?php
                    }
                }
            }
        }
        else {
            $stdadd = $db->prepare('UPDATE users SET fn = ?, em = ?, nb = ? WHERE id = ?');
            if($stdadd->execute(array(ucwords($fn), $em, $nb, $_SESSION['id']))){
                $user = $db->prepare('SELECT * FROM users WHERE id = ?');
                $user->execute(array($_SESSION['id']));
                $u = $user->fetch();
                ?>

                $.notify({
                   title: '<strong>Success!</strong>',
                   message: 'Info Updated.'
               },{
                   type: 'success'
               });

               <?php
            }
            else {
                ?>

                $.notify({
                   title: '<strong>Error!</strong>',
                   message: 'Something went wrong.'
               },{
                   type: 'danger'
               });

               <?php
            }
        }
    }
    ?>
    </script>
    <?php
}
