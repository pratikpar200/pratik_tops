#include <stdio.h>

int main()
{
    // 2D array: 3 playlists (rows), 5 days (columns)
    // Ratings are given out of 5.0
    float playlistRatings[3][5] = {
        {4.2f, 4.5f, 4.0f, 4.6f, 4.3f}, // Playlist 1: Top Hits
        {4.8f, 4.7f, 4.9f, 5.0f, 4.8f}, // Playlist 2: Lo-Fi Beats
        {3.9f, 4.1f, 4.0f, 4.2f, 3.8f}  // Playlist 3: Workout Energy
    };

    printf("=== Spotify Playlist Ratings ===\n");
    printf("Ratings for Playlist 2 (Lo-Fi Beats) over 5 days:\n");

    // Accessing and printing the second playlist (Row index 1)
    for (int day = 0; day < 5; day++)
    {
        printf("Day %d: %.1f stars\n", day + 1, playlistRatings[1][day]);
    }

    return 0;
}
