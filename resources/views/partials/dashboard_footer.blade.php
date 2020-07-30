<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="offcanvas"]').click(function () {
            $("#navigation").toggleClass("hidden-xs");
        });
    });
    $(function() {
        $('.lazy').lazy();
    });
</script>
