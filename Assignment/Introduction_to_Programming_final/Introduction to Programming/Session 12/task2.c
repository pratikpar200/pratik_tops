#include <stdio.h>

// Structure for Zomato food item
struct FoodItem
{
    char itemName[50];
    float price;
    float rating;
};

int main()
{
    // Array of 3 FoodItem structures
    struct FoodItem menu[3] = {
        {"Paneer Butter Masala", 280.0f, 4.6f},
        {"Butter Garlic Naan", 60.0f, 4.8f},
        {"Gulab Jamun (2 Pcs)", 90.0f, 4.5f}
    };

    printf("=== Zomato Restaurant Menu ===\n\n");

    // Displaying details using a loop
    for (int i = 0; i < 3; i++)
    {
        printf("Item %d:\n", i + 1);
        printf("  Name   : %s\n", menu[i].itemName);
        printf("  Price  : Rs. %.2f\n", menu[i].price);
        printf("  Rating : %.1f / 5.0\n\n", menu[i].rating);
    }

    return 0;
}
