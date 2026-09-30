#include <stdio.h>

// Function to increment followers using pointer arithmetic
void incrementFollowers(int *followers, int n)
{
    for (int i = 0; i < n; i++)
    {
        *(followers + i) = *(followers + i) + 100;
    }
}

int main()
{
    // Instagram followers for 5 friends
    int friendFollowers[5] = {1200, 3400, 850, 5600, 2100};
    int n = 5;

    printf("--- Original Follower Counts ---\n");
    for (int i = 0; i < n; i++)
    {
        printf("Friend %d: %d followers\n", i + 1, friendFollowers[i]);
    }

    // Call function
    incrementFollowers(friendFollowers, n);

    printf("\n--- Updated Follower Counts (+100 each) ---\n");
    for (int i = 0; i < n; i++)
    {
        printf("Friend %d: %d followers\n", i + 1, friendFollowers[i]);
    }

    return 0;
}
