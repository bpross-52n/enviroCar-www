<?
require_once('./assets/includes/authentification.php');

$logged_in = false; 
if(!is_logged_in()){
	$logged_in = false; 
	include('header-start.php');
}else{
	$logged_in = true;
	include('header.php');
}
?> 


<script type="text/javascript">
	$('#myTab a').click(function(e) {
		e.preventDefault();
		$(this).tab('show');
	})
	//$('#myTab a:last').tab('show');
</script>

		<div class="tabbable">
			<ul id="myTab" class="nav nav-tabs" >
				<li><a href="#main" data-toggle="tab"><strong>Main Information</strong></a></li>
				<li><a href="#mobile" data-toggle="tab"><strong>Mobile Application</strong></a></li>
				<li><a href="#website" data-toggle="tab"><strong>WebSite</strong></a></li>
				<li><a href="#faqs" data-toggle="tab"><strong>FAQs</strong></a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="main">
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<ul id="mainList">
								<li><a href="#what">- What is EnviroCar?</a></li>
								<li><a href="#how">- How EnviroCar works?</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<h2><span id="what"></span>What is EnviroCar?</h2>
							<p style="text-align: justify; ">  
								<img class="offset2" src="./assets/img/enviroCar_architecture.svg" height="400" width="600" alt="The architecture of envirocar" />
								<br/>
								A community based system for gathering you car’s data via with your smartphone bluetooth-paired OBD2 adapter to 
								make your city smarter.	<br/>enviroCar allows you to drive more efficiently by giving you for example full 
								insight in consumption and costs. It allows you to compare your driving statistics with friends and to enjoy 
								competing to become the most efficient driver. Furthermore, enviroCar enables you to contribute data collected 
								by your car to the open enviroCar community. <br/><br/>From those data,	enviroCar generates information about 
								traffic in your city and its emissions on our streets. The information will support e.g. urban planners to improve
								traffic light phases or to clarify the impact of traffic calming measures. <br/>enviroCar is the first platform to 
								collect information about the actual emissions right when they happen because it is connected directly to the sensors in the car.
								Join the community and help to make our world a little smarter, traffic less stressful, and economic driving more fun!
							</p>	
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>  
					</div>    
				</div>
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<h2><span id="how"></span>How EnviroCar works?</h2>
							<p style="text-align: justify;">
								enviroCar uses an OBD2 adapter that you can easily plug into your car to access data generated by the 
								various sensors of your car. The enviroCar App installed on your smartphone is able to connect automatically
								to that OBD2 adapter to read out parameters from your car, such as current fuel consumption or revolutions 
								per minute. This way, enviroCar can accurately measure your driving costs, can compute emitted CO2 or even 
								estimate the noise created by your car.
								<br/>
								<br/>
								<img class="offset2" src="./assets/img/obd_adapter.png" height="200" width="400" alt="An ODB II Adapter">
								<br/>
								<br/>
								By using OBD2 adapter, enviroCar is able to receive your cars data by pairing your smartphone via Bluetooth with the adapter. The smartphone app analyzes and parses the data to give you in the app and on the enviroCar these information, which you want to see.
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>  
					</div>
				</div>
			</div><!--end of div id="main"-->
			<div class="tab-pane fade in" id="mobile">
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<ul id="mobileList">
								<li><a href="#reg">- How to registar from your mobile phone?</a></li>
								<li><a href="#down">- How to Download Envirocar application?</a></li>
								<li><a href="#sync">- How to Synchronize your data?</a></li>
							</ul>
						</div> 
					</div>
				</div>
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<h2><span id="reg"></span>Registration</h2>
							<p>  
								registration Steps ... <br/> .. <br/> ... <br/> .. <br/>... <br/> .. <br/>
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>  
						</div>    
					</div>    
				</div>
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<h2><span id="down"></span>Downloading</h2>
							<p>  
								Downloading Steps ... <br/> .. <br/> ... <br/> .. <br/>... <br/> .. <br/>
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>    
					</div>    
				</div>
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<h2><span id="sync"></span>synchronization</h2>
							<p>  
									synchronization Steps ... <br/> .. <br/> ... <br/> .. <br/>... <br/> .. <br/>
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div> 
					</div>    
				</div>
			</div><!--end of div id="mobile"-->
			<div class="tab-pane fade in" id="website">
				<div class="container leftband>
					<div class="row-fluid">
						<div class="span">
							<ul id="websiteList">
								<li><a href="#sign">- How to Register, Sign In and log out ?</a></li>
								<li><a href="#compare">- How to Comapre your Data?</a></li>
								<li><a href="#share">- How to Share your Data?</a></li>
								<li><a href="#Cookies">- Why does this website use cookies?</a></li>
								<li><a href="#lang">- Which are the supported languages?</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<h2><span id="sign"></span>How to Register and Sign In ?</h2>
							<strong> Register </strong> 
							<p style="text-align: justify; ">
								<img class="offset2" src="./assets/img/registrationsteps.jpg" height="450" width="650" alt="Depiction: How to register"/>
								<br/>
								1- From the start page; press "Register" as seen in the picture.
								<br/>
								2- Fill your information inside the input fileds, and then press "Register" to create a new account of the entered information.
								<br/>
								3- If you want to reset the information inside the input fields; press "Reset".
								<br/>
								<br/>
								<br/>
							</p>
							<strong> Signing In </strong>
							<p style="text-align: justify; ">
								<img class="offset2" src="./assets/img/sign.jpg" height="450" width="600" alt="Depiction: How to sign in"/>
								<br/>
								1-From the start page; fill your user name and password and press “SignIn”.
								<br/>
							</p>
							<strong> Logging Out </strong>
							<p style="text-align: justify; ">
								<img class="offset2" src="./assets/img/logout.jpg" height="200" width="350" alt="Depiction: how to log out"/>
								<br/>
								1- You can Log out from any page; notice the image in the top right corner of each page header.
								<br/>
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>    
						</div>    
					</div>    
				</div>
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<h2><span id="compare"></span>How to Compare your Data?</h2>
							<p>  
								comparing Steps and options... <br/> .. <br/> ... <br/> .. <br/>... <br/> .. <br/>
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>    
					</div>    
				</div>
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<h2><span id="share"></span>How to share your data?</h2>
							<p>  
								sharing options... <br/> .. <br/> ... <br/> .. <br/>... <br/> .. <br/>
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>  
						</div>    
					</div>    
				</div>
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<h2><span id="Cookies"></span>Why does this website use cookies?</h2>
							<p style="text-align: justify; ">  
								<strong> What are cookies?</strong>
								<br/>
								Cookies are textfiles that contain certain settings information of the website.
								The website places cookies on your browser software in order to store personal settings for example
								that you stay logged in when you visit the website again during a session.
								<br/>
								<br/>
								<strong>And why cookies?</strong>
								<br/>
								Cookies make a website more user friendly and more functional.
								Cookies help to make your visit on our website more comfortable. Because certain settings of you can be stored temporarily.
								For us the website designer cookies help making the programming work and the data administration easier.
								<br/>
								<br/>
								<strong>Should I disable cookies?</strong>
								<br/>
								The using of cookies is combined with functionality on our website. If you disable them
								the use of a few functions could be impossible or they could be used very circuitously.
								<br/>
								<br/>
								<strong>Where can i find more information about cookies?</strong>
								<br/>
								<a href="http://en.wikipedia.org/wiki/HTTP_cookie">http://en.wikipedia.org/wiki/HTTP_cookie</a>
							</p>	
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>   
						</div>    
					</div>    
				</div>
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<h2><span id="lang"></span>Which are the supported languages?</h2>
							<p style="text-align: justify; ">  
								1- Until Now; Envirocar supports two languages in ower website: English and German languages.
								2- You can toggle between the languages by preesing the flags as seen in the picture below.
							<br/>
							<img src="./assets/img/languages.jpg" height="400" width="600" alt="Depiction: How to change languages"/><br/>
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>
					</div>
				</div>
			</div><!--end of div id="website"-->
			<div class="tab-pane fade in" id="faqs">
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<ul id="faqList">
								<li><a href="#q1"> Q1: How does it work?</a></li>		
								<li><a href="#q2"> Q2: How to get started? What are the requirements?</a></li>
								<li><a href="#q3"> Q3: Which OBD-II adapters are compatible with enviroCar?</a></li>		
								<li><a href="#q4"> Q4: Is my car supported?</a></li>
								<li><a href="#q5"> Q5: Why do we need Indiegogo backers?</a></li>		
								<li><a href="#q6"> Q6: What’s about privacy and security?</a></li>
								<li><a href="#q7"> Q7: I’m a developer and very interested in this project. Is there a way to make some further implementations?</a></li>
								<li><a href="#q8"> Q8: What’s next?</a></li>		
								<li><a href="#q9"> Q9: When enviroCar will be published?</a></li>	
								<li><a href="#q10"> Q10: Can we ship to your country?</a></li>	
							</ul>
						</div>
					</div> 
				</div>
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<strong id="q1">How does it work?</strong>
							<p style="text-align: justify; ">  
								By using OBD2 adapter, enviroCar is able to receive your cars data by pairing your smartphone via Bluetooth with the adapter. The smartphone app analyzes and parses the data to give you in the app and on the enviroCar these information, which you want to see.
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>
					</div>    
				</div> 
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<strong id="q2">How to get started? What are the requirements?</strong>
							<p style="text-align: justify; ">
								Plug your OBD2 adapter into the OnBoard Diagnostic (OBD) port of your car. Download &amp; install the app, pair it with your adapter and you’re ready to be a part of enviroCar.
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>    
						</div>    
					</div>    
				</div>
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<strong id="q3">Which OBD-II adapters are compatible with enviroCar?</strong>
							<p style="text-align: justify; ">  
								There are quite a lot OBD-II adapters for using enviroCar in different pricy ranges. You can buy these adapters on ebay, amazon or several shops. To get some infomation, you can get q quick overview. But please keep in mind, there are many (for example on ebay or amazon) which won’t work. Please have a look on some reviews. If you want to be sure, 
								Also one very important fact about OBD-II use adapters in Germany: It’s only allowed to use CE-certified OBD-II adpaters. While driving your car, the usage of adapters without a CE-certificate is permitted. If you want to be sure, to have the right adapter, contact us or make a pledge for the 199€ pledge (enviroCar device (early bird)), where the right adapter is already included.
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>   
						</div>    
					</div>    
				</div> 
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<strong id="q4">Is my car supported?</strong>
							<p style="text-align: justify; ">
								Mainly there is the following rule. In the USA, all cars from 01.01.1996 have to have the OBD2 interface.
								In Europe, all new cars with an Otto-motor (using benzine) from 01.01.2001 and with the EURO-3 Norm have the OBD2 interface. For diesel vehicles from 01.01.2003 OBD-2 is supported. For trucks, the OBD2 support started with 1. January 2005
								You can also have a look here
								Alternatively we could use a picture like this: http://www.obd-2.de/faqs/obd-2/51-ist-mein-fahrzeug-obd-2-kompatibel.html 
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>    
						</div>    
					</div>    
				</div>
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<strong id="q5">Why do we need Indiegogo backers? </strong>
							<p style="text-align: justify; ">  
								By using indiegogo we want to collect 10.000€ for our future work. With your donation,
								you can be sure, that the enviroCar has a future. That you have the chance to review your and other 
								data for a long time; that you can make yourself and your city more smarter. Help us, that people and 
								students can extend and work on this project. 
								(Linked Citizen science is a topic, in which the ifgi and 52N want to do more scientific work) 
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>    
					</div>    
				</div>    
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<strong id="q6">What’s about privacy and security?</strong>
							<p style="text-align: justify; ">
								Of course we are aware of your privacy issue. All your data will be anonymized, 
								so nobody will be able to collect sensitive, specific, person-related data about your usage. Your security is a very important 
							topic for us. By using enviroCar you haven’t worry about it. </p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>    
					</div>    
				</div>    
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<strong id="q7">I’m a developer and very interested in this project. Is there a way to make some further implementations?</strong>
							<p style="text-align: justify; ">
								Open Source software, sparql, contact us
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>
					</div>    
				</div>     
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<strong id="q8">What’s next?</strong>
							<p style="text-align: justify; ">
								To start with our goal to make your place a little bit smarter, you’re the most important person in this program. The next steps include further implementation of new features and the development a working system, as well as building up the enviroCar community.
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>    
					</div>    
				</div>    
				<div class="container rightband">
					<div class="row-fluid">
						<div class="span">
							<strong id="q9"> When enviroCar will be published?</strong>
							<p style="text-align: justify; ">
								We’re working hard on the enviroCar system. For now we’ve implemented first prototypes for app and website. Further work will be on adding more features and implementing useful functions for you.
								We plan to release enviroCar with the end of XXX. Please be patient and look for our updates.
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>    
					</div>    
				</div>
				<div class="container leftband">
					<div class="row-fluid">
						<div class="span">
							<strong id="q10">Can we ship to your country?</strong>
							<p style="text-align: justify; ">
								We will ship in all countries.
							</p>
							<p class="pull-right" >
								<a href="#">Back to top</a>
							</p>
						</div>    
					</div>    
				</div>
			</div><!--end of div id="faqs"-->   
		</div><!--end tab content-->
<?
include('footer.php');
?>
