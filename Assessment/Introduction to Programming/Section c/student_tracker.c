#include <stdio.h>
#include <string.h>

/* Structure definition as required */
struct StudyLog
{
    char subject[40];
    float hours[7];
};

/* Function declarations */
void logStudyHours(struct StudyLog logs[], int count);
void viewWeeklyReport(struct StudyLog logs[], int count);
void saveAndExit(struct StudyLog logs[], int count);

int main()
{
    /* Initialize exactly 3 subject records with 0 hours */
    struct StudyLog logs[3] = {
        {"C Programming", {0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f}},
        {"Mathematics", {0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f}},
        {"Data Structures", {0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f}}
    };

    int choice;

    while (1)
    {
        printf("\n========================================\n");
        printf("       STUDENT PRODUCTIVITY TRACKER     \n");
        printf("========================================\n");
        printf("1. Log Today's Study Hours\n");
        printf("2. View Weekly Report\n");
        printf("3. Save & Exit\n");
        printf("----------------------------------------\n");
        printf("Enter your choice (1-3): ");

        if (scanf("%d", &choice) != 1)
        {
            printf("Invalid input! Please enter a number.\n");
            while (getchar() != '\n'); /* Clear input buffer */
            continue;
        }

        if (choice == 1)
        {
            logStudyHours(logs, 3);
        }
        else if (choice == 2)
        {
            viewWeeklyReport(logs, 3);
        }
        else if (choice == 3)
        {
            saveAndExit(logs, 3);
            break; /* Exit loop and program */
        }
        else
        {
            printf("Invalid choice! Please select between 1 and 3.\n");
        }
    }

    return 0;
}

/* Function to log study hours for a specific day */
void logStudyHours(struct StudyLog logs[], int count)
{
    int day;
    int i;

    printf("\nEnter Day (1 to 7): ");
    if (scanf("%d", &day) != 1 || day < 1 || day > 7)
    {
        printf("Invalid day! Please enter a value between 1 and 7.\n");
        while (getchar() != '\n'); /* Clear buffer */
        return;
    }

    printf("\n--- Logging Study Hours for Day %d ---\n", day);
    for (i = 0; i < count; i++)
    {
        printf("Enter study hours for %s: ", logs[i].subject);
        scanf("%f", &logs[i].hours[day - 1]);

        /* Simple check for negative hours */
        if (logs[i].hours[day - 1] < 0)
        {
            printf("Hours cannot be negative. Setting to 0.00.\n");
            logs[i].hours[day - 1] = 0.0f;
        }
    }

    printf("Hours successfully recorded for Day %d!\n", day);
}

/* Function to display weekly summary and text-based progress chart */
void viewWeeklyReport(struct StudyLog logs[], int count)
{
    int i, day, dot;
    float totalHours, avgHours;

    printf("\n==================================================\n");
    printf("                  WEEKLY REPORT                   \n");
    printf("==================================================\n");

    for (i = 0; i < count; i++)
    {
        totalHours = 0.0f;

        /* Calculate total hours */
        for (day = 0; day < 7; day++)
        {
            totalHours += logs[i].hours[day];
        }

        /* Calculate average daily hours */
        avgHours = totalHours / 7.0f;

        printf("\nSubject: %s\n", logs[i].subject);
        printf("Weekly Total: %.2f hours\n", totalHours);
        printf("Daily Average: %.2f hours\n", avgHours);

        /* Progress chart */
        printf("Progress Chart (1 dot = 1 complete hour):\n");
        for (day = 0; day < 7; day++)
        {
            int completeHours = (int)logs[i].hours[day];

            printf("  Day %d [%.2f hrs]: ", day + 1, logs[i].hours[day]);

            if (completeHours == 0)
            {
                printf("-");
            }
            else
            {
                for (dot = 0; dot < completeHours; dot++)
                {
                    printf("•");
                }
            }
            printf("\n");
        }
        printf("--------------------------------------------------\n");
    }
}

/* Function to save data to productivity_log.txt and exit */
void saveAndExit(struct StudyLog logs[], int count)
{
    FILE *file;
    int i, day;

    file = fopen("productivity_log.txt", "w");

    if (file == NULL)
    {
        printf("Error: Could not create file!\n");
        return;
    }

    for (i = 0; i < count; i++)
    {
        /* Write subject name */
        fprintf(file, "%s", logs[i].subject);

        /* Write comma-separated 7 daily study-hour values */
        for (day = 0; day < 7; day++)
        {
            fprintf(file, ",%.2f", logs[i].hours[day]);
        }
        fprintf(file, "\n");
    }

    fclose(file);

    printf("\nData successfully saved to productivity_log.txt!\n");
    printf("Exiting the program. Goodbye!\n");
}
