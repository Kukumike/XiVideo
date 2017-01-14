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
            $vdata_id = $vdata_row->mediaid;
            $vdata_name = $vdata_row->DisplayGroup;
            $vdata_stored = $vdata_row->storedAs;
            $vdata_group_id = $vdata_row->displaygroupid;

            if ($this->Crud->check_if_active($vdata_group_id) > 0) {
                $save_btn = "Update Settings";
            } else {
                $save_btn = "Save Settings";
            }
        }
        ?>

        <?= $error; ?>

        <h2>
            Display Group(<?= $vdata_name; ?>) - 
            <a href="<?= base_url("play?dg=$vdata_group_id"); ?>" target="_blank">
                <i class="fa fa-play-circle"></i>
                View Group Player
            </a>
        </h2>

        <div class="row">
            <div class="col-md-7">
                <?php
                if ($this->Crud->check_if_active($vdata_group_id) > 0) {
                    ?>
                    <div class="alert alert-info">
                        <p>This group is active and playing on the player. Click on <strong>Deactivate Play</strong> to stop this group from playing.</p>
                        <br/>
                        <form method="post" action="<?php echo base_url("display"); ?>">
                            <input type="hidden" name="disgroupid" value="<?php echo $vdata_group_id; ?>"/>
                                <input type="hidden" name="cur_url" value="<?= current_url(); ?>"/>
                            <input type="submit" class="btn btn-sm btn-danger" value="Deactive Play"/>                        
                        </form>
                    </div>
                    <?php
                }
                ?>

                <form method="post" action="<?= base_url("group-config"); ?>">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Save your group settings to player - 
                            <input type="submit" value="<?php echo $save_btn; ?>"/>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <input type="hidden" name="cur_url" value="<?= current_url(); ?>"/>
                                <input type="hidden" name="gid" value="<?= $vdata_group_id; ?>"/>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Height</label>
                                            <input type="number" value="" name="vheight" min="1" required="" placeholder="Display height" class="form-control"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Width</label>
                                            <input type="number" value="" name="vwidth" min="1" required="" placeholder="Display height" class="form-control"/>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Auto-play</label>
                                            <select name="vautoplay" class="form-control" required="">
                                                <option selected="" disabled="">Please Select</option>
                                                <option value="true">Yes</option>
                                                <option value="false">False</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Repeat</label>
                                            <select name="vrepeat" class="form-control" required="">
                                                <option selected="" disabled="">Please Select</option>
                                                <option value="true">Yes</option>
                                                <option value="false">False</option>
                                            </select>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="<?= base_url("merge/js/jquery.js"); ?>"></script>
    <script src="<?= base_url("merge/js/bootstrap.min.js"); ?>"></script>
</body>
</html>