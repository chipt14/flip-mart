<footer class="main-footer">
    &copy; <span id="year"></span> <a href="#"></a>. All Rights Reserved.
</footer>
<script>
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();

    const span = document.querySelector('#year');
    span.innerHTML = currentYear;
</script>