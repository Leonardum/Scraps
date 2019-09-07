<?php
include_once('header.html');
?>

<body>
	<a name="top"></a>
    
    <div class="wrapper">
        
        <img src="./images/001.jpg?v01" class="homeImg">
        
        <ul class="navbar">
            <li class="dropdown">
                <a><button class="homeDropButton">Basics of finance</button></a>
                <ul class="dropdownContent">
                    <li>
                        <a>Money</a>
                    </li>
                    <li>
                        <a>Banks</a>
                    </li>
                    <li>
                        <a href="index.php?action=timeValueOfMoney">Time value of money</a>
                    </li>
                    <li>
                        <a>Intrest rates and risk</a>
                    </li>
                    <li>
                        <a>Risk mitigation</a>
                    </li>
                    <li>
                        <a>Return</a>
                    </li>
                    <li>
                        <a>Calculator</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a><button class="homeDropButton">Real estate</button></a>
                <ul class="dropdownContent">
                    <li>
                        <a>Taking a loan</a>
                    </li>
                    <li>
                        <a>Selecting a property</a>
                    </li>
                    <li>
                        <a>Cash flow and return</a>
                    </li>
                    <li>
                        <a href="index.php?action=loanCalculator">Calculator</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a><button class="homeDropButton">Currencies</button></a>
                <ul class="dropdownContent">
                    <li>
                        <a>Currencies and inflation</a>
                    </li>
                    <li>
                        <a>Exchange rates</a>
                    </li>
                    <li>
                        <a>How to invest?</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a><button class="homeDropButton">Shares</button></a>
                <ul class="dropdownContent">
                    <li>
                        <a>What are shares?</a>
                    </li>
                    <li>
                        <a>Value and return</a>
                    </li>
                    <li>
                        <a>How to invest?</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a><button class="homeDropButton">Commodities</button></a>
                <ul class="dropdownContent">
                    <li>
                        <a>What are commodities?</a>
                    </li>
                    <li>
                        <a>Why invest in commodities?</a>
                    </li>
                    <li>
                        <a>How to invest?</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a><button class="homeDropButton">Derivatives</button></a>
                <ul class="dropdownContent">
                    <li>
                        <a>What are derivatives?</a>
                    </li>
                    <li>
                        <a>Futures and forwards</a>
                    </li>
                    <li>
                        <a>Swaps</a>
                    </li>
                    <li>
                        <a>Options</a>
                    </li>
                    <li>
                        <a>Warrants</a>
                    </li>
                    <li>
                        <a>How to invest?</a>
                    </li>
                    <li>
                        <a>Calculator</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a><button class="homeDropButton">Crypto-currencies</button></a>
                <ul class="dropdownContent">
                    <li>
                        <a>What are crypto-currencies?</a>
                    </li>
                    <li>
                        <a>Technologies</a>
                    </li>
                    <li>
                        <a>How to invest?</a>
                    </li>
                </ul>
            </li>
        </ul>
        
        <h1 class="homepageTitle">Finance 4 U</h1>
        <h2 class="homepageSubTitle">Educate yourself, because no one else will!</h2>
        
        <div style="position:absolute; width:inherit; top:75%; text-align:center;">
            <a><button class="call-to-action">Join now</button></a>
            <a><button class="call-to-action neighbour">Log in</button></a>
        </div>
    </div>
	
	<div class="homeContent topShadow">
		<div class="row silver">
			<div class="col-l3 valuePropositionBox">
				<p class="valuePropositionTitle goldText">Who we are</p>
                <p class="valuePropositionParagraph">Find out more about who we are, what we do and why we do it.</p>
                <div class="valuePropositionButtonFrame">
					<div class="valuePropositionButton">
						<a href="index.php?action=loanCalculator"><button class="oval">About</button></a>
					</div>
				</div>
			</div>
			<div class="col-l3 valuePropositionBox">
				<p class="valuePropositionTitle goldText">Where we've been</p>
                <p class="valuePropositionParagraph">Find out more about who we are, what we do and why we do it.</p>
                <div class="valuePropositionButtonFrame">
					<div class="valuePropositionButton">
						<a href="#top"><button class="oval">Gallery</button></a>
					</div>
				</div>
			</div>
			<div class="col-l3 valuePropositionBox">
				<p class="valuePropositionTitle goldText">What we play</p>
                <p class="valuePropositionParagraph">Find out more about who we are, what we do and why we do it.</p>
                <div class="valuePropositionButtonFrame">
					<div class="valuePropositionButton">
						<a href="#top"><button class="oval">Repertoire</button></a>
					</div>
				</div>
			</div>
			<div class="col-l3 valuePropositionBox">
				<p class="valuePropositionTitle goldText">If we are available</p>
                <p class="valuePropositionParagraph">Find out more about who we are, what we do and why we do it.</p>
                <div class="valuePropositionButtonFrame">
					<div class="valuePropositionButton">
						<a href="#top"><button class="oval">Calendar</button></a>
					</div>
				</div>
			</div>
		</div>
				
		<div class="row">
			<div class="col-l12 footer">
				<p>
					<a class="textLink" href="index.php?action=terms" target="_blank">Terms of service & Privacy Policy</a>
					<a class="textLink" href="index.php?action=contact" target="_blank">Contact us</a>
				</p>
				<p>All rights reserved © 2018 Orfee</p>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="./js/main.js"></script>
	
</body>

<?php
include_once('footer.html');
?>