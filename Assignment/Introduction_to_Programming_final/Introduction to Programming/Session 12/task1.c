#include <stdio.h>
#include <string.h>

// Structure declaration
struct Playlist
{
    char title[50];
    char artist[50];
    int durationSeconds;
};

int main()
{
    // Initializing structure variable
    struct Playlist mySong = {
        "Kesariya",
        "Arijit Singh",
        268 // 4 mins 28 seconds
    };

    printf("=== Spotify Song Details (struct Playlist) ===\n");
    printf("Song Title       : %s\n", mySong.title);
    printf("Artist Name      : %s\n", mySong.artist);
    printf("Duration         : %d seconds (%d mins %d secs)\n",
           mySong.durationSeconds,
           mySong.durationSeconds / 60,
           mySong.durationSeconds % 60);

    return 0;
}
