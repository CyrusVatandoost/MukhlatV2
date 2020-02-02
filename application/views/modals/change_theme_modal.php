<link href="<?php echo base_url('lib/css/emoji.css'); ?>" rel="stylesheet">

<!-- Create Topic Modal -->
<div id="edit-topic-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Create Topic Modal Content-->
        <div class="modal-content" id="text">
            <div class="modal-header modal-heading modalbg notetextfix">
                <button type="button" class="close" style = "padding: 5px;" data-dismiss="modal">&times;</button>
                <h4 class="modal-title textoutliner"><strong>Choosing your room style</strong></h4>
            </div>
            <form enctype = "multipart/form-data" id = "create-topic-form" action = "topic/create" method = "POST">
                <div class="modal-body">
                    <div class="form-group" style="display:none;"><!-- check if title is already taken -->
                        <label for = "title">Make a title for your topic:</label>
                        <p class="lead emoji-picker-container">
                            <input type="text" style="height: 50px;" required class="form-control" name = "topic_name" maxlength="35" id = "topic-title" placeholder = "Title of your topic"  value="<?php echo $logged_user->first_name?>"/></p>
                        <p id="charsRemaining1">Characters Left: 35</p>
                        <div class="charLimitMessage" id="charLimitMessage1"><center>Oops! You've used up all the letters and numbers for your title!</center></div>
                    </div>
                    <div class="form-group" style="display:none;"><!-- check if description exceeds n words-->
                        <label for = "description">Make a description for your topic:</label>
                        <p class="lead emoji-picker-container">
                            <textarea class = "form-control" style="height: 100px;" required name = "topic_description" maxlength="180" id = "topic-description" placeholder = "Tell something about your topic!"  value=" "> </textarea></p>
                        <p id="charsRemaining2">Characters Left: 180</p>    
                        <div class="charLimitMessage" id="charLimitMessage2"><center>Oops! You've used up all the letters and numbers for your topic!</center></div>
                    </p>
                    </div>
                    <div class="profanityWarning" id="profanityWarning"><center>Hey there! It looks like you used a bad word!</center></div>
                    <br>
<!--                     <div id = "attachment-buttons" class = "form-group">
                    <label id = "img-label" class="btn btn-primary buttonsbgcolor">
                            <input id = "attach-img" accept = "image/*" type="file" name = "topic_image" style = "display: none;">
                            <p id = "image-text2" class = "attach-btn-text"><i class = "fa fa-file-image-o"></i> Add Cover Image</p>
                        </label>
</div>-->
<strong style="font-size: 24px;">Change up your room style</strong>
<div class="themesmodal">
    <table>
        <tr>
            <td><div  class="editroomthemes roomtheme-arrow blocks2" style="" onclick="roomtheme(1)"></div></td>
            <td><div  class="editroomthemes roomtheme-zigzag blocks2" style="" onclick="roomtheme(2)"></div></td>
            <td><div  class="editroomthemes roomtheme-scales blocks2" style="" onclick="roomtheme(3)"></div></td>
            <td><div  class="editroomthemes roomtheme-halfrhombe blocks2" style="" onclick="roomtheme(4)"></div></td>
        </tr>
        <tr>
            <td><div  class="editroomthemes roomtheme-marrakesh blocks2" style="" onclick="roomtheme(5)"></div></td>
            <td><div  class="editroomthemes roomtheme-hearts blocks2" style="" onclick="roomtheme(6)"></div></td>
            <td><div  class="editroomthemes roomtheme-stars blocks2" style="" onclick="roomtheme(7)"></div></td>
            <td><div  class="editroomthemes roomtheme-seigaiha blocks2" style="" onclick="roomtheme(8)"></div></td>
        </tr>
        <tr>
            <td><div  class="editroomthemes roomtheme-bricks blocks2" style="" onclick="roomtheme(9)"></div></td>
            <td><div  class="editroomthemes roomtheme-diacheckerboard blocks2" style="" onclick="roomtheme(10)"></div></td>
            <td><div  class="editroomthemes roomtheme-tablecloth blocks2" style="" onclick="roomtheme(11)"></div></td>
            <td><div  class="editroomthemes roomtheme-brady blocks2" style="" onclick="roomtheme(12)"></div></td>
        </tr>
        <tr>
            <td><div  class="editroomthemes roomtheme-argyle blocks2" style="" onclick="roomtheme(13)"></div></td>
            <td><div  class="editroomthemes roomtheme-shippo blocks2" style="" onclick="roomtheme(14)"></div></td>
            <td><div  class="editroomthemes roomtheme-waves blocks2" style="" onclick="roomtheme(15)"></div></td>
            <td><div  class="editroomthemes roomtheme-polkadot blocks2" style="" onclick="roomtheme(16)"></div></td>
        </tr>
        <tr>
            <td><div  class="editroomthemes roomtheme-honeycomb blocks2" style="" onclick="roomtheme(17)"></div></td>
            <td><div  class="editroomthemes roomtheme-chocolateweave blocks2" style="" onclick="roomtheme(18)"></div></td>
            <td><div  class="editroomthemes roomtheme-crosseddot blocks2" style="" onclick="roomtheme(19)"></div></td>
        </tr>
    </table>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  
    <div class="hider"><br><br></div>
                    <select style="width:110px; height:40px;display: none"  class="form-control" name="change_topic_theme" id="change-topic-theme" onclick="">
                        <option value="1">Theme 1</option>
                        <option value="2">Theme 2</option>
                        <option value="3">Theme 3</option>
                        <option value="4">Theme 4</option>
                        <option value="5">Theme 5</option>
                        <option value="6">Theme 6</option>
                        <option value="7">Theme 7</option>
                        <option value="8">Theme 8</option>
                        <option value="9">Theme 9</option>
                        <option value="10">Theme 10</option>
                        <option value="11">Theme 11</option>
                        <option value="12">Theme 12</option>
                        <option value="13">Theme 13</option>
                        <option value="14">Theme 14</option>
                        <option value="15">Theme 15</option>
                        <option value="16">Theme 16</option>
                        <option value="17">Theme 17</option>
                        <option value="18">Theme 18</option>
                        <option value="19">Theme 19</option>
                    </select>

                </div>

                <select style="width:150px; height:40px;display: none"  class="form-control" name="change_topic_nameframe" id="change-topic-nameframe" onclick="">
                    <option value="1">nameframe 1</option>
                    <option value="2">nameframe 2</option>
                    <option value="3">nameframe 3</option>
                    <option value="4">nameframe 4</option>
                    <option value="5">nameframe 5</option>
                </select>

                <select style="width:150px; height:40px;display: none"  class="form-control" name="change_topic_board" id="change-topic-board" onclick="">
                    <option value="1">board 1</option>
                    <option value="2">board 2</option>
                    <option value="3">board 3</option>
                    <option value="4">board 4</option>
                    <option value="5">board 5</option>
                </select>

                <select style="width:150px; height:40px;display: none"  class="form-control" name="change_topic_bulletin" id="change-topic-bulletin" onclick="">
                    <option value="1">bulletin 1</option>
                    <option value="2">bulletin 2</option>
                    <option value="3">bulletin 3</option>
                    <option value="4">bulletin 4</option>
                    <option value="5">bulletin 5</option>
                </select>

                <select style="width:150px; height:40px;display: none"  class="form-control" name="change_topic_shoutout" id="change-topic-shoutout" onclick="">
                    <option value="1">shoutout 1</option>
                    <option value="2">shoutout 2</option>
                    <option value="3">shoutout 3</option>
                    <option value="4">shoutout 4</option>
                    <option value="5">shoutout 5</option>
                </select>

                <select style="width:150px; height:40px;display: none"  class="form-control" name="change_topic_media" id="change-topic-media" onclick="">
                    <option value="1">media 1</option>
                    <option value="2">media 2</option>
                    <option value="3">media 3</option>
                    <option value="4">media 4</option>
                    <option value="5">media 5</option>
                </select>

                <select style="width:150px; height:40px;display: none"  class="form-control" name="change_topic_chatbox" id="change-topic-chatbox" onclick="">
                    <option value="1">chatbox 1</option>
                    <option value="2">chatbox 2</option>
                    <option value="3">chatbox 3</option>
                    <option value="4">chatbox 4</option>
                    <option value="5">chatbox 5</option>
                </select><br>

                <div class = "" style = "padding: 5px; border-top: none; padding-bottom: 10px; padding-right: 10px;text-align: center;transform: scale(2);">
                    <button onmouseenter="playclip()" value = "<?php echo $c_topic->topic_id ?>" id = "edit-topic-save" class = "btn btn-primary btn-sm buttonsbgcolor">Done!</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
    
    <script>
        function roomtheme(v){
            $('[id$=change-topic-theme]').val(v);
        }
    </script>