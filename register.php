<?php include 'header.php'; ?>

<div class="container" style="max-width: 450px; margin: 40px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(233,30,99,0.08);">
    <h2 style="text-align: center; color: #ad1457; margin-bottom: 5px;">Тіркелу</h2>
    <p style="text-align: center; color: #777; font-size: 14px; margin-bottom: 25px;">Жаңа аккаунт ашып, дүкенге тіркеліңіз</p>

    <form method="POST">
        <div style="margin-bottom: 12px;">
            <label style="display: block; font-size: 13px; color: #555; margin-bottom: 5px;">Аты-жөніңіз</label>
            <input type="text" name="name" placeholder="Аяла" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
        </div>
        <div style="margin-bottom: 12px;">
            <label style="display: block; font-size: 13px; color: #555; margin-bottom: 5px;">Электрондық пошта</label>
            <input type="email" name="email" placeholder="mail@example.com" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
        </div>
        <div style="margin-bottom: 12px;">
            <label style="display: block; font-size: 13px; color: #555; margin-bottom: 5px;">Құпия сөз</label>
            <input type="password" name="password" placeholder="••••••••" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-size: 13px; color: #555; margin-bottom: 5px;">Құпия сөзді қайталаңыз</label>
            <input type="password" name="confirm_password" placeholder="••••••••" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
        </div>
        <button type="submit" style="width: 100%; background: #e91e63; color: white; border: none; padding: 12px; border-radius: 25px; font-weight: bold; cursor: pointer; transition: background 0.3s;">Тіркелу</button>
    </form>

    <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #666;">
        Аккаунтыңыз бар ма? <a href="login.php" style="color: #e91e63; text-decoration: none; font-weight: bold;">Кіру</a>
    </p>
</div>

<?php include 'footer.php'; ?>