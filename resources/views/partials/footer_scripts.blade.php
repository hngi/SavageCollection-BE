<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    $(function() {
        $('.lazy').lazy();
    });
</script>
<script>
    const text_wrapper = document.querySelectorAll(".text_wrapper");

    text_wrapper.forEach((text_wrapper) => {

        var hexValues = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e"];
        function populate(a) {
            for ( var i = 0; i < 6; i++ ) {
                var x = Math.round( Math.random() * 14 );
                var y = hexValues[x];
                a += y;
            }
            return a;
        }
        var newColor1 = populate('#');
        var newColor2 = populate('#');
        var angle = Math.round( Math.random() * 360 );

        var gradient = "linear-gradient(" + angle + "deg, " + newColor1 + ", " + newColor2 + ")";

        text_wrapper.style.background = gradient;
    });

</script>
