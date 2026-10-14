<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
header("Cache-Control: no-cache, no-store, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
include_once('../model.php');

class control extends model{

	function __construct(){

		parent::__construct();

		$url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
		$url = strtolower($url);

        // Protect all routes except login
        $unprotected_routes = ['/', '/login'];
        if(!in_array($url, $unprotected_routes) && !isset($_SESSION['transporter_id'])) {
            echo "<script>window.location='login';</script>";
            exit;
        }

		switch($url){

			case '/':
				if(isset($_SESSION['transporter_id'])) {
					echo "<script>window.location='dashboard';</script>";
				} else {
					include_once('login.php');
				}
				break;

            case '/login':
                if(isset($_SESSION['transporter_id'])) {
                    echo "<script>window.location='dashboard';</script>";
                    exit;
                }
                if(isset($_POST['login'])) {
                    $login_identity = $_POST['login_identity'];
                    $password = $_POST['password'];
                    $res = $this->select_where('transporter', array("email" => $login_identity, "password" => $password));
                    if($res && $res->num_rows > 0) {
                        $t = $res->fetch_object();
                        if(strtolower($t->status) == 'inactive') {
                            echo "<script>
                                alert('Your Account Has Been Blocked By Admin');
                            </script>";
                        } else {
                            $_SESSION['transporter_id'] = $t->transporter_id ?? $t->id;
                            $_SESSION['transporter_name'] = $t->name;
                            $_SESSION['transporter_email'] = $t->email;
                            $_SESSION['transporter_phone'] = $t->phone;
                            echo "<script>window.location='dashboard';</script>";
                            exit;
                        }
                    } else {
                        echo "<script>
                            alert('Invalid credentials');
                        </script>";
                    }
                }
                include_once('login.php');
                break;

            case '/dashboard':
                include_once('dashboard.php');
                break;

            case '/assigned-orders':
                $orders_arr = array();
                $res = $this->select_where('orders', array('transporter_id' => $_SESSION['transporter_id']));
                if($res) {
                    while($fetch = $res->fetch_object()) {
                        $orders_arr[] = $fetch;
                    }
                }
                include_once('assigned-orders.php');
                break;

            case '/profile':
                include_once('profile.php');
                break;

            case '/available-orders':
                include_once('available-orders.php');
                break;

            case '/accept-order':
                include_once('accept-order.php');
                break;

            case '/update-status':
                if(isset($_POST['update_status'])) {
                    $order_id = $_POST['order_id'];
                    $status = $_POST['order_status'];
                    $run = $this->update_where('orders', array('order_status' => $status), array('order_id' => $order_id));
                    if($run) {
                        echo "<script>alert('Status Updated'); window.location='assigned-orders';</script>";
                    } else {
                        echo "<script>alert('Failed to update status');</script>";
                    }
                }
                $orders_arr = array();
                $res = $this->select_where('orders', array('transporter_id' => $_SESSION['transporter_id']));
                if($res) {
                    while($fetch = $res->fetch_object()) {
                        $orders_arr[] = $fetch;
                    }
                }
                include_once('update-status.php');
                break;

            case '/otp':
                if(isset($_POST['verify_otp'])) {
                    $order_id = $_POST['order_id'];
                    $otp = $_POST['otp'];
                    $res = $this->select_where('orders', array('order_id' => $order_id, 'otp' => $otp, 'transporter_id' => $_SESSION['transporter_id']));
                    if($res && $res->num_rows > 0) {
                        // Mark as delivered for example? Or just alert.
                        $this->update_where('orders', array('order_status' => 'Delivered'), array('order_id' => $order_id));
                        echo "<script>alert('OTP Verified! Order marked as Delivered.'); window.location='assigned-orders';</script>";
                    } else {
                        echo "<script>alert('Invalid OTP');</script>";
                    }
                }
                $orders_arr = array();
                $res = $this->select_where('orders', array('transporter_id' => $_SESSION['transporter_id']));
                if($res) {
                    while($fetch = $res->fetch_object()) {
                        $orders_arr[] = $fetch;
                    }
                }
                include_once('otp.php');
                break;
                
            case '/place-bid':
                include_once('place-bid.php');
                break;

            case '/payments':
                include_once('payments.php');
                break;

            case '/logout':
                unset($_SESSION['transporter_id']);
                session_destroy();
                echo "<script>window.location='login';</script>";
                break;
		}
	}
}

$obj = new control;

?>
