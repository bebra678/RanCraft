<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Бан</title>
</head>
<body>
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
Вы забанены
</body>
</html>
