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

        <!-- Main JS -->
        <script src="js/main.js"></script>
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
        </script>
    </body>
</html> 