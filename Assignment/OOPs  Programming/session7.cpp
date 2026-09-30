#include <iostream>
#include <fstream>
#include <string>

using namespace std;

// Function for Task 1: Write 5 favorite songs to my_fav_songs.txt
void writeFavoriteSongs() {
    ofstream outFile("my_fav_songs.txt");
    if (outFile.is_open()) {
        outFile << "1. Tum Hi Ho\n";
        outFile << "2. Shape of You\n";
        outFile << "3. Believer\n";
        outFile << "4. Perfect\n";
        outFile << "5. Kesariya\n";
        outFile.close();
        cout << "[Task 1] 5 favorite songs successfully written to 'my_fav_songs.txt'." << endl;
    } else {
        cout << "Error creating my_fav_songs.txt!" << endl;
    }
}

// Function for Task 2: Read and display all songs from my_fav_songs.txt
void readFavoriteSongs() {
    ifstream inFile("my_fav_songs.txt");
    if (inFile.is_open()) {
        cout << "\n[Task 2] Reading songs from 'my_fav_songs.txt':" << endl;
        string songLine;
        while (getline(inFile, songLine)) {
            cout << "  " << songLine << endl;
        }
        inFile.close();
    } else {
        cout << "Error reading my_fav_songs.txt!" << endl;
    }
}

// Function for Task 3: Append a new song to my_fav_songs.txt using ios::app
void appendFavoriteSong(const string& newSong) {
    ofstream outFile("my_fav_songs.txt", ios::app);
    if (outFile.is_open()) {
        outFile << "6. " << newSong << "\n";
        outFile.close();
        cout << "\n[Task 3] Appended '" << newSong << "' to 'my_fav_songs.txt'." << endl;
    } else {
        cout << "Error appending to my_fav_songs.txt!" << endl;
    }
}

// Function for Task 4: Wishlist Tracker (Save 3 products and prices, then read & display)
void wishlistTracker() {
    cout << "\n--- Task 4: Flipkart-Style Wishlist Tracker ---" << endl;
    
    // Writing 3 products and prices to wishlist.txt
    ofstream outFile("wishlist.txt");
    if (outFile.is_open()) {
        outFile << "Wireless Headphones, 2499.00\n";
        outFile << "Smart Watch, 3999.00\n";
        outFile << "Gaming Mouse, 1299.00\n";
        outFile.close();
        cout << "Wishlist items saved to 'wishlist.txt'." << endl;
    }

    // Reading and displaying from wishlist.txt
    ifstream inFile("wishlist.txt");
    if (inFile.is_open()) {
        cout << "\nSaved Wishlist Items:" << endl;
        string itemLine;
        while (getline(inFile, itemLine)) {
            cout << "  - " << itemLine << endl;
        }
        inFile.close();
    }
}

// Function for Task 5: Count total followers without using an array or vector
void countFollowers() {
    cout << "\n--- Task 5: Instagram Follower Counter ---" << endl;
    
    // First, ensure sample file insta_followers.txt exists
    ofstream sampleFile("insta_followers.txt");
    if (sampleFile.is_open()) {
        sampleFile << "tech_guru\n";
        sampleFile << "travel_diaries\n";
        sampleFile << "fitness_freak\n";
        sampleFile << "code_master\n";
        sampleFile << "music_lover\n";
        sampleFile.close();
    }

    // Count line by line without storing in array or vector
    ifstream inFile("insta_followers.txt");
    int followerCount = 0;
    string username;

    if (inFile.is_open()) {
        while (getline(inFile, username)) {
            if (!username.empty()) {
                followerCount++;
            }
        }
        inFile.close();
        cout << "Total followers counted in 'insta_followers.txt': " << followerCount << endl;
    } else {
        cout << "Error opening insta_followers.txt!" << endl;
    }
}

int main() {
    cout << "==========================================" << endl;
    cout << "        SESSION 7: FILE HANDLING          " << endl;
    cout << "==========================================" << endl;

    // Task 1: Write 5 songs
    writeFavoriteSongs();

    // Task 2: Read and display songs
    readFavoriteSongs();

    // Task 3: Append new song and read again
    appendFavoriteSong("Blinding Lights");
    readFavoriteSongs();

    // Task 4: Wishlist Tracker
    wishlistTracker();

    // Task 5: Count followers without array/vector
    countFollowers();

    return 0;
}
