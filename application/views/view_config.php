<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Xibo.Play :: Xibo Web Player</title>


        <link href="<?= base_url("merge/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet"/>
        <link href="<?= base_url("merge/css/bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?= base_url("merge/css/main.min.css"); ?>" rel="stylesheet"/>
        <link href="<?= base_url("merge/css/tr.min.css"); ?>" rel="stylesheet"/>
        <link href="<?= base_url("merge/imgs/scr.ico"); ?>" rel="shortcut icon"/>
    </head>
    <body>


        <nav class="navbar navbar-fixed-top navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand" href="<?= base_url(); ?>">
                        <i class="fa fa-video-camera"></i>
                        Xibo.Play
                    </a>
                </div>
            </div>
        </div>

        <div class="header__subnav header__subnav--google-home header__subnav--visible">
            <div class="container">
                <div class="header__subnav__item header__subnav__item--overview hidden-sm hidden-xs">
                    <a style="color: #000">
                        <i class="fa fa-bars"></i>
                    </a>        
                </div>
                <div class="header__subnav__item header__subnav__item--active">
                    <a href="<?= base_url(); ?>" class="header__link">
                        Overview
                    </a>
                </div>
            </div>
        </div>
    </nav>


    <div class="container">
        <?php
        foreach ($vdata as $vdata_row) {
            $groupName = $vdata_row->DisplayGroup;
            $groupId = $vdata_row->displaygroupid;
        }
        ?>

        <?= $error; ?>    


        <div class="row">
            <div class="col-md-8">
                <h2>View or Configure display group - Display Group(<?php echo $groupName; ?>)</h2>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?= base_url("play-display/$groupId"); ?>">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-play-circle-o"></i>
                                Play this display group on Player
                            </button>
                        </a>
                    </div>
                    <div class="panel-body">
                        <p>
                            This is a list of the currently existing media files on this group.
                        </p>
                    </div>

                    <!-- Media Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">Media Name</th>
                                <th class="text-left">StoredAs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($vdata as $vdata_row):
                                $mediaName = $vdata_row->name;
                                $mediaStoredAs = $vdata_row->storedAs;
                                $mediaId = $vdata_row->mediaid;
                                ?>
                                <tr>
                                    <td align="left"><?= $mediaId; ?></td>
                                    <td align="left"><?= $mediaName; ?></td>
                                    <td align="left"><?= $mediaStoredAs; ?></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url("merge/js/jquery.js"); ?>"></script>
    <script src="<?= base_url("merge/js/bootstrap.min.js"); ?>"></script>
</body>
</html>