<?php if(type === 'submit'): ?>
<button class="button <?php echo $modifier ?>" type="submit">
<?php else: ?>
<a class="button <?php echo $modifier ?>" href="<?php echo $href; ?>" <?php if($blank === true): ?>target="_blank"<?php endif; ?>>
<?php endif; ?>
    <span class="button-text"><?php echo $text; ?></span>
<?php if($type === 'submit'): ?>
</button>
<?php else: ?>
</a>
<?php endif; ?>