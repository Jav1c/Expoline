<?php
require 'Current_Active.php'; // Ensure this file contains your database connection details

// Database connection

// Remove the session from the database
$session_id = session_id();
$stmt = $conn->prepare("DELETE FROM user_sessions WHERE session_id = ?");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$stmt->close();
// Close connection
$conn->close();

// Optionally, destroy the session
session_destroy();
?>