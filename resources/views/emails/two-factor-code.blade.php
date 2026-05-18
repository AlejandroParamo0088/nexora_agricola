<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Código OTP</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; padding: 30px;">

    <div style="background: white; padding: 30px; border-radius: 10px; max-width: 500px; margin: auto;">

        <h2 style="color: #2E7D32;">
            Verificación de seguridad
        </h2>

        <p>
            Tu código de autenticación es:
        </p>

        <div style="font-size: 40px; font-weight: bold; letter-spacing: 10px; color: #111; text-align: center; margin: 30px 0;">
            {{ $code }}
        </div>

        <p>
            Este código expirará en 10 minutos.
        </p>

        <p>
            Si no intentaste iniciar sesión, ignora este mensaje.
        </p>

    </div>

</body>
</html>