<?php
    // include "../dashboard/dashboard.php";
    include "../model/database.php";
    include "../model/notification_db.php";
    require_once 'startSession.php';
$error = '';
$user_id = $_SESSION['user_id'];
$event_id = $_SESSION['event_id'];
$u = new Notification();
$users = $u->getUsersByEventID($event_id);
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="../CSS/notifications.css">

<body>
    <section id="notification" class="mt-5 p-4 mb-5">
        <h2 class="col-sm-6 mb-4 heading-style">Alert Other Guests</h2>

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
                            <?php
                                    foreach($users as $user)
                                    {
                                    echo '
                                    <tr>';
                                    if($user->is_host){
                                        echo '<td style="color:green;">'.$user->first_name.' (host)</td>';
                                    }else{
                                        echo '<td>'.$user->first_name.'</td>';
                                    }
                                    echo '<td>'.$user->email.'</td>
                                    <td>
                                        <input type="checkbox" name="single_email" class="single_email" data-event="'.$event_id.'" data-email="'.$user->email.'" data-name="'.$user->first_name.'" />
                                    </td>
                                    <td><button type="button" name="send_email" class="btn btn-primary btn-xs email_button" id="'.$user->id.'" data-event="'.$event_id.'" data-email="'.$user->email.'" data-name="'.$user->first_name.'" data-action="single">Send</button></td>
                                    </tr>
                                    ';
                                    }
                                    ?>
                        </table>
                        <div class="form-group float-right">
                            <input type="button" id="select-all" class="btn1" name="all_guests"
                                value="Select All Guests">
                            <input type="button" id="deselect-all" class="btn btn3" name="deselect_guests"
                                value="Deselect Guests">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group float-right">
                <button data-action="bulk" data-event='<?=$event_id?>' type="button" class="btn btn2 mb-2 email_button"
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