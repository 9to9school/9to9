@if($paymentSessionId)

<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>   
  </head>
  <body>
      
  </body>
  <script>
      const cashfree = Cashfree({
        mode: "<?php echo $payMode?>" //or production,
      });
      document.addEventListener("DOMContentLoaded", function() {
        cashfree.checkout({
          paymentSessionId: "<?php echo $paymentSessionId?>"
        });
      });
  </script>
</html>
@endif
 
 
 

 