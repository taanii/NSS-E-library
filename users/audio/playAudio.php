<?php

$fname = $_GET['name'];

$filepath = "files" . DIRECTORY_SEPARATOR . "audios" . DIRECTORY_SEPARATOR . $fname;	// audio filepath
//readfile($filepath);
//header('Content-type: application/mpeg');
//header('Content-length: '.filesize($filepath));
//header('Content-Dispostion: inline; filename: "'.$fname.'"');
//readf($filepath);
//echo '<embed src="'.$filepath.' type="audio/mpeg" controls></embed>';


?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $fname; ?></title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="../../css/playAudio.css">
</head>

<body onload="loadAudioPlayer()">

	<!--- AUDIO FILE NAME --->
	<div class="container" id="container1">
		<br>
		<h2><?php echo $fname; ?></h2>
	</div>

	<!--- AUDIO ELEMENT --->
	<audio id="audio-ele" onended="pauseAudio()">
		<source src="<?php echo $filepath; ?>" type="audio/mpeg">
	</audio>

	<!--- AUDIO CONTROLS --->
	<div class="container" id="container2">
		<br>
		<output id="current-time"></output>
		<input type="range" min="0" value="0" class="slider" id="au-time-slider" onchange="sliding()" width="100%">
		<output id="endTime"></output><br>
		<button onclick="changeStatus()" type="button" id="ctrl-btn">
			<i class="fas fa-play-circle" id="ctrl-icon"></i>
		</button>
	</div>

	<script>
		// Global variables

		var audio           = document.getElementById("audio-ele"); 		// audio element
		var ctrl_btn        = document.getElementById("ctrl-btn"); 			// control button
		var ctrl_icon       = document.getElementById("ctrl-icon"); 		// icon of control button
		var curr_time_label = document.getElementById("current-time") 		// label to show current time
		var au_time_slider  = document.getElementById("au-time-slider") 	// audio time slider
		var endtime_label   = document.getElementById("endTime") 			// label to show end time
		var update_interval = 500; 											// interval for updating time
		var time_updater;													// variable for assigning current time updater

		// Audio Player Functions

		function showEndTime(audio_length) {
			/* Shows total duration of current playing audio and sets max value of range input */
			end_min             = Math.floor( audio_length / 60 );			// calculates minute value of total duration of audio
			end_sec             = parseInt( audio_length % 60);				// calculates second value of total duration of audio
			end_time            = end_min + ":" + end_sec;					// concatenates minutes and seconds 
			au_time_slider.max  = Math.floor( audio_length );				// set max value of range input in seconds
			endtime_label.value = end_time;									// assigns concatenated end time to label values
		}

		function playAudio() {
			/*** Performs actions required before playing ***/
			audio.play(); 													// plays audio element
			ctrl_icon.className = 'fas fa-pause-circle'; 					// shows fontawesome pause icon
			time_updater = setInterval(showCurrTime, update_interval)		// updates current time depending on update interval time
		}

		function pauseAudio() {
			/*** Perform actions required for pausing audio ***/
			audio.pause(); 													// pauses audio element
			ctrl_icon.className = 'fas fa-play-circle'; 					// show fontawesome play icon
			clearInterval( time_updater ); 									// stops current time updater
		}

		function sliding() {
			/* when user slides to change in range input element*/
			clearInterval(time_updater);									// stops current time updater
			audio.currentTime = au_time_slider.value;						// change current time according to range input(slider)
			playAudio();													// performs action required for playing audio
		}

		function changeToPlay() {
			document.alert("Song has ended.");
		}

		function showCurrTime() {
			/*** Calculates and Shows current time of audio ***/
			curr_time = parseInt(audio.currentTime)							// Convert current time from Float to int
			min_count = Math.floor(curr_time / 60);							// calculates minutes as current time is seconds
			sec_count = curr_time % 60;										// calculates second value corresponding to minute value
			if (sec_count < 10) sec_count = '0' + sec_count.toString();		// if second value is less than 10 than add '0' in front of second
			curr_time_label.value = min_count + ':' + sec_count;			// show current time on label in format "m : ss"
			au_time_slider.value = parseInt(audio.currentTime);				// updates slider to current time
		}

		function loadAudioPlayer() {
			/*** Performs action required for loading audio player ***/
			showCurrTime();														// show Current time
			audio.onloadeddata = function(){ showEndTime(audio.duration) } ;	// load metadata and then show end duration
		}

		function changeStatus() {
			/*** Changes status of audio from playing to pause and vice-versa,
			 ***  when control button is clicked ***/
			var is_paused = audio.paused;										// returns true if audio is paused
			if (is_paused) {													// plays audio if audio is paused
				playAudio();													// performs action for playing audio
			} else {															// if audio is playing then pause it
				pauseAudio(); 													// Perform action for pausing audio
			}
		}
	</script>

</body>

</html>