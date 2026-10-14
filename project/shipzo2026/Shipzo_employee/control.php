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
        if(!in_array($url, $unprotected_routes) && !isset($_SESSION['employee'])) {
            echo "<script>window.location='login';</script>";
            exit;
        }

		switch($url){

			case '/':
				if(isset($_SESSION['employee'])) {
					echo "<script>window.location='dashboard';</script>";
				} else {
					include_once('login.php');
				}
				break;

            case '/login':
                if(isset($_SESSION['employee'])) {
                    echo "<script>window.location='dashboard';</script>";
                    exit;
                }
                if(isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $res = $this->select_where('employee', array('email' => $email, 'password' => $password));
                    if($res && $res->num_rows > 0) {
                        $emp = $res->fetch_object();
                        if(strtolower($emp->status) == 'inactive') {
                            echo "<script>
                                alert('Your Account Has Been Blocked By Admin');
                            </script>";
                        } else {
                            $_SESSION['employee'] = $email;
                            $_SESSION['employee_name'] = $emp->name;
                            $_SESSION['employee_email'] = $emp->email;
                            $_SESSION['employee_phone'] = $emp->phone;
                            echo "<script>window.location='dashboard';</script>";
                            exit;
                        }
                    } else {
                        echo "<script>
                            alert('Invalid Email or Password');
                        </script>";
                    }
                }
                include_once('login.php');
                break;

            case '/dashboard':
                include_once('dashboard.php');
                break;

            case '/orders':
            case '/assign-transporter':
            case '/manage-orders':
                if(isset($_POST['assign_transporter'])) {
                    $order_id = $_POST['order_id'];
                    $transporter_id = $_POST['transporter_id'];
                    // Use 'order_id' as column
                    $res = $this->update_where('orders', array('transporter_id' => $transporter_id), array('order_id' => $order_id));
                    if($res) {
                        echo "<script>alert('Transporter Assigned Successfully'); window.location='orders';</script>";
                        exit;
                    } else {
                        echo "<script>alert('Failed to Assign Transporter'); window.location='orders';</script>";
                        exit;
                    }
                }

                $orders_arr = $this->select('orders');
                $transporter_arr = $this->select('transporter');
                
                include_once('manage-orders.php');
                break;

            case '/profile':
                include_once('profile.php');
                break;

            case '/new-orders':
                include_once('new-orders.php');
                break;

            case '/verify-orders':
                include_once('verify-orders.php');
                break;

            case '/update-status':
                include_once('update-status.php');
                break;

            case '/customer-queries':
                include_once('customer-queries.php');
                break;

            case '/contact':
                $contact_arr = $this->select('contact_us');
                include_once('contact.php');
                break;

            case '/payment':
                $payment_arr = $this->select('payments');
                include_once('payment.php');
                break;

            case '/otp':
                $orders_arr = $this->select('orders');
                include_once('otp.php');
                break;

            case '/reports':
                include_once('reports.php');
                break;

            case '/logout':
                unset($_SESSION['employee']);
                session_destroy();
                echo "<script>window.location='login';</script>";
                break;
		}
	}
}

$obj = new control;

?>
