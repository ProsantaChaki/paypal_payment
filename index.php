
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Prosanta Chaki</title>
    <meta charset="utf-8">
    <meta property="og:image" id="mymetatag" content="">
    <link rel='shortcut icon' type='image/x-icon' href='/logo/logo.png' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/static_text.js"></script>
    <style>

    </style>

</head>
<body>
<div style="backgroud-color: gray;"
    <div class="jumbotron text-center ">
        <h2>Welcome to Paypal Payment System</h2>
        <p>Please fill the all information blew to make your payment</p>
    </div>
</div>
    <div class="container">
        <div style="max-width: 800px;  text-align: center; margin: auto;">
            <form class="form-horizontal" id="paymentInfo" name="paymentInfo">
                <div class="form-group " >
                    <label class="control-label col-sm-2" for="first_name">First Name<span style="color:red">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="first_name" placeholder="First Name" name="first_name">
                    </div>
                </div>
                <div class="form-group " >
                    <label class="control-label col-sm-2" for="last_name">Last Name<span style="color:red">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="last_name" placeholder="Last Name" name="last_name">
                    </div>
                </div>
                <div class="form-group " >
                    <label class="control-label col-sm-2" for="name">Item Name<span style="color:red">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="item_name" placeholder="Item Name" name="item_name">
                    </div>
                </div>
                <div class="form-group " >
                    <label class="control-label col-sm-2" for="name">Item Number<span style="color:red">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="item_number" placeholder="Item Number" name="item_number">
                    </div>
                </div>
                <div class="form-group " >
                    <label class="control-label col-sm-2" for="name">Amount<span style="color:red">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="number" required class="form-control" id="amount_total" placeholder="Amount" name="amount_total">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" required class="form-control" id="payer_email" placeholder="Enter Contact email" name="payer_email">
                    </div>
                </div>

                <input type="hidden" name="cmd" value="_xclick" />
                <input type="hidden" name="no_note" value="1" />
                <input type="hidden" name="lc" value="UK" />
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" id="makePayment"  class="btn btn-default btn-primary">Make Payment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class=" page-footer font-small blue pt-4" style="height: 100px; margin-top: 10px; background-color: #e9ecef">
        <div class="col-md-2 col-sm-2"></div>
        <div class="col-md-8 col-sm-8" style="text-align: right;">
        </div>
        <div class="col-md-2 col-sm-2"></div>
    </div>

</body>
</html>




<script>

    $('#makePayment').click(function () {
        event.preventDefault()

        if($('#first_name').val() !== null && $('#item_number').val() !== null && $('#amount_total').val() !== null && $('#payer_email').val() !== null ){
            //alert(project_url)
            var formData = new FormData($('#paymentInfo')[0]);
            formData.append('return' , project_url+'success.php')
            formData.append('cancel_return' , project_url)
            formData.append('notify_url' , project_url+'controllers/success.php')

            $.ajax({
                url: project_url + "controllers/payments.php",
                type:'POST',
                data:formData,
                async:false,
                cache:false,
                contentType:false,processData:false,
                success: function (data) {
                    //alert(data)
                    url ='https://'+data.split('https://')[1]
                    window.location.href = url;
                }
            })
        }else alert('Please Fill All The Information')
    })


</script>

