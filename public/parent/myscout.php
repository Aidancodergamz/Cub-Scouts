<?php

include 'config/config.php';
include 'includes/header.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

// Get parent info from users table
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$parent = $stmt->get_result()->fetch_assoc();

if ($parent['user_type'] !== 'parent') {
    echo "Access denied.";
    exit;
}

$message = "";

// Handle form submission to link scout
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['link_code'])) {
    $linkCode = trim($_POST['link_code']);

    // Find scout's user_id in scouts table by link_code
    $scoutIdStmt = $conn->prepare("SELECT user_id FROM scouts WHERE link_code = ?");
    $scoutIdStmt->bind_param("s", $linkCode);
    $scoutIdStmt->execute();
    $scoutIdResult = $scoutIdStmt->get_result();

    if ($scoutIdResult->num_rows === 1) {
        $scoutRow = $scoutIdResult->fetch_assoc();
        $scoutUserId = $scoutRow['user_id'];

        // Get scout details from users table
        $scoutStmt = $conn->prepare("SELECT first_name, surname FROM users WHERE id = ? AND user_type = 'scout'");
        $scoutStmt->bind_param("i", $scoutUserId);
        $scoutStmt->execute();
        $scoutResult = $scoutStmt->get_result();

        if ($scoutResult->num_rows === 1) {
            // Check if parent already linked to scout
            $check = $conn->prepare("SELECT * FROM parent_scout_links WHERE parent_id = ? AND scout_id = ?");
            $check->bind_param("ii", $parent['id'], $scoutUserId);
            $check->execute();
            $checkResult = $check->get_result();

            if ($checkResult->num_rows === 0) {
                // Insert link
                $insert = $conn->prepare("INSERT INTO parent_scout_links (parent_id, scout_id) VALUES (?, ?)");
                $insert->bind_param("ii", $parent['id'], $scoutUserId);
                if ($insert->execute()) {
                    $scout = $scoutResult->fetch_assoc();
                    $message = "You have been linked to scout: " . htmlspecialchars($scout['first_name'] . ' ' . $scout['surname']);
                } else {
                    $message = "Error linking scout.";
                }
            } else {
                $message = "You're already linked to this scout.";
            }
        } else {
            $message = "Scout user details not found.";
        }
    } else {
        $message = "Sorry, your link code in invalid, please try again.";
    }
}

// Get all linked scouts for this parent
$linkedStmt = $conn->prepare("
    SELECT u.id, u.first_name, u.surname 
    FROM users u
    INNER JOIN parent_scout_links psl ON u.id = psl.scout_id
    WHERE psl.parent_id = ?
");
$linkedStmt->bind_param("i", $parent['id']);
$linkedStmt->execute();
$linkedScouts = $linkedStmt->get_result();
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="assets/css/myscout.css">    
<head><title>My Scout</title></head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($parent['first_name']); ?></h1>

    <?php if (!empty($message)) echo "<p>" . htmlspecialchars($message) . "</p>"; ?>

    <form method="post">
        <label>Enter your child's link code:</label>
        <input type="text" name="link_code" required>
        <button type="submit">Link Scout</button>
    </form>
</div>

<div class="linked-scouts">
    <h2>Your Linked Scouts:</h2>
<ul>
<?php while ($row = $linkedScouts->fetch_assoc()): ?>
    <li>
        <a href="badges?id=<?php echo urlencode($row['id']); ?>">
            <?php echo htmlspecialchars($row['first_name'] . ' ' . $row['surname']); ?>
        </a>
    </li>
<?php endwhile; ?>
</ul>
</div>
    

</body>
</html>
