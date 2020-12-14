<?php

// Make sure that we only run inside a dokuwiki
if(!defined("DOKU_INC")){
    die();
}

?>
<!DOCTYPE html>
<html lang="<?php echo $conf["lang"]; ?>">

<head>
    <meta charset="UTF-8" />
    <title><?php tpl_pagetitle(); ?> - <?php echo strip_tags($conf['title']); ?></title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders(); ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')); ?>
    <?php tpl_includeFile('meta.html'); ?>
</head>

<body>

<!-- Site content -->
<div id="dokuwiki__site">
<!-- Page start, plugin conpatible -->
<div id="dokuwiki__top" class="site <?php echo tpl_classes(); ?>">

<div class="grid">

    <div id="dokuwiki__aside" class="gridcolumn">
        <a href="#dokuwiki__content" class="sr-only"><?php echo $lang['skip_to_content'] ?></a>
        <div class="pad aside include group">
            <h1><?php echo strip_tags($conf['title']); ?></h1>
            <?php tpl_include_page($conf['sidebar'], 1, 1); ?>
        </div>
    </div>

    <!-- Page content -->
    <div id="dokuwiki__content" class="gridcolumn">
        <?php tpl_flush(); ?>
        <div class="content">
            <?php tpl_content(); ?>
        </div>
        <!-- Show the neccessary tools -->
        <ul class="pagetools">
            <?php 
                tpl_toolsevent('usertools', [
                    tpl_action("edit", 1, "li", 1),
                    tpl_action("admin", 1, "li", 1),
                    tpl_action("login", 1, "li", 1)
                ]);
            ?>
        </ul>
    </div>

</div>

</div>
</div>


<div class="invisible">
    <?php tpl_indexerWebBug(); //Dokuwiki housekeeping, required ?>
</div>

</body>

</html>