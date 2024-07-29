<script>
    // disque es un script pa q jale en celular pero ps no alaberga

    document.addEventListener('DOMContentLoaded', function() {
        const navToggle = document.getElementById('nav-toggle');
        const navMenu = document.querySelector('.nav-menu');

        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    });
</script>