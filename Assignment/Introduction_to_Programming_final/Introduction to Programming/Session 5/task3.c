#include <stdio.h>

int main()
{
    float cartAmount;
    float discountRate = 0.0f;
    float discountAmount = 0.0f;
    float finalAmount = 0.0f;

    printf("--- Flipkart Discount Calculator ---\n");
    printf("Enter your total cart amount: Rs. ");
    scanf("%f", &cartAmount);

    // Using nested if statements to check discount slabs
    if (cartAmount > 1000)
    {
        if (cartAmount > 2000)
        {
            discountRate = 0.20f; // 20% discount
            printf("Eligible for 20%% Mega Discount!\n");
        }
        else
        {
            discountRate = 0.10f; // 10% discount
            printf("Eligible for 10%% Standard Discount!\n");
        }
    }
    else
    {
        discountRate = 0.0f; // No discount
        printf("No discount applied (Cart value is Rs. 1000 or below).\n");
    }

    discountAmount = cartAmount * discountRate;
    finalAmount = cartAmount - discountAmount;

    printf("Discount Amount: Rs. %.2f\n", discountAmount);
    printf("Final Amount to Pay: Rs. %.2f\n", finalAmount);

    return 0;
}
