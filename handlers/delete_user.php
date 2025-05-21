<?php
include 'includes/header.php';
include 'config/config.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $user_id = (int)$_POST['id'];

    // First get user type
    $stmt = $conn->prepare("SELECT user_type FROM users WHERE id = ?");
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        header('Location: users');
        exit;
    }

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($user_type);
    if (!$stmt->fetch()) {
        $stmt->close();
        header('Location: users');
        exit;
    }
    $stmt->close();

    $conn->begin_transaction();

    try {
        if ($user_type === 'scout') {
            // Delete badges linked to this user (user_id)
            $stmt = $conn->prepare("DELETE FROM user_badges WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->close();

            // Get scout's id from scouts table (needed for parent_scout_links)
            $stmt = $conn->prepare("SELECT id FROM scouts WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->bind_result($scout_id);
            $stmt->fetch();
            $stmt->close();

            if ($scout_id) {
                // Delete links in parent_scout_links by scout_id
                $stmt = $conn->prepare("DELETE FROM parent_scout_links WHERE scout_id = ?");
                $stmt->bind_param("i", $scout_id);
                $stmt->execute();
                $stmt->close();
            }

            // Delete scout record itself
            $stmt = $conn->prepare("DELETE FROM scouts WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->close();

        } elseif ($user_type === 'parent') {
            // Delete links in parent_scout_links by parent_id
            $stmt = $conn->prepare("DELETE FROM parent_scout_links WHERE parent_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->close();

            // Delete parent details record
            $stmt = $conn->prepare("DELETE FROM parent_details WHERE parent_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->close();
        }

        // Delete user from users table
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();

        $conn->commit();

        header('Location: users');
        exit;

    } catch (Exception $e) {
        $conn->rollback();
        error_log("Error deleting user $user_id: " . $e->getMessage());
        echo "Sorry, there was an error deleting this user.";
        exit;
    }

} else {
    header('Location: users');
    exit;
}
?>
