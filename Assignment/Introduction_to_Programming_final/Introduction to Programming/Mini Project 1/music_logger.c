#include <stdio.h>
#include <stdlib.h>

#define DAYS_IN_WEEK 7
#define LOG_FILE "music_log.txt"

// Global or main-passed array for 7 days of weekly listening minutes
int dailyMinutes[DAYS_IN_WEEK] = {0};
const char dayNames[DAYS_IN_WEEK][10] = {
    "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"
};

// Function prototypes
void logDailyMinutes();
void saveToFile();
void loadFromFile();
void viewWeeklyReport();
void resetWeeklyData();

int main()
{
    int choice = 0;

    // Load any existing persisted data from music_log.txt
    loadFromFile();

    printf("===========================================\n");
    printf("     WELCOME TO MUSIC LISTENING LOGGER     \n");
    printf("===========================================\n");

    while (choice != 4)
    {
        printf("\n------------- MAIN MENU -------------\n");
        printf("1. Log New Listening Minutes (7 Days)\n");
        printf("2. View Weekly Summary & Report\n");
        printf("3. Reset Weekly Data\n");
        printf("4. Exit App\n");
        printf("-------------------------------------\n");
        printf("Enter your choice (1-4): ");

        if (scanf("%d", &choice) != 1)
        {
            printf("Invalid input! Please enter a number.\n");
            // Clear input buffer
            while (getchar() != '\n');
            continue;
        }

        switch (choice)
        {
        case 1:
            logDailyMinutes();
            break;
        case 2:
            viewWeeklyReport();
            break;
        case 3:
            resetWeeklyData();
            break;
        case 4:
            printf("\nThank you for using Music Listening Logger. Goodbye!\n");
            break;
        default:
            printf("Invalid choice! Please choose between 1 and 4.\n");
            break;
        }
    }

    return 0;
}

// Task 1 & 3: Log listening minutes and save to file
void logDailyMinutes()
{
    printf("\n--- Log Daily Listening Minutes ---\n");
    for (int i = 0; i < DAYS_IN_WEEK; i++)
    {
        printf("Enter minutes listened on %s (Day %d): ", dayNames[i], i + 1);
        scanf("%d", &dailyMinutes[i]);
        if (dailyMinutes[i] < 0)
        {
            dailyMinutes[i] = 0;
        }
    }

    // Persist data into music_log.txt
    saveToFile();
    printf("\nSuccess: Listening minutes recorded and saved to '%s'!\n", LOG_FILE);
}

// Save minutes array to music_log.txt
void saveToFile()
{
    FILE *file = fopen(LOG_FILE, "w");
    if (file == NULL)
    {
        printf("Error: Could not open '%s' for saving!\n", LOG_FILE);
        return;
    }

    for (int i = 0; i < DAYS_IN_WEEK; i++)
    {
        fprintf(file, "%d\n", dailyMinutes[i]);
    }

    fclose(file);
}

// Load minutes array from music_log.txt if it exists
void loadFromFile()
{
    FILE *file = fopen(LOG_FILE, "r");
    if (file == NULL)
    {
        // File doesn't exist yet, start with 0s
        return;
    }

    for (int i = 0; i < DAYS_IN_WEEK; i++)
    {
        if (fscanf(file, "%d", &dailyMinutes[i]) != 1)
        {
            dailyMinutes[i] = 0;
        }
    }

    fclose(file);
}

// Task 4: Read music_log.txt and generate weekly report
void viewWeeklyReport()
{
    FILE *file = fopen(LOG_FILE, "r");
    int minutes[DAYS_IN_WEEK] = {0};
    int totalMinutes = 0;
    int highestMinutes = 0;
    int highestDayIndex = 0;

    if (file == NULL)
    {
        printf("\nNo log file found. Displaying current memory data...\n");
        for (int i = 0; i < DAYS_IN_WEEK; i++)
        {
            minutes[i] = dailyMinutes[i];
        }
    }
    else
    {
        for (int i = 0; i < DAYS_IN_WEEK; i++)
        {
            if (fscanf(file, "%d", &minutes[i]) != 1)
            {
                minutes[i] = 0;
            }
        }
        fclose(file);
    }

    highestMinutes = minutes[0];
    for (int i = 0; i < DAYS_IN_WEEK; i++)
    {
        totalMinutes += minutes[i];
        if (minutes[i] > highestMinutes)
        {
            highestMinutes = minutes[i];
            highestDayIndex = i;
        }
    }

    float averageMinutes = (float)totalMinutes / DAYS_IN_WEEK;

    printf("\n===========================================\n");
    printf("           WEEKLY MUSIC REPORT             \n");
    printf("===========================================\n");
    for (int i = 0; i < DAYS_IN_WEEK; i++)
    {
        printf(" %-10s : %4d minutes\n", dayNames[i], minutes[i]);
    }
    printf("-------------------------------------------\n");
    printf(" Total Listening Time   : %d minutes\n", totalMinutes);
    printf(" Average Daily Time     : %.2f minutes\n", averageMinutes);
    printf(" Highest Listening Day  : %s (%d minutes)\n", dayNames[highestDayIndex], highestMinutes);
    printf("===========================================\n");
}

// Task 5: Reset weekly data with confirmation
void resetWeeklyData()
{
    char confirm;
    printf("\nAre you sure you want to reset all weekly data? (y/n): ");
    scanf(" %c", &confirm);

    if (confirm == 'y' || confirm == 'Y')
    {
        // Clear array
        for (int i = 0; i < DAYS_IN_WEEK; i++)
        {
            dailyMinutes[i] = 0;
        }

        // Delete contents of music_log.txt by opening in write mode and closing
        FILE *file = fopen(LOG_FILE, "w");
        if (file != NULL)
        {
            fclose(file);
        }

        printf("All weekly data has been reset and '%s' was cleared successfully.\n", LOG_FILE);
    }
    else
    {
        printf("Reset cancelled. Data remains unchanged.\n");
    }
}
