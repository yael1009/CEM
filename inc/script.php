<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get the navbar toggler button
        const $navbarToggler = document.querySelector('.navbar-toggler');

        // Check if the navbar toggler button exists
        if ($navbarToggler) {
            // Add a click event on it
            $navbarToggler.addEventListener('click', () => {
                // Get the target from the "data-target" attribute
                const target = $navbarToggler.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-toggler" and the "navbar-collapse"
                $navbarToggler.classList.toggle('is-active');
                $target.classList.toggle('is-active');
            });
        }
    });
</script>
