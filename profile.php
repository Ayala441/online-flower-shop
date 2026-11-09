<?php
session_start();
// Бетті қорғау: егер қолданушы кірмеген болса, login.php бетіне лақтыру
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include 'header.php'; ?>

<div class="container" style="max-width: 600px; margin: 50px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(233,30,99,0.08); text-align: center;">
    <h2 style="color: #ad1457; margin-bottom: 10px;">Қош келдіңіз, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! 🌸</h2>
    <p style="color: #666; margin-bottom: 20px;">Электрондық поштаңыз: <b><?php echo htmlspecialchars($_SESSION['user_email']); ?></b></p>
    <p style="color: #444; margin-bottom: 30px;">Бұл — жүйеге кірген қолданушыларға ғана көрінетін қорғалған жеке кабинет беті.</p>
    
    <a href="logout.php" style="background: #d32f2f; color: white; padding: 10px 25px; text-decoration: none; border-radius: 25px; font-weight: bold;">Жүйеден шығу (Logout)</a>
</div>

<?php include 'footer.php'; ?>