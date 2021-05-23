<script src="/vendor/jquery/jquery.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="/script/navbar-scroll.js"></script>
<script>
    $.getJSON("https://api.countapi.xyz/hit/store.gahasapurba.com/visits", function(response) {
        $("#views").text(response.value);
    });
</script>