<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col-lg-6 wrap m-5">
        <form id="donation-form">
            <input type="text" name="Donater_Name" placeholder="Name" required>
            <input type="email" name="Donater_Email" placeholder="Email" required>
            <input type="tel" name="Donater_Phone" placeholder="Phone" required>
            <input type="number" name="Amount" placeholder="Amount" required>
            <button id="stripe-donation-button">Donate</button>
        </form>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_51NCebBSIeVVQt7BY1QfhPR6Q2NcPTZwrVCy38cv9a4cLIdaIGlfOJ669IUIrQJqSO5rMPMlgf8GEKH9X0wbiyXZo00gR2mRjmi');
        var donationButton = document.getElementById('stripe-donation-button');
        donationButton.addEventListener('click', function(event) {
            event.preventDefault();
            var form = document.getElementById('donation-form');
            var donorData = {
                Donater_Name: form.elements['Donater_Name'].value,
                Donater_Email: form.elements['Donater_Email'].value,
                Donater_Phone: form.elements['Donater_Phone'].value,
                Amount: form.elements['Amount'].value
            };
            stripe.createToken('card').then(function(result) {
                if (result.error) {
                    console.error(result.error);
                } else {
                    var token = result.token;
                    sendDonationData(token, donorData);
                }
            });
        });

        function sendDonationData(token, donorData) {
            var xhr = new XMLHttpRequest();
            var url = 'process-donation.php'; // Path to your PHP file handling the donation process
            xhr.open('POST', 'process-donation.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    // Handle the server response if needed
                }
            };
            var data = 'token=' + encodeURIComponent(token.id) +
                '&Donater_Name=' + encodeURIComponent(donorData.Donater_Name) +
                '&Donater_Email=' + encodeURIComponent(donorData.Donater_Email) +
                '&Donater_Phone=' + encodeURIComponent(donorData.Donater_Phone) +
                '&Amount=' + encodeURIComponent(donorData.Amount);
            xhr.send(data);
        }
    </script>

</body>

</html>