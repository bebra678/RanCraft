<html>
<head>
    <title>reCAPTCHA demo: Explicit render after an onload callback</title>
    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('html_element', {
                '6LecwV4pAAAAAKRmEeQ6wN82B5CrOXezC1lE6-xf' : '6LecwV4pAAAAAJj5uJsQ6W0aJ7DYlc70q0aMxxv'
            });
        };
    </script>
</head>
<body>
<form action="?" method="POST">
    <div id="html_element"></div>
    <br>
    <input type="submit" value="Submit">
</form>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\rancraft\resources\views/home.blade.php ENDPATH**/ ?>