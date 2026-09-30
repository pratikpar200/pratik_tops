#include <stdio.h>
#include <string.h>

int main()
{
    // Source string
    char source[] = "Flipkart";

    // Destination string declared with enough space
    char shoppingApp[50];

    // Copying string using strcpy()
    strcpy(shoppingApp, source);

    printf("Source String: %s\n", source);
    printf("Copied String (shoppingApp): %s\n", shoppingApp);

    return 0;
}
