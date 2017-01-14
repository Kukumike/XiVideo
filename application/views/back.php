<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>HTML Xibo Player</title>


        <link href="<?= base_url("merge/css/vj.css"); ?>" rel="stylesheet">

        <!-- If you'd like to support IE8 -->
        <script src="<?= base_url("merge/js/vjone.js"); ?>"></script>
        <link href="<?= base_url("merge/imgs/scr.ico"); ?>" rel="shortcut icon"/>

    </head>
    <body style="padding-top: 0; margin: 0">
        <?php
        foreach ($vplay as $vplay_row):
            $vp_id = $vplay_row->mediaid;

            $vp_stored = $this->Crud->get_stored_as($vp_id);

            $vp_height = $vplay_row->height;
            $vp_width = $vplay_row->width;
            $vp_autoplay = $vplay_row->autoPlay;
            $vp_repeat = $vplay_row->mediaRepeat;
            ?>



            <video id="my-video" class="video-js"  controls preload="auto" autoplay="<?php echo $vp_autoplay; ?>" loop="<?php echo $vp_repeat; ?>" width="<?php echo $vp_width; ?>%"  height="<?= $vp_height; ?>%" muted="true"  poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                <source src="http://localhost/scr/crescent/Xibo/<?php echo $vp_stored; ?>" type='video/mp4'>
                <source src="http://localhost/scr/crescent/Xibo/<?php echo $vp_stored; ?>" type='video/webm'>
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>
            <?php
        endforeach;
        ?>



        <script src="<?= base_url("merge/js/vjtwo.js"); ?>"></script>
    </body>
</html>