#include <stdio.h>

int main()
{
    FILE *file = fopen("playlist.txt", "r");

    if (file == NULL)
    {
        printf("Error opening 'playlist.txt' for reading! Please ensure task1 has been run.\n");
        return 1;
    }

    char song[100];
    int lineNum = 1;

    printf("=== Songs in 'playlist.txt' (Read Mode) ===\n");
    while (fgets(song, sizeof(song), file) != NULL)
    {
        printf("%d. %s", lineNum, song);
        lineNum++;
    }

    fclose(file);
    return 0;
}
