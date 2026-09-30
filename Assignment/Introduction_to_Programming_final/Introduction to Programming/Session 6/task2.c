#include <stdio.h>
#include <string.h>

int main()
{
    char teams[10][50] = {
        "Chennai Super Kings",
        "Mumbai Indians",
        "Royal Challengers Bangalore"
    };
    int teamCount = 3;
    int choice = 0;

    // Menu-driven application using while loop
    while (choice != 3)
    {
        printf("\n=== IPL Teams Menu ===\n");
        printf("1. View Favorite IPL Teams\n");
        printf("2. Add a New Team\n");
        printf("3. Exit\n");
        printf("Enter your choice (1-3): ");
        scanf("%d", &choice);

        if (choice == 1)
        {
            printf("\n--- Favorite IPL Teams List ---\n");
            for (int i = 0; i < teamCount; i++)
            {
                printf("%d. %s\n", i + 1, teams[i]);
            }
        }
        else if (choice == 2)
        {
            if (teamCount < 10)
            {
                printf("Enter new team name: ");
                scanf(" %[^\n]s", teams[teamCount]);
                teamCount++;
                printf("Team added successfully!\n");
            }
            else
            {
                printf("Team list is full!\n");
            }
        }
        else if (choice == 3)
        {
            printf("Exiting application. Thank you!\n");
        }
        else
        {
            printf("Invalid choice! Please enter 1, 2, or 3.\n");
        }
    }

    return 0;
}
