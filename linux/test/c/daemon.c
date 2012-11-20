#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <fcntl.h>
#include <sys/types.h>
#include <unistd.h>
#include <sys/wait.h>
#include <signal.h>
#define MAXFILE 65535
volatile sig_atomic_t _running = 1;

void sigterm_handler(int arg) {
	_running = 0;
}

int main(void) {
	
	pid_t pc;
	int i, fd, len;
	char *buf="This is a daemon\n";
	len = strlen(buf);
	pc = fork();

	if (pc < 0) {
		printf("Error fork\n");
		exit(1);
	} else if ( pc > 0) {
		exit(0);
	}

	setsid();

	chdir("/");

	umask(0);

	for (i = 0; i < MAXFILE; i++) {

		close(i);
	}

	signal(SIGTERM, sigterm_handler);

	while (_running == 1) {

		if ( (fd = open("/tmp/daemonx.log", 
				O_CREAT|O_WRONLY|O_APPEND, 0600)) < 0) {
			perror("Open");
			exit(1);
		}

		write(fd, buf, len+1);
		close(fd);
		usleep(10*1000);

	}

	
	return 0;
}

