#include <stdio.h>

struct Expense
{
    char category[30];
    float amount;
};

int main()
{
    struct Expense expenses[10];

    int choice;
    int count = 0;
    int i;

    float total;
    FILE *fp;

    do
    {
        printf("\n--- Personal Expense Logger ---\n");
        printf("1. Add Expense\n");
        printf("2. View All Expenses\n");
        printf("3. Save & Exit\n");

        printf("Enter your choice: ");
        scanf("%d", &choice);

        if(choice == 1)
        {
            if(count < 10)
            {
                printf("Enter Category: ");
                scanf(" %29[^\n]", expenses[count].category);

                printf("Enter Amount: ");
                scanf("%f", &expenses[count].amount);

                count++;

                printf("Expense added successfully.\n");
            }
            else
            {
                printf("Maximum 10 expenses allowed.\n");
            }
        }

        else if(choice == 2)
        {
            total = 0;

            printf("\n--- All Expenses ---\n");

            for(i = 0; i < count; i++)
            {
                printf("%d. %s - %.2f\n",
                       i + 1,
                       expenses[i].category,
                       expenses[i].amount);

                total = total + expenses[i].amount;
            }

            printf("Total Expense: %.2f\n", total);
        }

        else if(choice == 3)
        {
            fp = fopen("expenses.txt", "w");

            if(fp == NULL)
            {
                printf("Error opening file.\n");
                return 1;
            }

            for(i = 0; i < count; i++)
            {
                fprintf(fp, "%s,%.2f\n",
                        expenses[i].category,
                        expenses[i].amount);
            }

            fclose(fp);

            printf("Expenses saved to expenses.txt\n");
            printf("Program closed.\n");
        }

        else
        {
            printf("Invalid choice.\n");
        }

    } while(choice != 3);

    return 0;
}