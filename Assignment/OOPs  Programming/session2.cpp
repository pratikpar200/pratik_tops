#include <iostream>
#include <string>

using namespace std;

// Task 1 & 4: Playlist Class
class Playlist {
public:
    string name;
    string createdOn; // simple C++ date representation
    bool isPublic;
    string songs[20]; // array property for songs (Task 4)
    int songCount;

    // Constructor
    Playlist(string pName, string date, bool pub) {
        name = pName;
        createdOn = date;
        isPublic = pub;
        songCount = 0; // Initialize songs as empty
    }

    // Task 2: togglePublic member function
    void togglePublic() {
        isPublic = !isPublic;
    }

    // Task 4: addSong member function
    void addSong(string songTitle) {
        if (songCount < 20) {
            songs[songCount] = songTitle;
            songCount++;
        } else {
            cout << "Playlist is full!" << endl;
        }
    }

    // Display all playlist properties
    void displayProperties() {
        cout << "Playlist Name : " << name << endl;
        cout << "Created On    : " << createdOn << endl;
        cout << "Is Public     : " << (isPublic ? "true" : "false") << endl;
    }

    // Display songs list
    void displaySongs() {
        cout << "Songs in " << name << ":" << endl;
        if (songCount == 0) {
            cout << "  (No songs added yet)" << endl;
        } else {
            for (int i = 0; i < songCount; i++) {
                cout << "  " << (i + 1) << ". " << songs[i] << endl;
            }
        }
    }
};

// Task 5: Grouped object-style data structure for FoodOrder
struct FoodOrderDetails {
    int orderId;
    string restaurantName;
    bool isDelivered;
};

// Task 3 & 5: FoodOrder Class
class FoodOrder {
public:
    int orderId;
    string restaurantName;
    bool isDelivered;

    // Task 5: Refactored constructor taking grouped object-style set of values
    FoodOrder(FoodOrderDetails details) {
        orderId = details.orderId;
        restaurantName = details.restaurantName;
        isDelivered = details.isDelivered;
    }

    // Task 3: markDelivered method
    void markDelivered() {
        isDelivered = true;
        cout << "Order #" << orderId << " from " << restaurantName << " has been DELIVERED successfully!" << endl;
    }

    void displayOrder() {
        cout << "Order ID        : " << orderId << endl;
        cout << "Restaurant Name : " << restaurantName << endl;
        cout << "Delivery Status : " << (isDelivered ? "Delivered" : "In Progress") << endl;
    }
};

int main() {
    cout << "==========================================" << endl;
    cout << "       SESSION 2: CLASSES AND OBJECTS     " << endl;
    cout << "==========================================" << endl;

    // --------------------------------------------------
    // Task 1: Instantiate Playlist and print properties
    // --------------------------------------------------
    cout << "\n--- Task 1: Instantiate Playlist ---" << endl;
    Playlist myPlaylist("Coding Beats", "2026-09-30", true);
    myPlaylist.displayProperties();

    // --------------------------------------------------
    // Task 2: togglePublic() demonstration
    // --------------------------------------------------
    cout << "\n--- Task 2: togglePublic() Demonstration ---" << endl;
    cout << "Calling togglePublic()..." << endl;
    myPlaylist.togglePublic();
    cout << "Is Public now: " << (myPlaylist.isPublic ? "true" : "false") << endl;

    cout << "Calling togglePublic() again..." << endl;
    myPlaylist.togglePublic();
    cout << "Is Public now: " << (myPlaylist.isPublic ? "true" : "false") << endl;

    // --------------------------------------------------
    // Task 4: Add 3 song titles and display updated list
    // --------------------------------------------------
    cout << "\n--- Task 4: addSong() Demonstration ---" << endl;
    myPlaylist.addSong("Shape of You");
    myPlaylist.addSong("Believer");
    myPlaylist.addSong("Blinding Lights");
    myPlaylist.displaySongs();

    // --------------------------------------------------
    // Task 3 & 5: FoodOrder with Grouped Constructor
    // --------------------------------------------------
    cout << "\n--- Task 3 & 5: FoodOrder Demonstration ---" << endl;
    FoodOrderDetails orderInfo = { 101, "Pizza Palace", false };
    FoodOrder myOrder(orderInfo);

    cout << "Initial Order Status:" << endl;
    myOrder.displayOrder();

    cout << "\nMarking order as delivered:" << endl;
    myOrder.markDelivered();

    cout << "\nUpdated Order Status:" << endl;
    myOrder.displayOrder();

    return 0;
}
