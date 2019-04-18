<?php
/* Author: Imzan Khan
 * Feature: Notifications
 * Description: Allows the host to send custom notifications
 *              to their guests via Email. Hosts can either 
 *              send a single email to one specific guest or
 *              send a bulk email to multiple guests. This page
 *              is only accessible to Event Hosts.              
 * Date Created: April 1st, 2019
 * Last Modified: April 11th, 2019
 * Recent Changes: Refactored Code, moved PHP code to separate file
 */
include "header.php";
?>

<body class="notifications_body">
    <section id="notification" class="mt-5 p-4 mb-5">
        <h2 class="col-sm-6 mb-4 heading-style">Notify Your Guests</h2>
        <p id="successMsg" style="color:green"></p>
        <p id="errorMsg" style="color:red;"><?= $error ?></p>
        <form action="" method=" POST" class="container-fluid">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="notification__subject">Subject</label>
                        <input type="text" name="subject" id="notification__subject" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="notification__message">Message</label>
                        <textarea class="form-control" id="notification__message" rows="6" style="resize: none;"
                            required></textarea>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="notifications__guests">Select which guests to notify:</label>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Select</th>
                                <th>Send</th>
                            </tr>
                            <?php include "displayEventGuests.php" ?>
                        </table>
                        <div class="form-group float-right">
                            <input type="button" id="all_guests" class="btn1" name="all_guests"
                                value="Select All Guests">
                            <input type="button" id="deselect_all" class="btn btn3" name="deselect_guests"
                                value="Deselect Guests">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group float-right ">
                <button data-action="bulk" data-event='<?=$event_id?>' type="button" class="btn btn2 email_button"
                    id="select_all">
                    Notify Selected Users</button>
            </div>
        </form>
    </section>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="../scripts/notifications.js"></script>