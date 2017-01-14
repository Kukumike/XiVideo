<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>HTML Xibo Player</title>
        <link href="<?= base_url("merge/imgs/scr.ico"); ?>" rel="shortcut icon"/>



    </head>
    <body style="padding-top: 0; margin: 0" id="b">





        <script type="text/javascript">

            var videos = [
<?php
foreach ($vplay as $vplay_row) :
    $vp_id = $vplay_row->mediaid;
    $vp_stored = $this->Crud->get_stored_as($vp_id);
    ?>
                    "http://localhost/scr/crescent/Xibo/<?php echo $vp_stored; ?>",
    <?php
endforeach;
?>
            ];


            document.getElementById("b").onload = function () {

                var all_videos = videos.length;

                var source = document.createElement('source');

                function addSourceToVideo(element, src, type) {

                    source.src = src;
                    source.type = type;

                    element.appendChild(source);
                }

                var video = document.createElement('video');
                video.muted = true;
                video.controls = true;

                document.body.appendChild(video);

                if (all_videos === 1) {
                    addSourceToVideo(video, videos[0], 'video/ogg');
                    video.loop = true;

                    video.play();
                } else {
                    var i = 0;
                    addSourceToVideo(video, videos[i], 'video/ogg');
                    video.play();


                    video.addEventListener('ended', function () {
                        if (i < all_videos - 1) {
                            i++;
                        }else if(i === all_videos - 1){
                            i = 0;
                        }
                        
                        video.pause();

                        source.src = videos[i];
                        video.load();
                        video.play();
                    }, false);
                }
            }

        </script>

    </body>
</html>