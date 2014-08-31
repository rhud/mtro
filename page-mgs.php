<?php
/*
Template Name: MOTIVATIONAL GIFTS SURVEY
*/
?>

<div id="mgs">
	<div class="wrap intro" role="document">	
		<div class="container">
			<h1>MOTIVATIONAL GIFTS SURVEY</h1>
			<blockquote>
				<h3>Personal Details</h3>
				<p>Before we begin, please enter your name and email address below. Don't worry, we take your privacy seriously and won't save any of your details. This is simply so we can email your results to you.</p>
				<div class="form-group contact">
					<input type="name" class="form-control name" placeholder="Enter Name" value="">
				</div>
				<div class="input-group contact">
				  	<div class="input-group-addon">@</div>
				  		<input class="form-control email" type="email" placeholder="Enter Email" value="">
				</div>
				<br />
				<div class="checkbox vol">
				  <label>
				    <input type="checkbox" id="vol" value="1">
				    I am a volunteer at METRO Church Toowoomba.
				  </label>
				</div> 
				<p>If you check the above box, your survey results along with your name and email address will be also sent to METRO Church Toowoomba and held in our church records by the Volunteer Pastor.</p>
				<a id="start" class="btn btn-primary btn-lg btn-success" role="button">Let's Begin</a>
				
			</blockquote>	
		</div>
	</div>
	<div id="questions">
		<div class="wrap survey sample">
		<div class="container">
		<h1>MOTIVATIONAL GIFTS SURVEY: QUESTIONS</h1>
		<blockquote>
		<p>Below are statements that may help you discover your basic motivational gifts. Ask yourself of each description, “How true is this of me?” Then rate yourself with the following scale and simply click on the appropriate button (example below).</p>
		<div class="btn-group btn-toggle" data-toggle="buttons">
		  <label class="btn rdio btn-default" disabled="disabled">
		    <input type="radio" name="options" value="0" checked=""> Never
		  </label>
		  <label class="btn rdio btn-default" disabled="disabled">
		    <input type="radio" name="options" value="1" checked=""> Seldom
		  </label>
		  <label class="btn rdio btn-default" disabled="disabled">
		    <input type="radio" name="options" value="2" checked=""> Sometimes
		  </label>
		  <label class="btn rdio btn-default" disabled="disabled">
		    <input type="radio" name="options" value="3" checked=""> Usually
		  </label>
		  <label class="btn rdio btn-default" disabled="disabled">
		    <input type="radio" name="options" value="4" checked=""> Mostly
		  </label>
		  <label class="btn rdio btn-default" disabled="disabled">
		    <input type="radio" name="options" value="5" checked=""> Always
		  </label>
		</div>
		<p><br/>Your first response will probably be the most accurate and please answer honestly what you feel is true of you rather than what you would like to be true or the way you think you ought to be.</p>
		</blockquote>
		</div></div>
		<form class="form">
			<?php
			$feed = 'http://mtro.ch/assets/files/mgs.xml';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $feed);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// get the result of http query
			$output = curl_exec($ch);
			curl_close($ch);
			$survey = simplexml_load_string($output);
			
			foreach($survey->children() as $child) {
				$oe = $child->number % 2;
				if($oe == 0) {
					$class = "even";
				} else {
					$class = "odd";
				}
				?>
				<div class="wrap survey <?=$class;?>" role="document">	
					<div class="container">
						<p><span><?=$child->number;?>.</span> <?=$child->text;?></p>
						<div id="q<?=$child->number;?>" class="btn-group btn-toggle" data-toggle="buttons">
							<label class="btn rdio btn-default">
							  <input type="radio" name="options" value="0" checked=""> Never
							</label>
							<label class="btn rdio btn-default">
							  <input type="radio" name="options" value="1" checked=""> Seldom
							</label>
							<label class="btn rdio btn-default">
							  <input type="radio" name="options" value="2" checked=""> Sometimes
							</label>
							<label class="btn rdio btn-default">
							  <input type="radio" name="options" value="3" checked=""> Usually
							</label>
							<label class="btn rdio btn-default">
							  <input type="radio" name="options" value="4" checked=""> Mostly
							</label>
							<label class="btn rdio btn-default">
							  <input type="radio" name="options" value="5" checked=""> Always
							</label>
						</div> 
						<input class="answer" type='hidden' name="a<?=$child->number;?>" id="<?=$child->number;?>" value='-'> 
					</div>
				</div>
			<?php	
			}
			?>
			
			<div class="wrap submit" role="document">	
				<div class="container">
					<h4>Answered every question? Find out your results by hitting the button below:</h4>
					<button class="tellme btn btn-primary btn-lg disabled" role="button">Please Answer All Questions.</button>
				</div>
			</div>
			
		</form>
	</div>
</div>
<div class="wrap result">
	<div class="container">
		<div class="col-md-8">
			<h1>MOTIVATIONAL GIFTS SURVEY: Results</h1>
			<h3 id="submitted-name"></h3>
			<div class="sort">
				<h2>Prophesy/Perceiver: <span class="res" id="p"></span></h2>
				<h2>Ministry/Server: <span class="res" id="m"></span></h2>
				<h2>Teaching: <span class="res" id="t"></span></h2>
				<h2>Exhorter: <span class="res" id="e"></span></h2>
				<h2>Giver: <span class="res" id="g"></span></h2>
				<h2>Leading/Administrator/Organizer: <span class="res" id="l"></span></h2>
				<h2>Mercy/Compassion: <span class="res" id="c"></span></h2>
			</div>
			<div class="actions">
				<a tabindex="0" id="print" class="btn btn-primary btn-lg btn-success" data-toggle="popover" data-placement="top" data-trigger="focus" title="Enter your Name" data-content="<div class='form-group contact popover-contact'><input type='name' id='popover-name' class='form-control name' placeholder='Name'>
			  	<a id='popover-print' class='btn btn-primary btn-lg btn-success popover-btn' role='button'>Print with Name</a> <a id='popover-cancel' class='btn btn-primary btn-lg btn-error popover-btn' role='button'>Cancel</a></div>">Print</a><a href="/mgs" class="btn btn-primary btn-lg" role="button">Reset Survey</a>
				<div class="email-response"></div>
			</div>
		</div>
		<div class="col-md-4 notes">
			<h1>Find Out More</h1>
			<p><img src="/assets/img/gifted.jpg"/>If you would like to read more about your motivational gifts, please download the attached PDF.</p>
			<p><a href="https://www.dropbox.com/s/afjahqa925m5jmp/GIFTED_CURRICULUM.pdf?dl=1" class="btn btn-primary btn-lg btn-success" role="button">Download</a></p>
		</div>
	</div>
</div>