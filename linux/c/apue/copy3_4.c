#include <stdio.h>
#include <unistd.h>
#include <fcntl.h>
#include <stdlib.h>

#define BUFFERSIZE 4096

int main(int argc, char *argv[])
{
    int n, ifds, ofds;
    char buf[BUFFERSIZE];

    ofds = STDOUT_FILENO;

    if (argc > 1) {
        ifds = open(argv[1], O_RDONLY);
        if (ifds < 0) {
            printf("Failed to open file %s\n", argv[1]);
            exit(1);
        }
        
        if (argc > 2) {
            ofds = open(argv[2], O_WRONLY | O_CREAT, S_IRUSR | S_IWUSR | S_IRGRP | S_IROTH);
            if (ofds < 0) {
                printf("Failed to open file %s\n", argv[2]);
                exit(1);
            }
        }
    } else {
        ifds = STDIN_FILENO;
    }

    while ((n = read(ifds, buf, BUFFERSIZE)) > 0) {
        if (write(ofds, buf, n) != n) {
            printf("Write error\n");
        }
    }

    if (n < 0) {
        printf("Read error\n");
    }

    return 0;
}
