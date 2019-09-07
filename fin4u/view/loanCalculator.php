<?php
include_once('header.html');
?>

<body>
    
    <div class="col-l2" style="min-height: 1rem;"></div>
    <div class="col-l8" style="padding: 2rem; background-color: rgba(255, 255, 255, 1);">
        <div class="col-l5 contentZone">
            <h1 class="goldText">Property information</h1>
            
            
            <div class="userInput">
                <input type="text" id="totalPrice" name="totalPrice">
                <label>Total price of purchased (house, car, ...):</label>
            </div>
            
            
            <div class="userInput">
                <input type="text" id="principal" name="principal" value="<?php if (isset($principal)) {echo $principal;} ?>" class="<?php if (isset($principalErr)) {echo "invalid";} else if (isset($principal)) {echo "valid";} ?>">
                <label>Loan amount (= principal):</label>
                <span class="error"><?php if (isset($principalErr)) {echo $principalErr;} ?></span>
            </div>
            
            
            <div class="userInput">
                <label>Loan term:</label>
                <div class="col-l6 col-m6 col-s6" style="padding-right: 0.25rem;">
                    <input type="text" id="term" name="term" value="<?php if (isset($term)) {echo $term;} ?>" class="<?php if (isset($termErr)) {echo "invalid";} else if (isset($term)) {echo "valid";} ?>">
                    <span class="error"><?php if (isset($termErr)) {echo $termErr;} ?></span>
                </div>
                
                <div class="col-l6 col-m6 col-s6" style="padding-left: 0.25rem;">
                    <div class="selectWrapper">
                        <span class="caret">▼</span>
                        <input type="text" id="termType" class="selectInput" name="termType" value="" placeholder="Years" readonly="true">
                        <ul class="selectDropdown" style="display: none;">
                            <li class="option">Years</li>
                            <li class="option">Months</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            
            <div class="userInput">
                <label>Starting date:</label>
                <div class="col-l6 col-m6 col-s6" style="padding-right: 0.25rem;">
                    <div class="selectWrapper">
                        <span class="caret">▼</span>
                        <input type="text" id="startMonth" class="selectInput" name="startDate" value="" placeholder="" readonly="true">
                        <ul class="selectDropdown">
                            <li class="option">January</li>
                            <li class="option">February</li>
                            <li class="option">March</li>
                            <li class="option">April</li>
                            <li class="option">May</li>
                            <li class="option">June</li>
                            <li class="option">July</li>
                            <li class="option">August</li>
                            <li class="option">September</li>
                            <li class="option">October</li>
                            <li class="option">November</li>
                            <li class="option">December</li>
                        </ul>
                        <select>
                          <option value=0>January</option>
                          <option value=1>February</option>
                          <option value=2>March</option>
                          <option value=3>April</option>
                          <option value=4>May</option>
                          <option value=5>June</option>
                          <option value=6>July</option>
                          <option value=7>August</option>
                          <option value=8>September</option>
                          <option value=9>October</option>
                          <option value=10>November</option>
                          <option value=11>December</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-l6 col-m6 col-s6" style="padding-left: 0.25rem;">
                    <input type="text" id="startYear" name="startYear" value=""  placeholder="">
                    <span class="error"><?php if (isset($startYearErr)) {echo $startYearErr;} ?></span>
                </div>
            </div>
            
            
            <div class="userInput">
                <input type="text" id="interest" name="interest" value="<?php if (isset($interest)) {echo $interest;} ?>" class="<?php if (isset($interestErr)) {echo "invalid";} else if (isset($interest)) {echo "valid";} ?>">
                <label>Interest rate (%):</label>
                <span class="error"><?php if (isset($interestErr)) {echo $interestErr;} ?></span>
            </div>
            
            
            <div class="userInput noAddedPadding">
                <div class="checkRadioWrapper">
                    <input type="radio" id="continuous" name="compoundType" value="continuous" checked="checked"><span class="radioText">Continuously compounded intrest rate.</span>
                </div>
                <div class="checkboxWrapper">
                    <input type="radio" id="monthly" name="compoundType" value="monthly"><span class="radioText">Monthly compounded intrest rate.</span>
                </div>
                <div class="checkboxWrapper">
                    <input type="radio" id="yearly" name="compoundType" value="yearly"><span class="radioText">Yearly compounded intrest rate.</span>
                </div>
            </div>
            
            
            <div class="userInput">
                <input type="text" id="tax" name="tax">
                <label>Expected annual property tax:</label>
                <div class="checkRadioWrapper">
                    <input type="checkbox" id="taxPercent" name="taxPercent"><span class="checkboxText">as percentage of home value.</span>
                </div>
            </div>
            
            
            <div class="userInput">
                <input type="text" id="insurance" name="insurance">
                <label>Expected annual insurance fee:</label>
                <div class="checkRadioWrapper">
                    <input type="checkbox" id="insurancePercent" name="insurancePercent"><span class="checkboxText">as percentage of home value.</span>
                </div>
            </div>
            
            
            <div class="userInput">
                <input type="text" id="other" name="other">
                <label>Other monthly costs (repairs, renovations):</label>
            </div>
            
            
            <div class="userInput">
                <input type="text" id="rent" name="rent">
                <label>Expected monthly rent income (optional):</label>
            </div>
            
            
            <div class="userInput center">
                <button onclick="calcMonthlyPayments()">Calculate repayment details</button>
            </div>
        </div>
        
        
        <div class="col-l7 contentZone">
            
            
            
            <div class="row" id="monthlyCostsOverview">
                <h1 class="goldText">Monthly costs</h1>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Monthly debt repayments:</p>
                    <p id="monthlyDebt" class="center bold"></p>
                </div>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Monthly tax cost:</p>
                    <p id="monthlyTax" class="center bold"></p>
                </div>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Monthly insurance cost:</p>
                    <p id="monthlyInsurance" class="center bold"></p>
                </div>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Other costs:</p>
                    <p id="otherMonthlyCost" class="center bold"></p>
                </div>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Total monthly costs:</p>
                    <p id="monthlyCosts" class="center bold"></p>
                </div>
            </div>
            
            
            <div class="row" id="annualCostsOverview">
                <h1 class="goldText">Annual costs</h1>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Annual debt repayments:</p>
                    <p id="annualDebt" class="center bold"></p>
                </div>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Annual tax cost:</p>
                    <p id="annualTax" class="center bold"></p>
                </div>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Annual insurance cost:</p>
                    <p id="annualInsurance" class="center bold"></p>
                </div>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Other costs:</p>
                    <p id="otherAnnualCost" class="center bold"></p>
                </div>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Total annual cost:</p>
                    <p id="annualcosts" class="center bold"></p>
                </div>
            </div>
            
            <div class="row" id="profitOverview" style="display: none;">
                <h1 class="goldText">Expected profit</h1>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Monthly profit:</p>
                    <p id="monthlyProfit" class="center bold"></p>
                </div>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Annual profit:</p>
                    <p id="annualProfit" class="center bold"></p>
                </div>
            </div>
            
            <div class="row" id="otherInfo">
                <h1 class="goldText">Other info</h1>
                
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Total debt repayment:</p>
                    <p id="total" class="center bold"></p>
                </div>
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Total interest paid:</p>
                    <p id="totalInterest" class="center bold"></p>
                </div>
                <div class="col-l6 col-m6" style="height: 6rem; margin-bottom: 2rem;">
                    <p class="center">Pay-off date:</p>
                    <p id="payoffDate" class="center bold"></p>
                </div>
            </div>
            
            <div id="showTableButton" class="col-l12" style="height:5rem;"></div>
            
        </div>
        
        
        <div class="col-l12 contentZone">
            
            <div id="amortizationTable" class="col-l12" style="padding-top: 3rem; display: none;">
                
                <div class="row">
                    <div class="col-lfive" style="padding: 1rem;">
                        <p class="center bold">Month of payment</p>
                    </div>
                    <div class="col-lfive" style="padding: 1rem;">
                        <p class="center bold">Intrest portion</p>
                    </div>
                    <div class="col-lfive" style="padding: 1rem;">
                        <p class="center bold">Principal repayment</p>
                    </div>
                    <div class="col-lfive" style="padding: 1rem;">
                        <p class="center bold">Remaining principal</p>
                    </div>
                    <div class="col-lfive" style="padding: 1rem;">
                        <p class="center bold">Portion of property owned</p>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
    <div class="col-l2" style="min-height: 1rem;"></div>
    
</body>

<script type="text/javascript" src="./js/main.js?v01"></script>
<script type="text/javascript" src="./js/loanCalculator.js?v01"></script>
    
<?php
include_once('footer.html');
?>