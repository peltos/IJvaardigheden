<!DOCTYPE html>
<html>
    <head>
        <title>Een formulier</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="view/css/bootstrap.min.css" rel="stylesheet" media="screen">
        
        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="996529751909-ua9bnrd3j3bmvpei3kjj6ie89fm4ghku.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
    </head>
    <body>
        <a href="admin.php"> admin </a>
        <br>
        
        <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
        <script>
          function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present. 
            
            document.write('ID: ' + profile.getId());
            document.write('<br>');
            document.write('Name: ' + profile.getName());
            document.write('Image URL: ' + profile.getImageUrl());
            document.write('Email: ' + profile.getEmail());
          }
        </script>
    </body>
</html>