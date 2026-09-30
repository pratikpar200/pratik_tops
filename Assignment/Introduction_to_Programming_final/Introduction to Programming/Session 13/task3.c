#include <stdio.h>

int main()
{
    // Opening in append mode (a) to keep existing songs
    FILE *file = fopen("playlist.txt", "a");

    if (file == NULL)
    {
        printf("Error opening file for appending!\n");
        return 1;
    }

    // Appending 2 more songs
    fprintf(file, "Somebody That I Used to Know\n");
    fprintf(file, "Love Story\n");

    fclose(file);
    printf("Successfully appended 2 more songs to 'playlist.txt' in append (a) mode.\n");

    return 0;
}
