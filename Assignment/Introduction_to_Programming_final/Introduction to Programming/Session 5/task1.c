#include <stdio.h>
#include <string.h>

int main()
{
    char team[50];

    printf("Enter your favorite IPL team (e.g., MI, CSK, RCB, KKR): ");
    scanf("%49s", team);

    // Using if-else-if ladder to check team
    if (strcmp(team, "MI") == 0 || strcmp(team, "Mumbai") == 0)
    {
        printf("Cheer: Go Mumbai Indians! Duniya Hila Denge Hum!\n");
    }
    else if (strcmp(team, "CSK") == 0 || strcmp(team, "Chennai") == 0)
    {
        printf("Cheer: Chennai Super Kings for the win! Whistle Podu!\n");
    }
    else if (strcmp(team, "RCB") == 0 || strcmp(team, "Bangalore") == 0)
    {
        printf("Cheer: Ee Sala Cup Namde! Royal Challengers Bangalore!\n");
    }
    else if (strcmp(team, "KKR") == 0 || strcmp(team, "Kolkata") == 0)
    {
        printf("Cheer: Korbo Lorbo Jeetbo Re! Kolkata Knight Riders!\n");
    }
    else
    {
        printf("Team not found!\n");
    }

    return 0;
}
