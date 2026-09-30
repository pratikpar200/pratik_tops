#include <iostream>
#include <fstream>
#include <string>

using namespace std;

// Task 1 & Task 5: Playlist Class with Default Constructor & Destructor File Autosave
class Playlist {
public:
    string name;

    // Task 1: Default Constructor
    Playlist() {
        name = "My Favourites";
        cout << "Welcome! Playlist '" << name << "' created successfully." << endl;
    }

    // Parameterized constructor if needed
    Playlist(string customName) {
        name = customName;
        cout << "Playlist '" << name << "' created." << endl;
    }

    // Task 5: Destructor automatically saves playlist name into autosave.txt
    ~Playlist() {
        ofstream outFile("autosave.txt");
        if (outFile.is_open()) {
            outFile << name << endl;
            outFile.close();
            cout << "Playlist destructor: '" << name << "' autosaved into autosave.txt." << endl;
        } else {
            cout << "Error opening autosave.txt!" << endl;
        }
    }
};

// Task 2: Product Class with Parameterized Constructor
class Product {
public:
    string productName;
    double price;
    double rating;

    // Parameterized Constructor
    Product(string name, double p, double r) {
        productName = name;
        price = p;
        rating = r;
    }

    // Method to display product details
    void displayInfo() {
        cout << "Product Name : " << productName << endl;
        cout << "Price        : Rs. " << price << endl;
        cout << "Rating       : " << rating << " / 5.0" << endl;
    }
};

// Task 3: Movie Class with Parameterized & Copy Constructor
class Movie {
public:
    string title;
    string director;
    int releaseYear;

    // Parameterized Constructor
    Movie(string t, string d, int y) {
        title = t;
        director = d;
        releaseYear = y;
    }

    // Copy Constructor
    Movie(const Movie &m) {
        title = m.title;
        director = m.director;
        releaseYear = m.releaseYear;
    }

    void displayDetails() {
        cout << "Title    : " << title << endl;
        cout << "Director : " << director << endl;
        cout << "Year     : " << releaseYear << endl;
    }
};

// Task 4: Ticket Class with Destructor
class Ticket {
public:
    int ticketId;
    string movieTitle;

    Ticket(int id, string title) {
        ticketId = id;
        movieTitle = title;
        cout << "Ticket #" << ticketId << " booked for '" << movieTitle << "'." << endl;
    }

    // Destructor printing exact required message
    ~Ticket() {
        cout << "Saving your ticket..." << endl;
    }
};

int main() {
    cout << "==================================================" << endl;
    cout << "    SESSION 3: CONSTRUCTORS AND DESTRUCTORS       " << endl;
    cout << "==================================================" << endl;

    // --------------------------------------------------
    // Task 2: Parameterized Constructor (Product)
    // --------------------------------------------------
    cout << "\n--- Task 2: Product Parameterized Constructor ---" << endl;
    Product item1("Wireless Noise-Canceling Headphones", 2499.00, 4.6);
    item1.displayInfo();

    // --------------------------------------------------
    // Task 3: Copy Constructor (Movie)
    // --------------------------------------------------
    cout << "\n--- Task 3: Movie Copy Constructor ---" << endl;
    Movie originalMovie("Inception", "Christopher Nolan", 2010);
    Movie copiedMovie = originalMovie; // Invoking copy constructor

    cout << "[Original Movie Details]:" << endl;
    originalMovie.displayDetails();

    cout << "\n[Copied Movie Details]:" << endl;
    copiedMovie.displayDetails();

    // --------------------------------------------------
    // Task 4: Destructor Lifecycle (Ticket)
    // --------------------------------------------------
    cout << "\n--- Task 4: Ticket Destructor Lifecycle ---" << endl;
    {
        cout << "Creating Ticket object in inner scope..." << endl;
        Ticket myTicket(501, "Interstellar");
        cout << "Exiting inner scope to trigger destructor..." << endl;
    } // Destructor is automatically called here

    // --------------------------------------------------
    // Task 1 & 5: Playlist Default Constructor & Autosave Destructor
    // --------------------------------------------------
    cout << "\n--- Task 1 & 5: Playlist Default Constructor & Autosave ---" << endl;
    {
        Playlist myFavList; // Default constructor sets name to "My Favourites" and prints welcome message
    } // Destructor writes to autosave.txt

    return 0;
}
