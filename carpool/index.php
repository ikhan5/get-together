<?php include('../header.php') ?>

<main class="container-fluid d-flex flex-row p-0" id="carpool-chat-container">
        <div id="chats" class="col-sm-3 p-0">
            <ul class="list-unstyled list-group components">
                <li class="list-group-item" id="chats-header">
                    <h4>Chats</h4>
                </li>
                <li class=" list-group-item active">
                    <a href="#">General</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Imzan Khan</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Alex Leroux</a>
                </li>
            </ul>
        </div>
        <div class="chat col-sm-6 p-0 d-flex flex-column" id="chat-container">
            <div id="chat-header">
                <h4>General</h4>
            </div>
            <div id="chat-content" class="d-flex flex-column justify-content-end">
                <div id="chat-display">

                </div>
                <div id="chat-input">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="2">
                        <div class="form-group d-flex flex-row mb-0">
                            <input type="text"
                            class="form-control" name="chat-input" id="chat-input-box" placeholder="Write your message">
                            <button type="submit" class="btn btn-light ml-1 mr-0">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="member-list col-sm-3 p-0" id="member-list">
            <ul class="list-unstyled list-group components">
                <li class="list-group-item" id="member-list-header">
                    <h4>Carpool Members</h4>
                </li>
                <li class="list-group-item">
                    <a href="#">Alex Leroux</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Bibek Shrestha</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Imzan Khan</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Jenifer Wong</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Maria Koronleko</a>
                </li>
            </ul>
        </div>
</main>

<?php include('../footer.php') ?>