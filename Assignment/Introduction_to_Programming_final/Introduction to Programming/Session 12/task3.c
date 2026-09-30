#include <stdio.h>

// Nested Time structure
struct Time
{
    int hours;
    int minutes;
};

// MovieShow structure containing nested Time structure
struct MovieShow
{
    char movie[50];
    int screen;
    struct Time showTime;
};

int main()
{
    // Initializing nested structure
    struct MovieShow bmsBooking = {
        "Interstellar (IMAX 3D)",
        3,
        {18, 45} // 18:45 (6:45 PM)
    };

    printf("=== BookMyShow Ticket Summary ===\n");
    // Printing in requested format: Movie: X, Screen: Y, Time: HH:MM
    printf("Movie: %s, Screen: %d, Time: %02d:%02d\n",
           bmsBooking.movie,
           bmsBooking.screen,
           bmsBooking.showTime.hours,
           bmsBooking.showTime.minutes);

    return 0;
}
