function signup_validation(arg)
{
    var full_name = arg.full_name.value;
    var phone = arg.phone.value;
    var email = arg.email.value;
    var password = arg.password.value;

    if(full_name == "")
    {
        document.getElementById("msg").innerHTML = "Full name field is required";
        arg.full_name.focus();
        return false;
    }

    if(phone == "")
    {
        document.getElementById("msg").innerHTML = "Phone number is required";
        arg.phone.focus();
        return false;
    }
    if(!arg.phone.value.match(/^[0-9]{10}$/))
    {
        document.getElementById("msg").innerHTML = "Phone number must be exactly 10 digits";
        arg.phone.focus();
        return false;
    }

    if(email == "")
    {
        document.getElementById("msg").innerHTML = "Email field is required";
        arg.email.focus();
        return false;
    }
    if(!arg.email.value.match(/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,3})+$/))
    {
        document.getElementById("msg").innerHTML = "Please enter a valid email address";
        arg.email.focus();
        return false;
    }

    if(password == "")
    {
        document.getElementById("msg").innerHTML = "Password field is required";
        arg.password.focus();
        return false;
    }
    if(arg.password.value.length < 6)
    {
        document.getElementById("msg").innerHTML = "Password must be at least 6 characters long";
        arg.password.focus();
        return false;
    }

    return true;
}

function login_validation(arg)
{
    var email = arg.email.value;
    var password = arg.password.value;

    if(email == "")
    {
        document.getElementById("msg").innerHTML = "Email field is required";
        arg.email.focus();
        return false;
    }
    if(!arg.email.value.match(/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,3})+$/))
    {
        document.getElementById("msg").innerHTML = "Please enter a valid email address";
        arg.email.focus();
        return false;
    }

    if(password == "")
    {
        document.getElementById("msg").innerHTML = "Password field is required";
        arg.password.focus();
        return false;
    }
    if(arg.password.value.length < 6)
    {
        document.getElementById("msg").innerHTML = "Password must be at least 6 characters long";
        arg.password.focus();
        return false;
    }

    return true;
}

function contact_validation(arg)
{
    if(typeof is_logged_in === "undefined" || !is_logged_in)
    {
        alert("Please Login First");
        window.location = "login";
        return false;
    }

    var name = arg.name.value;
    var email = arg.email.value;
    var subject = arg.subject.value;
    var message = arg.message.value;

    if(name == "")
    {
        document.getElementById("msg").innerHTML = "Name field is required";
        arg.name.focus();
        return false;
    }

    if(email == "")
    {
        document.getElementById("msg").innerHTML = "Email field is required";
        arg.email.focus();
        return false;
    }
    if(!arg.email.value.match(/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,3})+$/))
    {
        document.getElementById("msg").innerHTML = "Please enter a valid email address";
        arg.email.focus();
        return false;
    }

    if(subject == "")
    {
        document.getElementById("msg").innerHTML = "Subject field is required";
        arg.subject.focus();
        return false;
    }

    if(message == "")
    {
        document.getElementById("msg").innerHTML = "Message field is required";
        arg.message.focus();
        return false;
    }

    return true;
}

function booking_validation(arg)
{
    var customer_type = arg.customer_type.value;
    var customer_name = arg.customer_name.value;
    var contact_number = arg.contact_number.value;
    var email = arg.email.value;
    var pickup_address = arg.pickup_address.value;
    var delivery_address = arg.delivery_address.value;
    var pickup_date = arg.pickup_date.value;

    if(customer_type == "")
    {
        document.getElementById("msg").innerHTML = "Please select a Customer Type";
        arg.customer_type.focus();
        return false;
    }

    if(customer_name == "")
    {
        document.getElementById("msg").innerHTML = "Customer Name field is required";
        arg.customer_name.focus();
        return false;
    }

    if(contact_number == "")
    {
        document.getElementById("msg").innerHTML = "Contact Number field is required";
        arg.contact_number.focus();
        return false;
    }
    if(!arg.contact_number.value.match(/^[0-9]{10}$/))
    {
        document.getElementById("msg").innerHTML = "Contact number must be exactly 10 digits";
        arg.contact_number.focus();
        return false;
    }

    if(email != "")
    {
        if(!arg.email.value.match(/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,3})+$/))
        {
            document.getElementById("msg").innerHTML = "Please enter a valid email address";
            arg.email.focus();
            return false;
        }
    }

    if(pickup_address == "")
    {
        document.getElementById("msg").innerHTML = "Pickup Address field is required";
        arg.pickup_address.focus();
        return false;
    }

    if(delivery_address == "")
    {
        document.getElementById("msg").innerHTML = "Delivery Address field is required";
        arg.delivery_address.focus();
        return false;
    }

    if(pickup_date == "")
    {
        document.getElementById("msg").innerHTML = "Pickup Date field is required";
        arg.pickup_date.focus();
        return false;
    }

    return true;
}

function profile_validation(arg)
{
    var full_name = arg.full_name.value;
    var phone = arg.phone.value;
    var email = arg.email.value;
    var password = arg.password.value;

    if(full_name == "")
    {
        document.getElementById("msg").innerHTML = "Name field is required";
        arg.full_name.focus();
        return false;
    }

    if(phone == "")
    {
        document.getElementById("msg").innerHTML = "Phone number is required";
        arg.phone.focus();
        return false;
    }
    if(!arg.phone.value.match(/^[0-9]{10}$/))
    {
        document.getElementById("msg").innerHTML = "Phone number must be exactly 10 digits";
        arg.phone.focus();
        return false;
    }

    if(email == "")
    {
        document.getElementById("msg").innerHTML = "Email field is required";
        arg.email.focus();
        return false;
    }
    if(!arg.email.value.match(/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,3})+$/))
    {
        document.getElementById("msg").innerHTML = "Please enter a valid email address";
        arg.email.focus();
        return false;
    }

    if(password != "")
    {
        if(arg.password.value.length < 6)
        {
            document.getElementById("msg").innerHTML = "Password must be at least 6 characters long";
            arg.password.focus();
            return false;
        }
    }

    return true;
}
