<?php


session_start();

//Flash message helper
function flash($name = '', $message = '', $class = 'p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50')
{
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name . "_class"] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo "<div class='$class' id='msg-flash' role='alert'>$_SESSION[$name]</div>";
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}



//Check if the user is logged in
function isAdminLoggedIn()
{
    if (isset($_SESSION['admin_session'])) {
        return true;
    }
    return false;
}
function isClientLoggedIn()
{
    if (isset($_SESSION['client_session'])) {
        return true;
    }
    return false;
}
