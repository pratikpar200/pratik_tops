#include <stdio.h>

int main()
{
    // 1D array storing daily step counts for 7 days
    int dailySteps[7] = {6500, 8200, 7400, 10500, 9300, 12000, 8800};
    char days[7][10] = {"Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"};

    printf("=== Daily Step Count Tracker (7 Days) ===\n");
    for (int i = 0; i < 7; i++)
    {
        printf("Day %d (%s): %d steps\n", i + 1, days[i], dailySteps[i]);
    }

    return 0;
}
