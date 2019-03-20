<?php include('header.php') ?>

<main class="container" id="eventAdd">
    <header>
        <h1 class="display-4">Create a new event</h1>
    </header>

    <form action="index.php" method="post" class="container d-flex flex-row">
      <input type="hidden" name="action" value="add_event">
      <div class="container">
        <div class="tab">
          <div class="form-group">
              <label for="event-title">Title</label>
              <input type="text" v-model="title" class="form-control" id="event-title" name="title">
          </div>
          <div class="form-group">
              <label for="event-description">Detail</label>
              <textarea name="description" v-model="description" id="event-description" class="form-control"></textarea>
          </div>
          <div class="form-group">
              <label for="event-location">Location</label>
              <input type="text" v-model="location" class="form-control" id="event-location" name="location">
          </div>
        </div>
        <div class="tab">
          <div class="form-group">
              <label for="event-date">Date</label>
              <input type="date" v-model="date" class="form-control" id="event-date" name="date">
          </div>
          <div class="form-group">
            <label for="event-start-time">Start Time</label>
            <input type="time" v-model="startTime" name="start-time" id="event-start-time" class="form-control">
          </div>
          <div class="form-group">
            <label for="event-end-time">End Time</label>
            <input type="time" v-model="endTime" name="end-time" id="event-end-time" class="form-control">
          </div>
        </div>
        <div class="row container">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="." class="btn btn-secondary">Cancel</a>
        </div>
      </div>
      <div class="container">
        <h2 class="text-center">{{ title }}</h2>
        <p>{{ description }}</p>
        <p v-if="location"><strong>Venue:</strong> {{ location }}</p>
        <span v-if="date"><strong>Date:</strong>{{ date }}</span>
        <span v-if="startTime">  <strong> From</strong> {{ startTime }}</span>
        <span v-if="endTime">  <em>to</em> {{ endTime }}</span>
      </div>
    </form>

    

</main>


<?php include('footer.php') ?>