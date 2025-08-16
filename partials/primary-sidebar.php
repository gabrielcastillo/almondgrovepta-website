<?php
/*
 * File: primary-sidebar.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */
?>
<?php if ( is_active_sidebar('primary') ) :?>
<aside id="sidebar" class="w-1/4 xl:border-l xl:border-slate-200 p-0 hidden xl:block" aria-label="Primary Sidebar">
    <div class="py-24 flex justify-center">
        <?php get_sidebar('primary'); ?>
    </div>
</aside>
<?php endif; ?>