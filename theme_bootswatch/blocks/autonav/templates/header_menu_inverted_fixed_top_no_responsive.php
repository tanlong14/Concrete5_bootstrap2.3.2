<?php   defined('C5_EXECUTE') or die("Access Denied.");
$navItems = $controller->getNavItems();
?>
<?php 
 global $u;
 if($u->isLoggedIn()) { ?>
    <style type="text/css">
        .navbar-fixed-top { margin-top: 50px; }
        div#ccm-edit-overlay { z-index:2000;}
    </style>
    <div>Navbar-fixed-top</div>
<?php  } ?>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <ul class="nav">
                <?php   foreach ($navItems as $ni) {
                    $classes = array();
                    if ($ni->isCurrent) {
                        $classes[] = 'active';
                    }
                    if ($ni->inPath) {
                        $classes[] = 'nav-path-selected';
                    }
                    if ($ni->isFirst) {
                        $classes[] = 'first';
                    }
                    $classes = implode(" ", $classes);


                    if ($ni->hasSubmenu) {
                        if($ni->level > 1) {
                            echo '<li class="'.$ni->cObj->getAttribute('color'). ' ' . $ni->classes . ' dropdown-submenu">'; //opens a nav item, sub level
                            echo '<a data-toggle="dropdown" class="'. $ni->classes . ' dropdown-toggle" href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a>';
                        }
                        else {
                            echo '<li class="'.$ni->cObj->getAttribute('color'). ' ' . $ni->classes . ' dropdown">'; //opens a nav item first level
                            echo '<a data-toggle="dropdown" class="'. $ni->classes . ' dropdown-toggle" href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '<b class="caret"></b></a>';
                        }
                        echo '<ul class="dropdown-menu">'; //opens a dropdown sub-menu
                    } else {
                        echo '<li class="'. $ni->classes . '">'; //opens a nav item
                        echo '<a href="' . $ni->url . '" target="' . $ni->target . '" class="' . $ni->classes . '">' . $ni->name . '</a>';
                        echo '</li>'; //closes a nav item
                        echo str_repeat('</ul></li>', $ni->subDepth); //closes dropdown sub-menu(s) and their top-level nav item(s)
                    }
                } ?>
            </ul>
        </div>
    </div>
</div>
