#include <stdio.h>

int main()
{
    int age;

    printf("Enter your age: ");
    scanf("%d", &age);

    printf("\n--- Eligibility Status for Age %d ---\n", age);

    // Print every message that applies to the given age
    if (age >= 18)
    {
        printf("Eligible for Driving License\n");
    }

    if (age >= 21)
    {
        printf("Eligible for Credit Card\n");
    }

    if (age >= 25)
    {
        printf("Eligible for Car Rental\n");
    }

    return 0;
}
