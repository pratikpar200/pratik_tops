#include <stdio.h>
#include <ctype.h>
#include <string.h>

// Function Declaration
void getUserInitials(const char fullName[], char initials[]);

int main()
{
    char cricketerName[] = "Virat Kohli";
    char initials[10];

    // Function Call
    getUserInitials(cricketerName, initials);

    printf("Full Name: %s\n", cricketerName);
    printf("Initials : %s\n", initials);

    return 0;
}

// Function Definition: Extracts uppercase initials
void getUserInitials(const char fullName[], char initials[])
{
    int index = 0;
    int len = strlen(fullName);

    if (len > 0 && fullName[0] != ' ')
    {
        initials[index++] = toupper(fullName[0]);
    }

    for (int i = 1; i < len; i++)
    {
        // If previous character is space and current is not space
        if (fullName[i - 1] == ' ' && fullName[i] != ' ')
        {
            initials[index++] = toupper(fullName[i]);
        }
    }

    initials[index] = '\0'; // Null-terminate string
}
