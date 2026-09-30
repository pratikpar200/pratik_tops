#include <stdio.h>

int main()
{
    int rows;

    printf("Enter the number of rows for the pyramid: ");
    scanf("%d", &rows);

    printf("\n--- Generated Pyramid Pattern (%d Rows) ---\n\n", rows);

    // Centered pyramid pattern based on user input
    for (int i = 1; i <= rows; i++)
    {
        // Leading spaces
        for (int space = 1; space <= rows - i; space++)
        {
            printf(" ");
        }

        // Stars
        for (int star = 1; star <= i; star++)
        {
            printf("* ");
        }

        printf("\n");
    }

    return 0;
}
