#include <stdio.h>

// Nested Bio structure
struct Bio
{
    char description[100];
    int age;
};

// InstaProfile structure
struct InstaProfile
{
    char username[50];
    int followers;
    struct Bio profileBio;
};

int main()
{
    // Initializing InstaProfile variable
    struct InstaProfile myProfile = {
        "pratik_developer",
        1540,
        {
            "Coding enthusiast | Tech explorer | Coffee lover",
            21
        }
    };

    printf("=== Instagram Profile Details ===\n");
    printf("Username   : @%s\n", myProfile.username);
    printf("Followers  : %d\n", myProfile.followers);
    printf("Bio        : \"%s\"\n", myProfile.profileBio.description);
    printf("Age        : %d years\n", myProfile.profileBio.age);

    return 0;
}
