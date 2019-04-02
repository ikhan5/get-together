<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="../CSS/notifications.css">

<body>
    <section id="notification" class="mt-5 p-4 mb-5">
        <h2 class="col-sm-6 mb-4 heading-style">Alert Your Guests</h2>
        <form action="" method="POST" class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="notification__title">Title</label>
                        <input type="text" name="title" id="notification__title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="notification__message">Message</label>
                        <textarea class="form-control" id="notification__message" rows="6" style="resize: none;"
                            required></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="notifications__guests">Guests to Notify (hold Ctrl/CMD to select multiple
                            guests):</label>
                        <select name="guests" id="notifications__guests" class="form-control form-control-md mt-2"
                            multiple size="11" required>
                            <option value="Guest1">Guest 1</option>
                            <option value="Guest2">Guest 2</option>
                            <option value="Guest3">Guest 3</option>
                        </select>
                    </div>
                    <div class="form-group float-right">
                        <input type="button" id="select-all" class="btn" name="all_guests" value="Select All Guests">
                        <input type="button" id="deselect-all" class="btn btn3" name="deselect_guests"
                            value="Deselect Guests">
                    </div>
                </div>
            </div>
            <div class="form-group float-right">
                <input type="submit" class="btn btn2 mb-2" value="Notify!" id="select-all">
            </div>
        </form>
    </section>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="../scripts/notifications.js"></script>