#include <stdio.h>

int main()
{
    int choice;

    printf("--- Zomato Food Suggestion Tool ---\n");
    printf("Select your meal time:\n");
    printf("1. Breakfast\n");
    printf("2. Lunch\n");
    printf("3. Dinner\n");
    printf("4. Snack\n");
    printf("Enter your choice (1-4): ");
    scanf("%d", &choice);

    // Using switch-case to suggest food
    switch (choice)
    {
    case 1:
        printf("Suggestion for Breakfast: Masala Dosa with Hot Filter Coffee!\n");
        break;
    case 2:
        printf("Suggestion for Lunch: Paneer Butter Masala with Butter Naan!\n");
        break;
    case 3:
        printf("Suggestion for Dinner: Veg Biryani with Raita!\n");
        break;
    case 4:
        printf("Suggestion for Snack: Samosa with Mint Chutney and Chai!\n");
        break;
    default:
        printf("Try some fruits!\n");
        break;
    }

    return 0;
}
