#include <stdio.h>

// Function to calculate average weekly spend on Zomato
float calculateAverageSpend(int orders[], int size)
{
    int total = 0;
    for (int i = 0; i < size; i++)
    {
        total += orders[i];
    }
    return (float)total / size;
}

int main()
{
    // Daily order amounts for 7 days
    int dailyOrders[7] = {350, 420, 180, 560, 290, 750, 610};
    int size = 7;

    printf("=== Zomato Daily Order Amounts (7 Days) ===\n");
    for (int i = 0; i < size; i++)
    {
        printf("Day %d: Rs. %d\n", i + 1, dailyOrders[i]);
    }

    float avgSpend = calculateAverageSpend(dailyOrders, size);
    printf("\nAverage Weekly Spend per Day: Rs. %.2f\n", avgSpend);

    return 0;
}
