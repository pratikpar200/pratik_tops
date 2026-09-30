#include <stdio.h>

struct Student
{
    char name[50];
    int rollno;
    float marks;
    char grade;
};

void assignGrade(struct Student *s)
{
    if(s->marks >= 90)
    {
        s->grade = 'A';
    }
    else if(s->marks >= 75)
    {
        s->grade = 'B';
    }
    else if(s->marks >= 60)
    {
        s->grade = 'C';
    }
    else if(s->marks >= 45)
    {
        s->grade = 'D';
    }
    else
    {
        s->grade = 'F';
    }
}

void printTopper(struct Student s[], int n)
{
    int i;
    int top = 0;

    for(i = 1; i < n; i++)
    {
        if(s[i].marks > s[top].marks)
        {
            top = i;
        }
    }

    printf("\nTop Performer:\n");
    printf("Name: %s\n", s[top].name);
    printf("Marks: %.2f\n", s[top].marks);
}

int main()
{
    struct Student students[3];
    int i;

    for(i = 0; i < 3; i++)
    {
        printf("\nEnter details for Student %d\n", i + 1);

        printf("Enter Name: ");
        scanf(" %49[^\n]", students[i].name);

        printf("Enter Roll Number: ");
        scanf("%d", &students[i].rollno);

        printf("Enter Marks: ");
        scanf("%f", &students[i].marks);

        assignGrade(&students[i]);
    }

    printf("\n---------------------------------------------\n");
    printf("Name\t\tRoll No\t\tMarks\tGrade\n");
    printf("---------------------------------------------\n");

    for(i = 0; i < 3; i++)
    {
        printf("%-15s\t%d\t\t%.2f\t%c\n",
               students[i].name,
               students[i].rollno,
               students[i].marks,
               students[i].grade);
    }

    printf("---------------------------------------------\n");

    printTopper(students, 3);

    return 0;
}