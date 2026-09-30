#include <stdio.h>

/*
Task 4: Identify and correct invalid variable names.

Given List:
1. 1stPlayer    -> INVALID: Variable names cannot begin with a digit.
   Correction   -> player1 or firstPlayer

2. player_age   -> VALID: Contains lowercase letters and underscore.

3. $score       -> INVALID: In C, variable names cannot start with or contain special characters like $.
   Correction   -> score or totalScore

4. total-marks  -> INVALID: Hyphen (-) is treated as a subtraction operator, not allowed in variable names.
   Correction   -> total_marks or totalMarks

5. userName     -> VALID: Follows camelCase naming convention with valid letters.
*/

int main()
{
    // Demonstrating the corrected and valid variables:
    int firstPlayer = 10;
    int player_age = 22;
    int score = 95;
    int total_marks = 480;
    char userName[] = "RahulSharma";

    printf("--- Variable Naming Demonstration ---\n");
    printf("1. Corrected '1stPlayer'   -> firstPlayer: %d\n", firstPlayer);
    printf("2. Valid 'player_age'       -> player_age: %d\n", player_age);
    printf("3. Corrected '$score'       -> score: %d\n", score);
    printf("4. Corrected 'total-marks'  -> total_marks: %d\n", total_marks);
    printf("5. Valid 'userName'         -> userName: %s\n", userName);

    return 0;
}
