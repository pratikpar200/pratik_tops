#include <stdio.h>

int main()
{
    int rows = 4;
    int cols = 4;

    printf("=== Spotify Checkered Grid (Alternating 0s and 1s) ===\n\n");

    // Nested loops for 4x4 alternating grid
    for (int i = 0; i < rows; i++)
    {
        for (int j = 0; j < cols; j++)
        {
            // If sum of row and column index is even, print 0; otherwise print 1
            if ((i + j) % 2 == 0)
            {
                printf("0 ");
            }
            else
            {
                printf("1 ");
            }
        }
        printf("\n");
    }

    return 0;
}
