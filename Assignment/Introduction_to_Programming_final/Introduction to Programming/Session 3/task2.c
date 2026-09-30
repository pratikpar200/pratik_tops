#include <stdio.h>

int main()
{
    // Constant GST rate (cannot be changed)
    const float GST_RATE = 0.18f; // 18% GST

    float basePrice = 350.00f; // Base price of Zomato food order
    float gstAmount = basePrice * GST_RATE;
    float finalPrice = basePrice + gstAmount;

    printf("--- Zomato Order Bill ---\n");
    printf("Base Price: Rs. %.2f\n", basePrice);
    printf("GST Rate: %.0f%%\n", GST_RATE * 100);
    printf("GST Amount: Rs. %.2f\n", gstAmount);
    printf("Final Price to Pay: Rs. %.2f\n", finalPrice);

    return 0;
}
