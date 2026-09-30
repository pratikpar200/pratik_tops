#include <stdio.h>

int main()
{
    // Spotify playlist details
    char playlistName[] = "Bollywood Lo-Fi Chill";
    int totalSongs = 25;
    float avgDuration = 3.45f; // in minutes

    // Printing all values in a single formatted sentence
    printf("My favorite Spotify playlist is '%s', which contains %d songs with an average duration of %.2f minutes per song.\n",
           playlistName, totalSongs, avgDuration);

    return 0;
}
