#include <stdio.h>
#include <stdlib.h>
#include <fcntl.h>
#include <unistd.h>

int main(void)
{
    int fd, i, n = sizeof(int);
    char *file = "./test.txt";

    //fd = open(file, O_WRONLY);
    fd = open(file, O_APPEND | O_CREAT, S_IRUSR | S_IWUSR | S_IRGRP | S_IROTH);

    if (fd < 0) {
        printf("Failed to open file %s\n", file);
        exit(1);
    }

    for (i = 1; i <= 100; i++) {
        if (write(fd, (void *) &i, n) != n) {
            printf("Error on writing, %d\n", i);
        }
    }

    close(fd);

    return 0;
}
