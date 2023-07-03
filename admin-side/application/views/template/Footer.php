<!--container-scroller-->
<!--plugins: js-->
<script src="<?= base_url("assets/vendors/js/vendor.bundle.base.js") ?>"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url("assets/js/off-canvas.js") ?>"></script>
<script src="<?= base_url("assets/js/hoverable-collapse.js") ?>"></script>
<script src="<?= base_url("assets/js/misc.js") ?>"></script>
<script src="<?= base_url("assets/js/settings.js") ?>"></script>
<script src="<?= base_url("assets/js/todolist.js") ?>"></script>
<script src="<?= base_url("assets/js/jquery/jquery.js") ?>"></script>
<!--endinject-->
<!--Custom js for this page -->
<!-- End custom js for this page-->
<!-- personal script -->
<script>
    // function for sending a formData using jquery
    function sendFormData(form, url, method, callback) {
        var formData = new FormData(form);
        $.ajax({
            url: url,
            type: method,
            data: formData,
            success: function(data) {
                callback(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
</script>
</body>


</html>