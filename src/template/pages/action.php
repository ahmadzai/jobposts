<?php ob_start() ?>
    <div class="text-left py-4">
        <div class="alert alert-<?php echo $type; ?>" role="alert">
            <?php echo $message; ?>
        </div>
    </div>
<?php $content = ob_get_clean() ?>
<?php include dirname(__DIR__) . '/template.php' ?>