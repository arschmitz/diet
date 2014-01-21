<!DOCTYPE html>
<html>
<head>
  <title>JQM latest - issue template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"  href="http://code.jquery.com/mobile/git/jquery.mobile-git.css"> 
  <script src="http://code.jquery.com/jquery-1.10.1.js"></script> 
  <script src="http://code.jquery.com/mobile/git/jquery.mobile-git.js"></script> 
  <script>
    // JS
    $(function(){
    	$( document ).on( "click", "#calculate", function(){

			var points,
				servings = parseFloat( $( '#servings' ).val() ),
				fat = ( parseInt( $( '#fat' ).val(), 10 ) * servings ) / 3.9,
				carbs = ( parseInt( $( '#carbs' ).val(), 10 ) * servings ) / 9.2,
				protein = ( parseInt( $( '#protein' ).val(), 10 ) * servings ) / 10.9,
				fiber = ( parseInt( $( '#fiber' ).val(), 10 ) * servings ) / 12.22;
			
				points = Math.round( ( fat + protein + carbs - fiber ) * 2 ) / 2;
			if( points <= .25 || points == "" || points == 0 ){
				points = "0";
			}
			$( '#points' ).html( points );
    	});
		$( document ).on( "click", "#calculateDaily", function() {
			var sex, age, height, weight, dailyPoints;

			sex = $('#sex').val();
			if(sex == "male"){
					age = ($('#age').val()-17)/4;
					height = ($('#height').val()-48)/2.25;
					weight = $('#weight').val()*.1834;
					dailyPoints = Math.round(height + weight - age);
			}
			else{
					age = (($('#age').val()-21)/5);
					height = ($('#height').val()-48)/2;
					weight = $('#weight').val()*.1461;
					dailyPoints = Math.round((height + weight - age) - 5);
			}

			if(dailyPoints<=29 || dailyPoints == "" || dailyPoints == 0){
				dailyPoints = "29";
			}
			if(dailyPoints>=71){
				dailyPoints = "71";
			}
			$('#dailyPoints').html(dailyPoints);
		});
	});
  </script>
  <style>
    #edit-with-js-bin { display: none !important; }
    #dailyPoints,#points{
    	width:100%;
    	height:40px;
    	font-size: 32px;
    	text-align: center;
    }
    .ui-block-a, .ui-block-b{
    	padding:5px;
    }
  </style>
</head>
<body>
	<div data-role="page">
		<div data-role="header">
			<h1>Points</h1>
			<a href="#daily" class="ui-btn-right">Daily Points</a>
		</div>
		<div class="ui-content">
			<h3>Points</h3>
			<div id="points" class="ui-input-text ui-corner-all ui-body-inherit ui-shadow-inset"></div>
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<label for="fat">Fat</label>
					<input type="number" id="fat" value="0">
				</div>
				<div class="ui-block-b">
					<label for="carbs">Carbs</label>
					<input type="number" id="carbs" value="0">
				</div>
				<div class="ui-block-a">
					<label for="protein">Protein</label>
					<input type="number" id="protein" value="0">
				</div>
				<div class="ui-block-b">
					<label for="fiber">Fiber</label>
					<input type="number" id="fiber" value="0">
				</div>
				<div class="ui-block-a">
					<label for="servings">Servings</label>
					<input type="number" id="servings" value="1">
				</div>
			</div>
			<button id="calculate">Calculate</button>

		</div>
	</div>
	<div data-role="page" id="daily">

		<div data-role="header">
			<a href="#" data-rel="back" data-icon="home">Back</a>
			<h1>Daily Allowance</h1>
		</div><!-- /header -->

		<div class="ui-content">
			<h2>Daily Points Allowance</h2>
			<div id="dailyPoints" class="ui-input-text ui-corner-all ui-body-inherit ui-shadow-inset"></div>
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<label for="age">Age</label>
					<input type="number" id="age">
				</div>
				<div class="ui-block-b">
					<label for="weight">Weight</label>
					<input type="number" id="weight">
				</div>
				<div class="ui-block-a">
					<label for="height">Height (in)</label>
					<input type="number" id="height">
				</div>
				<div class="ui-block-b">
					<label for="sex">Gender</label>
					<select name="sex" id="sex" data-mini="true">
						<option value="female" selected>Female</option>
						<option value="male">Male</option>
					</select>
				</div>
			</div>
			<button id="calculateDaily">Calculate</button>

		</div><!-- /content -->
	</div><!-- /page -->

</body>
</html>
