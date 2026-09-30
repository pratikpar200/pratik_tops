#include <stdio.h>

// Function to swap song counts using pointers
void swapPlaylistCounts(int *a, int *b)
{
    int temp = *a;
    *a = *b;
    *b = temp;
}

int main()
{
    int playlist1_songs = 35;
    int playlist2_songs = 50;

    printf("--- Before Swapping ---\n");
    printf("Playlist 1 Songs: %d\n", playlist1_songs);
    printf("Playlist 2 Songs: %d\n\n", playlist2_songs);

    // Calling function by passing addresses
    swapPlaylistCounts(&playlist1_songs, &playlist2_songs);

    printf("--- After Swapping (Using swapPlaylistCounts) ---\n");
    printf("Playlist 1 Songs: %d\n", playlist1_songs);
    printf("Playlist 2 Songs: %d\n", playlist2_songs);

    return 0;
}
