<?php

playRockPaperScissors();

$winnerTally = 0;
$loserTally = 0;
$drawTally = 0;

function playRockPaperScissors () {
    do {
        echo "Please enter a value: R, P or S\n";
        $playersChoice = strtoupper(stream_get_line(STDIN, 10, "\n"));
        if ($playersChoice == "R" || $playersChoice == "P" || $playersChoice == "S") {
            determineWinner(assignPlayerRockPaperScissor($playersChoice), assignComputersValue());
            echo "Do you want to play again? Y or N\n";
            $newChoice = strtoupper(stream_get_line(STDIN, 10, "\n"));
            if ($newChoice == "Y") {
                playRockPaperScissors();
            } elseif ($newChoice == "N") {
            calculateTally();
            } elseif ($newChoice != "Y" || "N") {
                playAgain();    
            }
        }
                               
    } while ($playersChoice != "R" || "P" || "S");
}

//This function changes the users selection or R, P or S into a string "Rock", "Paper" or "Scissors".
//and assigns the string value to the $playerChoice variable
//Then it prints a confirmation of the players choice.
//Finally it returns the $playerChoice variable.
function assignPlayerRockPaperScissor($playersChoice) {
    switch($playersChoice) {
        case 'R':
            $playersChoice = "Rock";
            break;
        case 'P':
            $playersChoice = "Paper";
            break;
        case 'S':
            $playersChoice = "Scissors";
            break;
        default:          
            die("Sorry I did not recognise your selection");
            break; 
    }
    echo "You have selected $playersChoice.\n";
    return $playersChoice;
}

//This function uses the random function to assign a value between 0-2 to the $computerSelection variable.
//Then it changes the random assigned integer to a string of "Rock", "Paper" or "Scissors".
//Then it prints out the computers selection.
//Finally it returns the $computerSelection variable
function assignComputersValue() {
    $computerSelection = random_int(0, 2);
    switch ($computerSelection) {
    case 0:
        $computerSelection = "Rock";
        break;
    case 1:
        $computerSelection = "Paper";
        break;
    case 2:
        $computerSelection = "Scissors";
        break;
    default:
        die("Error occured. Game has been ended");
        break;    
    }
    echo "The computer has selected $computerSelection.\n";
    return $computerSelection;
}

//This function uses a switch statement to determine what the users choice is
// and then calls the corresponding function.
function determineWinner($playersChoice, $computerSelection) {
    switch ($playersChoice) {
        case 'Rock':
            rockScenario($computerSelection);
            break;
        case 'Paper':
            paperScenario($computerSelection);
            break;
        case 'Scissors':
            scissorsScenario($computerSelection);
            break;
        default:
            echo "It's broke....sozatron";
            break;
    }
}

function rockScenario($computerSelection) {
    $winner = "You Win!\n";
    $loser = "You Lose\n";
    $draw = "It's a draw\n";
    global $winnerTally;
    global $loserTally;
    global $drawTally;
    if ($computerSelection == "Paper") {
                echo "Paper wraps Rock. " . $loser;
                $loserTally++;
            } elseif ($computerSelection == "Scissors") {
                echo "Rock smashes Scissors. " . $winner;
                $winnerTally++;
            } elseif ($computerSelection == "Rock") {
                echo $draw;
                $drawTally++;
            }
}

function paperScenario($computerSelection) {
    $winner = "You Win!\n";
    $loser = "You Lose\n";
    $draw = "It's a draw\n";
    global $winnerTally;
    global $loserTally;
    global $drawTally;
    if ($computerSelection == "Scissors") {
                echo "Scissors cuts Paper. " . $loser;
                $loserTally++;
            } elseif ($computerSelection == "Rock") {
                echo "Paper wraps Rock. " . $winner;
                $winnerTally++;
            } elseif ($computerSelection == "Paper") {
                echo $draw;
                $drawTally++;
            }
}

function scissorsScenario($computerSelection) {
    $winner = "You Win!\n";
    $loser = "You Lose\n";
    $draw = "It's a draw\n";
    global $winnerTally;
    global $loserTally;
    global $drawTally;
    if ($computerSelection == "Rock") {
                echo "Rock smashes Scissors. " . $loser;
                $loserTally++;
            } elseif ($computerSelection == "Paper") {
                echo "Scissors cuts paper. " . $winner;
                $winnerTally++;
            } elseif ($computerSelection == "Scissors") {
                echo $draw;
                $drawTally++;               
            }
}


//This function makes the tally variables global so we can compare the tallys and determine an overall winner.
function calculateTally() {
    global $winnerTally;
    global $loserTally;
    global $drawTally;
    if ($winnerTally > $loserTally){
                echo "You Won $winnerTally, drew $drawTally and lost $loserTally";
    } elseif ( $loserTally > $winnerTally) {
                echo "You lost $loserTally out of ". ($winnerTally + $loserTally + $drawTally);
    } elseif ( $drawTally > ($winnerTally + $loserTally) || $winnerTally == $loserTally) {
                   echo "You drew";
    }
    die("\nEnd of Game!");
}


function playAgain () {
    echo "Do you want to play again? Y or N\n";
            $newChoice = strtoupper(stream_get_line(STDIN, 10, "\n"));
            if ($newChoice == "Y") {
                playRockPaperScissors();
            } elseif ($newChoice == "N") {
            calculateTally();
            } elseif ($newChoice ) {
                playAgain();
            }
}

   

