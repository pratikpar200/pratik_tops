#include <stdio.h>
#include <string.h>

int main()
{
    char user1[50];
    char user2[50];

    printf("=== Username Comparison Tool ===\n");
    printf("Enter first username: ");
    scanf("%49s", user1);

    printf("Enter second username: ");
    scanf("%49s", user2);

    // Comparing two strings using strcmp()
    int result = strcmp(user1, user2);

    if (result == 0)
    {
        printf("\nResult: Both usernames are the SAME.\n");
    }
    else
    {
        printf("\nResult: Usernames are DIFFERENT.\n");
    }

    return 0;
}
