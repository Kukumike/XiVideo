<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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

            <div class="row">
                <div class="col-md-8">
                    <h2>All uploaded media</h2>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Uploaded media on the server
                            <a href="<?= current_url(); ?>">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-refresh"></i>
                                    Update list
                                </button>
                            </a>
                        </div>
                        <div class="panel-body">
                            <p>
                                This is a list of the currently existing media files. Open to edit and set <strong>"Config"</strong> to play it on the player.
                            </p>
                        </div>

                        <!-- Media Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-left">#</th>
                                    <th class="text-left">Display Name</th>
                                    <th class="text-left">Description</th>
                                    <th class="text-left">Group Player</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($displayg as $displayg_row):
                                    $d_id = $displayg_row->DisplayGroupID;
                                    $d_name = $displayg_row->DisplayGroup;
                                    $d_description = $displayg_row->Description;
                                    ?>
                                    <tr>
                                        <td align="left"><?= $d_id; ?></td>
                                        <td align="left"><?= $d_name; ?></td>
                                        <td align="left"><?= $d_description; ?></td>
                                        <td align="left">
                                            <a href="<?= base_url("play?dg=$d_id"); ?>" target="_blank">
                                                    <i class="fa fa-play-circle"></i>
                                                    View Player
                                            </a>
                                        </td>
                                        <td align="right">
                                            <a href="<?= base_url("config/$d_id"); ?>">
                                                <button type="button">Open</button>
                                            </a>
                                        </td>
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