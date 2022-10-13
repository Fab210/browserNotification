<!DOCTYPE html>

<html>

<head>
    <title>Notification using PHP Ajax Bootstrap</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        var blogs = [
            ["Space-O", "www.spaceotechnologies.com"],
            ["Space-O", "www.spaceotechnologies.com"],
            ["Space-O", "www.spaceotechnologies.com"],
            ["Space-O", "www.spaceotechnologies.com"],
            ["Space-O", "www.spaceotechnologies.com"]
        ];
        setTimeout(function() {
            var x = Math.floor((Math.random() * 5) + 1);
            var title = blogs[x][0];
            var desc = 'Most popular blogs.';
            var url = blogs[x][1];
            notifyBrowser(title, desc, url);
        }, 200000);
        document.addEventListener('DOMContentLoaded', function() {

            if (Notification.permission !== "granted") {
                Notification.requestPermission();
            }

            document.querySelector("#notificationlabel").addEventListener("click", function(e) {
                var x = Math.floor((Math.random() * 5) + 1);
                var title = blogs[x][0];
                var desc = 'Most popular blogs.';
                var url = blogs[x][1];
                notifyBrowser(title, desc, url);
                e.preventDefault();
            });

        });

        function notifyBrowser(title, desc, url) {
            if (!Notification) {
                console.log('Desktop notifications not available in your browser..');
                return;
            }
            if (Notification.permission !== "granted") {
                Notification.requestPermission();
            } else {
                var notification = new Notification(title, {
                    icon: 'http://www.freelogovectors.net/wp-content/uploads/2015/06/gold-fish-icon.png',
                    body: desc,
                });
            }
        }
        notification.onclick = function() {
            window.open(url);
        };
        notification.onclose = function() {
            console.log('Closed notification popup');
        };
    </script>
</head>

<body>
    <div id="container">
        <h1>Space-O Browser notification demo</h1>

        <h4>Generate Notification with tap on Notification</h4>
        <a href="#" id="notificationlabel" class="button">Notification</a>
    </div>
</body>

</html>
