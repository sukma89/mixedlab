#include <sys/wait.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

//static pid_t ppid = -1;
pid_t ppid = -1;

int main(void) 
{
	pid_t pids[10];
	int i;

	if (ppid == -1) {
		ppid = getpid();
		printf("Main PID: %d\n", ppid);
	}

	for (i = 9; i >= 0; --i) {
		pids[i] = fork();
		if (pids[i] == 0) {
			printf(" > PID %d\n", getpid());
			sleep(i+1);
			_exit(0);
		}
	}

	for (i = 9; i >= 0; --i) {
		waitpid(pids[i], NULL, 0);
	}

	return 0;
}
