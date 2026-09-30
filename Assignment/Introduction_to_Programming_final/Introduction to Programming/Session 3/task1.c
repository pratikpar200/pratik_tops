#include <stdio.h>

int main()
{
    // Declaring variables for a Flipkart product
    char productName[] = "Wireless Bluetooth Headphones";
    float price = 1499.50f;
    double rating = 4.5;

    // Printing values and their data types
    printf("--- Flipkart Product Details ---\n");
    printf("Product Name (String): %s\n", productName);
    printf("Price (Float): Rs. %.2f\n", price);
    printf("Rating (Double): %.1lf / 5.0\n", rating);

    return 0;
}
