#include <stdio.h>

/*
Task 4: Entry-Controlled vs Exit-Controlled Loops Explanation and Demonstration

1. Entry-Controlled Loop (e.g., while, for):
   - The test condition is checked BEFORE entering the loop body.
   - If the condition is false initially, the loop body DOES NOT execute even once.

2. Exit-Controlled Loop (e.g., do-while):
   - The loop body executes FIRST, and the test condition is checked at the END.
   - Even if the condition is false initially, the loop body executes AT LEAST ONCE.
*/

int main()
{
    int number = 100; // Condition will be (number < 10), which is FALSE initially.

    printf("--- 1. Entry-Controlled Loop (while loop) ---\n");
    printf("Initial value: number = %d, Condition: (number < 10)\n", number);
    
    while (number < 10)
    {
        printf("This inside while loop will NEVER print because condition is false at start.\n");
    }
    printf("Result: While loop was skipped completely (0 executions).\n\n");

    printf("--- 2. Exit-Controlled Loop (do-while loop) ---\n");
    printf("Initial value: number = %d, Condition: (number < 10)\n", number);
    
    do
    {
        printf("This inside do-while loop PRINTS ONCE before checking condition!\n");
    } while (number < 10);

    printf("Result: Do-while loop executed 1 time despite condition being false.\n");

    return 0;
}
