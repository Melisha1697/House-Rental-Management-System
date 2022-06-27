<?php
    if(!isset($_COOKIE['username'])){
        header("location:./login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="./assets/js/tableExport.min.js"></script>

    <script src="./assets/js/export.js"></script>
    <link rel="stylesheet" href="./assets/css/user.css">

    <script src="./admin/assets/js/faq.js" defer>

    </script>

</head>

<body>
    <?php //echo $_SESSION["username"]?>
    <div class="container">
        <?php include './menu.php' ?>
        <!------------------End of Aside----------------------->
        <main>
            <h1>FAQ</h1>
            <div class="tenants">
                <h2> Tenants / Renters</h2>
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        What’s the first step I should take?
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <p>Unless you plan on paying with cash, your first step will be to get pre-approved for a
                                loan. Once you get pre-approved, you will know with more accuracy the price of the home
                                you can afford.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        What is pre-qualifying versus pre-approval?
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <p> In pre-qualification, you are given an estimate of what you may be able to borrow. This
                                is a quick way to know what price range you should be looking in. Pre-approval means a
                                financial institution has agreed to work with you and has taken a thorough look through
                                your finances.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        Why should I use a realtor to help me buy a home?
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <p> Our AAFNO-PAAN will handle everything you need from start to finish. That
                                includes paperwork, negotiations, inspections and so much more.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        How much money do I need for a down payment?
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <p> All loan options are different, but the average down payment is now 3% to 5%. If you or
                                the property you’re purchasing qualifies for a VA loan, you aren’t required to
                                put any money down.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        Can I buy a home and sell my current one at the same time?
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <p> Yes, you definitely can. We would highly recommend working with a AAFNO-PAAN to
                                help make the transition between selling and buying as smooth as possible.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        How many homes should I see before making an offer?
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <p> You should see as many as you need to ensure you find the perfect home. On average, home
                                buyers will look at hundreds of homes online but will see 10 homes in person before
                                writing an offer. If you’re looking for a way to narrow down your search, sign up for a
                                personal shopper report.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        When can I back out if I change my mind?
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <p> You can always back out of a deal, but you may have to forfeit the earnest money you put
                                down with the offer. Earnest money is typically around 1%-2% of the home’s price. Learn
                                more about writing an offer here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>