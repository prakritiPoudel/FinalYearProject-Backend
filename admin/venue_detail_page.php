<?php
include('includes/header.php');
$id = $_GET['id'];
$venue = getById("venues", $id);
$owner = $venue['owner_id'];
$profile = getById("profile", $owner);
?>

<link rel="stylesheet" href="includes/custom.css">
<style>
    main {
        background-color: white;
        padding: 5rem;
        border-radius: 16px;
    }

    .img-user {
        display: flex;
        flex-flow: column;
    }

    .product-image {
        height: 40vh;
        min-width: 40vh;
        border-radius: 16px;
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .top-container {
        display: flex;
        align-items: start;
    }

    .details {
        padding: 0rem 4rem;
    }

    .product-name {
        font-size: 3rem;
    }

    .box {
        background-color: white;

        margin-bottom: 2rem;
        border-radius: 16px;
        display: flex;
        flex-flow: column;
        justify-content: start;
        gap: 0.4rem;
        min-width: 32%;
        min-height: 20vh;
    }

    .box h1 {
        font-size: 3rem;
        font-weight: 700;
        opacity: .7;
    }

    .box .item {
        font-size: 2rem;
    }
</style>
<div class="top-bar">
    <div class="title-data">
        <h1>Venue Detail :
            <?php echo ($venue['name']) ?>
        </h1>

    </div>

    <span class="btn-grp">
        <a class="btn btn-primary" href="verify_venue.php?id=<?php echo ($venue['id']) ?>&type=verify"
            type="button">Make
            Verified</a>
        <a class="btn btn-primary" href="verify_venue.php?id=<?php echo ($venue['id']) ?>&type=unverify"
            type="button">Make Unverified</a>
    </span>

</div>
<main>
    <span class='top-container'>
        <div class="img-user">
            <img src="../media/<?php echo ($venue['banner_image']) ?>" alt="" class="product-image">
            <span id="button-section">
            </span>
            <div class="box user">
                <h1>Owner Detail</h1>
                <p class="item">
                    Full Name :
                    <?php echo ($profile['full_name']) ?>
                </p>
                <p class="item">
                    Email :
                    <?php echo ($profile['email']) ?>
                </p>
                <p class="item">
                    Phone Number :
                    <?php echo ($profile['phone_no']) ?>
                </p>
                <p class="item">
                    Gender :
                    <?php echo ($profile['gender']) ?>
                </p>
                <p class="item">
                    Venue email :
                    <?php echo ($venue['email']) ?>
                </p>
                <p class="item">
                    venue Phone :
                    <?php echo ($venue['phone_number']) ?>
                </p>
            </div>
        </div>
        <span class="details">
            <p class="product-name">
                <?php echo ($venue['name']) ?>
            </p>
            <p class="product-name">
                Location :
                <?php echo ($venue['location']) ?>
            </p>
            <p class="product-name">
                Operating Hours :
                <?php echo ($venue['opening_time'] . " - " . $venue['closing_time']) ?>
            </p>
            <p class="product-name">
                Status :
                <?php echo ($venue['verified'] == 0 ? "Not Verified" : "Verified") ?>
            </p>
            <h3>Rules</h3>
            <p class="">
                <?php echo ($venue['rules']) ?>
            </p>
            <h1>Booking Slots</h1>
            <table id="sorted" class="table table-striped">
                <thead>
                    <tr>
                        <th>Begin time</th>
                        <th>End time</th>
                        <th>Capacity</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Message</th>
                    </tr>
                </thead>

                <?php
                $booking_slots = getAll("booking_slots WHERE venue_id=$id");
                if ($booking_slots)
                    foreach ($booking_slots as $booking_slotss):
                        ?>
                        <tr>
                            <td>
                                <?php echo $booking_slotss['begin_time'] ?>
                            </td>
                            <td>
                                <?php echo $booking_slotss['end_time'] ?>
                            </td>
                            <td>
                                <?php echo $booking_slotss['capacity'] ?>
                            </td>
                            <td>
                                <?php echo $booking_slotss['price'] ?>
                            </td>
                            <td>
                                <?php echo $booking_slotss['discount'] ?>
                            </td>
                            <td>
                                <?php echo $booking_slotss['message'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>


            <h1>Transactions for this venue</h1>

            <table id="sorted" class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Amount</th>
                        <th>Transaction id</th>
                        <th>User id</th>
                        <th>Date Time</th>
                    </tr>
                </thead>

                <?php
                $payments = getAll("payments WHERE venue_id=$id");
                if ($payments) foreach ($payments as $paymentss):
                        ?>
                        <tr>
                            <td>
                                <?php echo $paymentss['id'] ?>
                            </td>
                            <td>
                                <?php echo $paymentss['amount'] ?>
                            </td>
                            <td>
                                <?php echo $paymentss['transaction_id'] ?>
                            </td>
                            <td>
                                <?php
                                $user_id = $paymentss['user_id'];
                                $query = mysqli_query($link, "SELECT * FROM profile WHERE id = $user_id");
                                $row = mysqli_fetch_array($query);

                                echo $row['email'];
                                ?>
                            </td>
                            <td>
                                <?php echo $paymentss['created_at'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </span>
    </span>
</main>