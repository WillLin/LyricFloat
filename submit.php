<html>
	<head>
		<title>LyricFloat</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<div id="fb-root"></div>
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
	<!-- <h1>LyricFloat</h1> -->
	<div id="logo">
		<a href="./"><img src="images/lyricfloat_sm.png" alt="LyricFloat" /></a>
	</div>
	<div class="center">
		<a href="page2.php" > 
		<?php
			$stopwords = "able,about,above,according,accordingly,across,actually,after,afterwards,again,against,ain't,all,allow,allows,almost,alone,along,already,also,although,always,am,among,amongst,an,and,another,any,anybody,anyhow,anyone,anything,anyway,anyways,anywhere,apart,appear,appreciate,appropriate,are,aren't,around,as,aside,ask,asking,associated,at,available,away,awfully,be,became,because,become,becomes,becoming,been,before,beforehand,behind,being,believe,below,beside,besides,best,better,between,beyond,both,brief,but,by,c'mon,c's,came,can,can't,cannot,cant,cause,causes,certain,certainly,changes,clearly,co,com,come,comes,concerning,consequently,consider,considering,contain,containing,contains,corresponding,could,couldn't,course,currently,definitely,described,despite,did,didn't,different,do,does,doesn't,doing,don't,done,down,downwards,during,each,edu,eg,eight,either,else,elsewhere,enough,entirely,especially,et,etc,even,ever,every,everybody,everyone,everything,everywhere,ex,exactly,example,except,far,few,fifth,first,five,followed,following,follows,for,former,formerly,forth,four,from,further,furthermore,get,gets,getting,given,gives,go,goes,going,gone,got,gotten,greetings,had,hadn't,happens,hardly,has,hasn't,have,haven't,having,he,he's,hello,help,hence,her,here,here's,hereafter,hereby,herein,hereupon,hers,herself,hi,him,himself,his,hither,hopefully,how,howbeit,however,i'd,i'll,i'm,i've,ie,if,ignored,immediate,in,inasmuch,inc,indeed,indicate,indicated,indicates,inner,insofar,instead,into,inward,is,isn't,it,it'd,it'll,it's,its,itself,just,keep,keeps,kept,know,knows,known,last,lately,later,latter,latterly,least,less,lest,let,let's,like,liked,likely,little,look,looking,looks,ltd,mainly,many,may,maybe,me,mean,meanwhile,merely,might,more,moreover,most,mostly,much,must,my,myself,name,namely,nd,near,nearly,necessary,need,needs,neither,never,nevertheless,new,next,nine,no,nobody,non,none,noone,nor,normally,not,nothing,novel,now,nowhere,obviously,of,off,often,oh,ok,okay,old,on,once,one,ones,only,onto,or,other,others,otherwise,ought,our,ours,ourselves,out,outside,over,overall,own,particular,particularly,per,perhaps,placed,please,plus,possible,presumably,probably,provides,que,quite,qv,rather,rd,re,really,reasonably,regarding,regardless,regards,relatively,respectively,right,said,same,saw,say,saying,says,second,secondly,see,seeing,seem,seemed,seeming,seems,seen,self,selves,sensible,sent,serious,seriously,seven,several,shall,she,should,shouldn't,since,six,so,some,somebody,somehow,someone,something,sometime,sometimes,somewhat,somewhere,soon,sorry,specified,specify,specifying,still,sub,such,sup,sure,t's,take,taken,tell,tends,th,than,thank,thanks,thanx,that,that's,thats,the,their,theirs,them,themselves,then,thence,there,there's,thereafter,thereby,therefore,therein,theres,thereupon,these,they,they'd,they'll,they're,they've,think,third,this,thorough,thoroughly,those,though,three,through,throughout,thru,thus,to,together,too,took,toward,towards,tried,tries,truly,try,trying,twice,two,un,under,unfortunately,unless,unlikely,until,unto,up,upon,us,use,used,useful,uses,using,usually,value,various,very,via,viz,vs,want,wants,was,wasn't,way,we,we'd,we'll,we're,we've,welcome,well,went,were,weren't,what,what's,whatever,when,whence,whenever,where,where's,whereafter,whereas,whereby,wherein,whereupon,wherever,whether,which,while,whither,who,who's,whoever,whole,whom,whose,why,will,willing,wish,with,within,without,won't,wonder,would,would've,wouldn't,yes,yet,you,you'd,you'll,you're,you've,your,yours,yourself,yourselves,zero,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z";

			function filter_stopwords($words, $stopwords) {
				foreach($words as $pos => $word) {
					if (!in_array(strtolower($word), $stopwords, TRUE)) {
						$filtered_words[$pos] = $word;
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
			
			function word_cloud($words, $div_size = 400) {

				$cloud = "<div style=\"width: {$div_size}px\">";
				$fmax = 96; /* Maximum font size */
				$fmin = 3; /* Minimum font size */

				$counted = array_count_values($words);
				arsort($counted);

				$tmin = min($counted); /* Frequency lower-bound */
				$tmax = max($counted); /* Frequency upper-bound */
				$count = 0;

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
							$font_size = 5;
						}

						if ($font_size >= $fmin) {
							$cloud .= "<span style=\"font-size: {$font_size}px; color: $color;\">$word</span> ";
						}

					}

					$cloud .= "</div>";

					return $cloud;
			}

			$stopwords = explode(',', $stopwords);

			$words = array();

			// just populate the bitch
			for ($i = 0; $i < 250; $i++) {

				if ($i > 0 && $i < 10) {
					$words[] = "fuck";
				}

				if ($i > 10 && $i < 30) {
					$words[] = "shit";
				}

				if ($i > 30 && $i < 60) {

					$words[] = "crap";
				}

				if ($i > 60 && $i < 100) {
					$words[] = "ass";
				}

				if($i > 100 && $i < 120) {
					$words[] = "mazafaka";
				}

				if ($i > 120 && $i < 160) {
					$words[] = "dipshits";
				}

				if ($i > 160 && $i < 170) {
					$words[] = "dickheads";
				}

				if ($i > 180 && $i < 200) {
					$words[] = "dumpfucks";
				}

				if ($i > 200) {
					$words[] = "cuties";
				}
			}

			$filtered = filter_stopwords($words, $stopwords);

			echo word_cloud($filtered, 400);
		?>
	 	</a>
	 </div>

	<!-- <p>this is where cloud will go</p> 
	<?php  echo $_GET["song"];  ?>
	-->

	<div style="height:50px;">
	</div>

	<div id="inputarea">
		<form action="submit.php" method="get">
			<input type="text" name="song" placeholder="Input text here" size="35" >
			<br>
			<div class="floatright">
				<input class="purplebutton marginleft10" type="button" value="Add to Cloud">
				<!-- <input class="purplebutton marginleft10" type="button" value="Share"> 
data-href="https://submit.php"
				-->
				<div class="fb-share-button"  data-layout="button"></div>
				<input class="purplebutton marginleft10" type="submit" value="Submit">
			</div>
		</form>
	</div>


	</body>
	
</html>