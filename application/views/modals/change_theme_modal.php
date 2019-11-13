<link href="<?php echo base_url('lib/css/emoji.css'); ?>" rel="stylesheet">

<!-- Create Topic Modal -->
<div id="edit-topic-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Create Topic Modal Content-->
        <div class="modal-content" id="text">
            <div class="modal-header modal-heading modalbg notetextfix">
                <button type="button" class="close" style = "padding: 5px;" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Choosing your room style</strong></h4>
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
                    <select style="width:110px; height:40px"  class="form-control" name="change_topic_theme" id="change-topic-theme" onclick="">
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
                <div class = "modal-footer" style = "padding: 5px; border-top: none; padding-bottom: 10px; padding-right: 10px;">
                    <button onmouseenter="playclip()" value = "<?php echo $c_topic->topic_id ?>" id = "edit-topic-save" class = "btn btn-primary btn-sm">Save</button>
                </div>
            </form>
            
        </div>
    </div>
</div>