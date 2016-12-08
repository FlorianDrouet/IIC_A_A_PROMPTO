            <?php include 'chat/chat.php'; ?>
            </div>
            <!-- END fh5co-page -->
        </div>
        <!-- END fh5co-wrapper -->       

        <?php if(isset($idCalendrier)) : ?>
            <script>
            $(document).ready(function() {
                
                $('#calendar').fullCalendar({
                    header: {
                        left: '',
                        center: 'prev title next',
                        right: ''
                    },
                    eventClick:  function(event, jsEvent, view) {
                        <?php if(isset($user) && $user['type'] == 'p') : ?>
                            $('#modalTitle').html(event.title);
                            $('#modalBody').html(event.description);
                            $('#eventUrl').attr('href',event.url);
                            $('#fullCalModal').modal();
                        <?php endif ; ?>
                        return false;
                    },
                    dayClick: function(date, jsEvent, view) {
                        <?php if(isset($user) && $user['type'] == 'u') : ?>
                            $('#dateRDV').val(date.format("DD/MM/YYYY"));
                        <?php endif ; ?>
                        return false;
                    },
                    events:[
                      <?= $planning->getCalendar($idCalendrier); ?>
                    ]
                });
            });
            </script>
        <?php endif; ?>
    </body>
</html> 