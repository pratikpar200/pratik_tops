#include <stdio.h>

/*
======================================================================
MEMORY DIAGRAM: How Pointer 'ptrLikes' References Variable 'likes'
======================================================================

+-------------------------+                     +-------------------------+
|      Pointer Variable   |                     |      Normal Variable    |
|      Name: ptrLikes     |                     |      Name: likes        |
+-------------------------+                     +-------------------------+
| Value: 0x0061FF1C       | ----------------->  | Value: 1250             |
| (Address of 'likes')    |    Points to        |                         |
+-------------------------+                     +-------------------------+
| Address: 0x0061FF18     |                     | Address: 0x0061FF1C     |
+-------------------------+                     +-------------------------+

Labels:
- Variable: 'likes' stores the integer value (1250).
- Address: Memory location where 'likes' is stored (e.g. 0x0061FF1C).
- Pointer: 'ptrLikes' holds the address (0x0061FF1C) of variable 'likes'.
- Dereferencing (*ptrLikes): Accesses the value 1250 stored at that address.

Note: You can draw this exact diagram on paper for class submission!
======================================================================
*/

int main()
{
    int likes = 1250;
    int *ptrLikes = &likes;

    printf("=== Memory Diagram Values in Console ===\n");
    printf("[Variable] Name: likes        | Value: %d     | Address: %p\n", likes, (void *)&likes);
    printf("[Pointer]  Name: ptrLikes     | Value: %p | Address: %p\n", (void *)ptrLikes, (void *)&ptrLikes);
    printf("[Dereference] *ptrLikes points to value: %d\n", *ptrLikes);

    return 0;
}
