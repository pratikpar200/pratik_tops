<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
header("Cache-Control: no-cache, no-store, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
include_once('model.php');  // 1 model page load

class control extends model{  // 2 model class extends
	
	function __construct(){
		
		model::__construct();  // 3 call model __construct for connectivity
		$url=$_SERVER['PATH_INFO'];
		
		switch($url){
			
			case '/':
			include_once('home.php');
			break;
			
			case '/home':
			
			include_once('home.php');
			break;
			
			case '/about':
			include_once('about.php');
			
			break;
			
			case '/services':
			include_once('services.php');
			break;
			case '/booking':
			
			
			if(!isset($_SESSION['user_id']))
{
    echo "<script>
            alert('Please Login First');
            window.location='login';
          </script>";
    exit;
}

if(isset($_POST['submit']))
{
    // tera purana booking code
}
			
			

if(isset($_POST['submit']))
{
    $customer_type = $_POST['customer_type'];
    $customer_name = $_POST['customer_name'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $pickup_address = $_POST['pickup_address'];
    $delivery_address = $_POST['delivery_address'];
    $pickup_date = $_POST['pickup_date'];
    $expected_delivery = $_POST['expected_delivery'];
    $parcel_type = $_POST['parcel_type'];
    $quantity = $_POST['quantity'];
    $delivery_speed = $_POST['delivery_speed'];
    $special_instructions = $_POST['special_instructions'];

    $data=array(
        "customer_type"=>$customer_type,
        "customer_name"=>$customer_name,
        "contact_number"=>$contact_number,
        "email"=>$email,
        "pickup_address"=>$pickup_address,
        "delivery_address"=>$delivery_address,
        "pickup_date"=>$pickup_date,
        "expected_delivery"=>$expected_delivery,
        "parcel_type"=>$parcel_type,
        "quantity"=>$quantity,
        "delivery_speed"=>$delivery_speed,
        "special_instructions"=>$special_instructions
    );
    if(isset($_SESSION['user_id'])) {
        $data['seller_id'] = $_SESSION['user_id'];
    }

    $res=$this->insert('orders',$data);

    if($res)
    {
        echo "<script>alert('Booking Success');</script>";
    }
    else
    {
        echo "<script>alert('Booking Failed');</script>";
    }
}

include_once('booking.php');
break;
			
			case '/tracking':
			include_once('tracking.php');
			break;
			
			
			
			
			case '/warehouse':
			include_once('Warehouse.php');
			break;
			
			case '/pricing':
			include_once('pricing.php');
			break;
			
			case '/company':
			include_once('Company.php');
			break;
			
			case '/gallery':
			include_once('gallery.php');
			break;
			
			case '/faq':
			include_once('faq.php');
			break;
			
			case '/contact':
			if(isset($_REQUEST['submit']))
                    {
                        if(!isset($_SESSION['user_id']))
                        {
                            echo "<script>
                                    alert('Please Login First');
                                    window.location='login';
                                  </script>";
                            exit;
                        }

                        $name=$_REQUEST['name'];
                        $email=$_REQUEST['email'];
                        $subject=$_REQUEST['subject'];
                        $message=$_REQUEST['message'];

                        //$img=$_FILES['imgae']['name'];

                        $data=array("name"=>$name,"email"=>$email,"subject"=>$subject,"message"=>$message);
                        $res=$this->insert('contact_us',$data);    
                        echo "<script>alert('contact Success');</script>";
                    }
			include_once('contact.php');
			break;
			
			
			
case '/login':
    if(isset($_SESSION['user'])) {
        echo "<script>window.location='home';</script>";
        exit;
    }

    if(isset($_REQUEST['login']))
    {
        $email = $_REQUEST['email'];

        $password = md5($_REQUEST['password']);

        // Array
        $arr = array(
            "email" => $email,
            "password" => $password
        );

        // Select Data
        $res = $this->select_where('seller', $arr);

        $chk = $res->num_rows;

        if($chk == 1)
        {
            $user_data = $res->fetch_object();
            if(strtolower($user_data->status) == 'inactive') {
                echo "<script>
                        alert('Your Account Has Been Blocked By Admin');
                      </script>";
            } else {
                $_SESSION['user'] = $email;
                $_SESSION['user_id'] = $user_data->seller_id;
                $_SESSION['user_name'] = $user_data->full_name;
                echo "<script>
                        alert('Login Success');
                        window.location='home';
                      </script>";
            }
        }
        else
        {
            echo "<script>
                    alert('Login Failed Due to Wrong Credential');
                  </script>";
        }

    }

    include_once('login.php');

    break;

    case '/logout':
        session_unset();
        session_destroy();
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo "<script>
                window.location='login';
              </script>";
        break;
			
    case '/profile':
        if(!isset($_SESSION['user_id'])) {
            echo "<script>window.location='login';</script>";
        } else {
            $res = $this->select_where('seller', array('seller_id' => $_SESSION['user_id']));
            $user = $res->fetch_object();
            include_once('profile.php');
        }
        break;

    case '/edit_profile':
        if(!isset($_SESSION['user_id'])) {
            echo "<script>window.location='login';</script>";
            exit;
        }
        if(isset($_POST['update_profile'])) {
            $name = $_POST['full_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $arr = array(
                "full_name" => $name,
                "phone" => $phone,
                "email" => $email
            );
            if(!empty($password)) {
                $arr["password"] = md5($password);
            }
            
            // For photo
            if(isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])) {
                $photo = time() . "_" . $_FILES['photo']['name'];
                $tmp = $_FILES['photo']['tmp_name'];
                move_uploaded_file($tmp, "images/".$photo);
                $arr["photo"] = $photo;
            }
            
            $where = array("seller_id" => $_SESSION['user_id']);
            $run = $this->update_where('seller', $arr, $where);
            
            if($run) {
                $_SESSION['user_name'] = $name;
                $_SESSION['user'] = $email;
                echo "<script>alert('Profile Updated Successfully'); window.location='home';</script>";
            } else {
                echo "<script>alert('Failed to update profile'); window.location='profile';</script>";
            }
        }
        break;

    case '/orders':
        if(!isset($_SESSION['user_id'])) {
            echo "<script>window.location='login';</script>";
        } else {
            if(isset($_POST['submit_review'])) {
                $order_id = $_POST['order_id'];
                $rating = $_POST['rating'];
                $message = $_POST['message'];
                
                $arr = array(
                    "order_id" => $order_id,
                    "seller_id" => $_SESSION['user_id'],
                    "rating" => $rating,
                    "comment" => $message
                );
                $run = $this->insert('feedback', $arr);
                if($run) {
                    echo "<script>alert('Review Submitted Successfully!'); window.location='orders';</script>";
                    exit;
                } else {
                    echo "<script>alert('Failed to submit review');</script>";
                }
            }
            include_once('my-orders.php');
        }
        break;
        
    case '/signup':
            if(isset($_SESSION['user'])) {
                echo "<script>window.location='home';</script>";
                exit;
            }
             
            if(isset($_REQUEST['create_account']))
                    {
                        $full_name=$_REQUEST['full_name'];
                        $phone=$_REQUEST['phone'];
                        $email=$_REQUEST['email'];
                        $password=md5($_REQUEST['password']);
					

                        

                        $data=array("full_name"=>$full_name,"phone"=>$phone,"email"=>$email,"password"=>$password);
                        $res=$this->insert('seller',$data);    
                        echo "<script>alert('Signup Success'); window.location='login';</script>";
                    }



			include_once('signup.php');
			break;
					
			
			
			
			
			
			
			
			
			
			
			
			case '/Truck Transport':
			include_once('services.php');
			break;
			
			case '/Express Delivery':
			include_once('services.php');
			break;
			
			case '/Warehousing':
			include_once('services.php');
			break;
			
			case '/Bulk Cargo':
			include_once('services.php');
			break;
			
			case '/Local Dispatcht':
			include_once('services.php');
			break;
		



		
			case '/About Us':
			include_once('about.php');
			break;
			
			
			case '/Pricing Plans':
			include_once('pricing.php');
			break;
			
			case '/Track Parcel':
			include_once('tracking.php');
			break;
			
			case '/FAQ ':
			include_once('faq.php');
			break;
			
			case '/Contact Us':
			include_once('contact.php');
			break;
			
            // --- Employee Panel Clean URL Routes ---
            case '/employee/login':
                if(isset($_SESSION['employee'])) {
                    echo "<script>window.location='/employee/dashboard';</script>";
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
                            echo "<script>window.location='/employee/dashboard';</script>";
                            exit;
                        }
                    } else {
                        echo "<script>
                            alert('Invalid Email or Password');
                        </script>";
                    }
                }
                include_once('Shipzo_employee/login.php');
                break;

            case '/employee/dashboard':
                if(!isset($_SESSION['employee'])) {
                    echo "<script>window.location='/employee/login';</script>";
                    exit;
                }
                include_once('Shipzo_employee/dashboard.php');
                break;

            case '/employee/orders':
            case '/employee/assign-transporter':
            case '/employee/manage-orders':
                if(!isset($_SESSION['employee'])) {
                    echo "<script>window.location='/employee/login';</script>";
                    exit;
                }
                
                if(isset($_POST['assign_transporter'])) {
                    $order_id = $_POST['order_id'];
                    $transporter_id = $_POST['transporter_id'];
                    $res = $this->update_where('orders', array('transporter_id' => $transporter_id), array('order_id' => $order_id));
                    if($res) {
                        echo "<script>alert('Transporter Assigned Successfully'); window.location='/employee/orders';</script>";
                        exit;
                    } else {
                        echo "<script>alert('Failed to Assign Transporter'); window.location='/employee/orders';</script>";
                        exit;
                    }
                }

                $orders_arr = $this->select('orders');
                $transporter_arr = $this->select('transporter');
                
                include_once('Shipzo_employee/manage-orders.php');
                break;

            case '/employee/profile':
                if(!isset($_SESSION['employee'])) { echo "<script>window.location='/employee/login';</script>"; exit; }
                include_once('Shipzo_employee/profile.php');
                break;

            case '/employee/new-orders':
                if(!isset($_SESSION['employee'])) { echo "<script>window.location='/employee/login';</script>"; exit; }
                include_once('Shipzo_employee/new-orders.php');
                break;

            case '/employee/verify-orders':
                if(!isset($_SESSION['employee'])) { echo "<script>window.location='/employee/login';</script>"; exit; }
                include_once('Shipzo_employee/verify-orders.php');
                break;

            case '/employee/update-status':
                if(!isset($_SESSION['employee'])) { echo "<script>window.location='/employee/login';</script>"; exit; }
                include_once('Shipzo_employee/update-status.php');
                break;

            case '/employee/customer-queries':
                if(!isset($_SESSION['employee'])) { echo "<script>window.location='/employee/login';</script>"; exit; }
                include_once('Shipzo_employee/customer-queries.php');
                break;

            case '/employee/reports':
                if(!isset($_SESSION['employee'])) { echo "<script>window.location='/employee/login';</script>"; exit; }
                include_once('Shipzo_employee/reports.php');
                break;

            case '/employee/logout':
                unset($_SESSION['employee']);
                session_destroy();
                echo "<script>window.location='/employee/login';</script>";
                break;

            // --- Transporter Panel Clean URL Routes ---
            case '/transporter/login':
                if(isset($_SESSION['transporter_id'])) {
                    echo "<script>window.location='/transporter/dashboard';</script>";
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
                            $_SESSION['transporter_id'] = $t->transporter_id;
                            echo "<script>window.location='/transporter/dashboard';</script>";
                            exit;
                        }
                    } else {
                        echo "<script>
                            alert('Invalid credentials');
                        </script>";
                    }
                }
                include_once('Shipzo_transporter/login.php');
                break;

            case '/transporter/dashboard':
                if(!isset($_SESSION['transporter_id'])) { echo "<script>window.location='/transporter/login';</script>"; exit; }
                include_once('Shipzo_transporter/dashboard.php');
                break;

            case '/transporter/assigned-orders':
                if(!isset($_SESSION['transporter_id'])) { echo "<script>window.location='/transporter/login';</script>"; exit; }
                $orders_arr = array();
                $res = $this->select_where('orders', array('transporter_id' => $_SESSION['transporter_id']));
                if($res) {
                    while($fetch = $res->fetch_object()) {
                        $orders_arr[] = $fetch;
                    }
                }
                include_once('Shipzo_transporter/assigned-orders.php');
                break;

            case '/transporter/profile':
                if(!isset($_SESSION['transporter_id'])) { echo "<script>window.location='/transporter/login';</script>"; exit; }
                include_once('Shipzo_transporter/profile.php');
                break;

            case '/transporter/logout':
                unset($_SESSION['transporter_id']);
                session_destroy();
                echo "<script>window.location='/transporter/login';</script>";
                break;
                
            case '/transporter/available-orders':
                if(!isset($_SESSION['transporter_id'])) { echo "<script>window.location='/transporter/login';</script>"; exit; }
                include_once('Shipzo_transporter/available-orders.php');
                break;

            case '/transporter/accept-order':
                if(!isset($_SESSION['transporter_id'])) { echo "<script>window.location='/transporter/login';</script>"; exit; }
                include_once('Shipzo_transporter/accept-order.php');
                break;

            case '/transporter/update-status':
                if(!isset($_SESSION['transporter_id'])) { echo "<script>window.location='/transporter/login';</script>"; exit; }
                include_once('Shipzo_transporter/update-status.php');
                break;

            case '/transporter/place-bid':
                if(!isset($_SESSION['transporter_id'])) { echo "<script>window.location='/transporter/login';</script>"; exit; }
                include_once('Shipzo_transporter/place-bid.php');
                break;

            case '/transporter/payments':
                if(!isset($_SESSION['transporter_id'])) { echo "<script>window.location='/transporter/login';</script>"; exit; }
                include_once('Shipzo_transporter/payments.php');
                break;
		}
		
		
	}
	
}
$obj=new control;
?>