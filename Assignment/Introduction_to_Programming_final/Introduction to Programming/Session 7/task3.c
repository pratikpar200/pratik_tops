#include <stdio.h>

int main()
{
    int rows = 6;

    printf("=== BookMyShow Loading Animation: 6-Row Star Pyramid ===\n\n");

    // Centered pyramid pattern with 6 rows
    for (int i = 1; i <= rows; i++)
    {
        // Print leading spaces for center alignment
        for (int space = 1; space <= rows - i; space++)
        {
            printf(" ");
        }

        // Print stars with space
        for (int star = 1; star <= i; star++)
        {
            printf("* ");
        }

        printf("\n");
    }

    return 0;
}
