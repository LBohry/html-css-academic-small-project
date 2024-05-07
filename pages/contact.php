<!DOCTYPE html>
<html>

<head>
    <title>Formulaire Contact</title>
    <link rel="stylesheet" href="../styles.css">
    <script>
        function handleFocus(event) {
            event.target.style.backgroundColor = "yellow";
        }

        function handleBlur(event) {
            event.target.style.backgroundColor = "";
        }

        function handleSelect(event) {
            var selectedText = new String(event.target.value).substring(event.target.selectionStart, event.target.selectionEnd);
            navigator.clipboard.writeText(selectedText);
            alert("le texte sélectionné est copié");
        }

        function handleSubmit(event) {
            var name = document.getElementById('name').value;
            if (name === '') {
                alert('Name is required');
                event.preventDefault();
            }
        }
    </script>
</head>

<body>
    <h1 class="contact-header">Contact Us</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="handleSubmit(event)">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" onfocus="handleFocus(event)" onblur="handleBlur(event)" onselect="handleSelect(event)"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" onfocus="handleFocus(event)" onblur="handleBlur(event)" onselect="handleSelect(event)"><br>

        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject" onfocus="handleFocus(event)" onblur="handleBlur(event)" onselect="handleSelect(event)"><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" onfocus="handleFocus(event)" onblur="handleBlur(event)" onselect="handleSelect(event)"></textarea><br>

        <p>Preferred contact method:</p>
        <input type="radio" id="contactChoice1" name="contact" value="email">
        <label for="contactChoice1">Email</label>

        <input type="radio" id="contactChoice2" name="contact" value="phone">
        <label for="contactChoice2">Phone</label>

        <input type="radio" id="contactChoice3" name="contact" value="mail">
        <label for="contactChoice3">Mail</label><br>

        <input type="checkbox" id="subscribe" name="subscribe" value="newsletter">
        <label for="subscribe"> Subscribe to our newsletter</label><br>

        <input type="submit" name="submit" value="register">
        <input type="reset">

    </form>
</body>

</html>
<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS); // Make sure this line exists
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($name)) {
        echo "Please enter your name.";
    } else if (empty($email)) {
        echo "Please enter your email.";
    } else if (empty($subject)) {
        echo "Please enter your subject.";
    } else if (empty($message)) {
        echo "Please enter your message.";
    } else {
        $sql = "INSERT INTO formulaire (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);

        if (mysqli_stmt_execute($stmt)) {
            echo "You request has been received, Mr. {$name}.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>