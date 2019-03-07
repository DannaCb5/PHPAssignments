"use strict"

// Bulls and Cows is a guessing game:

// A Secret number is generated and compared to guessed numbers until the player guesses the secret number or runs out of turns.  

// Example:  

//Say the secret number is A B C D E and the player guesses A B C D E.  Guess digit A is compared to digit A of the secret number, then the same for secret digit B, secret digit C and so on.  Then the guess digit B is compared the same way and so on.  

// If the guess digit in the A position matches the secret digit in the A position or any time positions match that counts as a bull.  

// If guess digit A matches secret digits B, C, D or E or any time the positions don't match. then it is a cow.  

// So Secret Number 3 5 6 2 3 and guess number 4 5 2 6 9 would return 1 bull and 2 cows. The matching 5s are a bull and the 2 and 6 are cows.

// Once a guess has been made and the bulls and cows are returned for that guess, the player is prompted to try again until they either quit, win, or run out of their 10 trys. 


let secretNumber;
let guess = "0";
let guesses = 0;
let turn = "first";
let guessChar1, guessChar2, guessChar3, guessChar4, guessChar5;
let times = 1;
let characters = 0;
let roundCount = 0;
let bulls = 0;
let cows = 0;
let secretCount = 0;
let guessCount = 0;
let guessCharX = 0;
let returnClose;
// 1. function secretNumberGenerator();
// 2. function askIfPlayerWantsToPlay();
// 3. function validateUserInputIsNumber();
// 4. function getUserInputNumber();
// 5. function calculateCowsBullsCompare();
//      5a. function assignGuessCharX();
//      5b. function compareGuessCharXToSecretChar();


// 1. Generate a Secret Number and assign the characters to variables
/*secretNumberGenerator();

function secretNumberGenerator() {
    secretNumber = Math.round((Math.random() * 99999) + 9999);
    console.log("The Secret Number is " + secretNumber);
    secretNumber = secretNumber.toString();
    let returnClose = 1
    askIfPlayerWantsToPlay();
}
// 2. Ask player to enter 5 characters one guess at a time that will be assigned to variables. Later returns bulls and cows count to the player
    function askIfPlayerWantsToPlay() {
    if (roundCount == 10) {
        alert("Sorry your turns are up");
    } else {
        let tryAgain = prompt('You can try up to 10 times. Would you like to try to guess a number.  Type "yes" or "no"');
        alert(tryAgain);
        if (tryAgain == "no") {
            alert("Quitting so soon? roundCount " + roundCount);
            return;
        } else if (tryAgain != "yes") {
            alert('Please enter "yes" or "no"');
        } else {
            alert("Good Luck!");
        }
        roundCount = roundCount++;
        validateUserInputIsNumber();
    }

}

// 3. Validate Guess
function validateUserInputIsNumber() {
    guess = prompt("Guess the " + turn + " digit of your 5 digit number.");
    if (guess == null) {
        alert("guess " + guess);
        return;
    } else if (guess > 9) {
        console.log("Guess must be a 1 digit whole number between 0 and 9, your number was " + guess);
    } else {
        getUserInputNumber();
    }
}
// 4. Get User Input
function getUserInputNumber() {
    if (guesses == 0) {
        turn = "second";
        guessChar1 = guess;
        alert("guessChar1 = " + guessChar1)
        console.log("Your first digit is " + guessChar1);
        guesses = guesses + 1;
        validateUserInputIsNumber();
    } else if (guesses == 1) {
        turn = "third";
        guessChar2 = guess;
        alert("guessChar2 = " + guessChar2)
        console.log("Your second digit is " + guessChar2);
        guesses = guesses + 1;
        validateUserInputIsNumber();
    } else if (guesses == 2) {
        turn = "fourth";
        guessChar3 = guess;
        alert("guessChar3 = " + guessChar3)
        console.log("Your third digit is " + guessChar3);
        guesses = guesses + 1;
        validateUserInputIsNumber();
    } else if (guesses == 3) {
        turn = "fifth";
        guessChar4 = guess;
        alert("guessChar4 = " + guessChar4)
        console.log("Your forth digit is " + guessChar4);
        guesses = guesses + 1;
        validateUserInputIsNumber();
    } else if (guesses == 4) {
        guessChar5 = guess;
        alert("guessChar5 = " + guessChar5)
        console.log("Your fifth digit is " + guessChar5);
        guesses = guesses + 1;
        console.log("incremented to " + guesses);
        alert("You guessed " + guessChar1 + guessChar2 + guessChar3 + guessChar4 + guessChar5);
        getUserInputNumber();
    } else {
        calculateCowsBullsCompare();
    }
}


// 5a. Assign Character to guessCharX
function assignGuessCharX() {
        if (guessCount === 0) {
            guessCharX = parseInt(guessChar1);
        } else if (guessCount === 1) {
            guessCharX = parseInt(guessChar2);
        } else if (guessCount === 2) {
            guessCharX = parseInt(guessChar3);
        } else if (guessCount === 3) {
            guessCharX = parseInt(guessChar4);
        } else if (guessCount === 4) {
            guessCharX = parseInt(guessChar5);
        } else {}
        console.log("My guess X is" + guessCharX);
        guessCount = guessCount + 1;
        console.log(guessCount);
    }

// 5b. Compare guesses (guessCount [1..5]) to secretNumber (secretCount [1..5])
function compareGuessCharXToSecretChar() {
        if (secretChar != guessCount && (guessCharX == secretNumber.charAt(secretChar))) {
            console.log("This is not the same character of both the guess and the secret " + secretCount + " " + guessCount + " but there is a match " + guessCharX + " " + secretNumber.charAt(secretChar))
            cows = cows + 1;
        } else if (guessCharX == secretNumber.charAt(secretChar)) {
            bulls = bulls + 1;
        } else {}
        secretCount = secretCount + 1;
        console.log("The secret character count is " + secretCount + " and the guessed character count is " + guessCount);
    }

// 5. Calculate the quantity of cows and bulls.
function calculateCowsBullsCompare() {
    { while (guessCount <= 4) {
        //Assign one character to guessCharX;
        assignGuessCharX();
        console.log(guessCharX);
        //Test current guessCharX against each of the secret number charactersfunction assignGuessCharX();
        compareGuessCharXToSecretChar();
        // console.log(compareGuessCharXToSecretChar);
    }
    askIfPlayerWantsToPlay();
}
}