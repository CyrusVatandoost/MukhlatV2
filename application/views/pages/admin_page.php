<?php
    include(APPPATH . 'views/header.php');
    $logged_user = $_SESSION['logged_user'];

    //check if current user is admin or logged in
    //if user is not an admin, redirect to home
    //if user is not logged in, redirect to sign in
    if($logged_user->role_id != 1 || $logged_user == null)
    {      
        $homeURL = base_url('home');
        header("Location: $homeURL");
    }

    $CI =&get_instance();
    $CI->load->library('user_agent');

    $mobile=$CI->agent->is_mobile();
?>
<?php if ($logged_user->role_id == 2): ?>
    <link rel="stylesheet" href="<?php echo base_url("/css/style.css"); ?>" />

<?php else: ?>
    <link rel="stylesheet" href="<?php echo base_url("/css/style_parentview.css"); ?>" />

<?php endif; ?>

<?php if($mobile):?>
    <!-- <script>alert('mobile!');</script> -->
    <style>

        body.sign-in
        {
            background-image: none;
            background-color: #f9f9f9;
            font-family: 'Cabin', 'Muli', sans-serif;
            height: 500px;
        }


        div.content-container{
            border:0px;
            background-color: #f9f9f9;
        }

    </style>
<?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Nav Bar -->
<nav class = "navbar navbar-default navbar-font navbar-fixed-top" style = "border-bottom: 1px solid #CFD8DC;">
    <div class = "container-fluid">
        
        <a class = "navbar-brand" href = "<?php echo base_url('home') ?>"><img id = "nav-logo" src = "<?php echo base_url('images/logo/mukhlatlogo_side_basic.png'); ?>"/></a>

        <?php if (!$mobile): ?>

            <ul class = "nav navbar-nav navbar-right pull-right" style = "margin-right: 5px;">
                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <!-- <img class = "img-rounded nav-prof-pic" src = "<?php echo $logged_user->profile_url ? base_url($logged_user->profile_url) : base_url('images/default.jpg') ?>"/>  -->
                        <?php echo $logged_user->first_name . " " . $logged_user->last_name; ?>
                        
                        <span class="caret"></span>
                    </a>                 
                
                    <ul class="dropdown-menu">
                        <li><a href = "#edit-profile-modal-admin" data-toggle = "modal"><i class = "fa fa-pencil"></i> Edit Profile</a></li>
                        <li><span style="color:white">______</span></li>
                        <li><a href="<?php echo base_url('signin/logout');?>"><i class = "glyphicon glyphicon-log-out" style="color:red"></i> Logout</a></li>

                    </ul>
                </li>
            </ul>

        <?php else: ?>
            <a href="#edit-profile-modal-admin" data-toggle = "modal" class = "btn btn-primary btn-md" style = "margin-right: 20px; margin-top: 10px; margin-bottom: 10px; background:#269588; border-color: #269588;">Edit Profile</a>
            <a href="#logout-modal-parents" data-toggle = "modal" class = "pull-right btn btn-primary btn-md" style = "margin-right: 20px; margin-top: 10px; margin-bottom: 10px; background:#c73838; border-color: #c73838;">Log Out</a>
                            
        <?php endif; ?>
                            
    </div>
    
</nav><br><br><br>

<body class = "sign-in">

    <div id = "admin-page" class = "container" style = "margin-top: 0px;">
        <div class = "row">
            <!-- Admin Header -->
            <div class = "col-md-8 col-md-offset-2 content-container container-fluid text-center" style = "margin-bottom: 0px;">
                <h3 class = "text-info no-margin" style = "display: inline-block; margin-top: 5px;"><strong><?php echo $logged_user->first_name . " " . $logged_user->last_name ?></strong></h3>
                
                <!-- <a href = "#create-announcement-modal" data-toggle = "modal" class = "btn btn-primary col-md-6 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" style="font-size:14px; margin-top: 15px;"><i class = "fa fa-globe"></i> Create Announcement</a>  -->

                <!-- <button id="crettop" class = "container col-md-6 btn btn-primary  textoutliner" href="#"  >Create Announcement</button> -->

                <!-- <a href = "<?php echo base_url('signin/logout'); ?>" class = "pull-right btn btn-primary btn-md" style = "margin-right: 20px;">Log Out</a> --><br><br>

                <!-- <a href = "<?php echo base_url('admin/network'); ?>" class = "btn btn-primary btn-block"><i class = "fa fa-globe"></i> View Interaction Network of Mukhlat</a> -->
                 
            </div>

            <!-- Admin Content -->
            <div class = "col-md-8 col-md-offset-0 col-sm-8 col-xs-12 col-md-offset-0 col-xs-offset-0 content-container row">


                <div class = "content-container container-fluid col-md-12 col-md-offset-0 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                    <ul class="nav nav-pills nav-justified" style="">
                        <li class="active"><a data-toggle="pill" href="#user-list-1">Children</a></li>
                        <li class=""><a data-toggle="pill" href="#user-list-2">Parents</a></li>
                        <li class=""><a data-toggle="pill" href="#user-list-3">Administrators</a></li>
                        <!-- <li class=""><a data-toggle="pill" href="#announcements">Announcements</a></li> -->
                    </ul>
                </div>

                <div class = "col-md-12 col-sm-12 col-xs-12 container-fluid tab-content">
                    <div id = "user-list-1" class = "list-group tab-pane fade in active ">
                        <?php foreach ($users as $user): 

                            if ($user->role_id === '2'):?>

                                <li class = "list-group-item admin-list-item container-fluid">
                                    <img src = "<?php echo $user->profile_url ? base_url($user->profile_url) : base_url('images/default.jpg') ?>" class = "no-padding pull-left img-circle" width = "45px" height = "45px"/> 

                                    <h4 class = "no-padding admin-list-name"><?php echo $user->first_name . " " . $user->last_name ?></h4>

                                    <?php if (!($user->is_enabled)):?>

                                        <?php if($user->parent === "" || !($user->parent)):?>
                                        <br><small class = "no-padding no-margin" style="color:red;"><b>(No Parent/Guardian Email)</small>

                                        <?php else:?>
                                        <br><small class = "no-padding no-margin">(Parent/Guardian: <?php echo $user->parent?>)</small>
                                                           
                                    <?php endif;?>
                                    
                                    <?php endif;?>
                                    <a value = "" href="<?php echo base_url('admin/activity/' . $user->user_id)?>" class = "btn-link btn-xs"> <i>View record</i></a>

                                    <?php
                                        if ($logged_user->user_id !== $user->user_id):
                                            if ($user->is_enabled): ?>
                                                <button type = "button" value = "<?php echo $user->user_id ?>" class = "toggle-account pull-right btn btn-danger admin-list-btn">Disable</button>
                                                
                                            <?php else: ?>
                                                <button type = "button" value = "<?php echo $user->user_id ?>" class = "toggle-account pull-right btn btn-success admin-list-btn">Enable</button>
                                            <?php
                                            endif;
                                        endif;
                                    ?>
                                </li>                                    
                       
                            <?php endif; ?> 

                        <?php endforeach; ?>
                    </div>

                    <div id = "user-list-2" class = "list-group tab-pane fade">
                        <?php foreach ($users as $user): 

                            if ($user->role_id === '3'):?>

                                <li class = "list-group-item admin-list-item container-fluid">
                                    <img src = "<?php echo $user->profile_url ? base_url($user->profile_url) : base_url('images/default.jpg') ?>" class = "no-padding pull-left img-circle" width = "45px" height = "45px"/> 

                                    <h4 class = "no-padding admin-list-name"><?php echo $user->first_name . " " . $user->last_name ?></h4>

                                    <a value = "" href="<?php echo base_url('admin/parent/' . $user->user_id)?>" class = " btn btn-link btn-xs"> <i>Children of <?php echo $user->first_name ?></i></a>

                                    <?php
                                        if ($logged_user->user_id !== $user->user_id):
                                            if ($user->is_enabled):
                                                ?>
                                                <button type = "button" value = "<?php echo $user->user_id ?>" class = "toggle-account pull-right btn btn-danger admin-list-btn">Disable</button>
                                            <?php else: ?>
                                                <button type = "button" value = "<?php echo $user->user_id ?>" class = "toggle-account pull-right btn btn-success admin-list-btn">Enable</button>
                                            <?php
                                            endif;
                                        endif;
                                    ?>
                                </li>                                    
                       
                            <?php endif; ?> 

                        <?php endforeach; ?>
                        
                    </div>

                    <div id = "user-list-3" class = "list-group tab-pane fade">
                        
                        <?php foreach ($users as $user): 

                            if ($user->role_id === '1'):?>

                                <li class = "list-group-item admin-list-item container-fluid">
                                    <img src = "<?php echo $user->profile_url ? base_url($user->profile_url) : base_url('images/default.jpg') ?>" class = "no-padding pull-left img-circle" width = "45px" height = "45px"/> 
                                    <h4 class = "no-padding admin-list-name"><?php echo $user->first_name . " " . $user->last_name ?></h4>
                                    
                                        <i class = "text-muted btn-sm no-padding"><?php echo ($logged_user->user_id === $user->user_id) ? '(You)' : '' ?></i>

                                    <?php
                                        if ($logged_user->user_id !== $user->user_id):
                                            if ($user->is_enabled):
                                                ?>
                                                <button type = "button" value = "<?php echo $user->user_id ?>" class = "toggle-account pull-right btn btn-danger admin-list-btn">Disable</button>
                                            <?php else: ?>
                                                <button type = "button" value = "<?php echo $user->user_id ?>" class = "toggle-account pull-right btn btn-success admin-list-btn">Enable</button>
                                            <?php
                                            endif;
                                        endif;
                                    ?>
                                </li>                                    
                       
                            <?php endif; ?> 

                        <?php endforeach; ?>
                    </div>

                    
                </div>
            </div>

            <div class = "col-md-4 col-sm-4 col-xs-12 col-md-offset-0 col-xs-offset-0 col-sm-offset-0 content-container row">
                <!-- <h3 style="margin-left: 15px">Announcements</h3> -->
                <br><h3 class = "text-info text-center user-activities-header col-md-offset-0">Announcements</h3><br>
                <form enctype = "multipart/form-data" action = "<?php echo base_url('topic/announcement'); ?>" id = "create-announcement-form" method = "POST">
                    <div class="form-group container-fluid" ><!-- check if description exceeds n words-->
                        <!--<label for = "content">Make the content of your post:</label>-->
                        <!--<p class="lead emoji-picker-container">-->
                        <textarea class = "form-control" style="height: 100px;" maxlength = "200" required name = "announcement_content" id = "announcement-content" placeholder = "Write your announcement here:" ></textarea>
                        <!-- <p id="charsRemaining4">Characters Left: 16000</p> -->
                        
                        <div class = "modal-footer" style = "">
                            <button id = "create-announcement-btn" class ="btn btn-primary buttonsbgcolor" data-toggle = "modal" >Share</button>
                        </div>

                    </div>
                    
                    
                    
                </form>  

                <div id = "announcements" class = "list-group  content-container container-fluid">
                    <?php 
                        //load models
                        $CI->load->model('topic_model');
                        $CI->load->model('user_model');

                        //get announcements
                        $announcements = $CI->topic_model->get_announcements();

                        //get teacher's details for each announcement
                        foreach (array_reverse($announcements) as $announcement):

                            $details = $CI->user_model->view_adult($announcement->user_id);

                            foreach ($details->result() as $teacher) //store teacher's details in array
                                $data['user'] = $CI->user_model->get_details(true, true, array('user_id' => $announcement->user_id));
                            
                    ?>

                        <li class = "list-group-item admin-list-item">
                            <!-- <?php echo ($logged_user->user_id === $teacher->user_id) ? 'You:' : $teacher->first_name ?> -->
                            <!-- <h5 class = "no-padding admin-list-name">Teacher <?php echo $teacher->first_name?> says: </h5> -->

                            <i class = "pull-left"><?php echo ($logged_user->user_id === $teacher->user_id) ? 'You:' : $teacher->first_name." ".$teacher->last_name.":" ?></i>
                            <i class = "pull-right">(<?php echo date_format(date_create($announcement->date),"M d Y - H:i");?>)</i>
                            

                            <br><br><h4 class = "no-padding admin-list-name">"<?php echo $announcement->announcement ?>"</h4>
                        </li>                                    
                   
                    <?php endforeach; ?>
                </div>

                 
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url("/js/admin.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("/js/search.js"); ?>"></script>

</body>
</html>

<?php
    //include(APPPATH . "views/modals/user_record_modal.php");
    // include(APPPATH . 'views/modals/create_announcement_modal.php');

    include(APPPATH . 'views/modals/edit_profile_modal_admins.php');
    include(APPPATH . 'views/modals/logout_confirm_modal_parents.php');
?>