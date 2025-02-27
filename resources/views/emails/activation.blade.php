<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Активация аккаунта</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">
<div style="max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px; text-align: center;">
    <h2 style="color: #333;">Здравствуйте!</h2>
    <p style="font-size: 16px; color: #555;">Вы зарегистрировались в системе <strong>AnimalSafe</strong>.</p>
    <p style="font-size: 16px; color: #555;">Чтобы активировать аккаунт, нажмите кнопку ниже:</p>

    <p>
        <a href="{{ $activationUrl }}"
           style="display: inline-block; padding: 12px 24px; background-color: #00d27a; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 16px;">
            Активировать аккаунт
        </a>
    </p>

    <p style="font-size: 14px; color: #777;">Если вы не регистрировались, проигнорируйте это письмо.</p>
</div>
</body>
</html>
