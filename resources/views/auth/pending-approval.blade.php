<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Pending Approval</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets2/css/bootstrap.css">
    <link rel="stylesheet" href="assets2/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets2/css/app.css">
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a  href="{{ url('/') }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="">
                <img src="{{ asset('assets/img/alumnilogo.png') }}" style="width: 70px; height: auto;">
            </a>
        </div>
    </nav>


    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2 class="card-title">Pending Approval</h2>
            </div>
            <div class="card-body">
                    <p>Your registration is pending approval by an administrator.</p>
                    <p>We will notify you once your account has been approved.</p>
                    <p>In the meantime, if you have any questions or need further assistance, please contact our support team at asolar@ssct.edu.ph.</p>
                    <p>Thank you for your patience!</p>
                </div>
        </div>
    </div>


</body>

</html>


