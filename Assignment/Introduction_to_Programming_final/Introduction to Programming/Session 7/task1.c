#include <stdio.h>

int main()
{
    int rows = 5;
    int cols = 5;

    printf("=== 5x5 Instagram Post Feed Grid ===\n\n");

    // Nested loops for 5x5 grid
    for (int i = 0; i < rows; i++)
    {
        for (int j = 0; j < cols; j++)
        {
            printf("[📷] ");
        }
        printf("\n");
    }

    return 0;
}
