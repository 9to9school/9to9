
<!DOCTYPE html>
<html>
<head>
<title>How to Integrate Cashfree payment gateway in PHP | tutorialswebsite.com</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-repeat: no-repeat;">
<div class="container">
<div class="row">
<div class="col-xs-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Charge Rs.10 INR  </h4>
                    </div>
                    <div class="panel-body">
  <form  action="{{route('create-order')}}" method="post">
    @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="cust_name" id="cust_name" placeholder="Enter name" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="">
                        </div>
                        
                  <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" class="form-control" name="mobile" id="mobile" min-length="10" max-length="10" placeholder="Enter Mobile Number" required="" autofocus="">
                        </div>
                        
                         <div class="form-group">
                            <label>Payment Amount</label>
                            <input type="text" class="form-control" name="amount" id="amount" value="11" placeholder="Enter Amount" required="" autofocus="">
                        </div>
						<input type="submit" value="submit">
	<!-- submit button -->

                       </form>
                    </div>
                </div>
            </div>
</div>
</div>
</body>
</html>
