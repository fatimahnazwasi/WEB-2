<?php
// PHP: You can customize apps or user data here
$apps = ['Browser', 'Text Editor', 'Terminal'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Taskbar UI</title>
    <style>
        #taskbar {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 40px;
            background-color: #333;
            display: flex;
            align-items: center;
            padding: 0 10px;
        }
        .taskbar-item {
            color: white;
            padding: 10px;
            cursor: pointer;
        }
        .taskbar-item:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div id="taskbar">
    <?php foreach ($apps as $app): ?>
        <div class="taskbar-item" onclick="launchApp('<?php echo $app; ?>')">
            <?php echo $app; ?>
        </div>
    <?php endforeach; ?>
</div>

<script>
function launchApp(appName) {
    alert("Launching " + appName);
    // You could also show a modal or iframe here
}
</script>

</body>
</html>
