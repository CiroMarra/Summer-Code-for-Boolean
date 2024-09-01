document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.rating').forEach(function(rating) {
        rating.addEventListener('click', function(e) {
            if (e.target.classList.contains('star')) {
                const form = rating.closest('form');
                const value = e.target.getAttribute('data-value');
                form.querySelector('input[name="rating"]').value = value;

                updateStars(rating, value);
                form.submit();
            }
        });

        function updateStars(rating, value) {
            const stars = rating.querySelectorAll('.star');
            stars.forEach((star, index) => {
                if (index < value) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }
    });
});