#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <time.h>

int main()
{
    // List of songs
    char songs[3][50] = {
        "Kesariya",
        "Believer",
        "Despacito"
    };

    // Randomly pick one song from the list
    srand(time(NULL));
    int randomIndex = rand() % 3;

    char secretSong[50];
    strcpy(secretSong, songs[randomIndex]);

    char userGuess[50];
    int isCorrect = 0;

    printf("=== Spotify: Guess the Song Game ===\n");
    printf("Hint: Choose from [Kesariya, Believer, Despacito]\n");

    // Do-while loop: runs at least once and repeats until user guesses correctly
    do
    {
        printf("Enter your guess: ");
        scanf("%49s", userGuess);

        if (strcmp(userGuess, secretSong) == 0)
        {
            printf("Congratulations! You guessed it right! The song is '%s'.\n", secretSong);
            isCorrect = 1;
        }
        else
        {
            printf("Wrong guess! Try again.\n");
        }
    } while (isCorrect == 0);

    return 0;
}
