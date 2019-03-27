<?php
session_start();

include "header.php";

?>
<main>
        <div id="main-container">
            <section id="canvas-main">
                <h1>Jen's section with slogan and button to create event</h1>
                <!-- Jen's Section  -->
            </section>
            <canvas id="canvas"></canvas>
        </div>
    <div>
        <section id="about-us-section-container">
            <h2 class="heading-style">Who we are</h2>
            <div class="para-container">
                <p>Are you hosting an event soon but are overwhelmed by all the planning? Luckily, <em><strong>Get Together</strong></em> is here to assist you by creating your own interactive party website.</p>
                <p>Through a personalized dashboard, you can customize your party, keep track of the guests' list and explore our other helpful features. <em><strong>Get Together</strong></em> makes it easy for you and your guests to navigate even the busiest of occasions smoothly.</p>
            </div>
        </section>
    </div>
    <div>
        <section id="whatwedo-section-container">
            <h2 class="heading-style second">What we do</h2>
            <div id="wwd-container">
                <p><em><strong>Get Together</strong></em> was first established in 2019 and now provides a wide range of party-planning features.</p>
                <p id="wwd-middle">Ditch the paper invitations. Our software lets you send personalized e-invitations and track RSVPs all in one place.</p>
                <p>Leave the clipboard at home. Our app lets you keep track of your to-lists, create interactive polls, choose your music playlist, drink, and food selection to make your event a success.</p>
            </div>
            <div id="misc-container">
                <h3>We let guests in on the fun</h3>
                <p>What’s more? <em><strong>Get Together</strong></em> believes that party planning shouldn’t solely rely on the host. Rather, the planning should be interactive and we let your guests in on the party planning excitement. Ask your guests useful poll questions, let them organize their commute, explore our music, food and drink selection and watch as their anticipation grows for your big event!</p>
            </div>
        </section>
    </div>
    <div>
        <section>
            <!--Maria's Section -->
        </section>
    </div>
    <div>
        <section id="contact-us">
        <h2 class="text-center heading-style second">Contact Us</h2>
        <p class="text-center">If you have any questions, please do not hesitate to contact us.</p>
        <button id="contact" class="btn btn-primary" data-toggle="collapse" type="button" aria-expanded="false" aria-controls="contactUs" data-target="#contactUs">Let's Get in Touch</button>
        <div class="collapse" id="contactUs">
        <div id="contact-container">
        <form id="contact-form" method="post" action="contact.php" role="form">
            <div class="controls">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">First name *</label>
                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Last name *</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Reason for contacting us *</label>
                            <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                <option value=""></option>
                                <option value="Request quotation">Request quotation</option>
                                <option value="Request order status">Make a suggestion</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Please fill in your message" rows="5" required="required" data-error="Please, leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="submit" id="contact-btn" class="btn btn-success btn-send" value="Send message">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <p class="text-muted">
                            <strong>*</strong> These fields are required.</p>
                    </div>
                </div>
            </div>

</form>
        </div>
</div>

  </div>
        </section>
    </div>
    <figure>
        <img id="index-image" src="Content/Images/confetti.jpg" alt="Girls playing with confetti">
    </figure>
</main>
<?php

include "footer.php";

?>