#include <stdio.h>
#include <unistd.h>
#include <fcntl.h>
#include <stdlib.h>

#define BUFFERSIZE 4096

/**
 * Sets one or more of the file status flags for a descriptor
 */
void set_fl(int fd, int flags);

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
            //it seems that ext4 does not honor the O_SYNC flag
            //set_fl(ofds, O_SYNC);
        }
    } else {
        ifds = STDIN_FILENO;
    }

    while ((n = read(ifds, buf, BUFFERSIZE)) > 0) {
        if (write(ofds, buf, n) != n) {
            printf("Write error\n");
        }
        //to ensure consistency of the file system on 
        //disk with the contents of the buffer cache
        //fsync(ofds);
    }

    if (n < 0) {
        printf("Read error\n");
    }

    //When a process terminates, all of its open files are closed 
    //automatically by the kernel.
    //close(ifds);
    //close(ofds);

    return 0;
}

void set_fl(int fd, int flags)
{
    int val;
    if ((val = fcntl(fd, F_GETFL, 0)) < 0) {
        printf("fcntl F_GETFL error\n");
        exit(1);
    }
    val |= flags;
    if (fcntl(fd, F_SETFL, val) < 0) {
        printf("fcntl F_SETFL error\n");
        exit(1);
    }
}

