#include <stdio.h>
#include <string.h>

#define MAX_ITEMS 10
#define NAME_LEN 50

// addToCart function modifies the array passed by reference
void addToCart(char cart[][NAME_LEN], int *cartSize, const char productName[])
{
    if (*cartSize < MAX_ITEMS)
    {
        strcpy(cart[*cartSize], productName);
        (*cartSize)++; // Update item count using pointer
        printf("Added '%s' to cart.\n", productName);
    }
    else
    {
        printf("Cart is full!\n");
    }
}

void printCart(char cart[][NAME_LEN], int cartSize)
{
    printf("\n--- Current Shopping Cart (%d items) ---\n", cartSize);
    for (int i = 0; i < cartSize; i++)
    {
        printf("%d. %s\n", i + 1, cart[i]);
    }
}

int main()
{
    char cart[MAX_ITEMS][NAME_LEN];
    int itemCount = 0;

    printf("Demonstrating Pass-by-Reference in C (Arrays & Pointers):\n\n");

    // Adding items
    addToCart(cart, &itemCount, "Wireless Earbuds");
    addToCart(cart, &itemCount, "Smart Watch");
    addToCart(cart, &itemCount, "Gaming Mouse");

    // Printing cart from main to show changes persisted outside function
    printCart(cart, itemCount);

    return 0;
}
