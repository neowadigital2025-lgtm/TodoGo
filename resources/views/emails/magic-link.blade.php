<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TodoGo Login</title>
</head>
<body style="font-family:Arial,sans-serif;background:#f5f7fb;padding:40px;">

<div style="max-width:600px;margin:auto;background:white;padding:40px;border-radius:16px;">

    <h1 style="color:#2563EB;">
        TodoGo
    </h1>

    <h2>Hi, {{ $user->name }} 👋</h2>

    <p>
        Click the button below to securely sign in to your TodoGo account.
    </p>

    <p style="margin:35px 0;">
        <a href="{{ url('/verify/'.$token) }}"
           style="background:#2563EB;color:white;padding:14px 26px;
                  text-decoration:none;border-radius:10px;font-weight:bold;">
            Sign in to TodoGo
        </a>
    </p>

    <p>
        This link will expire in <b>15 minutes</b>.
    </p>

    <hr>

    <small>
        If you didn't request this email, you can safely ignore it.
    </small>

</div>

</body>
</html>