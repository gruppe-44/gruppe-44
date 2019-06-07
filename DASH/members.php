<?php


// initialization of login system and generation code
$oSimpleLoginSystem = new SimpleLoginSystem();

// draw login box
echo $oSimpleLoginSystem->getLoginBox();

// draw shoutbox application
echo $oSimpleLoginSystem->getShoutbox();

// class SimpleLoginSystem
class SimpleLoginSystem {

    // variables
    var $aExistedMembers; // Existed members array

    // constructor
    function SimpleLoginSystem() {
        $this->aExistedMembers = array(
            'User1' => 'd8578edf8458ce06fbc5bb76a58c5ca4',  //Sample: MD5('qwerty')
            'User2' => 'd8578edf8458ce06fbc5bb76a58c5ca4'
        );
    }

    function getLoginBox() {
        ob_start();
        require_once('login_form.html');
        $sLoginForm = ob_get_clean();

        $sLogoutForm = '<a href="'.$_SERVER['PHP_SELF'].'?logout=1">logout</a>';

        if ((int)$_REQUEST['logout'] == 1) {
            if (isset($_COOKIE['member_name']) && isset($_COOKIE['member_pass']))
                $this->simple_logout();
        }

        if ($_REQUEST['username'] && $_REQUEST['password']) {
            if ($this->check_login($_REQUEST['username'], MD5($_REQUEST['password']))) {
                $this->simple_login($_REQUEST['username'], $_REQUEST['password']);
                return 'Hello ' . $_REQUEST['username'] . '! ' . $sLogoutForm;
            } else {
                return 'Username or Password is incorrect' . $sLoginForm;
            }
        } else {
            if ($_COOKIE['member_name'] && $_COOKIE['member_pass']) {
                if ($this->check_login($_COOKIE['member_name'], $_COOKIE['member_pass'])) {
                    return 'Hello ' . $_COOKIE['member_name'] . '! ' . $sLogoutForm;
                }
            }
            return $sLoginForm;
        }
    }

    function simple_login($sName, $sPass) {
        $this->simple_logout();

        $sMd5Password = MD5($sPass);

        $iCookieTime = time() + 24*60*60*30;
        setcookie("member_name", $sName, $iCookieTime, '/');
        $_COOKIE['member_name'] = $sName;
        setcookie("member_pass", $sMd5Password, $iCookieTime, '/');
        $_COOKIE['member_pass'] = $sMd5Password;
    }

    function simple_logout() { 
        setcookie('member_name', '', time() - 96 * 3600, '/');
        setcookie('member_pass', '', time() - 96 * 3600, '/');

        unset($_COOKIE['member_name']);
        unset($_COOKIE['member_pass']);
    }

    function check_login($sName, $sPass) {
        return ($this->aExistedMembers[$sName] == $sPass);
    }

    // shoutbox functions addon
    function getShoutbox() {
        //the host, name, and password for your mysql
        $con = mysqli_connect("localhost","root","","login-db");

        //select the database
        //mysql_select_db("chatnew");

        // adding to DB table posted message
        if ($_COOKIE['member_name']) {
            if(isset($_POST['s_say']) && $_POST['s_message']) {
                $sUsername = $_COOKIE['member_name'];
                $sMessage = mysqli_real_escape_string($con,$_POST['s_message']);
                mysqli_query($con,"INSERT INTO `s_messages` SET `user`='{$sUsername}', `message`='{$sMessage}', `when`=UNIX_TIMESTAMP()");
            }
        }

        //returning the last 5 messages
        $vRes = mysqli_query($con,"SELECT * FROM `s_messages` ORDER BY `id` DESC LIMIT 5");

        $sMessages = '';

        // collecting list of messages
        while($aMessages = mysqli_fetch_array($vRes)) {
            $sWhen = date("H:i:s", $aMessages['when']);
            $sMessages .= '<div class="message">' . $aMessages['user'] . ': ' . $aMessages['message'] . '<span>(' . $sWhen . ')</span></div>';
        }

        mysqli_close($con);

        ob_start();
        require_once('Dash.html');
        echo $sMessages;
        $sShoutboxForm = ob_get_clean();

        return $sShoutboxForm;
    }
}

?>