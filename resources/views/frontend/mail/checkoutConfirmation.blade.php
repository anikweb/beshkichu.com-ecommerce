<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Beshkichu</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Hello, <span class="text-info">{{ $request['name'] }},</span></h1>
                        <h3>Your Order placed successfully.</h3>
                        <p>Total Amount of order : ৳{{ $request['total_price'] }}</p>
                        <p>Invoice No : ৳{{ $request['Invoice_no'] }}</p>
                        <a href="{{ route('my-account.orders') }}" class="btn btn-info d-inline-block text-center   "> Click here for Details </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  </body>
</html>
