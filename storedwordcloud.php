<?php
	//start session
	session_start();
?>
<html>
	<head>
		<title>LyricFloat</title>

		<!-- Stylesheet -->
		<link rel="stylesheet" type="text/css" href="css/styles.css">

		<!-- jQuery -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

		<!-- AutoComplete -->
		<script src="scripts/autocomplete.js"></script>
		
		<!-- Facebook Share  -->
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=410610055735538&version=v2.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	</head>

	<body>
		<div id="fb-root"></div>
		
		<div id="logo">
			<a href="./"><img src="images/lyricfloat_sm.png" alt="LyricFloat" /></a>
		</div>

		<div class="center" id="wordcloud">
			<?php

				$artistsArray = array();
				$artistsArray = $_SESSION['artistsArray'];

				for($i=0; $i < count($artistsArray); $i++) {
					$stopwords = strtolower($artistsArray[$i]);
					$stopwords .= ",";
				}

				$stopwords .= "able,hook,intro,verse,outro,about,chorus,above,according,accordingly,across,actually,after,afterwards,again,against,ain't,all,allow,allows,almost,alone,along,already,also,although,always,am,among,amongst,an,and,another,any,anybody,anyhow,anyone,anything,anyway,anyways,anywhere,apart,appear,appreciate,appropriate,are,aren't,around,as,aside,ask,asking,associated,at,available,away,awfully,be,became,because,become,becomes,becoming,been,before,beforehand,behind,being,believe,below,beside,besides,best,better,between,beyond,both,brief,but,by,c'mon,c's,came,can,can't,cannot,cant,cause,causes,certain,certainly,changes,clearly,co,com,come,comes,concerning,consequently,consider,considering,contain,containing,contains,corresponding,could,couldn't,course,currently,definitely,described,despite,did,didn't,different,do,does,doesn't,doing,don't,done,down,downwards,during,each,edu,eg,eight,either,else,elsewhere,enough,entirely,especially,et,etc,even,ever,every,everybody,everyone,everything,everywhere,ex,exactly,example,except,far,few,fifth,first,five,followed,following,follows,for,former,formerly,forth,four,from,further,furthermore,get,gets,getting,given,gives,go,goes,going,gone,got,gotten,greetings,had,hadn't,happens,hardly,has,hasn't,have,haven't,having,he,he's,hello,help,hence,her,here,here's,hereafter,hereby,herein,hereupon,hers,herself,hi,him,himself,his,hither,hopefully,how,howbeit,however,i'd,i'll,i'm,i've,ie,if,ignored,immediate,in,inasmuch,inc,indeed,indicate,indicated,indicates,inner,insofar,instead,into,inward,is,isn't,it,it'd,it'll,it's,its,itself,just,keep,keeps,kept,know,knows,known,last,lately,later,latter,latterly,least,less,lest,let,let's,like,liked,likely,little,look,looking,looks,ltd,mainly,many,may,maybe,me,mean,meanwhile,merely,might,more,moreover,most,mostly,much,must,my,myself,name,namely,nd,near,nearly,necessary,need,needs,neither,never,nevertheless,new,next,nine,no,nobody,non,none,noone,nor,normally,not,nothing,novel,now,nowhere,obviously,of,off,often,oh,ok,okay,old,on,once,one,ones,only,onto,or,other,others,otherwise,ought,our,ours,ourselves,out,outside,over,overall,own,particular,particularly,per,perhaps,placed,please,plus,possible,presumably,probably,provides,que,quite,qv,rather,rd,re,really,reasonably,regarding,regardless,regards,relatively,respectively,right,said,same,saw,say,saying,says,second,secondly,see,seeing,seem,seemed,seeming,seems,seen,self,selves,sensible,sent,serious,seriously,seven,several,shall,she,should,shouldn't,since,six,so,some,somebody,somehow,someone,something,sometime,sometimes,somewhat,somewhere,soon,sorry,specified,specify,specifying,still,sub,such,sup,sure,t's,take,taken,tell,tends,th,than,thank,thanks,thanx,that,that's,thats,the,their,theirs,them,themselves,then,thence,there,there's,thereafter,thereby,therefore,therein,theres,thereupon,these,they,they'd,they'll,they're,they've,think,third,this,thorough,thoroughly,those,though,three,through,throughout,thru,thus,to,together,too,took,toward,towards,tried,tries,truly,try,trying,twice,two,un,under,unfortunately,unless,unlikely,until,unto,up,upon,us,use,used,useful,uses,using,usually,value,various,very,via,viz,vs,want,wants,was,wasn't,way,we,we'd,we'll,we're,we've,welcome,well,went,were,weren't,what,what's,whatever,when,whence,whenever,where,where's,whereafter,whereas,whereby,wherein,whereupon,wherever,whether,which,while,whither,who,who's,whoever,whole,whom,whose,why,will,willing,wish,with,within,without,won't,wonder,would,would've,wouldn't,yes,yet,you,you'd,you'll,you're,you've,your,yours,yourself,yourselves,zero,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z";

				function filter_stopwords($words, $stopwords) {
					for($i = 0; $i < count($words); $i++) {
						if (!in_array(strtolower($words[$i]), $stopwords, TRUE)) {
							$filtered_words [] = $words[$i];
						}
					}

					return $filtered_words;
				}
				function word_freq($words) {
					$frequency_list = array();
					foreach ($words as $pos => $word) {
							if (!in_array(strtolower($word), $stopwords, TRUE)) {
								$filtered_words[$pos] = $word;
							}
					}
				}
				
				function word_cloud($words, $div_size = 600) {
					$cloud = "<div style=\"width: {$div_size}px\">";
					$fmax = 96; /* Maximum font size */
					$fmin = 8; /* Minimum font size */
					$counted = array_count_values($words);
					$tmin = min($counted); /* Frequency lower-bound */
					$tmax = max($counted); /* Frequency upper-bound */
					$count = 0;
					$artist = "artist";	//unnecessary to instantiate
					$i = 0;
					foreach ($counted as $word => $frequency) {
							if ($frequency > $tmin) {
								$count += 1;
								$font_size = floor(  ( $fmax * ($frequency - $tmin) ) / ( $tmax - $tmin )  );
								/*$r = $g = 0; */
								$r = ($frequency * $tmax * $count) % 250;
								$g = floor( 50 * ($frequency / $tmax));
								$b = floor( 255 * ($frequency / $tmax) );
								$color = '#' . sprintf('%02s', dechex($r)) . sprintf('%02s', dechex($g)) . sprintf('%02s', dechex($b));
							} else {
								$font_size = 10;
								$r = mt_rand ( 0 , 255 );
								$g = mt_rand ( 0 , 255 );
								$b = mt_rand ( 0 , 255 );
								$color=  "rgb($r,$g,$b)";
							}
							if ($font_size >= $fmin) {
								if ($i < 250) {
									$cloud .= "<a href=\"page2.php?artist=$artist&amp;word=$word\" style=\"font-size: {$font_size}px; color: $color;\">$word</a> ";
									$i++;
								}
							}
						}
						$cloud .= "</div>";
						return $cloud;
				}
				$stopwords = explode(',', $stopwords);
				
				$wordsArray = array();
				$wordsArray = $_SESSION['allWords'];

				$filtered = filter_stopwords($wordsArray, $stopwords);
				echo word_cloud($filtered, 600);
			?>
		 </div>

		<div style="height:50px;">
			&nbsp;
		</div>

		<div id="inputarea">
		
			<!-- <form action="submit.php" method="get"> -->
			<form action="submit2.php" method="get"> 
				<input id="artist" class="ui-widget" type="text" name="artist" placeholder="Enter artist name" size="35" >
				<br />
				<div class="floatright">
					<button class="purplebutton marginleft10" formaction="submit2.php" type="submit" value="Add to Cloud">Add to Cloud</button>
					<div class="fb-share-button sharebutton" data-layout="button"></div>
					<button class="purplebutton marginleft10" formaction="submit.php" type="submit" value="Submit">Submit</button>
				</div>
			</form>
		</div>

	</body>
	
</html>