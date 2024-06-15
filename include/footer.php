<div class="footer-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-12">
                <h5>© <span id="currentYear">2018</span> All rights reserved. Developed by<a href="https://www.frogbid.com/" target="_blank">FrogBID</a></h5>
            </div>
            <div class="col-lg-6 col-md-4 col-12 text-right">
                <div class="footer-support">
                    <a href="#">Contact us</a>
                    <a href="#">Support</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to get the current year and update the content
    function displayCurrentYear() {
        // Get the current year
        var currentYear = new Date().getFullYear();

        // Find the element by ID and update its content
        document.getElementById('currentYear').textContent = currentYear;
    }

    // Ensure the function runs after the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        displayCurrentYear();
    });
</script>