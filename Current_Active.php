<?php
require 'config.php';
// Manage user sessions
$session_id = session_id();
$stmt = $conn->prepare("INSERT INTO user_sessions (session_id) VALUES (?) ON DUPLICATE KEY UPDATE last_activity = NOW()");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$stmt->close();

// Count active users
$active_time = 5 * 60; // 5 minutes in seconds
$time_limit = date('Y-m-d H:i:s', time() - $active_time);
$result = $conn->query("SELECT COUNT(*) as active_users FROM user_sessions WHERE last_activity > '$time_limit'");
$row = $result->fetch_assoc();
$active_users = $row['active_users'];

// Clean up old sessions
$cleanup_time = date('Y-m-d H:i:s', time() - $active_time);
$conn->query("DELETE FROM user_sessions WHERE last_activity < '$cleanup_time'");

// Close connection
?>