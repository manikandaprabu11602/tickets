<!DOCTYPE html>
<html>

<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2> Dear {{ $mail['name'] }},</h2>
           
            <h2> Hi Now your application staus has been changed to : {{ $mail['status'] }}.click the below link to know more.</h2>  

            <p>{{ $mail['pageLinkUrl'] }}</p>
            <p>Thank you for your time. I hope to hear from you soon.<p>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JavaScript (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
