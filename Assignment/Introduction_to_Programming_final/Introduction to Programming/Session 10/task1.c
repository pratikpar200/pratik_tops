#include <stdio.h>
#include <string.h>

int main()
{
    // Declaring string variable songTitle
    char songTitle[] = "Tum Hi Ho";

    // Finding length using strlen()
    int length = strlen(songTitle);

    printf("Song Title: %s\n", songTitle);
    printf("Length of string (using strlen): %d characters\n", length);

    return 0;
}
