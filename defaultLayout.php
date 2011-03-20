<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Playground by Dusan Novakovic</title>
        <link href="/public/css/style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="/public/css/SyntaxHighlighter.css" type="text/css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="menu">
                <ul>
                    <li <?php echo ($folder == 'home' ? 'class="current_page_item"' : ''); ?>><a href="/">Playground</a></li>
                    <li <?php echo ($folder == 'symfony2' ? 'class="current_page_item"' : ''); ?>><a href="/symfony2">Symfony 2.0</a></li>
                    <li <?php echo ($folder == 'doctrine2' ? 'class="current_page_item"' : ''); ?>><a href="/doctrine2">Doctrine 2.0</a></li>
                    <li <?php echo ($folder == 'git' ? 'class="current_page_item"' : ''); ?>><a href="/git">Git</a></li>
                    <li <?php echo ($folder == 'jqueryui' ? 'class="current_page_item"' : ''); ?>><a href="/jqueryui">jQuery UI</a></li>
                    <li <?php echo ($folder == 'sphinx' ? 'class="current_page_item"' : ''); ?>><a href="/sphinx">Sphinx</a></li>
                </ul>
            </div>
            <!-- end #menu -->
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        
                        <?php require_once $folder.'/'.$page; ?>
                        <!-- end #content -->
                        
                        <div style="clear: both;">&nbsp;</div>
                    </div>
                </div>
            </div>
            <!-- end #page -->

        </div>
        <div id="footer">
            <p>Copyright (c) 2011 http://novakovicdusan.com. All rights reserved. Design by <a href="http://novakovicdusan.com">Dusan Novakovic</a>.</p>
        </div>
        <!-- end #footer -->
    </body>
</html>
