<html>
	<head>

		<title>LyricFloat</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    	
    	<!-- AutoComplete -->
    	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css">
		<style>
			.ui-autocomplete {
				max-height: 125px;
				overflow-y: auto;
				overflow-x: hidden;
			}
			* html .ui-autocomplete {
				height: 100px;
			}
		</style>
		<script>
			$(function() {
			    $("#artist" ).autocomplete({
			        source: function( request, response ) {
			            $.ajax({
			                url: "http://developer.echonest.com/api/v4/artist/suggest",
			                dataType: "jsonp",
			                data: {
			                    results: 50,
			                    api_key: "PJZDD6QS2INIZEDDT",
			                    format:"jsonp",
			                    name:request.term
			                },
			                success: function( data ) {
			                    response( $.map( data.response.artists, function(item) {
			                        return {
			                            label: item.name,
			                            value: item.name,
			                            id: item.id
			                        }
			                    }));
			                }
			            });
			        },
			        minLength: 3,
			        select: function( event, ui ) {
			            $("#log").empty();
			            $("#log").append(ui.item ? ui.item.id + ' ' + ui.item.label : '(nothing)');
			        },
			    });
			});
		</script>
	</head>
	
	<body>

		<div id="largelogo">
			<a href="./"><img src="images/lyricfloat.png" alt="LyricFloat" /></a>
		</div>


		<div style="height:25px;">
		</div>

		<div id="inputarea" class="ui-widget" >
			<form action="submit.php" method="get" >
				<input id="artist" type="text" name="artist" placeholder="Input text here" size="35" >
				<br>
				<div class="floatright">
					<input class="purplebutton marginleft10" type="submit" value="Submit">
				</div>
			</form>
		</div>

	</body>
	
</html>