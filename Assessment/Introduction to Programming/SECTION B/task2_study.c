#include <stdio.h>

int main()
{
    float hours[7];
    float total = 0, average;
    float highest;
    int highestDay = 1;
    int i, j;

    for(i = 0; i < 7; i++)
    {
        do
        {
            printf("Enter study hours for Day %d: ", i + 1);
            scanf("%f", &hours[i]);

            if(hours[i] < 0 || hours[i] > 24)
            {
                printf("Invalid hours. Enter between 0 and 24.\n");
            }

        } while(hours[i] < 0 || hours[i] > 24);
    }

    highest = hours[0];

    for(i = 0; i < 7; i++)
    {
        total = total + hours[i];

        if(hours[i] > highest)
        {
            highest = hours[i];
            highestDay = i + 1;
        }
    }

    average = total / 7;

    printf("\nWeekly Total: %.2f hours\n", total);
    printf("Daily Average: %.2f hours\n", average);
    printf("Highest Study Hours: Day %d (%.2f hours)\n", highestDay, highest);

    printf("\nStudy Hours Chart:\n");

    for(i = 0; i < 7; i++)
    {
        printf("Day %d: ", i + 1);

        for(j = 0; j < (int)hours[i]; j++)
        {
            printf("*");
        }

        printf("\n");
    }

    return 0;
}