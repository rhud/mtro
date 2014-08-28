<?php
/*
Template Name: MOTIVATIONAL GIFTS SURVEY
*/
?>


<div class="wrap intro" role="document">	
	<div class="container">
		<h1>MOTIVATIONAL GIFTS SURVEY</h1>
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
			<p><strong>Note: Your first response will probably be the most accurate and please answer honestly what you feel is true of you rather than what you would like to be true or the way you think you ought to be.</strong></p>
			
		</blockquote>	
	</div>
</div>

<form class="form">
	<?php
	$xml = file_get_contents('http://mtro.ch/el/mgs.xml');
	$survey = simplexml_load_string($xml);
	
	foreach($survey->children() as $child) {
		?>
		<div class="wrap survey" role="document">	
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

<div class="wrap result">
	<div class="container">
		<h1>MOTIVATIONAL GIFTS SURVEY: Results</h1>
		<h2>Prophesy/Perceiver: <span class="res" id="p"></span></h2>
		<h2>Ministry/Server: <span class="res" id="m"></span></h2>
		<h2>Teaching: <span class="res" id="t"></span></h2>
		<h2>Exhorter: <span class="res" id="e"></span></h2>
		<h2>Giver: <span class="res" id="g"></span></h2>
		<h2>Leading/Administrator/Organizer: <span class="res" id="l"></span></h2>
		<h2>Mercy/Compassion: <span class="res" id="c"></span></h2>
		<a href="javascript:window.print()" id="print" class="btn btn-primary btn-lg btn-success" role="button">Print</a>
		<a href="mailto:?subject=MOTIVATIONAL GIFTS SURVEY: Results&body=<h1>TEST</h1><br/>test2" class="btn btn-primary btn-lg btn-success" role="button">Share via Email</a>
		<a href="/mgs" class="btn btn-primary btn-lg" role="button">Reset Survey</a>
	</div>
</div>