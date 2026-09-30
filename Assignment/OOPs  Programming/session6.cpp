#include <iostream>
#include <string>

using namespace std;

// Task 1: Encapsulation with Getters and Setters (Song Class)
class Song {
private:
    string title;
    string artist;

public:
    Song(string t, string a) {
        title = t;
        artist = a;
    }

    // Getters
    string getTitle() const {
        return title;
    }

    string getArtist() const {
        return artist;
    }

    // Setters
    void setTitle(string newTitle) {
        title = newTitle;
    }

    void setArtist(string newArtist) {
        artist = newArtist;
    }
};

// Task 2: Protected Member Access (InstaStory & SponsoredStory)
class InstaStory {
protected:
    int storyViews;

public:
    InstaStory(int views) : storyViews(views) {}
};

class SponsoredStory : public InstaStory {
private:
    string sponsorBrand;

public:
    SponsoredStory(int views, string brand) : InstaStory(views), sponsorBrand(brand) {}

    void displayStoryAnalytics() {
        // Accessing protected member storyViews from derived class
        cout << "Sponsored Story by: " << sponsorBrand << " | Total Views: " << storyViews << endl;
    }
};

// Task 3: Abstraction & Pure Virtual Functions (Product, Electronics, Clothing)
class Product {
public:
    // Pure virtual method making Product an abstract class
    virtual void upload() = 0;
    virtual ~Product() {}
};

class Electronics : public Product {
public:
    void upload() override {
        cout << "Electronics Upload: Uploading technical specifications, warranty details, and safety manuals." << endl;
    }
};

class Clothing : public Product {
public:
    void upload() override {
        cout << "Clothing Upload: Uploading size charts, fabric material descriptions, and wash-care labels." << endl;
    }
};

// Task 4: UserProfile with Private Phone Number
class UserProfile {
private:
    string username;
    string phoneNumber; // Private sensitive data

public:
    UserProfile(string user) : username(user), phoneNumber("") {}

    void setPhoneNumber(string phone) {
        phoneNumber = phone;
    }

    string getPhoneNumber() const {
        return phoneNumber;
    }

    string getUsername() const {
        return username;
    }
};

int main() {
    cout << "==================================================" << endl;
    cout << "    SESSION 6: ENCAPSULATION AND ABSTRACTION      " << endl;
    cout << "==================================================" << endl;

    // --------------------------------------------------
    // Task 1: Song Encapsulation
    // --------------------------------------------------
    cout << "\n--- Task 1: Song (Getters and Setters) ---" << endl;
    Song mySong("Old Title", "Arijit Singh");
    cout << "Original Title: " << mySong.getTitle() << " | Artist: " << mySong.getArtist() << endl;
    
    // Updating title using setter
    mySong.setTitle("Kesariya");
    cout << "Updated Title : " << mySong.getTitle() << " | Artist: " << mySong.getArtist() << endl;

    // --------------------------------------------------
    // Task 2: Protected Member Access in Inheritance
    // --------------------------------------------------
    cout << "\n--- Task 2: Protected Member Access (SponsoredStory) ---" << endl;
    SponsoredStory adStory(12500, "Nike");
    adStory.displayStoryAnalytics();

    // --------------------------------------------------
    // Task 3: Abstract Class and Pure Virtual Functions
    // --------------------------------------------------
    cout << "\n--- Task 3: Abstract Product Class ---" << endl;
    Electronics laptop;
    Clothing tshirt;

    Product* p1 = &laptop;
    Product* p2 = &tshirt;

    p1->upload();
    p2->upload();

    // --------------------------------------------------
    // Task 4: UserProfile (Private Phone Number)
    // --------------------------------------------------
    cout << "\n--- Task 4: UserProfile Private Phone Number ---" << endl;
    UserProfile user("pratik_patel");
    user.setPhoneNumber("+91-9876543210");
    cout << "User: @" << user.getUsername() << " | Phone Number: " << user.getPhoneNumber() << endl;

    /*
    -----------------------------------------------------------------------------------------
    TASK 5: Explanation of Encapsulation vs Abstraction (Student-Friendly with Social Media)
    -----------------------------------------------------------------------------------------
    1. ENCAPSULATION (Data Hiding & Protection):
       - Definition: Bundling data and methods into a single unit (class) and restricting direct 
         access using private/protected specifiers.
       - Social Media Example (WhatsApp/Instagram):
         In WhatsApp, your private profile details (like phone number or end-to-end encryption keys) 
         are kept private. Other users cannot directly modify or access your private variables; 
         they can only interact through controlled public methods like sending a message.

    2. ABSTRACTION (Hiding Complexity / Showing Essential Features):
       - Definition: Hiding internal implementation details and showing only the essential 
         features to the outside world.
       - Social Media Example (Instagram):
         When you click the "Send Message" or "Post Story" button on Instagram, you simply tap the 
         button. You do not need to know how media is compressed, packets are transmitted across 
         servers, or databases are queried behind the scenes.
    -----------------------------------------------------------------------------------------
    */

    return 0;
}
