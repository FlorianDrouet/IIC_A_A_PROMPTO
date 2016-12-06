            <?php include 'chat/chat.php'; ?>
            </div>
            <!-- END fh5co-page -->
        </div>
        <!-- END fh5co-wrapper -->
        
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing.1.3.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Waypoints -->
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/sticky.js"></script>

        <!-- Stellar -->
        <script src="js/jquery.stellar.min.js"></script>
        <!-- Superfish -->
        <script src="js/hoverIntent.js"></script>
        <script src="js/superfish.js"></script>
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <!-- Date Picker -->
        <script src="js/bootstrap-datepicker.min.js"></script>
        <!-- CS Select -->
        <script src="js/classie.js"></script>
        <script src="js/selectFx.js"></script>
        <!-- Google Map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
        <script src="js/google_map.js"></script>

        <!-- Modernizr JS -->
        <script src="js/modernizr-2.6.2.min.js"></script>

        <!-- Main JS -->
        <script src="js/main.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>
        <script type="text/javascript">
            function getCookie(sName) {
                var oRegex = new RegExp("(?:; )?" + sName + "=([^;]*);?");
         
                if (oRegex.test(document.cookie)) 
                    return decodeURIComponent(RegExp["$1"]);
                else 
                    return null;                
            }

            function createCookie(name,value,days) {
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime()+(days*24*60*60*1000));
                    var expires = "; expires="+date.toGMTString();
                }
                else var expires = "";
                document.cookie = name+"="+value+expires+"; path=/";
            }

            function maPosition(pos)
            {
                // Création du cookie
                createCookie('geolocation', pos.coords.longitude + '###___###' + pos.coords.latitude);
            }

            if(getCookie('geolocation') == null && navigator.geolocation)
                navigator.geolocation.getCurrentPosition(maPosition);

            function autocomplet() {
                var keyword = $('#service_id').val();
                $.ajax({
                    url: 'ajax_refresh.php',
                    type: 'POST',
                    data: {keyword:keyword},
                    success:function(data){
                        $('#liste_service').show();
                        $('#liste_service').html(data);
                    }
                });
            }

            // set_item : this function will be executed when we select an item
            function set_item(item) {
                // change input value
                $('#service_id').val(item);
                // hide proposition list
                $('#liste_service').hide();
            }
            function autocomplet2() {
                var keyword = $('#service_region').val();
                $.ajax({
                    url: 'ajax_refresh2.php',
                    type: 'POST',
                    data: {keyword:keyword},
                    success:function(data){
                        $('#liste_region').show();
                        $('#liste_region').html(data);
                    }
                });
            }

            // set_item : this function will be executed when we select an item
            function set_item2(item) {
                // change input value
                $('#service_region').val(item);
                // hide proposition list
                $('#liste_region').hide();
            }
        </script>
        <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: '',
                    center: 'prev title next',
                    right: ''
                },
                eventClick:  function(event, jsEvent, view) {
                    $('#modalTitle').html(event.title);
                    $('#modalBody').html(event.description);
                    $('#eventUrl').attr('href',event.url);
                    $('#fullCalModal').modal();
                    return false;
                },
                googleCalendarApiKey: 'AIzaSyCpBNazBlcBOS5-0vshJT2ycYqJGcozD7U',
                eventSource : 
                {
                    googleCalendarId: '0vbnir6qjaui60vhlbdpulrbbk@group.calendar.google.com'
                }, 
                events:[
                    {
                      "title":"Free Pizza",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Free Pizza.</p><p>Nothing to see!</p>",
                      "start":moment().subtract('days',14),
                      "end":moment().subtract('days',14),
                      "url":"http://www.mikesmithdev.com/blog/coding-without-music-vs-coding-with-music/"
                   },
                   {
                      "title":"DNUG Meeting",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the DNUG Meeting.</p><p>Nothing to see!</p>",
                      "start":moment().subtract('days',10),
                      "end":moment().subtract('days',10),
                      "url":"http://www.mikesmithdev.com/blog/youtube-video-event-tracking-with-google-analytics/"
                   },
                   {
                      "title":"Staff Meeting",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Staff Meeting.</p><p>Nothing to see!</p>",
                      "start":moment().subtract('days',6),
                      "end":moment().subtract('days',6),
                      "url":"http://www.mikesmithdev.com/blog/what-if-your-website-were-an-animal/"
                   },
                   {
                      "title":"Poker Night",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Poker Night.</p><p>Nothing to see!</p>",
                      "start":moment().subtract('days',2),
                      "end":moment().subtract('days',2),
                      "url":"http://www.mikesmithdev.com/blog/how-to-make-a-qr-code-in-asp-net/"
                   },
                   {
                      "title":"NES Gamers",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the NES Gamers.</p><p>Nothing to see!</p>",
                      "start":moment(),
                      "end":moment(),
                      "url":"http://www.mikesmithdev.com/blog/name-that-nes-soundtrack/"
                   },
                   {
                      "title":"XBox Tourney",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the XBox Tourney.</p><p>Nothing to see!</p>",
                      "start":moment().add('days',3),
                      "end":moment().add('days',3),
                      "url":"http://www.mikesmithdev.com/blog/worst-job-titles-in-internet-and-info-tech/"
                   },
                   {
                      "title":"Pool Party",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Pool Party.</p><p>Nothing to see!</p>",
                      "start":moment().add('days',5),
                      "end":moment().add('days',5),
                      "url":"http://www.mikesmithdev.com/blog/jquery-full-calendar/"
                   },
                   {
                      "title":"Staff Meeting",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Staff Meeting.</p><p>Nothing to see!</p>",
                      "start":moment().add('days',9),
                      "end":moment().add('days',9),
                      "url":"http://www.mikesmithdev.com/blog/keep-important-licensing-comments-dotnet-bundling-minification/"
                   },
                   {
                      "title":"Poker Night",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Poker Night.</p><p>Nothing to see!</p>",
                      "start":moment().add('days',11),
                      "end":moment().add('days',11),
                      "url":"http://www.mikesmithdev.com/blog/aspnet-bundling-changes-output-with-user-agent-eureka-1/"
                   },
                   {
                      "title":"Hackathon",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Hackathon.</p><p>Nothing to see!</p>",
                       "start":moment().add('days',15),
                      "end":moment().add('days',15),
                      "url":"http://www.mikesmithdev.com/blog/worst-job-titles-in-internet-and-info-tech/"
                   },
                   {
                      "title":"Beta Testing",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Beta Testing.</p><p>Nothing to see!</p>",
                      "start":moment().add('days',22),
                      "end":moment().add('days',22),
                      "url":"http://www.mikesmithdev.com/blog/worst-job-titles-in-internet-and-info-tech/"
                   },
                   {
                      "title":"Perl Meetup",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Perl Meetup.</p><p>Nothing to see... though no one would show up any way.</p>",
                      "start":moment().subtract('days',20),
                      "end":moment().subtract('days',20),
                      "url":"http://www.mikesmithdev.com/blog/migrating-from-asp-net-to-ghost-node-js/"
                   },
                   {
                      "title":"Node.js Meetup",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Node.js Meetup.</p><p>Nothing to see!</p>",
                      "start":moment().add('days',25),
                      "end":moment().add('days',25),
                      "url":"http://www.mikesmithdev.com/blog/pdf-secure-access-and-log-downloads/"
                   },
                   {
                      "title":"Javascript Meetup",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the Javascript Meetup.</p><p>Nothing to see!</p>",
                      "start":moment().subtract('days',27),
                      "end":moment().subtract('days',27),
                      "url":"http://www.mikesmithdev.com/blog/migrating-from-asp-net-to-ghost-node-js/"
                   },
                   {
                      "title":"HTML Meetup",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the HTML Meetup.</p><p>Nothing to see!</p>",
                      "start":moment().subtract('days',22),
                      "end":moment().subtract('days',22),
                      "url":"http://www.mikesmithdev.com/blog/migrating-from-asp-net-to-ghost-node-js/"
                   },
                   {
                      "title":"CSS Meetup",
                      "allday":"false",
                      "description":"<p>This is just a fake description for the CSS Meetup.</p><p>Nothing to see!</p>",
                      "start":moment().add('days',27),
                      "end":moment().add('days',27),
                      "url":"http://www.mikesmithdev.com/blog/migrating-from-asp-net-to-ghost-node-js/"
                   }
                ]
            });
        });
    </script>
    </body>
</html> 