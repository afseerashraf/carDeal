<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('7194576e40acdd3637db', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('fair-bird-398');
    channel.bind('customer.created', function(data) {
        $('.cutomer').html(data.customer.name) 
        console.log(JSON.stringify(data));
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
  <h2 class="cutomer"></h2>
</body>