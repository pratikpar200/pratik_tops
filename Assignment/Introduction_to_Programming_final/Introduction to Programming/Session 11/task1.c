#include <stdio.h>

int main()
{
    // Integer variable
    int likes = 1250;

    // Pointer variable pointing to 'likes'
    int *ptrLikes = &likes;

    printf("=== Pointer Demonstration (likes & ptrLikes) ===\n");
    printf("Value of likes variable               : %d\n", likes);
    printf("Address of likes (&likes)             : %p\n", (void *)&likes);
    printf("Value stored in ptrLikes (Address)    : %p\n", (void *)ptrLikes);
    printf("Value pointed to by ptrLikes (*ptrLikes): %d\n", *ptrLikes);

    return 0;
}
