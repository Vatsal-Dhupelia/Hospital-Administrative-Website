<?php
 $apiKey = "rzp_test_rjTxKamMJlYpu5"; 
?>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<form action="../php/thankyou.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>"
    data-amount="30000"
    data-currency="INR"
    data-id="<?php echo 'OID'.rand(10,100).'END';?>"
    data-buttontext="Pay Now"
    data-name="Healthcare Hospitals"
    data-description="Consultation"
    data-prefill.name="<?php echo $_POST['name'];?>"
    data-prefill.email="<?php echo $_POST['email'];?>"
    data-prefill.contact="<?php echo $_POST['mobile'];?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>

