#include <iostream>
#include <fstream>
#include <string>
#include <sstream>

using namespace std;

const string FILENAME = "content_list.txt";
const int MAX_ITEMS = 100;

// Task 1: Content Class
class Content {
public:
    string title;
    string platform;
    int views;
    string status;

    Content() : title(""), platform(""), views(0), status("") {}

    Content(string t, string p, int v, string s) {
        title = t;
        platform = p;
        views = v;
        status = s;
    }

    // Method to display all details of a Content object
    void displayDetails() const {
        cout << "Title    : " << title << endl;
        cout << "Platform : " << platform << endl;
        cout << "Views    : " << views << endl;
        cout << "Status   : " << status << endl;
    }
};

// Helper function to read all content items from content_list.txt into an array
int loadAllContent(Content items[], int maxCapacity) {
    ifstream inFile(FILENAME);
    if (!inFile.is_open()) {
        return 0;
    }

    int count = 0;
    string line;
    while (count < maxCapacity && getline(inFile, line)) {
        if (line.empty()) continue;
        stringstream ss(line);
        string t, p, vStr, s;
        if (getline(ss, t, '|') && getline(ss, p, '|') && getline(ss, vStr, '|') && getline(ss, s)) {
            int v = 0;
            try {
                v = stoi(vStr);
            } catch (...) {
                v = 0;
            }
            items[count++] = Content(t, p, v, s);
        }
    }
    inFile.close();
    return count;
}

// Helper function to save all content items to content_list.txt (overwriting)
void saveAllContent(const Content items[], int count) {
    ofstream outFile(FILENAME, ios::trunc);
    if (outFile.is_open()) {
        for (int i = 0; i < count; i++) {
            outFile << items[i].title << "|"
                    << items[i].platform << "|"
                    << items[i].views << "|"
                    << items[i].status << "\n";
        }
        outFile.close();
    } else {
        cout << "Error opening " << FILENAME << " for writing!" << endl;
    }
}

// Task 2: Add Content Idea
void addContent() {
    cout << "\n--- Add New Content Idea ---" << endl;
    string title, platform, status;
    int views;

    cin.ignore();
    cout << "Enter Content Title   : ";
    getline(cin, title);

    cout << "Enter Platform (YouTube/Instagram/Podcast): ";
    getline(cin, platform);

    cout << "Enter Estimated Views : ";
    cin >> views;
    cin.ignore();

    cout << "Enter Status (Draft/In Progress/Published): ";
    getline(cin, status);

    // Append to file
    ofstream outFile(FILENAME, ios::app);
    if (outFile.is_open()) {
        outFile << title << "|" << platform << "|" << views << "|" << status << "\n";
        outFile.close();
        cout << "\nContent idea successfully added and saved to '" << FILENAME << "'!" << endl;
    } else {
        cout << "Error saving content idea!" << endl;
    }
}

// Task 3: Display all Content Items in a Numbered List
int displayContentList(const Content items[], int count) {
    cout << "\n--- Content List ---" << endl;
    if (count == 0) {
        cout << "No content ideas found in " << FILENAME << "." << endl;
        return 0;
    }

    for (int i = 0; i < count; i++) {
        cout << (i + 1) << ". Title: \"" << items[i].title 
             << "\" | Platform: " << items[i].platform 
             << " | Status: " << items[i].status 
             << " | Views: " << items[i].views << endl;
    }
    return count;
}

// Task 4: Update the Status of a Content Idea
void updateContentStatus() {
    Content items[MAX_ITEMS];
    int count = loadAllContent(items, MAX_ITEMS);

    cout << "\n--- Update Content Status ---" << endl;
    if (count == 0) {
        cout << "No content available to update." << endl;
        return;
    }

    displayContentList(items, count);

    cout << "\nEnter the content number to update (1 to " << count << "): ";
    int choice;
    cin >> choice;

    if (choice < 1 || choice > count) {
        cout << "Invalid content number selected!" << endl;
        return;
    }

    cin.ignore();
    cout << "Enter New Status (Draft / In Progress / Published): ";
    string newStatus;
    getline(cin, newStatus);

    // Modify selected item
    items[choice - 1].status = newStatus;

    // Overwrite content_list.txt with updated data
    saveAllContent(items, count);
    cout << "\nStatus for item #" << choice << " updated to '" << newStatus << "' successfully!" << endl;
}

// Task 5: Delete a Content Item
void deleteContent() {
    Content items[MAX_ITEMS];
    int count = loadAllContent(items, MAX_ITEMS);

    cout << "\n--- Delete Content Idea ---" << endl;
    if (count == 0) {
        cout << "No content available to delete." << endl;
        return;
    }

    displayContentList(items, count);

    cout << "\nEnter the content number to delete (1 to " << count << "): ";
    int choice;
    cin >> choice;

    if (choice < 1 || choice > count) {
        cout << "Invalid content number selected!" << endl;
        return;
    }

    string deletedTitle = items[choice - 1].title;

    // Shift elements to delete the selected item
    for (int i = choice - 1; i < count - 1; i++) {
        items[i] = items[i + 1];
    }
    count--;

    // Overwrite content_list.txt
    saveAllContent(items, count);

    cout << "\nDeleted content: \"" << deletedTitle << "\"." << endl;
    cout << "\n--- Updated Content List After Deletion ---" << endl;
    displayContentList(items, count);
}

// Main Menu
int main() {
    int option;
    do {
        cout << "\n==========================================" << endl;
        cout << "       CREATOR DASHBOARD LITE             " << endl;
        cout << "==========================================" << endl;
        cout << "1. Add New Content Idea" << endl;
        cout << "2. View All Content Ideas" << endl;
        cout << "3. Update Content Status" << endl;
        cout << "4. Delete Content Idea" << endl;
        cout << "5. Exit" << endl;
        cout << "Enter your choice (1-5): ";
        cin >> option;

        switch (option) {
            case 1:
                addContent();
                break;
            case 2: {
                Content items[MAX_ITEMS];
                int count = loadAllContent(items, MAX_ITEMS);
                displayContentList(items, count);
                break;
            }
            case 3:
                updateContentStatus();
                break;
            case 4:
                deleteContent();
                break;
            case 5:
                cout << "\nThank you for using Creator Dashboard Lite. Goodbye!" << endl;
                break;
            default:
                cout << "\nInvalid choice! Please enter a number between 1 and 5." << endl;
                break;
        }
    } while (option != 5);

    return 0;
}
