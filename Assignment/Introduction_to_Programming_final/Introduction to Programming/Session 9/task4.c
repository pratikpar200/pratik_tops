#include <stdio.h>

int main()
{
    // 2D Array: Rows = 4 IPL Matches, Columns = Runs scored by Team 1 and Team 2
    int cricketScores[4][2] = {
        {185, 189}, // Match 1: CSK vs MI
        {210, 195}, // Match 2: RCB vs KKR
        {165, 168}, // Match 3: DC vs RR
        {225, 204}  // Match 4: SRH vs GT
    };

    int matches = 4;
    int teams = 2;

    printf("=== IPL Match Highest Scores ===\n\n");

    for (int m = 0; m < matches; m++)
    {
        int highest = cricketScores[m][0];

        for (int t = 1; t < teams; t++)
        {
            if (cricketScores[m][t] > highest)
            {
                highest = cricketScores[m][t];
            }
        }

        printf("Match %d (Team 1: %d runs | Team 2: %d runs) -> Highest Score: %d runs\n",
               m + 1, cricketScores[m][0], cricketScores[m][1], highest);
    }

    return 0;
}
