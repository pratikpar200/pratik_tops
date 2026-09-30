#include <stdio.h>

int main()
{
    float percentage;

    printf("Enter percentage: ");
    scanf("%f", &percentage);

    if(percentage < 0 || percentage > 100)
    {
        printf("Error: Percentage must be between 0 and 100.\n");
        return 0;
    }

    if(percentage >= 90)
    {
        printf("Grade: A\n");
        printf("Excellent work! Keep it up.\n");
    }
    else if(percentage >= 75)
    {
        printf("Grade: B\n");
        printf("Good work! Keep pushing.\n");
    }
    else if(percentage >= 60)
    {
        printf("Grade: C\n");
        printf("Nice effort! You can improve more.\n");
    }
    else if(percentage >= 45)
    {
        printf("Grade: D\n");
        printf("Keep practicing and work harder.\n");
    }
    else
    {
        printf("Grade: F\n");
        printf("Do not give up. Try again.\n");
    }

    return 0;
}