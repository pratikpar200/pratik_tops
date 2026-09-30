#include <stdio.h>

int main()
{
    FILE *file = fopen("playlist.txt", "w");

    if (file == NULL)
    {
        printf("Error opening file for writing!\n");
        return 1;
    }

    // Writing top 3 favorite songs to playlist.txt
    fprintf(file, "Love Me Like You Do\n");
    fprintf(file, "Kesariya\n");
    fprintf(file, "Lovely\n");

    fclose(file);
    printf("Successfully created 'playlist.txt' and wrote 3 songs in write (w) mode.\n");

    return 0;
}
