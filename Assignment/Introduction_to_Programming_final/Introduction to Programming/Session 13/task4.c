#include <stdio.h>
#include <string.h>
#include <ctype.h>

// Helper function to check if a string contains a substring (case-insensitive)
int containsCaseInsensitive(const char *haystack, const char *needle)
{
    char lowerHaystack[100];
    char lowerNeedle[100];

    int i = 0;
    while (haystack[i])
    {
        lowerHaystack[i] = tolower(haystack[i]);
        i++;
    }
    lowerHaystack[i] = '\0';

    int j = 0;
    while (needle[j])
    {
        lowerNeedle[j] = tolower(needle[j]);
        j++;
    }
    lowerNeedle[j] = '\0';

    return (strstr(lowerHaystack, lowerNeedle) != NULL);
}

int main()
{
    FILE *file = fopen("playlist.txt", "r");

    if (file == NULL)
    {
        printf("Error opening 'playlist.txt'! Please ensure task1 and task3 have been run.\n");
        return 1;
    }

    char song[100];
    printf("=== Songs Containing the Word 'love' (Case-Insensitive) ===\n");

    int found = 0;
    while (fgets(song, sizeof(song), file) != NULL)
    {
        if (containsCaseInsensitive(song, "love"))
        {
            printf("- %s", song);
            found++;
        }
    }

    if (found == 0)
    {
        printf("No songs matching 'love' found.\n");
    }

    fclose(file);
    return 0;
}
