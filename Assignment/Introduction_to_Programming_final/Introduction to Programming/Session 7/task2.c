#include <stdio.h>

int main()
{
    int rows = 5;

    printf("=== Gaming Leaderboard Rank Triangle Pattern ===\n\n");

    // Right-angled triangle pattern with increasing numbers
    for (int i = 1; i <= rows; i++)
    {
        for (int j = 1; j <= i; j++)
        {
            printf("%d ", j);
        }
        printf("\n");
    }

    return 0;
}
