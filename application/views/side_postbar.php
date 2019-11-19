<?php
$logged_user = $_SESSION['logged_user'];
    
?>
    
<!-- Sidebar -->
<div style = "margin-left: 3.5%;float: right;right: 1%;position: fixed;top:9%;">
    <!--<div class = "home-sidebar content-container" style="background:darkgray;">-->
    <!--Header-->

    <!-- Topic Post List -->
                    
    <div class = "topic-post-list" style="width:320px">
        <!--<div class = "list-group" style = "padding-top: 15%">-->
           <!--List Entry--> 
           <?php
           foreach ($c_topic->posts as $post):
                                    if($post->reply==1):
            ?>
            <!--<a href = "javascript: void(0);" class = "btn btn-link list-group-item list-entry no-up-down-pad topic-post-entry" data-value = "<?php echo $post->post_id; ?>">-->
          
           <!--if logged user sent the message-->
           <?php if ($post->user->user_id === $logged_user->user_id): ?> 
           <div class = "col-xs-9 messagesender">
          
          <!--if another user sent message-->
           <?php else: ?> 
           <div class = "col-xs-9 messagereceiver">
           <?php endif;?>
            
            <div>
                <a href="<?php echo base_url('user/profile/' . $post->user_id); ?>"><img class = "img-circle nav-prof-pic iconin" src = "<?php echo $post->user->profile_url ? base_url($post->user->profile_url) : base_url('images/default.jpg'); ?>"/></a>
                <h4 class = "ellipsis"><strong><?php echo utf8_decode($post->post_title); ?></strong> 
                    <small><a href="<?php echo base_url('user/profile/' . $post->user_id); ?>"><?php echo $post->user->first_name . " " . $post->user->last_name; ?></a></small></h4>
                <p style="white-space: pre-wrap;"><?php echo utf8_decode($post->post_content); ?></p>
            </div>
        <!--                                    <div class = "col-xs-3 text-center" style = "padding: 0px;">
        <p style = "padding-top: 10px; font-size: 18px !important;color: #78909C;"><i><?php echo date("F d, Y", strtotime($post->date_posted)); ?></i></p>
        </div>-->
        

        <?php $attachments = $CI->attachment_model->get_post_attachments($post->post_id);

                        // print_r($attachments);

        foreach ($attachments as $attachment):
            if ($attachment->attachment_type_id === '1'):?>
                <img src = "<?= base_url($attachment->file_url); ?>" width="200px"/>

                <?php elseif ($attachment->attachment_type_id === '2'): ?>
                <audio src = "<?= base_url($attachment->file_url); ?>" style="width:200px"  controls></audio>

                    <?php elseif ($attachment->attachment_type_id === '3'): ?>
                        <video src = "<?= base_url($attachment->file_url); ?>" width = "200px" controls/></video>

                        <?php elseif ($attachment->attachment_type_id === '4'): ?>
                            <a href = "<?= base_url($attachment->file_url); ?>" download><i class = "fa fa-file-o"></i> <i class = "text" style = "font-size: 12px;"><?= utf8_decode($attachment->caption); ?></i></a>

                            <?php 

                        endif;
                    endforeach;
                    
                    ?> 
                    </div>
                    <!--                                </a>-->
                    <?php 
                endif;
                endforeach; ?>
                <!--</div>-->
            </div>
        <div>
            
                <button onmouseenter="playclip()" onclick="toggleButton('reply')" id="crettop" class = "btn btn-primary buttonsbgcolor textoutliner" href="#create-post-modal" data-toggle = "modal" style="font-size:22px">Say something</button>
           
        </div>
    
</div>

<!-- SCRIPTS -->
<!-- END SCRIPTS -->
<!-- End Sidebar -->