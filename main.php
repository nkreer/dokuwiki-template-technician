<?php

// Make sure that we only run inside a dokuwiki
if(!defined("DOKU_INC")){
    die();
}

$showSidebar = true;
?>
<!DOCTYPE html>
<html lang="<?php echo $conf["lang"]; ?>">

<head>
    <meta charset="UTF-8" />
    <title><?php tpl_pagetitle() ?> - <?php echo strip_tags($conf['title']) ?></title>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
</head>

<body>

<!-- Site content -->
<div id="dokuwiki__site">
<!-- Page start, plugin conpatible -->
<div id="dokuwiki__top" class="site <?php echo tpl_classes(); ?>">

<div class="grid">
<?php 
    // Only include a sidebar and skiplink if its active
    if($showSidebar){
        ?>
        <a href="#dokuwiki__content" class="sr-only"><?php echo $lang['skip_to_content'] ?></a>
        <div id="dokuwiki__aside">
            <div class="pad aside include group">
                <?php tpl_include_page($conf['sidebar'], 1, 1) ?>
            </div>
        </div>
        <?php
    } 
?>

<!-- Page content -->
<div id="dokuwiki__content" class="gridcolumn">
    <?php tpl_flush(); tpl_includeFile("pageheader.html"); ?>
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
            ];
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