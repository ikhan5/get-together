<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: Gets the header from the root of the
 *              document, as well as its associating
 *              style file.             
 * Date Created: April 11th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Added comments.
 */
require_once 'startSession.php';
require_once '../model/database.php';
require_once '../model/payment_db.php';
require_once '../model/pools_db.php';
include "../header.php";
?>

<link rel="stylesheet" href="../CSS/money_pools.css" />
<link rel="stylesheet" href="../Content/style.css">
<link rel="stylesheet" href="../CSS/payments.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">