#include <stdio.h>
#include <ctype.h>
#include <string.h>

// Reusable function to capitalize the first letter of each word in any string
void capitalizeWords(char str[])
{
    int len = strlen(str);
    int capitalizeNext = 1;

    for (int i = 0; i < len; i++)
    {
        if (isspace(str[i]))
        {
            capitalizeNext = 1;
        }
        else if (capitalizeNext && isalpha(str[i]))
        {
            str[i] = toupper(str[i]);
            capitalizeNext = 0;
        }
        else
        {
            str[i] = tolower(str[i]);
        }
    }
}

int main()
{
    // Reusable for product names
    char productName[] = "samsung galaxy s24 ultra";
    // Reusable for usernames
    char username[] = "rahul sharma coder";

    printf("--- Original Strings ---\n");
    printf("Product Name: %s\n", productName);
    printf("Username    : %s\n\n", username);

    capitalizeWords(productName);
    capitalizeWords(username);

    printf("--- Formatted with Reusable capitalizeWords() ---\n");
    printf("Capitalized Product Name: %s\n", productName);
    printf("Capitalized Username    : %s\n", username);

    return 0;
}
