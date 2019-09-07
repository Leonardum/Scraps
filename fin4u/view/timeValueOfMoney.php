<?php
include_once('header.html');
?>

<body>
    <div class="row">
        
        <div class="col-l8 centerContent textContent">
            
            <h1 class="textTitle goldText">Time value of money</h1>
            
            <p class="textLevelOne">Time value of money is a concept in finance based on the notion that it is better to have a specific amount of money today, rather than having that same specific amount of money in the future. “But why?”, I hear you ask. Well, this has everything to do with the fact that you can use the money today to invest in something, which can return you a bigger amount of money in the future. For example, if you have 100 today, you can put this money on a savings account on the bank and this will give you that same 100 with interest in the future. So, having 100 today, is better than having 100 tomorrow.</p>
            
            <p class="textLevelOne">Ok, but how MUCH better is it? Can we calculate the future value of the money? Of course! As long as we know the interest we will receive. Suppose that:</p>
            
            <ul class="textList">
                <li>P = the amount of money you have today</li>
                <li>r = the interest rate the bank will give us for depositing P on a savings account</li>
                <li>F = the amount of money we will have if we deposit P for 1 year on the savings account</li>
            </ul>
            
            <p class="textLevelOne">Then we can calculate <span class="italic">F </span>, if we know both <span class="italic">P </span> and <span class="italic">r </span>. We know that after 1 year time, we will still have <span class="italic">P </span>. But on top of that, we will also have the interest that <span class="italic">P </span> generated:</p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f001.png?v3" class="formula singleLine">
            </div>
            
            <p class="textLevelOne">
                We can rewrite this expression as:
            </p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f002.png?v3" class="formula singleLine">
            </div>
            
            <p class="textLevelOne">Example: we have 100 today and the bank offers us a 5% interest rate for putting this on our checking account. This means that after 1 year, we will still have that 100. But on top of that we will have 5% of 100. This means that we will have <span class="italic">F </span>:</p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f003.png?v3" class="formula singleLine">
                <img src="./images/formulae/f004.png?v3" class="formula doubleLine">
                <img src="./images/formulae/f005.png?v3" class="formula doubleLine">
                <img src="./images/formulae/f006.png?v3" class="formula noBrackets">
                <img src="./images/formulae/f007.png?v3" class="formula noBrackets">
            </div>
            
            <p class="textLevelOne">We can of course also calculate this using the second formula:</p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f008.png?v3" class="formula singleLine">
                <img src="./images/formulae/f009.png?v3" class="formula doubleLine">
                <img src="./images/formulae/f010.png?v3" class="formula singleLine">
                <img src="./images/formulae/f011.png?v3" class="formula noBrackets">
                <img src="./images/formulae/f007.png?v3" class="formula noBrackets">
            </div>
            
            <p class="textLevelOne">Ok, that was easy. But what if, we put the money on the savings account for 2 years? We will still have <span class="italic">P </span> after two years and we will also have the interest of year one AND year 2 on <span class="italic">P </span>:</p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f012.png" class="formula singleLine">
            </div>
            
            <p class="textLevelOne">But wait a minute? Aren’t we forgetting something? After one year, we had interest on <span class="italic">P </span>. And that interest started to generate some more interest during the second year! (This is called compounding interest.) So, we will also have:</p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f013.png?v3" class="formula singleLine">
                <img src="./images/formulae/f014.png?v3" class="formula noBrackets">
            </div>
            
            <p class="textLevelOne">Throwing everything together, after 2 years, we will have:</p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f015.png?v3" class="formula singleLine">
            </div>
            
            <p class="textLevelOne">Let’s get the common factor P outside of the brackets:</p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f016.png?v3" class="formula singleLine">
                <img src="./images/formulae/f017.png?v3" class="formula singleLine">
            </div>

            <p class="textLevelOne">Hang on, we know this expression: <span class="italic">(a + b)² = a² + 2ab + b² </span>. This means, we can write it more simple:</p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f019.png?v3" class="formula singleLine">
            </div>

            <p class="textLevelOne">Errrrm…starting to see a pattern emerge here… Remember the second way we wrote the formula to calculate how much money we would have after 1 year? That’s right, it was:</p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f002.png?v3" class="formula noPower">
            </div>

            <p class="textLevelOne">And now, we see that the formula for calculating how much money we have after 2 years is:</p>
            
            <div class="formulaFrame">
                <img src="./images/formulae/f019.png?v3" class="formula singleLine">
            </div>

            <p class="textLevelOne">Come to think of it, this makes perfect sense! For every year we save money on the bank account, we will keep the money we had one year ago AND we will add the interest on that amount. So, if we would save our money for 5 years, we would have the money we had after 4 years, plus the interest on that:</p>


F_5=P_4×(1+r)
But of course, as we know, the money we had after 4 years (P_4) is nothing else than the money we had on our savings account after 3 years (P_3), plus the interest on that money:
P_4=P_3×(1+r)
And similarly, P_3, P_2 and P_1 are:
P_3=P_2×(1+r)
P_2=P_1×(1+r)
P_1=P×(1+r)

This means that after 5 years, we will have:
F_5=P_4×(1+r)
〖⇔F〗_5=P_3×(1+r)×(1+r)
〖⇔F〗_5=P_2×(1+r)×(1+r)×(1+r)
⇔F_5=P_1×(1+r)×(1+r)×(1+r)×(1+r)
⇔F_5=P×(1+r)×(1+r)×(1+r)×(1+r)×(1+r)
〖⇔F〗_5=P×(1+r)^5

Well then, looks like we just found ourselves a general formula for calculating the value of our money over time! If we have:
P=the amount of money you have today=principal 
r=the (annually compounded) interest rate
t=the amount of time in years that we will save our money
F_t=the future value of P after that time 
Then we can always calculate F_t as:
F_t=P×(1+r)^t
Example time! If we put 250 on our savings account for 7 years and the bank will give us 3% interest per year, then after 7 years we will have:
F=250×(1+3%)^7
F=250×(100/100+3/100)^7
F=250×(103/100)^7
F=250×(1.03)^7
F≈250×1.23
F≈307.47

Fantastic! But how does this help me? It’s nice to know how much money I would have on the bank, but that does not make me a finance genius… True, but you can do so much more with this! The secret is in the interest rate. The bank might tell you very clear which the interest rate is that they will give you. But it is not always that clear when looking at different investment opportunities.
Suppose I saved up 1000 and I want to invest this money for the next few years to get some profit of it. I find two reliable investment opportunities. One that will give me 1200 after 2 years and one that will give me 9% compounded interest for 3 years. Moreover, I know that the bank will offer me a 6% interest rate when depositing my money on a savings account.
Which opportunity should I pick? Let’s do the math for both possibilities. Let’s start with the one that will give me 1200 after 2 years. I know that:
P=1000 
t=2
F_2=1200 
Now we have a bit of a problem. Because this investment opportunity will only take 2 years until payback, while the other one will take me 3. I don’t want to compare apples and pears here. How can I fix this? Of course! After those 2 years, I can put the money I made with this investment opportunity on the bank for one year and that will give me some more interest! So, if I pick this opportunity, after 3 years, I will have:
F_3=F_2×(1+6%)
F_3=1200×1.06
F_3=1272


Now, how much will the other option give me after 3 years? We know that: 
P=1000 
r=9% 
t=3 
This means that:
F_3=1000×(1+9%)^3
F_3=1000×〖1.09〗^3
F_3≈1000×1.295
F_3≈1.295

Look at that! We have our answer. The second investment opportunity seems to return us more than the first one. Option one returned us 272, while option two returned us 295. Logically, I would like to invest my money in the opportunity with the highest return…
… or the highest rate of return! Rate of return? Yes, that’s the equivalent of the interest rate offer by the bank for putting your money on a savings account. Now, for the second investment opportunity, I already know that the rate of return is 9%. However, if I could calculate the rate of return for the first investment opportunity, I could compare which is the best one like that as well. Now of course I already know the answer, but just for fun, we will calculate the rate of return on option 1. How can we do this? Well, always start with what we know. Over 3 years, I turned my 1000 into 1272. That means that:
P=1000 
t=3
F_3=1272
Now what? We don’t have a formula to calculate r with this information. Or do we… What if…
F=P×(1+r)^t
⇔F/P=(1+r)^t
⇔√(t&F/P)=1+r
⇔√(t&F/P)-1=r
⇔r=√(t&F/P)-1
Isn’t math handy? Now, let’s calculate the rate of return of our first investment opportunity!
r=∛(1272/(1000 ))-1
r=∛1.272-1
r=∛1.272-1
r≈1.0835-1
r≈0.0835
r≈(0.0835×100)%
r≈8.35%

Now, as we recall, the second investment opportunity has a rate of return of 9% and the first opportunity apparently has a return of 8.35%. Of course, I want to go for the investment opportunity that gives me the higher rate of return. This confirms it! We will pick the second investment opportunity.

There we have it. The principle of time value of money and rates or return (= interest rates) are the very bedrock of finance. Having a firm grasp on these concepts will make everything else so much easier to understand.
            
        </div>
        
    </div>
    
</body>

<script type="text/javascript" src="./js/main.js?v01"></script>
    
<?php
include_once('footer.html');
?>