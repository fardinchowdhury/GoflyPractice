<!-- <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];

    if (!isset($_SESSION["reviews"])) {
        $_SESSION["reviews"] = [];
    }

    $review = [
        "username" => "testAccountB",
        "comment" => $comment,
        "rating" => $rating,
    ];

    array_push($_SESSION["reviews"], $review);

    header("Location: reviews.html");
    exit();
}
?> -->
