#include <stdio.h>
#include <string.h>

int main()
{
    char fullName[100];
    char temp[100];
    char username[50];

    printf("Enter your full name: ");
    scanf(" %[^\n]s", fullName);

    int len = strlen(fullName);

    if (len < 5)
    {
        // If shorter than 5 characters, copy entire name
        strcpy(username, fullName);
    }
    else
    {
        // Take first 5 characters
        for (int i = 0; i < 5; i++)
        {
            temp[i] = fullName[i];
        }
        temp[5] = '\0';

        // Copy into username using strcpy()
        strcpy(username, temp);
    }

    printf("\nFull Name: %s\n", fullName);
    printf("Generated Username (First 5 characters): %s\n", username);

    return 0;
}
