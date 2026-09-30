#include <iostream>
#include <string>

using namespace std;

// Task 1: Base Class
class SocialMediaUser {
public:
    string username;
    int followers;

    SocialMediaUser(string u, int f) {
        username = u;
        followers = f;
    }

    void displayProfile() {
        cout << "Username  : @" << username << endl;
        cout << "Followers : " << followers << endl;
    }
};

// Task 2: Single Inheritance (SocialMediaUser -> YouTuber)
class YouTuber : public SocialMediaUser {
public:
    string channelName;

    YouTuber(string u, int f, string ch) : SocialMediaUser(u, f) {
        channelName = ch;
    }

    void uploadVideo(string title) {
        cout << "Video " << title << " uploaded to " << channelName << endl;
    }
};

// Task 3: Hierarchical Branch 1 (SocialMediaUser -> Podcaster)
class Podcaster : public SocialMediaUser {
public:
    string podcastName;

    Podcaster(string u, int f, string pod) : SocialMediaUser(u, f) {
        podcastName = pod;
    }

    void publishEpisode(string episodeTitle) {
        cout << "Episode " << episodeTitle << " published on " << podcastName << endl;
    }
};

// Task 4: Multilevel Inheritance (SocialMediaUser -> YouTuber -> GamingYouTuber)
class GamingYouTuber : public YouTuber {
public:
    GamingYouTuber(string u, int f, string ch) : YouTuber(u, f, ch) {}

    void streamGame(string gameName) {
        cout << username << " is now streaming " << gameName << " on " << channelName << endl;
    }
};

// Task 5: Hierarchical Branch 2 (SocialMediaUser -> InstagramInfluencer)
class InstagramInfluencer : public SocialMediaUser {
public:
    InstagramInfluencer(string u, int f) : SocialMediaUser(u, f) {}

    void postStory(string storyTitle) {
        cout << username << " posted a new story: " << storyTitle << endl;
    }
};

int main() {
    cout << "==========================================" << endl;
    cout << "          SESSION 4: INHERITANCE          " << endl;
    cout << "==========================================" << endl;

    // --------------------------------------------------
    // Task 1: Base Class SocialMediaUser
    // --------------------------------------------------
    cout << "\n--- Task 1: Base Class (SocialMediaUser) ---" << endl;
    SocialMediaUser user1("alex_tech", 5000);
    user1.displayProfile();

    // --------------------------------------------------
    // Task 2: Single Inheritance (YouTuber)
    // --------------------------------------------------
    cout << "\n--- Task 2: Single Inheritance (YouTuber) ---" << endl;
    YouTuber yt("john_doe", 150000, "CodeWithJohn");
    yt.displayProfile();
    yt.uploadVideo("C++ Full Tutorial for Beginners");

    // --------------------------------------------------
    // Task 3: Hierarchical Inheritance (Podcaster)
    // --------------------------------------------------
    cout << "\n--- Task 3: Hierarchical Inheritance (Podcaster) ---" << endl;
    Podcaster pod("sara_speaks", 80000, "Tech Talk Hour");
    pod.displayProfile();
    pod.publishEpisode("Episode 42: The Rise of AI");

    // --------------------------------------------------
    // Task 4: Multilevel Inheritance (GamingYouTuber)
    // --------------------------------------------------
    cout << "\n--- Task 4: Multilevel Inheritance (GamingYouTuber) ---" << endl;
    GamingYouTuber gamer("mark_plays", 500000, "MarkGamingStudio");
    gamer.displayProfile();
    gamer.uploadVideo("GTA 6 Gameplay Highlights");
    gamer.streamGame("Cyberpunk 2077");

    // --------------------------------------------------
    // Task 5: Hierarchical Inheritance (InstagramInfluencer)
    // --------------------------------------------------
    cout << "\n--- Task 5: Hierarchical Inheritance (InstagramInfluencer) ---" << endl;
    InstagramInfluencer insta("riya_style", 250000);
    insta.displayProfile();
    insta.postStory("Behind the scenes of our latest photo shoot!");

    return 0;
}
