
<?php
    include(APPPATH . 'views/header.php');
        
    //check if current user is child or logged in
    //if user is not a child, redirect to home
    //if user is not logged in, redirect to sign in
    $logged_user = $_SESSION['logged_user'];
    if($logged_user->role_id != 2 || $logged_user == null)
    {
        $homeURL = base_url('');
        header("Location: $homeURL");
    }

    $CI =&get_instance();
    $CI->load->model('chat_model');

    $users = $CI->chat_model->get_users($logged_user->user_id);
    $otherchats = $CI->chat_model->get_chats($logged_user->user_id);

    
?>
<script type="text/javascript">
    
    
    
</script> 

<!-- loads chat.js -->
<script type="text/javascript" src="<?php echo base_url("js/chat.js"); ?>"></script>

<link rel="icon" href="<?php echo base_url('./images/logo/mukhlatlogo_icon.png'); ?>" sizes="32x32">

<style type="text/css">
#chat_name{
    text-align:center;
    height:5%;
}
#chat_viewport{
    height: 95%;
    border : 1px solid black;
    overflow-y:scroll;
}
#chats_box{
    height: 100%;
  border: 3px solid blue;
  overflow-y:scroll;
}
span.chat_header{
    font-size:0.7em;
    color:#696969;
}
p.message_content{
    color:black;
    margin-top:0px;
    margin-bottom:5px;
    padding-left:10px;
    padding-right:0px;
}
li.by_current_user span.chat_header{
    color:white;
}
li.by_current_user p.message_content{
    color:white;

}
li.other_user{
    text-align: left;
    border-radius: 10px;
    border: 2px solid #73AD21;
    padding: 3px;
    width:70%;
    float:left;
    margin-top:5px;
    margin-bottom:5px;
}

li.by_current_user {
    text-align: right;
    border-radius: 10px;
    background: #73AD21;
    padding: 3px;
    width:70%;
    float:right;
    margin-top:5px;
    margin-bottom:5px;

}
#chat_viewport ul{
    list-style-type:none;
}

.chat_inst{
    border:1px solid gray;
    width:100%;
    min-height:20%;
}
#chat_popup{
    height: 100%;
  width: 100%;
  display: none;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(220,220,220);
  background-color: rgba(220,220,220, 0.5);
}

.closebtn {
  position: absolute;
  top: 20%;
  right: 20%;
  font-size: 60px;
}

.popup_content{
    position: relative;
  top: 25%;
  width: 50%;
  text-align: center;
  margin-top: 30px;
  border:3px solid blue;
  margin:auto;
  height:50%;
  background-color:white;
  
}
.user_container{
    border:3px solid black;
    overflow-y:scroll;
    height:95%;
}
.userbox{
    border:3px solid green;
    height:20%;
    width:100%;
}

</style>

<body onload="scrolldown()">
    <?php include(APPPATH . 'views/navigation_bar.php');?>
    <div style="width: 100%; overflow: hidden ;margin-top: 60px;height:90vh;">
    <div id="chats_box"style="width: 20%; float: left;">
    
    <button id="addchat" style="width:100%;min-height:10%;" onclick="openpopup()">Send New Message</button>

    <!-- displays chat instances of current user left sidebar , on click changes current child chatting with-->
    <?php foreach ($otherchats as $chats): 
        $other_user = $CI->chat_model->get_other_user($chats->chat_id, $logged_user->user_id);?>
        <?php foreach ($other_user as $others):
        $other_user_name = $CI->chat_model->get_name($others->other_user);?>
            <?php foreach ($other_user_name as $others_name):?>
                <button class="chat_inst" value="<?php echo utf8_decode($chats->chat_id); ?>" onclick="changechat(<?php echo utf8_decode($chats->chat_id); ?>)"> <?php echo utf8_decode($others_name->name); ?></button>

            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </div>
    <div style="width: 80%; float: right;height: 95%;">
    <div id="chat_name"></div>
    <div id="chat_viewport">
    </div>

    <div id="chat_input" >
        <input id="chat_msg" name="chat_msg" type="text" value="" tabindex="1" placeholder="Type here" style="width:90%"/>
        <?php echo anchor('chat#', 'send', array('title'=>'send', 'id' => 'submit_msg', 'onclick' => 'scrolldown()'));?>
        <div class="clearer"></div>
    </div>
    </div>
    </div>

    <div id="chat_popup" ><a href="javascript:void(0)" class="closebtn" onclick="closepopup()">&times;</a>
    <div class="popup_content">Chat with:
    <div class="user_container">
    <!-- displays all kids and on click creates an instance of the chat and adds into tbl_chats -->
    <?php foreach ($users as $usernames): ?>
    <button class="userbox" value="<?php echo utf8_decode($usernames->user_id); ?>" onClick="window.location.reload();"> <?php echo utf8_decode($usernames->name); ?> </button>
    <?php endforeach; ?>

    
    </div>
    </div>
    </div>
    <script>
    var chat_id = "<?php echo $chat_id?>";
    
    var sender_id = "<?php echo $sender_id?>";
        function openpopup() {
            document.getElementById("chat_popup").style.display = "block";
        }

        function closepopup() {
            document.getElementById("chat_popup").style.display = "none";
        }

        function scrolldown(){
            document.getElementById("chat_viewport").scroll({
                top:1000000000,
                behavior:'smooth'
            });
        }
        function changechat(chatid){
            chat_id = chatid;
        }
    </script>
</body>