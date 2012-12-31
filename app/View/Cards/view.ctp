<!--nocache-->
<?php $this->set('nickname', $user['User']['User_Nickname']); ?>

<?php $user = ClassRegistry::init('User'); ?>

<?php $sender = $user->find('first', array('conditions' => array('User.User_Email' => $card['Card']['Card_Owner']))); ?>

<?php if(($card['Card']['Card_Music'] != "") || ($card['Card']['Card_Voice'] != "") || ($card['Card']['Card_Effect'] != "")):?>

	<?php 
        echo $this->Html->script(array('jquery','jquery.jplayer.min')); 
    ?>
    
    <?php
		//the card duration viewing.
        $duration = $card['Card']['Card_Length'];
        $minutes = (int) $duration/60;
        $seconds = $duration%60;
        
        if($minutes < 1 ){
            $minutes = '00';
        }
        
        else if($minutes<2){
            $minutes = '01';	
        }
        
        else if($minutes<3){
            $minutes = '02';
        }
        
        else if($minutes<4){
            $minutes = '03';	
        }
        
        else{
        	$minutes = (string) $minutes;
        }
        
        if($seconds == 1){
            $seconds = '01';	
        }
        
        else if($seconds == 2){
            $seconds = "02";	
        }
        
        else if($seconds == 3){
            $seconds = "03";
        }
        
        else if($seconds == 4){
            $seconds = "04";
        }
        
        else if($seconds == 5){
            $seconds = "05";
        }
        
        else if($seconds == 6){
            $seconds = "06";
        }
        
        else if($seconds == 7){
            $seconds = "07";
        }
        
        else if($seconds == 8){
            $seconds = "08";
        }
        
        else if($seconds == 9){
            $seconds = "09";
        }
        
        else if($seconds == 0){
            $seconds = "00";	
        }
        
        else{
            $seconds = (string) $seconds;
        }
		
		// You sure you want to do this?
		// $fadeintime = 3;
		// $fadeouttime = 1;
		// $maxmusic = 0.8;
		// $maxbgm = 0.5;
		// $maxvoice = 1.0;
		// $increaseMusic = $maxmusic/($fadeintime*4);
		// $increaseBGM = $maxBGM/($fadeintime*4);
		// $increaseVoice = $maxVoice/($fadeintime*4);
		// $decreaseMusic = $maxmusic/($fadeouttime*4);
		// $decreaseBGM = $maxBGM/($fadeouttime*4);
		// $decreaseVoice = $maxVoice/($fadeouttime*4);
		//
		//
		//
		// set all volume to 0
		// when time reaches start time & current time is less than start time + fadein time, increase the volume by $increaser
		// when time reaches start time & volume is less than max volume, increase volume by $increaser
		//
		// when time reaches endtime - fadeouttime & current time is less than end time, decrease the volume by $decreaser
		// when time reaches endtime - & volume is more than 0, decrease volume by $decreaser
    ?>
    
    <script type="text/javascript">
    
	// variable to determine whether or not the music is already played, set on true to prevent autostarting components at 00:00
    var played = true;
    
    $(document).ready(function(){
        
        $("#jquery_jplayer_main").jPlayer({
            ready: function (event){
                $(this).jPlayer("setMedia", {
                    mp3: '<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot/Music/Empty Sound.mp3'?>',
                });
            },
            
            swfPath: '<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot/js' ?>',
            supplied: 'mp3',
            cssSelectorAncestor: "",
            cssSelector: {
                play: "#play",
                pause: "#pause",
                stop: "#stop",
                mute: "#mute",
                unmute: "#unmute",
                currentTime: "#currentTime",
                duration: "#duration"
            }
        });
        
        <?php if($card['Card']['Card_Music'] != ""):?>
			$("#jquery_jplayer_Music").jPlayer({
				ready: function (event){
					$(this).jPlayer("setMedia", {
						mp3: '<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot/Music/'.$card['Card']['Card_Music'].'.mp3'?>',
					});
				},
					
				swfPath: '<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot/js' ?>',
				supplied: 'mp3',
				volume: 0.8
			});
        <?php endif; ?>
        
        
		<?php if($card['Card']['Card_Effect'] != ""):?>
			$("#jquery_jplayer_BGM").jPlayer({
				ready: function (event){
					$(this).jPlayer("setMedia", {
						mp3: '<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot/Music/'.$card['Card']['Card_Effect'].'.mp3'?>',
					});
				},
				
				swfPath: '<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot/js' ?>',
				supplied: 'mp3',
				volume: 0.5
				});
		<?php endif; ?>
        
		<?php if($card['Card']['Card_Voice'] != ""):?>    
			$("#jquery_jplayer_Voice").jPlayer({
				ready: function (event){
					$(this).jPlayer("setMedia", {
						wav: '<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot/'.$card['Card']['Card_Voice']?>',
					});
				},
				
				swfPath: '<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot/js' ?>',
				supplied: 'wav',
				volume: 1.0
				});
		<?php endif;?>
        
        $('#jquery_jplayer_main').bind($.jPlayer.event.timeupdate, function(event) {
            
            <?php if($card['Card']['Card_Music'] != ""):?>
				if (event.jPlayer.status.currentTime >= <?php echo $card['Card']['Card_Music_StartTime'] ?> && !played) {
					playMusic();
				}
            <?php endif;?>
			
            <?php if($card['Card']['Card_Effect'] != ""):?>
				if (event.jPlayer.status.currentTime >= <?php echo $card['Card']['Card_Effect_StartTime'] ?> && !played) {
					playBGM();
				}
			<?php endif;?>
            
			<?php if($card['Card']['Card_Voice'] != ""):?>
				if (event.jPlayer.status.currentTime >= <?php echo $card['Card']['Card_Voice_StartTime'] ?> && !played){
					playVoice();	
				}
			<?php endif;?>
            
            <?php if($card['Card']['Card_Music'] != ""):?>
				if (event.jPlayer.status.currentTime >= Number(<?php echo $card['Card']['Card_Music_StartTime'] ?>) + Number(<?php echo $card['Card']['Card_Music_Length'] ?>)){
					
					$("#jquery_jplayer_Music").jPlayer("stop");
				}
            <?php endif; ?>
            
			<?php if($card['Card']['Card_Effect'] != ""):?>
				if (event.jPlayer.status.currentTime >= Number(<?php echo $card['Card']['Card_Effect_StartTime'] ?>) + Number(<?php echo $card['Card']['Card_Effect_Length'] ?>)){
					
					$("#jquery_jplayer_BGM").jPlayer("stop");
				}
			<?php endif; ?>
            
			<?php if($card['Card']['Card_Voice'] != ""):?>
				if (event.jPlayer.status.currentTime >= Number(<?php echo $card['Card']['Card_Voice_StartTime'] ?>) + Number(<?php echo $card['Card']['Card_Voice_Length'] ?>)){
					
					$("#jquery_jplayer_Voice").jPlayer("stop");
				}
			<?php endif; ?>
            
            if (event.jPlayer.status.currentTime >= <?php echo $card['Card']['Card_Length'] ?>) {
                $("#jquery_jplayer_main").jPlayer("stop");
                
                <?php if($card['Card']['Card_Music'] != ""):?>
                	$("#jquery_jplayer_Music").jPlayer("stop");
                <?php endif; ?>

                <?php if($card['Card']['Card_Effect'] != ""):?>
                	$("#jquery_jplayer_BGM").jPlayer("stop");	
				<?php endif;?>

				<?php if($card['Card']['Card_Voice'] != ""):?>
                	$("#jquery_jplayer_voice").jPlayer("stop");
                <?php endif; ?>
				
                played = true;
            }
            
        });
        
        function playMusic(){
            $("#jquery_jplayer_Music").jPlayer("play");
        }
        
        function playBGM(){
            $("#jquery_jplayer_BGM").jPlayer("play");
        }
        
        function playVoice(){
            $("#jquery_jplayer_Voice").jPlayer("play");
        }
        
        $("#myPlayButton").click( function() {
            played = false;
            $("#jquery_jplayer_main").jPlayer("play");
        });
        
        $("#myStopButton").click( function() {
            
            played = true;
            
            $("#jquery_jplayer_main").jPlayer("stop");
            
            <?php if($card['Card']['Card_Music'] != ""):?>
        	    $("#jquery_jplayer_Music").jPlayer("stop");
            <?php endif; ?>
            
			<?php if($card['Card']['Card_Effect'] != ""):?>
    	        $("#jquery_jplayer_BGM").jPlayer("stop");		
			<?php endif; ?>
			
			<?php if($card['Card']['Card_Voice'] != ""):?>
	            $("#jquery_jplayer_Voice").jPlayer("stop");
			<?php endif; ?>
        });
    });
    
    </script>
    
    <div id="jquery_jplayer_main"></div>
    
	<?php if($card['Card']['Card_Music'] != ""):?>
    	<div id="jquery_jplayer_Music"></div>
    <?php endif; ?>
    
    <?php if($card['Card']['Card_Effect'] != ""):?>
    	<div id="jquery_jplayer_BGM"></div>
    <?php endif; ?>
    
    <?php if($card['Card']['Card_Voice'] != ""):?>
    	<div id="jquery_jplayer_Voice"></div>
	<?php endif; ?>

<? endif; ?>

<div align="center">
    <div id="picturecontainer" align="center">
        <div id="picture">
            <?php $path = 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot';
            echo $this->Html->image($path.($card['Card']['Card_Photo']), array('border' => 0));
            ?>	
        </div>
        <?php if(($card['Card']['Card_Music'] != "") || ($card['Card']['Card_Voice'] != "") || ($card['Card']['Card_Effect'] != "")):?>
        <div id="startstopbutton" align="center">
         
            <span id="image">
                <a href="javascript:;" id="myPlayButton"><?php echo $this->Html->image('playbutton.png') ?></a>
                <a href="javascript:;" id="myStopButton"><?php echo $this->Html->image('stopbutton.png') ?></a>
        	</span>
          
           <span id="timer" >
                <span style="font-weight:bold;">
                    <span id="currentTime"></span>
                 </span>
                 / <?php echo $minutes.':'.$seconds; ?>
			</span>
        
        </div>
        <?php endif; ?>
    </div>
</div>
<div align="center">
    <div align="left" id="detailcontainer">
        <h1><?php echo ($card['Card']['Card_Text']); ?></h1>
        <div id="cardtext">
            <?php echo $sender['User']['User_Nickname'];?>'s Card
            <p>Created on <?php echo ($card['Card']['Card_Date']); ?></p>
        </div>
    </div>
</div>
<!--/nocache-->