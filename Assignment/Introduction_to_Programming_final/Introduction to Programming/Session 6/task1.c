#include <stdio.h>

int main()
{
    printf("--- Countdown Timer ---\n");

    // For loop counting down from 10 to 1
    for (int i = 10; i >= 1; i--)
    {
        printf("%d...\n", i);
    }

    printf("Go! Time's up!\n");

    return 0;
}
