<?php
/*Note that part of this program is modified from w3schools tutorials */
error_reporting(E_ALL);
ini_set('display_errors',1);

echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8'>
    <title>CS 290: How To Assignment</title>
    <link rel='stylesheet' href='style.css'>
  </head>
  <body>
    <header>
      <h1>Using National Nutrient Database API</h1>
    </header>

    <nav>
      <a href='howto.php'>Home</a><br>
      <a href='howto.php?step=0'>Step 0: Acquire data.gov API Key</a><br>
      <a href='howto.php?step=1'>Step 1: Data Familiarization</a><br>
      <a href='howto.php?step=2'>Step 2: Find Key</a><br>
      <a href='howto.php?step=3'>Step 3: Formulate Query</a><br>
      <a href='howto.php?step=4'>Step 4: Parse Results</a><br>
      <a href='howto.php?step=5'>Step 5: Incorporate Into Website</a><br>
      <a href='howto.php?step=6'>Step 6: Put It Together</a><br>
    </nav>

    <section>";
      if (!isset($_GET['step']))
        $_GET['step'] = 7;
      switch((int)$_GET['step']) {
        case 0:
          makeStep0();
	  break;
        case 1:
          makeStep1();
	  break;
	case 2:
          makeStep2();
	  break;
	case 3:
          makeStep3();
	  break;
	case 4:
          makeStep4();
	  break;
	case 5:
          makeStep5();
	  break;
	case 6:
          makeStep6();
	  break;
	default:
	  makehome();
          break;
}
function makeHome() {
echo "
      <h2>Overview</h2>
      <p> The <a href='http://ndb.nal.usda.gov/ndb/foods' target='_blank'>National Nutrient Database</a> is chock-full of nutrition information for use in your website! You can add nutrition information about virtually any type of food! Do you want to display the nutrients found in a fried egg? You can do that! See below for an example of the information available - this table is about fried eggs!</p>
      <img src='friedegg.png' alt='fried egg' height='728' width='800'>
      <hr>
      <p> This tutorial will walk you through the steps needed to obtain and use this information. It is based on information found <a href='http://ndb.nal.usda.gov/ndb/doc/index' target=_blank>here</a>.</p>
      <a href='howto.php?step=0'>Step 0: Acquire data.gov API Key</a><br>
      <p>This will be necessary to access the data in the database. You can even use this same key to access all sorts of other information available at data.gov!</p>
      <a href='howto.php?step=1'>Step 1: Data Familiarization</a><br>
      <p>You will need to learn about the kind of information that is available in the database to better understand the next steps.</p>
      <a href='howto.php?step=2'>Step 2: Find Key</a><br>
      <p>Once you figure out the type of information you are seeking, you will need to find the key necessary to formulate your query.</p>
      <a href='howto.php?step=3'>Step 3: Formulate Query</a><br>
      <p>After you get your data.gov API key, the type of information you need, and your necessary key, you are ready to formulate your query!</p>
      <a href='howto.php?step=4'>Step 4: Parse Results</a><br>
      <p>You have your results back. Now you will need to interpret what they mean!</p>
      <a href='howto.php?step=5'>Step 5: Incorporate Into Website</a><br>
      <p>It's time to add the nutrition information to your website!</p>
      <a href='howto.php?step=6'>Step 6: Put it Together</a><br>
      <p>This section will put together everything you have learned!</p>
      <hr>
      <p>Click 'Next' to get started!</p>
            <div class='buttons'>
      <div class='next'>
        <a href='howto.php?step=0'>Next</a>
      </div>
    </div>";
}

function makeStep0() {
echo "
      <h2> Step 0: Acquire data.gov API Key </h2>
      <p>The first thing you need to do is get an API key. This will be necessary in order to access the data in the database. You can even use this same key to access all sorts of other information available at data.gov (click <a href='http://catalog.data.gov/dataset?q=-aapi+api+OR++res_format%3Aapi#topic=developers_navigation' target='_blank'>here</a> for details about other available datasets).</p>

      <p>Click <a href='https://api.data.gov/signup/' target='_blank'>here</a> to sign up for your API key. You will see a screen that looks like this:</p>
      <img src='signup2.png' alt='sign up' height='545' width='800'>
      <hr>
      <p>Once you sign up, a screen will immediately pop up with your key, looking something like this:</p>
      <img src='keyrequestresult.png' alt='key request result' height='534' width='800'>
      <hr>
      <p>Be sure to keep your key available because you will need to use it in subsequent steps. Now you are ready to begin! Click 'Next' for Step 1!</p>
      <div class='buttons'>
        <div class='prev'>
          <a href='howto.php'>Previous</a>
        </div>
      <div class='next'>
        <a href='howto.php?step=1'>Next</a>
      </div>
    </div>";
}

function makeStep1() {
echo "
      <h2>Step 1: Data Familiarization</h2>
      <p>The first thing you need to do is figure out the type of data you need. We will be using information from the Food Report. This is what we use when we need to find nutrition information about a specific food. It would be a great idea to play around with the database in order to get familiar with the types of information that can be found in it. You can do that <a href='http://ndb.nal.usda.gov/ndb/foods' target='_blank'>here</a>.</p>
     <p>In order to get information about a particular food, we will need to find the food's NDB number (NDBno) in order to create your query. We will go over how to find the NDBno in the next section. Did you know that there are 2439 delicious calories in a Papa John's 14-inch regular crust cheese pizza? This is the type of information that the Food Report data can tell you. See below for an example of a food report about pizza!</p>
      <img src='pizza.png' alt='pizza' height='745' width='800'>
      <hr>
      <p>Now it's time to find the key that you need to get your information! Click 'Next' for Step 2!</p>
      <div class='buttons'>
        <div class='prev'>
          <a href='howto.php?step=0'>Previous</a>
        </div>
      <div class='next'>
        <a href='howto.php?step=2'>Next</a>
      </div>
    </div>";
}

function makeStep2() {
echo "  
      <h2>Step 2: Find Key</h2>
      <p>Now it is time to find the key we need for our query. Let's go over the Food Report information we will need to form the query.</p>
      <p>The most important bit of information we need is the NDB number (NDBno) for the food we are interested in. This is a unique number that identifies the food. One way we could do this would be to go into the database, manually search for the food, and write down the NDBno for that particular food. Here is an example of how you would manually find the NDBno for celery seed:
      <p>Go to <a href='http://ndb.nal.usda.gov/ndb/foods' target='_blank'>this link</a> and search for 'celery seed'. The search screen looks like the one below:</p>
      <img src='celeryseed.png' alt='celery seed' height='697' width='800'>
      <p>Look at the results to find the NDBno. As can be seen in the results screen below, the NDBno for celery seed is 02007.</p>
      <img src='celeryseedndb.png' alt='celery seed NDB' height='434' width='800'>
      <p>However, a manual search doesn't seem like a very efficient way to get this information. Fortunately, there is another way! We can actually perform a search request to find the NBDno for the food we are interested in.</p>
      <p>To perform the request, we need our api_key (that was what we got in Step 0) and the name of the food we are searching for.</p>
      <p>To make a browser request, we would use</p>
      <code>
        http://api.nal.usda.gov/usda/ndb/search/?format=json&amp;q=nameOfFood&amp;api_key=yourKey
      </code>
      <p>Don't forget to replace 'nameOfFood' with the food you are searching for and api_key with your actual key you received!</p>
      <p><i>Hint: If your food has a space in it, you want to replace the space with %20. See <a href='http://en.wikipedia.org/wiki/Percent-encoding' target='_blank'>here</a> for more information about URL encoding.</i></p>
      <p>So what if we want to find the NDBno for celery seed? Let's see what happens when we click on the following link (note that you will likely need to replace 'DEMO_KEY' with your own key for the link to work):</p>
      <a href='http://api.nal.usda.gov/usda/ndb/search/?format=json&amp;q=celery%20seed&amp;api_key=DEMO_KEY' target='_blank'>http://api.nal.usda.gov/usda/ndb/search/?format=json&amp;q=celery%20seed&amp;api_key=DEMO_KEY</a>
      <p>When we click on that link, we get a result that looks like the following (but without the big red arrow!):</p>
      <img src='celeryseedjson.png' alt='celery seed json' height='338' width='800'>
      <p>We could look through here and find the NDBno, but that does not seem to be any more efficient than searching it ourselves. What we are going to do is parse the JSON and put our NDBno into a variable so we can use it later!</p>
      <p>Here is an example of how to do this using PHP:</p>
      <img src='step2code.png' alt='code' height='78' width='800'>
      <p>So what did we do here? We requested the string in JSON format and put it in a variable called \$jsonstring. Then we decoded it, which gave us an object that held an array with what we were interested in - the NDBno. The last line of the code put the number 02007 into our variable named \$ndbno that we can now use in later steps!</p>
      <p>Please note that this is a very simple example where only one food was returned. Consider the case where you searched for a food with multiple possibilities. This code will return the NDBno for the first one, which is hopefully the match you were looking for, but not necessarily. For example, if you searched for cake, the result would look like this:</p>
      <img src='cakejson.png' alt='cake' height='447' width='800'>
      <p>So there are multiple choices for which cake you want, but the code above will return the top one. Remember that the code above gives you the NDBno for the top choice.</p>
      <hr>
      <p>Click 'Next' to find out how to formulate your query!</p>
      <div class='buttons'>
        <div class='prev'>
          <a href='howto.php?step=1'>Previous</a>
        </div>
      <div class='next'>
        <a href='howto.php?step=3'>Next</a>
      </div>
    </div>";
}

function makeStep3() {
echo "
      <h2>Step 3: Formulate Query</h2>  
      <p>Now it is time to formulate our query. Here is the information we need for it:</p>
      <ul>
        <li>api_key that we got in Step 0</li>
      	<li>NDBno that we found in Step 2</li>
      </ul>
      <p>So the url string we would use for a request would be</p>
      <code>
        http://api.nal.usda.gov/usda/ndb/reports/?ndbno=ndbnonum&amp;api_key=yourKey
      </code>
      <p>Remember to replace 'ndbnonum' with the number we found in Step 2 and 'yourKey' with the key you got in Step 0.</p>
      <p>So to make the request for information about celery seed, we would use</p>
      <code>
        http://api.nal.usda.gov/usda/ndb/reports/?ndbno=02007&amp;api_key=DEMO_KEY
      </code>
      <p>Don't forget to replace DEMO_KEY with your key! We would get a result that looks like this:</p>
      <img src='celeryseednutrientjson.png' alt='celery seed JSON' height='975' width='700'>
      <p>We will go over how what this data means in the next section.</p>
      <p>Of course, we would not be making this request by hand. But the good news is that you already know how to make this request because it is very similar to what we did to find the NBDno in Step 2! Here is an example of how we would formulate our request in our PHP code (remember that we already have the NDBno that we are interested in in the variable \$ndbno and to replace DEMO_KEY with your own api_key):</p>
      <img src='step3code.png' alt='code' height='44' width='800'>
      <p>So all we did here was to create our url string using the NDBno that we found in Step 2 and the api_key from Step 0. We used that string to make the request.</p>
      <hr>
      <p>Click 'Next' to learn about what information was returned and how to parse the returned information!</p>
      <div class='buttons'>
        <div class='prev'>
          <a href='howto.php?step=2'>Previous</a>
        </div>
      <div class='next'>
        <a href='howto.php?step=4'>Next</a>
      </div>
    </div>";
}

function makeStep4() {
echo "
      <h2>Step 4 - Parse Results</h2>
      <p>Now let's take a look at the results and see what we have. If we had manually searched for information about celery seed, this is what we would have seen:</p>
      <img src='celeryseedresult.png' alt='celery seed' height='723' width='800'>
      <p>Let's compare that to a partial result we got back from our query:</p>
      <img src='celeryseednutrientjson.png' alt='celery seed json' height='975' width='700'>
      <p>Do you notice how they are alike? For example, let's take a closer look at the information about water in celery seed. We see from both charts that water is part of the 'Proximates' group, and there are 6.04 grams of water per 100 grams of celery seed, etc. We have all of the information seen in the chart at the top of our page available for us to use.</p>
      <img src='water.png' alt='water' height='575' width='800'>
      <p>So let's break down all the information returned from our query.</p>
      <ul>
        <li>'sr' and 'type refer to the version and type of the report used to get the data - we can ignore that.</li>
        <li>'ndbno' is the NDBno of the food - we used this in our query</li>
        <li>'food' is an array of foods returned. In this case, only one was returned, but a list of more than one food might be returned.
          <ul>
	    <li>'name' is the name of the food</li>
	    <li>'nutrients' is an array of nutrients, which contains the information we are interested in. There is information about each type of nutrient:
 	      <ul>
	        <li>'nutrient_id' is just the unique identifier of the nutrient</li>
	        <li>'name' is the name of the nutrient</li>
	        <li>'group' is the group it belongs to. The choices are 'proximates' (like water, calories, etc.), 'minerals', 'vitamins', 'lipids', or 'other' (like caffeine)</li>
	        <li>'unit' is just the unit used in the measurement</li>
	        <li>'value' is the amount of the nutrient in the food</li>
	        <li>'measures' is an array that lets you know how much of the nutrient is in the food at different values:
	          <ul>
	            <li>'label' is the label of the measurement</li>
	            <li>'eqv' is equivalent of the measure in grams</li>
	            <li>'qty' is the amount</li>
	            <li>'value' is the gram equivalent value of the measurement</li>
	          </ul>
		</li>
	      </ul>
	    </li>
	  </ul>
        </li>
      </ul>
      <p>How would we get this information? We would simply use the line</p>
      <img src='step4code.png' alt='code' height='32' width='257'>
      <hr>
      <p>Now let's move on to the next step to learn what to do with this information and how to use it in our website! Click 'Next' for Step 5!</p>

      <div class='buttons'>
        <div class='prev'>
          <a href='howto.php?step=3'>Previous</a>
        </div>
      <div class='next'>
        <a href='howto.php?step=5'>Next</a>
      </div>
    </div>";
}

function makeStep5() {
echo "
      <h2>Step 5: Incorporate Into Website</h2>
      <p>Now it is time to incorporate this information into our website. Let's say you want to display the name of the food, the name of the nutrient, and the value it has of each nutrient. Here is an example of some PHP code that provides a list of nutrients and their amounts for our celery seed example:</p>
      <img src='step5code.png' alt='code' height='324' width='800'>
      <p>In this code, we put the name of the food in the variable \$foodName, made an array of the nutrients called \$arr, and used that array to make a table holding the name and amount of each nutrient. This will produce a table for your website that looks something like this:</p>
      <img src='table.png' alt='table' height='737' width='312'>
      <hr>
      <p>Click on 'Next' to see what everything looks like when it is put together!</p>
      <div class='buttons'>
        <div class='prev'>
          <a href='howto.php?step=4'>Previous</a>
        </div>
      <div class='next'>
        <a href='howto.php?step=6'>Next</a>
      </div>
    </div>";
}

function makeStep6() {
echo "
      <h2>Step 6: Putting Everything Together</h2>
      <p> Let's take a look at what the PHP code looks like when it is all put together. </p>
      <img src='fullcode.png' alt='code' height='482' width='800'>
      <p>Simple, right? Now you know how to use the National Nutrient Database to bring nutrient information into your website! However, there are a few caveats and other considerations:</p>
      <ol>
        <li>You can only send 1000 API requests per hour using your key you received in Step 0. If you request more, your key can be blocked for an hour.</li>
	<li>When you use this database, the USDA would like to be listed as the source using the reference 'U.S. Department of Agriculture, Agricultural Research Service. 2014. USDA National Nutrient Database for Standard Reference, Release 27. Nutrient Data Laboratory Home Page, http://www.ars.usda.gov/nutrientdata' Note that you do not have to do this, as the information is in the public domain. Also note that you might be using a different release - all information in this tutorial is from Release 27.</li>
	<li>This how-to guide only went over making browser requests and getting the information in JSON format. You can actually make browser or CURL requests and have the data come back in either JSON or XML format. See the bottom of <a href='http://ndb.nal.usda.gov/ndb/doc/apilist/API-FOOD-REPORT.md' target='_blank'>this page</a> for more information.</li>
	<li>This guide only went over how to get information about one food, but there are often multiple foods that can match your search in Step 2. See <a href='http://ndb.nal.usda.gov/ndb/doc/apilist/API-LIST.md' target='_blank'>this page</a> for information about lists of foods.</li>
	<li>This guide only went over how to get information by food. You can also get information by nutrients using a Nutrient List. See more information about that <a href='http://ndb.nal.usda.gov/ndb/doc/apilist/API-NUTRIENT-REPORT.md' target='_blank'>here</a>.</li>
      </ol>
      <p>Hope you have learned about how to use the National Nutrient Database API! Note that the source of this information and much more can be found <a href='http://ndb.nal.usda.gov/ndb/doc/index' target='_blank'>here</a>.</p>
      <hr>
      <div class='buttons'>
        <div class='prev'>
          <a href='howto.php?step=5'>Previous</a>
        </div>
      </div>";
}

echo "
    </section>
    <footer>
    All data is from U.S. Department of Agriculture, Agricultural Research Service. 2014. USDA National Nutrient Database for Standard Reference, Release 27. Nutrient Data Laboratory Home Page, http://www.ars.usda.gov/nutrientdata
    </footer>
  </body>
</html>";
?>
