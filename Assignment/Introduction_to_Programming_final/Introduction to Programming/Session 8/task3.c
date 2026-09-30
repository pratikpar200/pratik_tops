#include <stdio.h>

// 1. Pass-by-Value: modifies a copy of the argument
void increaseFollowersByValue(int followers)
{
    followers = followers + 1000;
    printf("[Inside increaseFollowersByValue] followers = %d\n", followers);
}

// 2. Pass-by-Reference: modifies the original variable via pointer
void increaseFollowersByReference(int *followers)
{
    *followers = *followers + 1000;
    printf("[Inside increaseFollowersByReference] *followers = %d\n", *followers);
}

int main()
{
    int followerCount = 5000;

    printf("Initial follower count: %d\n\n", followerCount);

    // Call Pass-by-Value
    printf("--- Calling increaseFollowersByValue ---\n");
    increaseFollowersByValue(followerCount);
    printf("After Pass-by-Value call, original followerCount in main: %d (UNCHANGED)\n\n", followerCount);

    // Call Pass-by-Reference
    printf("--- Calling increaseFollowersByReference ---\n");
    increaseFollowersByReference(&followerCount);
    printf("After Pass-by-Reference call, original followerCount in main: %d (UPDATED)\n", followerCount);

    return 0;
}
