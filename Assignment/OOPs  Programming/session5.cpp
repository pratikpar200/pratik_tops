#include <iostream>
#include <string>

using namespace std;

// Task 1: Compile-Time Polymorphism (Method Overloading)
class PaymentProcessor {
public:
    // Version 1: Takes only amount
    void processPayment(double amount) {
        cout << "[Version 1 Called] Standard Payment Processed. Final Amount: Rs. " << amount << endl;
    }

    // Version 2: Takes amount and coupon code
    void processPayment(double amount, string couponCode) {
        double discount = 0.10 * amount; // 10% discount for valid coupon
        double finalAmount = amount - discount;
        cout << "[Version 2 Called] Coupon '" << couponCode << "' Applied (10% OFF). Final Amount: Rs. " << finalAmount << endl;
    }
};

// Task 2: Runtime Polymorphism (Method Overriding)
class SocialMediaUploader {
public:
    virtual void uploadContent() {
        cout << "Generic upload to social media." << endl;
    }
    virtual ~SocialMediaUploader() {}
};

class InstagramUploader : public SocialMediaUploader {
public:
    void uploadContent() override {
        cout << "Instagram: Uploading photo/reel with aspect ratio 9:16, filters, and hashtags." << endl;
    }
};

class YouTubeUploader : public SocialMediaUploader {
public:
    void uploadContent() override {
        cout << "YouTube: Uploading 4K landscape video with custom thumbnail, title, and tags." << endl;
    }
};

// Task 3: Method Overloading for searchProduct
class FlipkartStore {
public:
    // Version 1: Search by product name
    void searchProduct(string productName) {
        cout << "Search Query: '" << productName << "' (Searching across All Categories)" << endl;
    }

    // Version 2: Search by product name and category
    void searchProduct(string productName, string category) {
        cout << "Search Query: '" << productName << "' (Filtered within Category: '" << category << "')" << endl;
    }
};

// Task 4: Runtime Polymorphism with Dynamic Method Dispatch (MusicPlayer & SpotifyPlayer)
class MusicPlayer {
public:
    // Virtual function enables runtime dynamic dispatch in C++
    virtual void play(string song) {
        cout << "Playing: " << song << endl;
    }
    virtual ~MusicPlayer() {}
};

class SpotifyPlayer : public MusicPlayer {
public:
    void play(string song) override {
        cout << "Streaming on Spotify: " << song << endl;
    }
};

int main() {
    cout << "==========================================" << endl;
    cout << "          SESSION 5: POLYMORPHISM         " << endl;
    cout << "==========================================" << endl;

    // --------------------------------------------------
    // Task 1: PaymentProcessor (Method Overloading)
    // --------------------------------------------------
    cout << "\n--- Task 1: Method Overloading (PaymentProcessor) ---" << endl;
    PaymentProcessor payment;
    payment.processPayment(1500.0);
    payment.processPayment(1500.0, "SAVE10");

    // --------------------------------------------------
    // Task 2: Method Overriding (SocialMediaUploader)
    // --------------------------------------------------
    cout << "\n--- Task 2: Method Overriding (SocialMediaUploader) ---" << endl;
    InstagramUploader instaUploader;
    YouTubeUploader ytUploader;
    instaUploader.uploadContent();
    ytUploader.uploadContent();

    // --------------------------------------------------
    // Task 3: Overloaded searchProduct
    // --------------------------------------------------
    cout << "\n--- Task 3: Overloaded searchProduct() ---" << endl;
    FlipkartStore store;
    store.searchProduct("Laptop");
    store.searchProduct("Laptop", "Electronics");

    // --------------------------------------------------
    // Task 4: Runtime Polymorphism and Dynamic Method Dispatch
    // --------------------------------------------------
    cout << "\n--- Task 4: Runtime Polymorphism (MusicPlayer & SpotifyPlayer) ---" << endl;
    
    // Assigning a SpotifyPlayer instance to a base class pointer/reference
    SpotifyPlayer spotifyInstance;
    MusicPlayer* player = &spotifyInstance;

    // Dynamic method dispatch calls SpotifyPlayer's play() at runtime
    player->play("Starboy - The Weeknd");

    /*
    -----------------------------------------------------------------------------------
    TASK 4 EXPLANATION OF EXPECTED OUTPUT:
    Expected Output: "Streaming on Spotify: Starboy - The Weeknd"
    Reason: Because play() is declared as 'virtual' in the base class MusicPlayer,
    C++ uses the vtable to dynamically resolve and invoke the derived class
    (SpotifyPlayer) overridden implementation at runtime through the base pointer.
    -----------------------------------------------------------------------------------
    */

    return 0;
}
