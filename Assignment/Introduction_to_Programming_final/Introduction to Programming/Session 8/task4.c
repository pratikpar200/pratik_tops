#include <stdio.h>

// Formats an integer price into Indian rupee format (e.g., Rs. 1,599)
void formatPrice(int price, char output[])
{
    if (price >= 100000)
    {
        int lakhs = price / 100000;
        int thousands = (price % 100000) / 1000;
        int hundreds = price % 1000;
        sprintf(output, "Rs. %d,%02d,%03d", lakhs, thousands, hundreds);
    }
    else if (price >= 1000)
    {
        int thousands = price / 1000;
        int hundreds = price % 1000;
        sprintf(output, "Rs. %d,%03d", thousands, hundreds);
    }
    else
    {
        sprintf(output, "Rs. %d", price);
    }
}

int main()
{
    int product1Price = 1599;
    int product2Price = 24999;
    int product3Price = 450;

    char formatted1[30];
    char formatted2[30];
    char formatted3[30];

    formatPrice(product1Price, formatted1);
    formatPrice(product2Price, formatted2);
    formatPrice(product3Price, formatted3);

    printf("=== Flipkart Price Tags ===\n");
    printf("1. Wireless Earphones : %s\n", formatted1);
    printf("2. Smart LED TV       : %s\n", formatted2);
    printf("3. Phone Cover        : %s\n", formatted3);

    return 0;
}
