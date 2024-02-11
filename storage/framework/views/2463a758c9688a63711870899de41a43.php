<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Бан</title>
</head>
<body>
<?php if(session('error')): ?>
    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>
Вы забанены
</body>
</html>
<?php /**PATH C:\xampp\htdocs\rancraft1\resources\views/ban.blade.php ENDPATH**/ ?>