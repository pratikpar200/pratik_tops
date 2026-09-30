#include <iostream>
#include <string>

using namespace std;

// Task 3: Task class
class Task {
public:
    string title;
    bool isDone;

    // Constructor
    Task() {
        title = "";
        isDone = false;
    }

    Task(string t) {
        title = t;
        isDone = false;
    }

    // Method to mark task as done
    void markDone() {
        isDone = true;
    }

    // Method to display task with status
    void display() {
        cout << title << " [" << (isDone ? "DONE" : "PENDING") << "]" << endl;
    }
};

// Task 4: TaskList class
class TaskList {
private:
    Task tasks[10];
    int count;

public:
    TaskList() {
        count = 0;
    }

    // Add a task
    void addTask(string title) {
        if (count < 10) {
            tasks[count] = Task(title);
            count++;
        } else {
            cout << "TaskList is full!" << endl;
        }
    }

    // Mark a task as done by index (0-based)
    void markTaskDone(int index) {
        if (index >= 0 && index < count) {
            tasks[index].markDone();
        } else {
            cout << "Invalid index!" << endl;
        }
    }

    // Show all tasks
    void showTasks() {
        cout << "\n--- OOP Task List ---" << endl;
        for (int i = 0; i < count; i++) {
            cout << (i + 1) << ". ";
            tasks[i].display();
        }
    }
};

int main() {
    cout << "=== Session 1: OOP TaskList Demonstration ===" << endl;

    // Demonstrate adding 3 tasks (Task 4)
    TaskList myList;
    myList.addTask("Complete C++ OOP assignment");
    myList.addTask("Understand Constructors and Destructors");
    myList.addTask("Learn Inheritance and Polymorphism");

    cout << "\nInitial Task List:";
    myList.showTasks();

    // Marking one task as done (Task 4)
    cout << "\nMarking Task 2 as Done...";
    myList.markTaskDone(1);

    // Displaying all tasks with their statuses
    myList.showTasks();

    /*
    --------------------------------------------------
    TASK 5: Comparison - Procedural C vs OOP TaskList
    --------------------------------------------------
    EXACTLY 3 problems faced in the C version that were solved by OOP:
    1. Global Data Vulnerability: In C, global arrays can be modified accidentally by any part of the program. In OOP, data is encapsulated safely inside the class.
    2. Lack of Data-Behavior Bundling: In C, functions and data are separated, requiring manual index and memory management. In OOP, properties and methods are bundled together into objects.
    3. Poor Reusability & Scalability: In C, managing multiple independent task lists requires duplicate global variables. In OOP, multiple TaskList objects can be easily created independently.
    */

    return 0;
}
