// check if browser supports service workers
if (navigator.serviceWorker) {
    // then register service worker
    navigator.serviceWorker.register('/s-worker.js').then((registration) => {
        console.log('[Service Wroker is being Registered] ', registration);
    });
}

// Ajax Setup
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/**
 * Login form
 */

$(".login-btn").click((e) => {
    e.preventDefault();
    $('.login-btn').html('Logging In...');
    var formData = $(".login-form").serialize();

    $.ajax({
        url: '/account/login',
        method: 'POST',
        data: formData,
        success: (response) => {
            if (response.sus == 1) {
                setTimeout(() => {
                    swal('Successful', 'Login Successful', 'success');
                    $(this).prop('disabled', false);
                    setTimeout(() => {
                        window.location.href = '/home';
                    }, 2000);
                })
            } else {
                swal('Ooops!', '' + response.err + '', 'error');
                $('.login-btn').prop('disabled', false);
                $('.login-btn').html('Login');
            }
        },
        error: (err) => {
            $('.login-btn').prop('disabled', false);
            $('.login-btn').html('Login');
        }
    })

})


// Registration form
$(".registerBtn").click((e) => {
    e.preventDefault();
    $('.registerBtn').prop('disabled', true);
    $('.registerBtn').html('Creating Account...');
    var formdata = $(".form-signin").serialize();

    $.ajax({
        url: "/account/register",
        method: "POST",
        data: formdata,
        success: (response) => {
            if (response.sus == 1) {
                swal('Successful',
                    'Account Registration Successful, We\'ve sent you an email for confirmation to activate your account',
                    'success');
                $(this).prop('disabled', false);
            } else {
                swal('Ooops!', '' + response.err + '', 'error');
                $('.registerBtn').prop('disabled', false);
                $('.registerBtn').html('Sign Up');
            }
        },
        error: (err) => {
            console.log(err);
            $('.registerBtn').prop('disabled', false);
            $('.registerBtn').html('Sign Up');
        }
    })

})