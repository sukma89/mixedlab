/**
 * hello.c
 * https://computing.llnl.gov/tutorials/pthreads/
 *
 * gcc -o hello hello.c -lpthread
 */
#include <pthread.h>
#include <stdio.h>
#include <stdlib.h>

#define NUM 5
#define LOOP_MAX 10.0

int getRand () {
	return (1 + (int) (LOOP_MAX * (rand() / (RAND_MAX + 1.0) ) ) );
}

void *printHello (void *threadid) {
	int i = 0, loop;
	long tid;
	tid = (long) threadid;
	loop = getRand();
	
	printf("Loop for %d = %d\n", tid, loop);

	while (i < loop) {
		printf("Thread: %ld, C:%d\n", tid, i);
		i++;
		sleep(1);
	}

	pthread_exit(NULL);
}

int main(int argc, char *argv[]) {
	pthread_t threads[NUM];

	int rc;
	long t;

	for (t = 0; t < NUM; t++) {
		printf("In Main: Creating thread %ld\n", t);
		rc = pthread_create(&threads[t], NULL, printHello, (void *) t);

		if (rc) {
			printf("Error: return code from pthread_create() is %d\n", rc);
			exit(-1);
		}
	}
	pthread_exit(NULL);
}

