#include <stdio.h>

int main()
{
    // Array of 5 Zomato order amounts
    int orders[5] = {250, 480, 310, 690, 150};
    int *ptr = orders; // Points to the first element (orders[0])

    printf("=== Zomato Order Amounts & Memory Addresses ===\n\n");

    // Iterating using pointer arithmetic
    for (int i = 0; i < 5; i++)
    {
        printf("Order %d -> Amount: Rs. %d | Address: %p\n",
               i + 1, *(ptr + i), (void *)(ptr + i));
    }

    return 0;
}
