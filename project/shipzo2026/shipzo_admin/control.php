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
        if(!in_array($url, $unprotected_routes) && !isset($_SESSION['admin'])) {
            echo "<script>window.location='login';</script>";
            exit;
        }

		switch($url){

			// Default Login Page
			case '/':
				if(isset($_SESSION['admin'])) {
					echo "<script>window.location='dashboard';</script>";
				} else {
					include_once('login.php');
				}
				break;


case '/login':
	if(isset($_SESSION['admin'])) {
		echo "<script>window.location='dashboard';</script>";
		exit;
	}

	if(isset($_REQUEST['login']))
	{
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];

		$arr = array(
			"email"=>$email,
			"password"=>$password
		);

		$res = $this->select_where('admin', $arr);

		$chk = $res->num_rows;

		if($chk == 1)
		{
			$admin = $res->fetch_object();
			$_SESSION['admin'] = $email;
			$_SESSION['admin_name'] = isset($admin->name) ? $admin->name : 'Admin';

			echo "<script>
					alert('Login Success');
					window.location='dashboard';
				  </script>";
		}
		else
		{
			echo "<script>
					alert('Wrong Email or Password');
				  </script>";
		}
	}

	include_once('login.php');
	break;






			case '/dashboard':
				include_once('dashboard.php');
				break;



             



			case '/employee':
				$employee_arr = $this->select('employee');
				include_once('employee.php');
				break;




case '/add_employee':

	// ADD EMPLOYEE
	if(isset($_REQUEST['add_employee']))
	{
		$arr = array(

			"name" => $_REQUEST['name'],
			"email" => $_REQUEST['email'],
			"phone" => $_REQUEST['phone'],
			"password" => $_REQUEST['password'],
			"address" => $_REQUEST['address']

		);

		$run = $this->insert('employee',$arr);

		if($run)
		{
			echo "<script>

					alert('Employee Added Successfully');

					window.location='employee';

				  </script>";
		}
		else
		{
			echo "<script>

					alert('Employee Not Added');

				  </script>";
		}
	}

	include_once('add_employee.php');
	break;

			case '/seller':
				$Seller_arr = $this->select('seller');
				include_once('seller.php');
				break;

			case '/transporter':
				$transporter_arr = $this->select('transporter');
				include_once('transporter.php');
				break;



				case '/add_transporter':

    // ADD TRANSPORTER
    if(isset($_REQUEST['save_transporter']))
    {

        $arr = array(

            "name" => $_REQUEST['name'],
            "email" => $_REQUEST['email'],
            "phone" => $_REQUEST['phone'],
            "password" => $_REQUEST['password'],
            "vehicle_type" => $_REQUEST['vehicle_type'],
            "status" => $_REQUEST['status'],
            "address" => $_REQUEST['address']

        );

        $run = $this->insert('transporter',$arr);

        if($run)
        {
            echo "<script>

                    alert('Transporter Added Successfully');

                    window.location='transporter';

                  </script>";
        }
        else
        {
            echo "<script>

                    alert('Failed');

                  </script>";
        }

    }

    include_once('add_transporter.php');

    break;

			case '/orders':
			case '/manage_orders':
				$orders_arr = $this->select('orders');
				include_once('orders.php');
				break;

			case '/delete_order':
				$id = $_REQUEST['id'];
				$where = array("order_id" => $id);
				$res = $this->delete_where('orders', $where);
				if($res)
				{
					echo "<script>
						alert('Order Deleted Successfully');
						window.location='manage_orders';
						</script>";
				}
				break;

			case '/payments':
				include_once('payments.php');
				break;

			case '/contact':
				if(isset($_POST['submit_response'])) {
					$contact_id = $_POST['contact_id'];
					$response = $_POST['response'];
					$status = $_POST['status'];
					$arr = array(
						'response' => $response,
						'status' => $status
					);
					$run = $this->update_where('contact_us', $arr, array('contact_id' => $contact_id));
					if($run) {
						echo "<script>alert('Response submitted successfully'); window.location='contact';</script>";
						exit;
					} else {
						echo "<script>alert('Failed to submit response');</script>";
					}
				}
				$contact_arr = $this->select('contact_us');
				include_once('contact.php');
				break;

			case '/reports':
				include_once('reports.php');
				break;

			case '/reviews':
                $feedback_arr = $this->select('feedback');
                $seller_arr = $this->select('seller');
				include_once('reviews.php');
				break;

			case '/otp':
				include_once('otp.php');
				break;

			case '/profile':
				include_once('profile.php');
				break;

			case '/settings':
				include_once('settings.php');
				break;

			case '/logout':
				session_destroy();
				echo "<script>window.location='login';</script>";
				break;

            case '/delete':
                if(isset($_REQUEST['del_employee'])) {
                    $id = $_REQUEST['del_employee'];
                    $run = $this->delete_where('employee', array('employee_id' => $id));
                    if($run) {
                        echo "<script>alert('Employee Deleted'); window.location='employee';</script>";
                    }
                }
                if(isset($_REQUEST['del_seller'])) {
                    $id = $_REQUEST['del_seller'];
                    $run = $this->delete_where('seller', array('seller_id' => $id));
                    if($run) {
                        echo "<script>alert('Seller Deleted'); window.location='seller';</script>";
                    }
                }
                if(isset($_REQUEST['del_transporter'])) {
                    $id = $_REQUEST['del_transporter'];
                    $run = $this->delete_where('transporter', array('transporter_id' => $id));
                    if($run) {
                        echo "<script>alert('Transporter Deleted'); window.location='transporter';</script>";
                    }
                }
                break;

            case '/edit_employee':
                if(isset($_REQUEST['edit'])) {
                    $id = $_REQUEST['edit'];
                    $res = $this->select_where('employee', array('employee_id' => $id));
                    $fetch = $res->fetch_object();
                    
                    if(isset($_REQUEST['update_employee'])) {
                        $arr = array(
                            "name" => $_REQUEST['name'],
                            "email" => $_REQUEST['email'],
                            "phone" => $_REQUEST['phone'],
                            "address" => $_REQUEST['address']
                        );
                        if(!empty($_REQUEST['password'])) {
                            $arr['password'] = $_REQUEST['password'];
                        }
                        $run = $this->update_where('employee', $arr, array('employee_id' => $id));
                        if($run) {
                            echo "<script>alert('Employee Updated'); window.location='employee';</script>";
                        }
                    }
                    include_once('edit_employee.php');
                }
                break;

            case '/edit_seller':
                if(isset($_REQUEST['edit'])) {
                    $id = $_REQUEST['edit'];
                    $res = $this->select_where('seller', array('seller_id' => $id));
                    $fetch = $res->fetch_object();
                    
                    if(isset($_REQUEST['update_seller'])) {
                        $arr = array(
                            "full_name" => $_REQUEST['full_name'],
                            "email" => $_REQUEST['email'],
                            "phone" => $_REQUEST['phone']
                        );
                        if(!empty($_REQUEST['password'])) {
                            $arr['password'] = md5($_REQUEST['password']);
                        }
                        $run = $this->update_where('seller', $arr, array('seller_id' => $id));
                        if($run) {
                            echo "<script>alert('Seller Updated'); window.location='seller';</script>";
                        }
                    }
                    include_once('edit_seller.php');
                }
                break;

            case '/edit_transporter':
                if(isset($_REQUEST['edit'])) {
                    $id = $_REQUEST['edit'];
                    $res = $this->select_where('transporter', array('transporter_id' => $id));
                    $fetch = $res->fetch_object();
                    
                    if(isset($_REQUEST['update_transporter'])) {
                        $arr = array(
                            "name" => $_REQUEST['name'],
                            "email" => $_REQUEST['email'],
                            "phone" => $_REQUEST['phone'],
                            "vehicle_type" => $_REQUEST['vehicle_type'],
                            "status" => $_REQUEST['status'],
                            "address" => $_REQUEST['address']
                        );
                        if(!empty($_REQUEST['password'])) {
                            $arr['password'] = $_REQUEST['password'];
                        }
                        $run = $this->update_where('transporter', $arr, array('transporter_id' => $id));
                        if($run) {
                            echo "<script>alert('Transporter Updated'); window.location='transporter';</script>";
                        }
                    }
                    include_once('edit_transporter.php');
                }


            case '/status':
                if(isset($_REQUEST['status_employee'])) {
                    $id = $_REQUEST['status_employee'];
                    $where = array("employee_id" => $id);
                    $res = $this->select_where('employee', $where);
                    $fetch = $res->fetch_object();
                    if($fetch->status == "Active" || $fetch->status == "active") {
                        $arr = array("status" => "Inactive");
                        $this->update_where('employee', $arr, $where);
                    } else {
                        $arr = array("status" => "Active");
                        $this->update_where('employee', $arr, $where);
                    }
                    echo "<script>window.location='employee';</script>";
                }

                if(isset($_REQUEST['status_transporter'])) {
                    $id = $_REQUEST['status_transporter'];
                    $where = array("transporter_id" => $id);
                    $res = $this->select_where('transporter', $where);
                    $fetch = $res->fetch_object();
                    if($fetch->status == "Active" || $fetch->status == "active") {
                        $arr = array("status" => "Inactive");
                        $this->update_where('transporter', $arr, $where);
                    } else {
                        $arr = array("status" => "Active");
                        $this->update_where('transporter', $arr, $where);
                    }
                    echo "<script>window.location='transporter';</script>";
                }

                if(isset($_REQUEST['status_seller'])) {
                    $id = $_REQUEST['status_seller'];
                    $where = array("seller_id" => $id);
                    $res = $this->select_where('seller', $where);
                    $fetch = $res->fetch_object();
                    if($fetch->status == "Active" || $fetch->status == "active") {
                        $arr = array("status" => "Inactive");
                        $this->update_where('seller', $arr, $where);
                    } else {
                        $arr = array("status" => "Active");
                        $this->update_where('seller', $arr, $where);
                    }
                    echo "<script>window.location='seller';</script>";
                }
                break;
		}


	
	}
}

$obj = new control;

?>