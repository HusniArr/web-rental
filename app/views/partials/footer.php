<div class="row-fluid">
    <div id="footer" class="span12">
    2020 &copy; - TECHNO TEAM.
    </div>
</div>

<script src="<?php echo APP_URL?>/assets/js/excanvas.min.js"></script>
<script src="<?php echo APP_URL?>/assets/js/jquery.ui.custom.js"></script>
<script src="<?php echo APP_URL?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo APP_URL?>/assets/js/jquery.flot.min.js"></script>
<script src="<?php echo APP_URL?>/assets/js/jquery.flot.resize.min.js"></script>
<script src="<?php echo APP_URL?>/assets/js/jquery.peity.min.js"></script>
<script src="<?php echo APP_URL?>/assets/js/fullcalendar.min.js"></script>
<script src="<?php echo APP_URL?>/assets/js/maruti.js"></script>
<script src="<?php echo APP_URL?>/assets/js/maruti.dashboard.js"></script>
<script src="<?php echo APP_URL?>/assets/js/maruti.chat.js"></script>
<script src="<?php echo APP_URL?>/assets/DataTables/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage(newURL) {
    // if url is empty, skip the menu dividers and reset the menu selection to default
    if (newURL != "") {
        // if url is "-", it is this page -- reset the menu:
        if (newURL == "-") {
        resetMenu();
        }
        // else, send page to designated URL
        else {
        document.location.href = newURL;
        }
    }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
    document.gomenu.selector.selectedIndex = 2;
    }
</script>
  </body>
</html>