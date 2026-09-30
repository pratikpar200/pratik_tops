#include <stdio.h>
#include <string.h>

#define MAX_TASKS 5
#define MAX_LENGTH 100

// Global array to store up to 5 tasks (Task 1)
char tasks[MAX_TASKS][MAX_LENGTH];
int taskCount = 0;

// Function to mark a task as DONE (Task 2)
void markTaskDone(int index) {
    if (index >= 0 && index < taskCount) {
        strcat(tasks[index], " - DONE");
    } else {
        printf("Invalid task index!\n");
    }
}

// Function to print all tasks
void printTasks() {
    printf("\n--- Task List ---\n");
    for (int i = 0; i < taskCount; i++) {
        printf("%d. %s\n", i + 1, tasks[i]);
    }
}

int main() {
    printf("=== Procedural C Task List ===\n");
    
    // Adding tasks (Task 1)
    taskCount = 3;
    strcpy(tasks[0], "Complete C programming assignment");
    strcpy(tasks[1], "Revise OOP concepts");
    strcpy(tasks[2], "Submit project report");

    printf("Initial Tasks:\n");
    printTasks();

    // Mark task 1 as done (Task 2)
    printf("\nMarking task 1 as DONE...\n");
    markTaskDone(0);

    // Print updated task list
    printf("\nUpdated Tasks:\n");
    printTasks();

    return 0;
}
